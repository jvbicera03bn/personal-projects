<?php
session_start();
header('location: Index.php');

if (isset($_POST['reset'])) {
    session_destroy();
    unset($_POST['reset']);
    exit();
}
if ($_SESSION['chance'] == 0) {
    $_SESSION['bet'] = 0;
    $_SESSION['no_chance'] = 0;
    exit();
} elseif (isset($_POST['bets'])) {
    $_SESSION['bet'] = $_POST['bets'];
    $_SESSION['chance'] = $_SESSION['chance'] - 1;
    $_SESSION['rng'] = rand(intval($_POST['range1']), intval($_POST['range2']));
    $_SESSION['money'] = $_SESSION['money'] + $_SESSION['rng'];
    if ($_SESSION['rng'] > 0) {
        array_push($_SESSION['history'], array('color' => 'blue', 'rng' => $_SESSION['rng'], 'money' => $_SESSION['money'], 'risk' => $_SESSION['bet'], 'chance'=> $_SESSION['chance']));
    } else {
        array_push($_SESSION['history'], array('color' => 'red', 'rng' => $_SESSION['rng'], 'money' => $_SESSION['money'], 'risk' => $_SESSION['bet'], 'chance' => $_SESSION['chance']));
    }
    exit();
}
