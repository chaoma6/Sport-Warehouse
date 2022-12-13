<?php
require_once "classes/DBAccess.php";
$title = "Product Details";
include "settings/db.php";

//create database object
$db = new DBAccess($dsn, $username, $password);

//connect to database
$pdo = $db->connect();

$sql = "select ItemId, ItemName from item";
$stmt = $pdo->prepare($sql);

$rows = $db->executeSQL($stmt);


ob_start();

if (isset($_GET["id"])) {
    $sql = "select itemId,itemName, photo, price, salePrice, description from item where itemId= :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $_GET["id"]);
    $rows = $db->executeSQL($stmt);
}

//display products
include "templates/productDetails.html.php";

$output = ob_get_clean();

include "templates/layout.html.php";

$pdo = null;
