<?php

require_once('Monster.php');

class Lardeur extends Monster
{
    public function __construct($hp, $damage)
    {
        parent::__construct($hp, $damage);
        $this->setName('Lardeur');
    }

    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive()) {
            if ($enemy->isAlive()) {
                $success = rand(0, 100);

                if ($success < 20) {
                    $this->log('Attacks ' . $enemy->getName());
                    $enemy->takeDamage($this->getDamage() * 1.3, $this);
                } else {
                    $this->log('Attacks ' . $enemy->getName());
                    $enemy->takeDamage($this->getDamage() * 1, $this);
                }
            } else
                $this->log("Attacks an already dead enemy (" . $enemy->getName() . ")");
        } else
            $this->log('Tries to attack ' . $enemy->getName() . ' but is already dead');
    }

    public function takeDamage($damage, FighterInterface $enemy = null)
    {
        $rand = rand(0, 100);
        if ($rand > 10) {
            parent::takeDamage($damage, $enemy);
        } else {
            $this->log("Dodges");
        }
    }

    public function getXpOnDeath()
    {
        return 150;
    }
}