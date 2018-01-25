<?php

require_once 'Monster.php';

class Tofu extends Monster
{
    public function __construct($hp, $damage)
    {
        parent::__construct($hp, $damage);
        $this->setName('Tofu');
        $this->setPa(6);
    }

    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive()) {
            if ($enemy->isAlive()) {
                $success = rand(0, 1);
                if ($success) {
                    if ($this->getPa() >= 3) {
                        $this->log('Attacks ' . $enemy->getName());
                        $enemy->takeDamage($this->getDamage() * 5, $this);
                        $this->setPa($this->getPa() - 3);
                        $this->log('Action Points left : ' . $this->getPa());
                    } else {
                        $this->log("Not enough Action points");
                    }
                } else {
                    if ($this->getPa() >= 2) {
                        $this->log('Attacks ' . $enemy->getName());
                        $enemy->takeDamage($this->getDamage() * 2, $this);
                        $this->setPa($this->getPa() - 2);
                        $this->log('Action Points left : ' . $this->getPa());
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
