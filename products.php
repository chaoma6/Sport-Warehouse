<?php
require_once "classes/DBAccess.php";

$title = "Products";

include "settings/db.php";

//start buffer
ob_start();

//create database object
$db = new DBAccess($dsn, $username, $password);

//connect to database
$pdo = $db->connect();

//set up query to execute
$sql = "select itemId, itemName, photo, price, salePrice from item";
$stmt = $pdo->prepare($sql);

//execute SQL query
$rows = $db->executeSQL($stmt);

include "templates/products.html.php";

$output = ob_get_clean();

include "templates/layout.html.php";

$pdo = null;
?>
