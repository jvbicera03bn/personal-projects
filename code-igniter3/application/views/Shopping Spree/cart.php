<!DOCTYPE html>
<?php
$cart_items  = $vdata['cart_items'];
$total_price = 0;
foreach ($cart_items as $cart_item) {
    $total_price = $total_price + ($cart_item['item_price']* $cart_item['quantity']);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/shoppingspree.css">
    <title>My Cart</title>
</head>

<body>
    <header>
        <h1>My Store</h1>
        <form id="form-header" method="post" action="shop">
            <input type="submit" name="catalog" value="Catalog">
        </form>
    </header>
    <main>
        <h1>Checkout</h1>
        <h2 id="total">Total: ₱<?= $total_price ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
<?php           foreach ($cart_items as $cart_item) { ?>
                    <tr>
                        <td><?= ucfirst($cart_item['item_name']) ?></td>
                        <td><?= ucfirst($cart_item['quantity']) ?></td>
                        <td>₱<?= ucfirst($cart_item['item_price']) ?></td>
                        <td>
                            <form method="post" action="mycart/del">
                                <input type="submit" name="delete" value="Delete">
                                <input type="hidden" name="id" value="<?= $cart_item['item_id'] ?>">
                            </form>
                        </td>
                    </tr>
<?php           } ?>
            </tbody>
        </table>
    </main>
</body>

</html>