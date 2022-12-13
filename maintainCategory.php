<?php
//from this page you can view, insert, edit and delete categories
require_once "classes/Category.php";
require_once "classes/Authentication.php";
session_start();


Authentication::protect();

$title = "Maintain Category";
$pageHeading = "Category";


//create a category object
$category = new Category();
$message = "";

//read stylesheet theme from session
if (isset($_SESSION["theme"])) {
    $theme = $_SESSION["theme"] . ".css";
} else {
    $theme = "style.min.css";
}




//If no category is selected the form will be used for insert
$submitType = "insert";
//insert category when the button is clicked
if (isset($_POST["submit"]) && ($_POST["operation"] == "insert")) {
    //check a category name was supplied
    if (!empty($_POST["categoryName"])) {
        //set the category name
        $category->setCategoryName($_POST["categoryName"]);
        $id = $category->insertCategory();
        $message = "The category was added, id: " . $id;
        $category = new Category();
    }
}

//process delete
if (!empty($_GET["id"]) && $_GET["action"] == "delete") {
    $result = $category->deleteCategory($_GET["id"]);
    if ($result === -1) {
        $message = "This category cannot be deleted as it contains products";
    } elseif ($result == true) {
        $message = "The category was deleted";
    } else {
        $message = "The category was not deleted";
    }
}
//process edit
if (!empty($_GET["id"]) && $_GET["action"] == "edit") {
    //retreive category so that it can be displayed in the form
    $category->getCategory($_GET["id"]);
    //if a category is selected the form will be used for edit
    $submitType = "update";
}
//process update
if (isset($_POST["submit"]) && ($_POST["operation"] == "update")) {
    //check a category name was supplied
    if (!empty($_POST["categoryName"]) && !empty($_POST["categoryId"])) {
        //set the category name
        $category->setCategoryName($_POST["categoryName"]);
        //set the category description
        $category->updateCategory($_POST["categoryId"]);
        $message = "The category was updated";
        $category = new Category();
    }
}
//retrieve all categories so they can be listed
$categoryRows = $category->getCategories();
//start buffer
ob_start();
//display categories
include "templates/displayCategory.html.php";
//display form
include "templates/categoryForm.html.php";
$output = ob_get_clean();
include "templates/adminLayout.html.php";
