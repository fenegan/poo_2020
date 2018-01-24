<?php

require_once('Character.php');

class Warrior extends Character
{
    public function __construct()
    {
        parent::__construct();
        $this->setStrength(30);
    }
    
    public function getDamage()
    {
        return $this->getStrength() * $this->getLevel();
    }
}
