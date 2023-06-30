<?php
require_once './Class/Abeille.php';
class Worker extends Abeille
{

    public function __construct()
    {
        parent::__construct(50, 20);
    }
}