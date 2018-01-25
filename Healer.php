<?php

require_once 'Character.php';

class Healer extends Character
{
    private $shield;

    public function __construct()
    {
        parent::__construct();
        $this->setIntelligence(30);
    }

    public function getHp()
    {
        return $this->getLevel() * 60 +500;
    }

    public function getDamage()
    {
        return $this->getIntelligence();
    }

    public function healAlly(Character $c)
    {
        $c->setHp($c->getHp() + $this->getIntelligence());
        $this->log("Heals ".$c->getName().' for '.$this->getIntelligence() . ' health points');
    }
}
