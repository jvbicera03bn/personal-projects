<?php 
$orders = $vdata['orders'];
for ($i = 0; $i < count($orders); $i++) { ?>
    <div class="order">
        <h3>Order #<?= $i + 1 ?></h3>
        <p><?= $orders[$i]['order_msg'] ?></p>
    </div>
<?php }
?>