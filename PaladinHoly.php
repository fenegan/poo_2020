<?php

require_once('Character.php');

class PaladinHoly extends Warrior
{

    public function __construct()
    {
        parent::__construct();
        $this->setIntelligence(20);
        $this->setStrength(20);
    }

    public function getHeal()
    {
        return $this->getIntelligence() * $this->getLevel();
    }

    public function takeDamage($damage, FighterInterface $enemy = null, $sacrifice = false)
    {
        $armor = $this->getStrength() * 5;
        $reduction = $armor / ($armor + 300);
        if (true == $sacrifice)
        {
            $reduction = 0;
        }
        $effectiveDamage = round($damage - $damage * $reduction);
        $this->setHp($this->getHp() - $effectiveDamage);
        $this->log("Takes ".$effectiveDamage.' damage (out of '.$damage.' : '.round($reduction*100).'% blocked), '.$this->getHp().' hp left');
        if (!$this->isAlive())
            $this->log('Died');
    }

    public function heal(Character $focus)
    {
        if ($this->isAlive())
        {
            if ($focus->getHp() !== 0)
            {
            $hp = $focus->getHp();
            $damage = $this->getHp();
            $damage = $damage * 0.1;
            $focus->setHp($hp);
            $this->log("sacrifices " . $damage ." hp for heal " . $focus->getName() . " of " . $hp . " hp");
            $this->takeDamage($damage, null, true);
            } else {
                $this->log($focus->getName() . " is already dead");
            }
        }
    }
}
