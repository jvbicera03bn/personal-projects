<!DOCTYPE html>
<?php
$users = array(
    array('cardholder_name' => "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
    array('cardholder_name' => "John Supsupin", 'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
    array('cardholder_name' => "Michael Choi", 'cvc' => 123, 'acc_num' => '1234 5678 9876 5432'),
    array('cardholder_name' => "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
    array('cardholder_name' => "John Supsupin", 'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
    array('cardholder_name' => "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
    array('cardholder_name' => "John Supsupin", 'cvc' => 789, 'acc_num' => '0001 1200 1500 1510'),
    array('cardholder_name' => "KB Tonel", 'cvc' => 567, 'acc_num' => '4568 456 123 5214'),
    array('cardholder_name' => "Mark Guillen", 'cvc' => 345, 'acc_num' => '123 123 123 123')
);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Credit Card</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Name In Uppercase</th>
            <th>Account Number</th>
            <th>CVC NUM</th>
            <th>Full Account</th>
            <th>Length of full account</th>
            <th>Is Valid</th>
        </tr>
        <?php for ($i = 0, $j = 1; $i < count($users); $i++, $j++) { ?>
            <?php if ($j % 3 == 0) { ?>
                    tr class="gray">
                <?php } else { ?>
                    <tr>
                <?php } ?>
                <?php $ACcount = strlen($users[$i]['acc_num']); ?>
                <td> <?= $i + 1 ?> </td>
                <td> <?= $users[$i]['cardholder_name'] ?> </td>
                <td> <?= strtoupper($users[$i]['cardholder_name']) ?> </td>
                <td> <?= $users[$i]['acc_num'] ?> </td>
                <td> <?= $users[$i]['cvc'] ?> </td>
                <td> <?= $users[$i]['acc_num'], ' ', $users[$i]['cvc'] ?> </td>
                <td> <?= $ACcount ?> </td>
                <?php if ($ACcount == 19) { ?>
                    <td>Yes</td>
                <?php } else { ?>
                    <td>No</td>
                <?php } ?>
                </tr>
            <?php } ?>
    </table>
</body>
</html>