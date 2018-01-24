<?php

require_once('Character.php');

class Rogue extends Character
{
    public function __construct()
    {
        parent::__construct();
        $this->setAgility(30);
    }
    
    public function getDamage()
    {
        return $this->getAgility() * $this->getLevel();
    }
}
