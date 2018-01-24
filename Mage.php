<?php

require_once('Character.php');

class Mage extends Character
{
    private $shield;

    public function __construct()
    {
        parent::__construct();
        $this->setIntelligence(30);
        $this->setShield(round($this->getIntelligence() * 1.5));
    }
    
    public function getDamage()
    {
        return $this->getIntelligence() * $this->getLevel();
    }
    
    public function takeDamage($damage)
    {
        if ($this->getShield() > 0)
        {
            $this->setShield($this->getShield() - $damage);
            $this->log("Absorbs ".$damage.' damage, '.$this->getShield().' shield left');
        }
        else
        {
            parent::takeDamage($damage);
        }
    }
    
    public function setShield($shield)
    {
        $this->shield = $shield > 0 ? $shield : 0;
    }
    
    public function getShield()
    {
        return $this->shield;
    }
}
