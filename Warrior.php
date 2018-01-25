<?php

require_once('Character.php');

class Warrior extends Character
{
    public function __construct()
    {
        parent::__construct();
        $this->setStrength(30);
        $this->setAp(6);
    }

    public function getDamage()
    {
        return $this->getStrength() * $this->getLevel();
    }
    public function swordOfJudgement(FighterInterface $me ,  FighterInterface $enemy){
        if ($me->getAp() >= 2) {
            $me->log('Attacks '.$enemy->getName(). ' with Sword Of Judgement ');
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
    public function fitOfRage(FighterInterface $me ,  FighterInterface $enemy){
        if ($me->getAp() >= 4) {
            $me->log('Attacks '.$enemy->getName(). ' with Fit Of Rage ');
            $enemy->takeDamage($me->getDamage() *4, $me);
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
                        $this->swordOfJudgement($this,$enemy);
                    } else {
                        $this->fitOfRage($this,$enemy);
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
        $armor = $this->getStrength() * 5;
        $reduction = $armor / ($armor + 300);
        $effectiveDamage = round($damage - $damage * $reduction);
        
        $this->setHp($this->getHp() - $effectiveDamage);
        $this->log("Takes ".$effectiveDamage.' damage (out of '.$damage.' : '.round($reduction*100).'% blocked), '.$this->getHp().' hp left');
        if (!$this->isAlive())
            $this->log('Died');
    }
}
