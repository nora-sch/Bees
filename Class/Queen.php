<?php
require_once'./Class/Bee.php';
class Queen extends Bee
{

    public function __construct()
    {
        parent::__construct(100, 15);
    }
}
