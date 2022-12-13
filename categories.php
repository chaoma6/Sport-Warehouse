<?php
require_once "classes/DBAccess.php";

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

foreach ($rows as $row) :
    $id = $row["categoryId"];
    $name = $row["categoryName"];
?>
    <li>
        <a href="productsByCategory.php?id=<?= $id ?>">
            <i class="fa-solid fa-square"></i>
            <?= $name ?>
            <i class="fa-solid fa-chevron-right"></i>
        </a>
    </li>
<?php endforeach; ?>