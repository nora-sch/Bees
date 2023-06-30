<?php
require_once './Class/Queen.php';
require_once './Class/Worker.php';
require_once './Class/Scout.php';

// php -S localhost:3000

$bees = [];
$beesToSend = [];

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

// get hit ID
// $beeId = null;
// if(isset($_COOKIE['id'])){
//     var_dump($beeId);
// };

var_dump($_POST);
$id = $_POST['bee_id'];
if (isset($id)) {
    var_dump($id);
    echo JSON_encode("This is response from php");
}
foreach ($bees as $bee) {
    $beesToSend[] = format($bee);
}
