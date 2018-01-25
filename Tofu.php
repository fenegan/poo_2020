<?php

require_once 'Monster.php';

class Tofu extends Monster
{
    public function __construct($hp, $damage)
    {
        parent::__construct($hp, $damage);
        $this->setName('Tofu');
        $this->setAp(6);
    }
    public function coupDePatte(FighterInterface $me ,  FighterInterface $enemy){
        if ($me->getAp() >= 3) {
            $me->log('Attacks'. $enemy->getName().  ' with Coup de patte' );
            $enemy->takeDamage($me->getDamage() * 5, $me);
            $me->setAp($me->getAp() - 3);
            $me->log('Action Points left : ' . $me->getAp());
        } else {
            $me->log("Not enough Action points");
        }
    }
    public function coupDeTete(FighterInterface $me ,  FighterInterface $enemy){
        if ($me->getAp() >= 2) {
            $me->log('Attacks ' . $enemy->getName()) . ' with Coup de tête ';
            $enemy->takeDamage($me->getDamage() * 2, $me);
            $me->setAp($me->getAp() - 2);
            $me->log('Action Points left : ' . $me->getAp());
        } else {
            $me->log("Not enough Action points");
        }
    }
    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive()) {
            if ($enemy->isAlive()) {
                $success = rand(0, 1);
                if ($success) {
                    $this->coupDePatte($this,$enemy);
                } else {
                    $this->coupDeTete($this,$enemy);
                }
            } else {
                // $this->log("Attacks an already dead enemy (".$enemy->getName().")");
            }

        } else {
            $this->log("Dead people can't attack");
        }

    }

    public function getXpOnDeath()
    {
        return 30;
    }
}
