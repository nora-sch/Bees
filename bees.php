<?php
require_once './Class/Queen.php';
require_once './Class/Worker.php';
require_once './Class/Scout.php';
require_once './functions.php';

$bees = [];
$bees_to_display = [];

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
    $bees_to_display[$key] = format($bee);
}
session_start();
$_SESSION['bees_instances'] = serialize($bees);

