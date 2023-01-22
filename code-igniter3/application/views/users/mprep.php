<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>User Name: <?= $vdata['name'] ?></h1>
        <h2>User Age: <?= $vdata['age'] ?>, Location: <?= $vdata['location'] ?></h2>
        <h3>5 Hobbies</h3>
        <ul>
        <?php foreach ($vdata['hobbies'] as $hobbies) { ?>
            <li><?= $hobbies?></li>
        <?php } ?>
        </ul>
    </div>
</body>

</html>