<?php
require_once './Class/Queen.php';
require_once './Class/Worker.php';
require_once './Class/Scout.php';
require_once './functions.php';

// php -S localhost:3000

$bees = [];
$beesToDisplay = [];

$queen = new Queen();
$bees[1] = $queen;
for ($i = 0; $i < 6; $i++) {
    $worker = new Worker();
    $bees[] = $worker;
}
for ($i = 0; $i < 8; $i++) {
    $scout = new Scout();
    $bees[] = $scout;
}

foreach ($bees as $key => $bee) {
    $beesToDisplay[$key] = format($bee);
}
session_start();
$_SESSION['bees_instances'] = serialize($bees);

