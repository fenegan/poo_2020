<?php

require_once('Monster.php');

class BoumBot extends Monster
{
    public function __construct($hp, $damage)
    {
        parent::__construct($hp, $damage);
        $this->setName('Boum Bot');
    }

    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive()) {
            if ($enemy->isAlive()) {
                $rand = rand(100, 200);
                $this->log('Attacks ' . $enemy->getName() . ' and die');
                $this->log('Died');
                $enemy->takeDamage($rand, $this);
                $this->setHp(0);
            } else
                $this->log("Attacks an already dead enemy (" . $enemy->getName() . ")");
        }
    }

    public function takeDamage($damage, FighterInterface $enemy = null)
    {
        $this->attack($enemy);
    }

    public function getXpOnDeath()
    {
        return 30;
    }
}