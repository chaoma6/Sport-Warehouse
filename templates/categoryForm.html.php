<div class="main">
    <h2 class="h2">Add/Edit Category</h2>
    <form action="maintainCategory.php" method="post" id="swcontact-form">
        <p>
            <label for="CategoryName">Category Name:</label>
            <input type="text" name="categoryName" id="categoryName" required value="<?=
                                                                                        $category->getCategoryName() ?>">
        </p>

        <input type="hidden" name="categoryId" value="<?= $category->getCategoryID() ?>">
        <input type="hidden" name="operation" value="<?= $submitType ?>">
        <p><input type="submit" name="submit" value="Save"></p>
        <p><?= $message ?></p>
    </form>
</div>