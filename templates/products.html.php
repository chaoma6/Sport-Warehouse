<section class="products main">
    <ul class="product-container">
        <?php foreach ($rows as $row) :
            //check if the image file exists
            if (file_exists("images/" . $row["photo"]) && strlen($row["photo"]) > 0) {
                $photo = "images/" . $row["photo"];
            }

            $itemName = $row["itemName"];
            $price = $row["price"];
            $salePrice = $row["salePrice"];
            $itemId = $row["itemId"];
        ?>
            <li>
                <a href="productDetails.php?id=<?= $itemId ?>" class="product-items">
                    <div class="product-picture">
                        <img src="<?= $photo ?>" alt="">
                    </div>
                    <?php if ($salePrice == null or $salePrice == 0) : ?>
                        <span class="product-price">$<?= $price ?></span>
                        <p><?= $itemName ?></p>
                    <?php else : ?>
                        <span class="product-price"><b class="special-price">$<?= $salePrice ?></b><b class="down-size">WAS </b><b class="line-through">$<?= $price ?></b></span>
                        <p><?= $itemName ?></p>
                    <?php endif ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>