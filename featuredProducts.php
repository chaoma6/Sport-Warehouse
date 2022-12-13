<?php
require_once "classes/DBAccess.php";
include "settings/db.php";

//create database object
$db = new DBAccess($dsn, $username, $password);

//connect to database
$pdo = $db->connect();

$sql = "select itemId, itemName, photo, price, salePrice from item where featured=1";

$stmt = $pdo->prepare($sql);
$rows = $db->executeSQL($stmt);
?>
<ul class="product-container">
    <?php foreach ($rows as $row) :
        //check if the image file exists
        // if (file_exists("images/" . $row["photo"]) && strlen($row["photo"]) > 0) {
        //     $photo = "images/" . $row["photo"];
        // }
        $photo = "images/" . $row["photo"];
        $itemName = $row["itemName"];
        $price = $row["price"];
        $salePrice = $row["salePrice"];
        $itemid = $row["itemId"];
    ?>
        <li><a href="productDetails.php?id=<?= $itemid ?>" class="product-items">
                <div class="product-picture"><img src="<?= $photo ?>" alt=""></div>
                <?php if ($salePrice == null or $salePrice == 0) : ?>
                    <span class="product-price">$<?= $price ?></span>
                    <p><?= $itemName ?></p>
                <?php else : ?>
                    <span class="product-price">
                        <b class="special-price">$<?= $salePrice ?></b>
                        <b class="down-size">WAS </b>
                        <b class="line-through">$<?= $price ?></b>
                    </span>
                    <p><?= $itemName ?></p>
                <?php endif ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>