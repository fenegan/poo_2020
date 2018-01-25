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
    
    public function takeDamage($damage, FighterInterface $enemy = null)
    {
        $armor = $this->getStrength() * 5;
        $reduction = $armor / ($armor + 300);
        $effectiveDamage = round($damage - $damage * $reduction);
        
        $this->setHp($this->getHp() - $effectiveDamage);
        $this->log("Takes ".$effectiveDamage.' damage (out of '.$damage.' : '.round($reduction*100).'% blocked), '.$this->getHp().' hp left');
        if (!$this->isAlive())
            $this->log('Died');
    }
}
