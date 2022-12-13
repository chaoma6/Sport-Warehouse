<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="./styles/all.min.css">
	<link rel="stylesheet" type="text/css" href="./styles/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="./styles/style.min.css">
	<link rel="shortcut icon" href="./images/favicon.ico" />
</head>

<body>
	<header class="site-header">
		<nav class="desktop-menu">
			<ul class="desktop__top-nav">
				<li>
					<a href="index.php" class="top-nav">Home</a>
				</li>
				<li>
					<a href="#" class="top-nav">About SW</a>
				</li>
				<li>
					<a href="contact.php" class="top-nav">Contact US</a>
				</li>
				<li>
					<a href="products.php" class="top-nav">View Products</a>
				</li>
			</ul>

			<ul class="desktop__right-nav">
				<li>
					<a href="login.php" class="login"><i class="fa-solid fa-lock"></i> Login</a>
				</li>
				<li>
					<a href="shopping.php" class="cart"><i class="fa-solid fa-cart-shopping"></i> View Cart</a>
				</li>
				<li>
					<?php include "countTotalItems.php" ?>
				</li>
			</ul>
		</nav>

		<nav class="mobile-menu">
			<input type="checkbox" id="menu-toggle">
			<label for="menu-toggle">
				<span aria-hidden="true"><i class="fa-solid fa-bars"></i></span>
				Menu
			</label>
			<div class="mobile-menu-cart">
				<a href="shopping.php" class="cart"><i class="fa-solid fa-cart-shopping"></i> View Cart</a>
				<a href="shopping.php" class="number-items"><?= $countTotalItems ?>
					items</a>
			</div>

			<ul class="dropdown-menu" id="menu">
				<li>
					<a href="#"><i class="fa-solid fa-lock"></i> Login</a>
				</li>
				<li>
					<a href="index.php"><i class="fa-regular fa-circle"></i> Home</a>
				</li>
				<li>
					<a href="#"><i class="fa-regular fa-circle"></i> About SW</a>
				</li>
				<li>
					<a href="contact.php"><i class="fa-regular fa-circle"></i> Contact Us</a>
				</li>
				<li>
					<a href="products.php"><i class="fa-regular fa-circle"></i> View Products</a>
				</li>
			</ul>
		</nav>

		<div class="logo-search main">
			<div class="logo">
				<a href="index.php">
					<img src="images/sports-warehouse-logo-600.png" alt="Logo of Sport Warehouse">
				</a>
			</div>

			<form action="search.php" class="search-form" method="get">
				<input type="text" class="search-box" name="search" id="search" placeholder="Search products">
				<button type="submit" name="submitButton" value="Search" class="submitButton"><i class="fa-solid fa-magnifying-glass"></i></button>
			</form>
		</div>

		<nav class="category main">
			<ul class="category-nav">
				<?php include "categories.php" ?>
			</ul>
		</nav>
	</header>
	<main>

		<?= $output ?>

	</main>
	<footer class="site-footer">
		<div class="footer-nav">
			<h3>Site navigation</h3>
			<ul>
				<li>
					<a href="index.php"><i class="fa-solid fa-square"></i>Home
					</a>
				</li>
				<li>
					<a href="#"><i class="fa-solid fa-square"></i>About SW
					</a>
				</li>
				<li>
					<a href="contact.php"><i class="fa-solid fa-square"></i>Contact Us
					</a>
				</li>
				<li>
					<a href="products.php"><i class="fa-solid fa-square"></i>View Products</a>
				</li>
				<li>
					<a href="#"><i class="fa-solid fa-square"></i>Privacy policy</a>
				</li>
			</ul>
		</div>

		<div class="footer-product-category">
			<h3>Product categories</h3>
			<ul>
				<?php include "categories.php" ?>
			</ul>
		</div>

		<div class="footer-social">
			<h3>Contact Sports Warehouse</h3>
			<ul class="social-container">
				<li>
					<a href="https://www.facebook.com" class="social-icons">
						<img src="images/facebook-icon.png" alt="The icon of facebook">
						<p>Facebook</p>
					</a>
				</li>
				<li>
					<a href="https://twitter.com/" class="social-icons">
						<img src="images/twitter-icon.png" alt="The icon of Twitter">
						<p>Twitter</p>
					</a>
				</li>
				<li>
					<a href="#" class="social-icons">
						<img src="images/other-icon.png" alt="Other icons">
						<p>Other</p>
					</a>
				</li>
			</ul>
			<ul class="footer-menus">
				<li><a href="#">Online form</a></li>
				<li><a href="#">Email</a></li>
				<li><a href="#">Phone</a></li>
				<li><a href="#">Address</a></li>
			</ul>
		</div>
	</footer>

	<div class="copyright">
		<p>&copy; Copyright 2020 Sports Warehouse.All rights reserved.Website made by Awesomesauce Design.
		</p>
	</div>
</body>

</html>