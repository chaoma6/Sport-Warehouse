<?php
require_once "classes/ShoppingCart.php";
session_start();

if (!isset($_SESSION["cart"])) {
    $cart = new ShoppingCart();
} else {
    $cart = $_SESSION["cart"];
}
$countTotalItems = $cart->count(); ?>
<a href="shopping.php" class="number-items"><?= $countTotalItems ?>
    items</a>