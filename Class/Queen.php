<?php
require_once'./Class/Abeille.php';
class Queen extends Abeille
{

    public function __construct()
    {
        parent::__construct(100, 15);
    }
}
