<?php

require_once('Character.php');

class Rogue extends Character
{
    public function __construct()
    {
        parent::__construct();
        $this->setAgility(30);
        $this->setAp(6);
    }
    
    public function getDamage()
    {
        return $this->getAgility() * $this->getLevel();
    }
    public function trickyTrap(FighterInterface $me ,  FighterInterface $enemy){
        if ($me->getAp() >= 2) {
            $me->log('Attacks '.$enemy->getName(). ' with Tricky Trap ');
            $enemy->takeDamage($me->getDamage() * 2, $me);
            $me->setAp($me->getAp() - 2);
            $me->log('Action Points left : ' . $me->getAp());
        } 
        else {
            $me->log("Not enough Action points");
        }
        if (!$enemy->isAlive())
            $me->addXp($enemy->getXpOnDeath());
        }
    public function cutThroat(FighterInterface $me ,  FighterInterface $enemy){
        if ($me->getAp() >= 4) {
            $me->log('Attacks '.$enemy->getName(). ' with Cut Throat ');
            $enemy->takeDamage($me->getDamage(), $me);
            $me->setAp($me->getAp() - 4);
            $me->log('Action Points left : ' . $me->getAp());
        } 
        else {
            $me->log("Not enough Action points");
        }
        if (!$enemy->isAlive())
            $me->addXp($enemy->getXpOnDeath());
        }
    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive())
        {
            if ($enemy->isAlive())
            {
                if ($enemy->isAlive()) {
                    $success = rand(0, 1);
                    if ($success) {
                        $this->trickyTrap($this,$enemy);
                    } else {
                        $this->cutThroat($this,$enemy);
                    }
                }
                else
                    $this->log("Attacks an already dead enemy (".$enemy->getName().")");
            }
            else
                $this->log('Tries to attack '.$enemy->getName() . ' but is already dead');
        }
    }
    public function takeDamage($damage, FighterInterface $enemy = null)
    {
        $dodge_points = $this->getAgility() * 5;
        $dodge_chance = $dodge_points / ($dodge_points + 300) * 100;
        
        if (rand(1, 100) <= $dodge_chance)
        {
            if ($enemy && rand(1, 100) <= $dodge_chance)
            {
                $this->log("Dodges and strikes back");
                $this->attack($enemy);
            }
            else
                $this->log("Dodges");
        }
        else
            parent::takeDamage($damage, $enemy);
    }
}
