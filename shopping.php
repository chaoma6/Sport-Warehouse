<?php
require_once "classes/Product.php";
require_once "classes/ShoppingCart.php";
session_start();

$title = "Shopping Cart";

$product = new Product();

$message = "";

if (isset($_POST["buy"])) {
	if (!empty($_POST["itemId"]) && !empty($_POST["qty"])) {
		$itemId = $_POST["itemId"];
		$qty = $_POST["qty"];
		$product->getProduct($itemId);
		if ($product->getSalePrice() != 0) {
			$realPrice = $product->getSalePrice();
		} else {
			$realPrice = $product->getPrice();
		}
		$item = new CartItem($product->getPhoto(), $product->getItemName(), $qty, $realPrice, $itemId);

		if (!isset($_SESSION["cart"])) {
			$cart = new ShoppingCart();
		} else {
			$cart = $_SESSION["cart"];
		}

		$cart->addItem($item);

		$_SESSION["cart"] = $cart;
	}
}

if (isset($_POST["remove"])) {
	if (!empty($_POST["itemId"]) && isset($_SESSION["cart"])) {
		$itemId = $_POST["itemId"];

		$item = new CartItem("", "", 0, 0, $itemId);

		$cart = $_SESSION["cart"];
		$cart->removeItem($item);
		$_SESSION["cart"] = $cart;
	}
}

if (isset($_POST["update"])) {
	if (!empty($_POST["itemId"]) && isset($_SESSION["cart"])) {
		$qty = $_POST["qtyInCart"];
		$item = new CartItem("", "", $qty, 0, $_POST["itemId"]);
		$cart = $_SESSION["cart"];
		$cart->updateItem($item);
		$_SESSION["cart"] = $cart;
	}
}

//start buffer
ob_start();

//display shopping cart
include "templates/displayShoppingCart.html.php";
$output = ob_get_clean();
include "templates/shoppingCartLayout.html.php";
