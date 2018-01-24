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
    
    public function takeDamage($damage, Character $enemy = null)
    {
        $dodge_points = $this->getAgility() * 5;
        $dodge_chance = $dodge_points / ($dodge_points + 300) * 100;
        
        if (rand(1, 100) <= $dodge_chance)
        {
            $this->log("Dodges and strikes back");
            if ($enemy)
            {
                $this->attack($enemy);
            }
        }
        else
            parent::takeDamage($damage);
    }
}
