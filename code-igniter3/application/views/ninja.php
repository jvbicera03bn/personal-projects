<!DOCTYPE html>
<?php 
$ninjanum = intval($vdata['numofninja']);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World</title>
    <style>
        img {
            width: 500px;
            display: inline-block;
            padding: 10px;
            margin: 0px 40px;
        }
    </style>
</head>

<body>
    <?php if (!empty($ninjanum)) {
        for ($i = 0; $i < $ninjanum; $i++){?>
            <img src="https://www.pockettactics.com/wp-content/uploads/2021/04/league-of-legends-wild-rift-zed-2.jpg">
    <?php } } else { ?>
        <img src="https://images.contentstack.io/v3/assets/blta38dcaae86f2ef5c/blt3cce10b60a0dfc91/609dedfe87e6314bbe7aa042/Dark_Horizon_Champion_Skin_Banner.jpg">
        <img src="https://lolskinshop.com/wp-content/uploads/2015/04/splash-art-yellow-jacket-shen.jpg">
        <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/Shen_0.jpg">
        <img src="https://ddragon.leagueoflegends.com/cdn/img/champion/splash/Zed_31.jpg">
        <img src="https://lolskinshop.com/wp-content/uploads/2015/05/splash-art-royal-shaco.jpg">
    <?php } ?>

</body>

</html>