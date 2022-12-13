<?php
//from this page you can view, insert, edit and delete categories
require_once "classes/Product.php";
require_once "classes/Category.php";
require_once "classes/Authentication.php";
session_start();

Authentication::protect();

$title = "Maintain Product";
$pageHeading = "Product";
$product = new Product();

$itemRows = $product->getProducts();

$category = new Category();
$categoryRows = $category->getCategories();

//read stylesheet theme from session
if(isset($_SESSION["theme"]))
{
    $theme = $_SESSION["theme"] . ".css";
}
else
{
    $theme = "style.min.css";
}
//photo message
$photoMessage = "";
$message= "";

//If no product is selected the form will be used for insert
$submitType = "insert";
if (isset($_POST["submit"]) && ($_POST["operation"] == "insert")) {
    if (!empty($_POST["itemName"])) {
        $product->setItemName($_POST["itemName"]);
        $product->setCategoryId($_POST["category"]);
        $product->setPrice($_POST["price"]);
        $product->setSalePrice($_POST["salePrice"]);
        $product->setDescription($_POST["description"]);
        $product->setFeatured($_POST["featured"]);

        $id = $product->insertProduct();

        $photoMessage = PhotoUpload($id);
        $product = new Product();

        $message = "The Item was added" . $id;
    }
}


//process edit
if (!empty($_GET["id"]) && $_GET["action"] == "edit") {
    $product->getProduct($_GET["id"]);
    $submitType = "update";
}

//update a product
if (isset($_POST["submit"]) && ($_POST["operation"] == "update")) {
    $product->getProduct($_POST["itemId"]);
    $product->setItemName($_POST["itemName"]);
    $product->setCategoryId($_POST["category"]);
    $product->setPrice($_POST["price"]);
    $product->setSalePrice($_POST["salePrice"]);
    $product->setDescription($_POST["description"]);
    $product->setFeatured($_POST["featured"]);

    $targetDirectory = "images/";

    $photoMessage = PhotoUpload($_POST["itemId"]);

    $product->updateProduct($_POST["itemId"]);
    $message = "The product was updated";
    $product = new Product();
}

function PhotoUpload($imgToId)
{
    if (!empty($_FILES["photo"]["name"])) {
        $error = false;

        require_once "classes/DBAccess.php";
        include "settings/db.php";
        $db = new DBAccess($dsn, $username, $password);
        $pdo = $db->connect();

        $targetDirectory = "images/";

        $photo = basename($_FILES["photo"]["name"]);
        $targetFile = $targetDirectory . $photo;
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            return "Sorry, only JPG, PNG, JPEG & GIF files are allowed.";
            $error = true;
        }
        if ($_FILES["photo"]["error"] == 1) {
            return "Sorry, your file is too large. Max of 2M is allowed.";
            $error = true;
        }
        if ($error == false) {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
                if (!empty($_POST["oldPhoto"])) {
                    $file = "images/" . $_POST["oldPhoto"];
                    unlink($file);
                }
                $sql = "update item set photo =:photo where ItemID=:ItemID";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":ItemID", $imgToId, PDO::PARAM_INT);
                $stmt->bindValue(":photo", $photo, PDO::PARAM_STR);
                $id = $db->executeNonQuery($stmt, false);

                return "The image has been added.";
            } else {
                return "Sorry, there was an error uploading your file. Error Code:" . $_FILES["photo"]["error"];
                $photo = "";
            }
        }
    }
}




//delete a product
if (!empty($_GET["id"]) && $_GET["action"] == "delete") {
    $result = $product->deleteProduct($_GET["id"]);
    if ($result == true) {
        $message = "The Product was deleted";
    } else {
        $message = "The Product was NOT deleted";
    }
}


//start buffer
ob_start();
//display categories
include "templates/displayProduct.html.php";
//display form
include "templates/productForm.html.php";
$output = ob_get_clean();
include "templates/adminLayout.html.php";
