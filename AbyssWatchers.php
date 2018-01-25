<?php

require_once('Monster.php');

class AbyssWatchers extends Monster
{
    public function __construct($hp, $damage)
    {
        parent::__construct($hp, $damage);
        $this->setName('Abyss Watchers');
    }

    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive()) {
            if ($enemy->isAlive()) {
                $success = rand(0, 10);
                if ($success < 7) {
                    $this->log('Attacks and crits ' . $enemy->getName());
                    $enemy->takeDamage($this->getDamage() * 4, $this);
                } else if ($success < 8) {
                    $this->log('Attacks ' . $enemy->getName());
                    $enemy->takeDamage($this->getDamage() * 2, $this);
                } else if ($success < 9) {
                    $this->log('Use his fire sword and attack' . $enemy->getName());
                    $enemy->takeDamage($this->getDamage() * 6, $this);
                }
            } else
                $this->log("Attacks an already dead enemy (" . $enemy->getName() . ")");
        } else
            $this->log('Tries to attack ' . $enemy->getName() . ' but is already dead');
    }

    public function takeDamage($damage, FighterInterface $enemy = null)
    {
        $rand = rand(0, 100);
        $randrevive = rand(0, 5);
        if ($rand > 10) {
            if ($randrevive <2){
                if ($this->getHp()-$damage <= 0) {
                $this->setHp(200);
                $this ->log('Revive');
                }
            }
            parent::takeDamage($damage, $enemy);
        } else {
            $this->log("Dodges");
        }
    }

    public function getXpOnDeath()
    {
        return 500;
    }

}

