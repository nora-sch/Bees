<?php
require_once './Class/Bee.php';
class Worker extends Bee
{

    public function __construct()
    {
        parent::__construct(50, 20);
    }
}