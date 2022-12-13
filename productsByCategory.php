<?php
require_once "classes/DBAccess.php";

$title = "Products by category";

include "settings/db.php";

//create database object
$db = new DBAccess($dsn, $username, $password);

//connect to database
$pdo = $db->connect();

//set up query to execute
$sql = "select categoryId, categoryName from category";
$stmt = $pdo->prepare($sql);

//execute SQL query
$rows = $db->executeSQL($stmt);

//start buffer
ob_start();

//check if there is a query string field named id
if (isset($_GET["id"])) {
    //retrieve category name
    $sql = "select categoryName from category where categoryId = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":id", $_GET["id"]);
    $categoryName = $db->executeSQLReturnOneValue($stmt);

    //retrieve items
    $sql = "select itemId, itemName, photo, price, salePrice from item where categoryId =:id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $_GET["id"]);
    $rows = $db->executeSQL($stmt);

    //display products
    include "templates/products.html.php";
}

$output = ob_get_clean();

include "templates/layout.html.php";

$pdo = null;
