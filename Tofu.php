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

    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive()) {
            if ($enemy->isAlive()) {
                $success = rand(0, 1);
                if ($success) {
                    if ($this->getAp() >= 3) {
                        $this->log('Attacks ' . $enemy->getName());
                        $enemy->takeDamage($this->getDamage() * 5, $this);
                        $this->setAp($this->getAp() - 3);
                        $this->log('Action Points left : ' . $this->getAp());
                    } else {
                        $this->log("Not enough Action points");
                    }
                } else {
                    if ($this->getAp() >= 2) {
                        $this->log('Attacks ' . $enemy->getName());
                        $enemy->takeDamage($this->getDamage() * 2, $this);
                        $this->setAp($this->getAp() - 2);
                        $this->log('Action Points left : ' . $this->getAp());
                    } else {
                        $this->log("Not enough Action points");
                    }}
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
