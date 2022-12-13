<?php
    require_once "classes/DBAccess.php";
    $title = "product search";

    require_once "settings/db.php";
    
    //start buffer
    ob_start();

    //check if the search button has been pressed
    if (isset($_GET["submitButton"]) && isset($_GET["search"]))
    {
        $search = $_GET["search"];

        //create database object
        $db = new DBAccess($dsn, $username, $password);
        
        //connect to database
        $pdo = $db->connect();
        //set up query to execute
        $sql = "select itemId, itemName, photo, price, salePrice from item where itemName like :itemName";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":itemName", "%$search%");
        //execute SQL query
        $rows = $db->executeSQL($stmt);
        //display products
        include "templates/products.html.php";
    }
$output = ob_get_clean();
include "templates/layout.html.php";
?>
