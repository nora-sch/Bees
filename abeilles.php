<?php
require_once './Class/Queen.php';
require_once './Class/Worker.php';
require_once './Class/Scout.php';

// php -S localhost:3000

$bees = [];
$beesToDisplay = [];

function format($instance)
{
    return
        [
            'name' => get_class($instance),
            'points' => $instance->getHitPoints(),
            'damage' => $instance->getDamage(),
            'life' => $instance->getLife()
        ];
}

$queen = new Queen();
$bees[] = $queen;
for ($i = 0; $i < 5; $i++) {
    $worker = new Worker();
    $bees[] = $worker;
}
for ($i = 0; $i < 8; $i++) {
    $scout = new Scout();
    $bees[] = $scout;
}
foreach ($bees as $bee) {
    $beesToDisplay[] = format($bee);
}

function hitOrReset($id, $bees)
{
    echo ($id);
    $bee = $bees[$id];

    if ($bee->getLife() > 0) {
        $bee->hit();
    }
    if (get_class($bee) === 'Queen') {
        echo ('THIS IS QUEEN');
    }
    echo ($bee->getLife());
    foreach ($bees as $bee) {
        $beesToDisplay[] = format($bee);
    }
    return $beesToDisplay;
}


// fetch
$data = file_get_contents("php://input");
$data_decoded = json_decode($data, true);
$bee_id = $data_decoded['bee_id'];
if ($bee_id === 1) {
    // $newArray = hitOrReset($bee_id, $bees);
    // hitOrReset($bee_id, $bees);
    // echo json_encode($bee_id);
    echo json_encode($beesToDisplay);
}else{
    echo json_encode('coucou');
}
