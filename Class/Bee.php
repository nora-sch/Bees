<?php

class Bee
{
    private $hitpoints;
    private $damage;
    private $life;
    public function __construct($hitpoints, $damage)
    {
        $this->hitpoints = $hitpoints;
        $this->damage = $damage;
        $this->life  = $this->hitpoints;
    }

    public function getHitPoints()
    {
        return $this->hitpoints;
    }
    public function hit()
    {
        $this->life = $this->life - $this->damage;
    }
    public function getDamage()
    {
        return $this->damage;
    }
    public function getLife()
    {
        return $this->life;
    }
    public function setLife($points)
    {
        $this->life = $points;
    }
}
