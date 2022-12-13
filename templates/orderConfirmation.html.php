<div class="main"> 

<h2 class="h2">Order Confirmation</h2>

<?php if ($orderId > 0) : ?>
    <p class="order-number">Thank you, your order number is <?= $orderId ?></p>
<?php else : ?>
    <p class="order-number">Something went wrong and the order was not placed</p>
<?php endif; ?>
<p class="order-number"><a href="shopping.php">Back to the start</a></p>
</div>