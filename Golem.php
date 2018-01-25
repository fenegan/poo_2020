<?php

require_once('Monster.php');

class Golem extends Monster
{
    public function __construct($hp, $damage)
    {
        parent::__construct($hp, $damage);
        $this->setName('Golem');
    }
    
    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive())
        {
            if ($enemy->isAlive())
            {
                $success = rand(0, 1);
                
                if ($success)
                {
                    $this->log('Attacks '.$enemy->getName());
                    $enemy->takeDamage($this->getDamage() * 2, $this);
                }
                else
                    $this->log('Misses '.$enemy->getName());
            }
            else
                $this->log("Attacks an already dead enemy (".$enemy->getName().")");
        }
        else
            $this->log('Tries to attack '.$enemy->getName() . ' but is already dead');
    }
    
    public function getXpOnDeath()
    {
        return 30;
    }
}
