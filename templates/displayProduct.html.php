<div id="cart" class="main">
    <h2 class="h2"><?= $pageHeading ?></h2>
    <table>
        <tr>
            <th>Item Photo</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        require_once "classes/DBAccess.php";
        include "settings/db.php";
        $db = new DBAccess($dsn, $username, $password);
        $pdo = $db->connect();
        $sql = "select itemId, itemName, photo, categoryName from item, category where item.categoryId = category.categoryId";
        $stmt = $pdo->prepare($sql);
        $itemRows = $db->executeSQL($stmt);

        foreach ($itemRows as $row) :
            $photo = "images/" . $row["photo"];
            $itemId = $row["itemId"];
            $itemName = $row["itemName"];
            $categoryName = $row["categoryName"];
        ?>


            <tr>
                <td><img src="<?= $photo ?>" alt="photo of product"></td>
                <td><?= $itemId ?></td>
                <td><?= $itemName ?></td>
                <td><?= $categoryName ?></td>
                <td><a class="aButton" href="maintainProduct.php?action=edit&id=<?= $itemId ?>">Edit</a></td>
                <td><a class="delete aButton" href="maintainProduct.php?action=delete&id=<?= $itemId ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script type="text/javascript" src="scripts/deleteConfirm.js"></script>