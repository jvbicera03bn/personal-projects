<?php
$records = $vdata['records'];
$count = $vdata['row_count'];
?>
<h1><?=$count?> Products</h1>
<table cellspacing="0.5">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Category</th>
    </tr>
<?php for ($i = 0; $i < $count; $i++) { ?>
        <tr>
            <td><?= ucfirst($records[$i]['product_name']) ?></td>
            <td>PHP <?= ucfirst($records[$i]['product_price']) ?></td>
            <td><?= ucfirst($records[$i]['product_category']) ?></td>
        </tr>
<?php           } ?>
</table>