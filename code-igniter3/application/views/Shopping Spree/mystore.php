<!DOCTYPE html>
<html lang="en">
<?php
$items  = $vdata['items'];
$count  = $vdata['count'];
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost:/application/assets/shoppingspree.css">
    <title>My Store</title>
</head>

<body>
    <header>
        <h1>My Store</h1>
        <form id="form-header" method="post" action="mycart">
            <input type="submit" name="cart" value="Cart(<?= $count ?>)">
        </form>
    </header>
    <main>
        <?php foreach ($items as $item) { ?>
            <div class="items">
                <form action="buy" method="post" id="item_<?= $item['item_id'] ?>">
                    <img alt="<?= $item['item_name'] ?>" src="<?= $item['picture_url'] ?>">
                    <div class="form">
                        <input type="number" name="count" id="count">
                        <p><?= $item['item_name'] ?></p>
                        <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
                        <input type="hidden" name="item_name" value="<?= $item['item_name'] ?>">
                        <input type="submit" name="item_<?= $item['item_id'] ?>" value="Buy">
                    </div>
                </form>
            </div>
        <?php } ?>
    </main>
</body>

</html>