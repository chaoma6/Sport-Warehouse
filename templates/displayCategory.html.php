<div id="cart" class="main">
<h2 class="h2"><?= $pageHeading ?></h2>
<table>
    <tr>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($categoryRows as $row) :
        $categoryName = $row["categoryName"];
        $categoryId = $row["categoryId"];
    ?>
        <tr>
            <td><?= $categoryName ?></td>
            <td><a class="aButton" href="maintainCategory.php?action=edit&id=<?= $categoryId ?>">Edit</a></td>
            <td><a class="delete aButton" href="maintainCategory.php?action=delete&id=<?= $categoryId ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<script type="text/javascript" src="scripts/deleteConfirm.js"></script>

</div>
