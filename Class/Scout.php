<?php
require_once './Class/Bee.php';
class Scout extends Bee
{

    public function __construct()
    {
        parent::__construct(30, 15);
    }
}
