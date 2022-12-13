<section class="product-detail main">
    <?php foreach ($rows as $row) :
        //check if the image file exists
        //        //check if the image file exists
        // if (file_exists("images/" . $row["photo"]) && strlen($row["photo"]) > 0) {
        //     $photo = "images/" . $row["photo"];
        // }

        $photo = "images/" . $row["photo"];
        $itemName = $row["itemName"];
        $price = $row["price"];
        $salePrice = $row["salePrice"];
        $itemId = $row["itemId"];
        $description = $row["description"]
    ?>
        <div class="product-detail-picture">
            <img src="<?= $photo ?>" alt="item's photo">
        </div>

        <form action="shopping.php" method="post" class="product-detail-description">
            <?php if ($salePrice == null or $salePrice == 0) : ?>
                <p><?= $itemName ?></p>
                <span class="product-price">$<?= $price ?></span>
                <p><?= $description ?></p>

            <?php else : ?>
                <p><?= $itemName ?></p>
                <span class="product-price">
                    <b class="special-price">$<?= $salePrice ?></b>
                    <b class="down-size">WAS </b>
                    <b class="line-through">$<?= $price ?></b>
                </span>
                <p><?= $description ?></p>
            <?php endif ?>

            <div class="buy-button">
                <label for="qty<?= $itemId ?>">Quantity:</label>
                <input class="qty" type="number" id="qty<?= $itemId ?>" name="qty" value="1" min="1">
                <input class="buy" type="submit" id="buy" name="buy" value="Add to Cart">
                <input type="hidden" value="<?= $itemId ?>" name="itemId">
            </div>
        </form>
    <?php endforeach; ?>
</section>