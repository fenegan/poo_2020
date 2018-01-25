<?php

require_once('Character.php');

class PaladinHoly extends Character
{

    public function __construct()
    {
        parent::__construct();
        $this->setIntelligence(20);
        $this->setStrength(20);
    }
    public function getDamage()
    {
        return $this->getStrength() * $this->getLevel();
    }

    public function takeDamage($damage, FighterInterface $enemy = null)
    {
        parent::takeDamage($damage, $enemy);
    }

    public function getHeal()
    {
        return $this->getIntelligence() * $this->getLevel();
    }

    public function heal(Character $focus)
    {
        if ($focus->getHp() !== 0)
        {
        $hp = $focus->getHp();
        $damage = $this->getHp();
        $damage = $damage * 0.1;
        $focus->setHp($hp);
        $this->log("sacrifices " . $damage ." hp for heal " . $focus->getName() . " of " . $hp . " hp");
        $this->takeDamage($damage);
        } else {
            $this->log($focus->getName() . " is already dead");
        }
    }
}
