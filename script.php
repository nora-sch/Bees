<?php
require_once './Class/Queen.php';
require_once './Class/Worker.php';
require_once './Class/Scout.php';
require_once './functions.php';

// fetch
$data = file_get_contents("php://input");
$data_decoded = json_decode($data, true);
$bee_id = intval($data_decoded['bee_id']);

session_start();
$bees = unserialize($_SESSION['bees_instances']);

if ($bee_id > 0) {
    $beesToDisplay = [];
    $bee = $bees[$bee_id];
    if ($bee->getLife() > 0) {
        $bee->hit();
    }
    foreach ($bees as $key => $bee) {
        $beesToDisplay[$key] = format($bee);
    }
    header('Content-type: application/json');
    echo json_encode((object)$beesToDisplay);
}

$_SESSION['bees_instances'] = serialize($bees);
