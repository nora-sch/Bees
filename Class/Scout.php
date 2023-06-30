<?php
require_once './Class/Abeille.php';
class Scout extends Abeille
{

    public function __construct()
    {
        parent::__construct(30, 15);
    }
}
