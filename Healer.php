<?php

require_once 'Character.php';

class Healer extends Mage
{
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

    public function healAlly(Character $ally)
    {
        $ally->setHp($ally->getHp() + $this->getIntelligence());
        $this->log("Heals ".$ally->getName().' for '.$this->getIntelligence() . ' health points');
        $this->log($ally->getName().' now has '.$ally->getHp() . ' health points');
    }
}
