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
}
