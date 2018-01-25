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
        $this->setAp(6);
    }
    public function getDamage()
    {
        return $this->getIntelligence() * $this->getLevel();
    }
    public function impartialWord(FighterInterface $me ,  FighterInterface $enemy){
        if ($me->getAp() >= 2) {
            $me->log('Attacks '.$enemy->getName(). ' with Impartial word ');
            $enemy->takeDamage($me->getDamage(), $me);
            $me->setAp($me->getAp() - 2);
            $me->log('Action Points left : ' . $me->getAp());
        } 
        else {
            $me->log("Not enough Action points");
        }
        if (!$enemy->isAlive())
            $me->addXp($enemy->getXpOnDeath());
        }
    public function strikingWord(FighterInterface $me ,  FighterInterface $enemy){
        if ($me->getAp() >= 4) {
            $me->log('Attacks '.$enemy->getName(). ' with Striking word ');
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
                        $this->impartialWord($this,$enemy);
                    } else {
                        $this->strikingWord($this,$enemy);
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
        if ($this->getShield() > 0)
        {
            $this->setShield($this->getShield() - $damage);
            $this->log("Absorbs ".$damage.' damage, '.$this->getShield().' shield left');
        }
        else
            parent::takeDamage($damage, $enemy);
    }
    
    private function setShield($shield)
    {
        $this->shield = $shield > 0 ? $shield : 0;
    }
    
    private function getShield()
    {
        return $this->shield;
    }
}
