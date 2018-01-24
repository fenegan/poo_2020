<?php

require_once('Character.php');

class Mage extends Character
{
    public function __construct()
    {
        parent::__construct();
        $this->setIntelligence(30);
    }
    
    public function getDamage()
    {
        return $this->getIntelligence() * $this->getLevel();
    }
}
