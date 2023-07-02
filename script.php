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
    $bees_to_display = [];
    $bee = $bees[$bee_id];
    if ($bee->getLife() > 0) {
        if (get_class($bee) === 'Queen' && $bee->getLife() <= $bee->getDamage()) {
            $bee->hit();
            // remove points from all bees and restart game
            foreach ($bees as $key => $bee) {
                if (get_class($bee) !== 'Queen' && $bee->getLife()>0)
                    $bee->setLife(0);
            }
        } else {
            $bee->hit();
        }
    }
    foreach ($bees as $key => $bee) {
        $bees_to_display[$key] = format($bee);
    }
    header('Content-type: application/json');
    echo json_encode((object)$bees_to_display);
}

$_SESSION['bees_instances'] = serialize($bees);
