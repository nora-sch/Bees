<?php
function format($instance)
{
    return
        [
            'name' => get_class($instance),
            'points' => $instance->getHitPoints(),
            'damage' => $instance->getDamage(),
            'life' => $instance->getLife(),
        ];
}
