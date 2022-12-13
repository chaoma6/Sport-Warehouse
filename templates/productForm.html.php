<section class="main">
    <h2 class="h2">Add/Edit Product</h2>

    <form action="maintainProduct.php" method="post" enctype="multipart/form-data" id="swcontact-form">
        <fieldset>

            <?php if (!empty($product->getPhoto())) : ?>
                <img src="<?= "images/" . $product->getPhoto() ?>" alt="Photo of Product">
            <?php endif; ?>

            <p>
                <label for="photo">Item's photo:</label>
                <input type="file" name="photo" id="photo">
                <input type="hidden" name="oldPhoto" value="<?= $product->getPhoto() ?>">
            </p>


            <p>
                <label for="itemName">Item Name:</label>
                <input type="text" name="itemName" id="itemName" value="<?= $product->getItemName() ?>">
            </p>

            <p>
                <label for="category">Category:</label>
                <select name="category" id="category">
                    <?php
                    foreach ($categoryRows as $Row) :
                        $categoryId = $Row["categoryId"];
                        $categoryName = $Row["categoryName"];

                        if ($categoryId == $product->getCategoryId()) :
                    ?>
                            <option value="<?= $categoryId ?>" selected><?= $categoryName ?></option>
                        <?php else : ?>
                            <option value="<?= $categoryId ?>"><?= $categoryName ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </p>

            <p>
                <label for="price">Price: $</label>
                <input type="number" name="price" id="price" step="any" value="<?= $product->getPrice() ?>" min="0">
            </p>

            <p>
                <label for="salePrice">Sale Price: $</label>
                <input type="number" name="salePrice" id="salePrice" value="<?= $product->getSalePrice() ?>" min="0" step="any">
            </p>

            <p>
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="6" cols="60"><?= $product->getDescription() ?></textarea>
            </p>

            <p>
                <label for="featured">Featured Product</label>
                <select name="featured" id="featured">
                    <?php if ($product->getFeatured() == 1) : ?>
                        <option value="1" selected>Yes</option>
                    <?php else : ?>
                        <option value="1">Yes</option>
                    <?php endif;
                    if ($product->getFeatured() == 0) : ?>
                        <option value="0" selected>No</option>
                    <?php else : ?>
                        <option value="0">No</option>
                    <?php endif; ?>
                </select>
            </p>



            <input type="hidden" name="itemId" value="<?= $product->getItemId() ?>">
            <input type="hidden" name="operation" value="<?= $submitType ?>">
            <p><input type="submit" value="Save" name="submit"></p>
            <p><?= $message ?></p>
            <p><?= $photoMessage ?></p>
        </fieldset>
    </form>
</section>