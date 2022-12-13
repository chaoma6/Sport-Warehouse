<section id="cart" class="cart main">

	<h2 class="h2">Shopping Cart</h2>
	<p><?= $message ?></p>

	<?php if (isset($_SESSION["cart"])) :
		$cart = $_SESSION["cart"];
		$cartItems = $cart->getItems();
	?>

		<?php if ($cartItems) : ?>
			<table>
				<tr>
					<th>Photo</th>
					<th>Item</th>
					<th>Price</th>
					<th>Quantity</th>
				</tr>
				<?php foreach ($cartItems as $item) :
					$photo = "images/" . $item->getPhoto();
					$itemName = $item->getItemName();
					$price = sprintf('%01.2f', $item->getPrice());
					$qty = $item->getQuantity();
					$itemId = $item->getItemId();
				?>

					<tr>
						<td><img src="<?= $photo ?>" alt="product"></td>
						<td><?= $itemName ?></td>
						<td><?= $price ?></td>
						<td>
							<form action="shopping.php" method="post">
								<input type="number" name="qtyInCart" class="qtyInCart" id="qty<?= $itemId ?>" value="<?= $qty ?>" min="1">
								<input type="submit" name="update" value="update" class="blueButton">
								<input type="hidden" name="itemId" value="<?= $itemId ?>">
							</form>
						</td>

						<td>
							<form action="shopping.php" method="post">
								<input type="submit" name="remove" value="remove" class="blueButton">
								<input type="hidden" name="itemId" value="<?= $itemId ?>">
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</table>


			<div class="checkoutPrice">
				<p class="total-large">Total:
					<span>$<?= sprintf('%01.2f', $cart->calculateTotal()) ?></span>
				</p>
				<a class="checkout" href="checkout.php">Checkout</a>
			</div>

		<?php else : ?>
			<p class="shopping-cart-message">Your shopping cart<i class="fa-solid fa-cart-shopping"></i> is empty.<br> Please adding at least one product to your Shopping Cart<i class="fa-solid fa-cart-shopping">.</i> <br>
				<a href="products.php">
					Visit our product page by clicking
				</a>
			</p>
		<?php endif; ?>
	<?php else : ?>
		<p>Your shopping cart is empty.
		<?php endif; ?>

</section>