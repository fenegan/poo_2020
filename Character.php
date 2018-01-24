<?php

class Character
{
    private $hp;
    private $level;
    private $name;
    
    private $strength;
    private $intelligence;
    private $agility;
    
    public function __construct()
    {
        $this->setLevel(1);
        $this->setHp(10);
        $this->setName('[NONAME]');
        $this->setStrength(10);
        $this->setIntelligence(10);
        $this->setAgility(10);
    }
    
    public function attack(Character $enemy)
    {
        $enemy->takeDamage($this->getDamage());
    }
    
    public function takeDamage($damage)
    {
        $this->setHp($this->getHp() - $damage);
    }
    
    public function getDamage()
    {
        return $this->getLevel() * 2;
    }
    
    public function setHp($hp)
    {
        $this->hp = $hp > 0 ? $hp : 0;
    }
    
    public function getHp()
    {
        return $this->hp;
    }
    
    public function setLevel($level)
    {
        $this->level = $level > 1 ? $level : 1;
    }
    
    public function getLevel()
    {
        return $this->level;
    }
    
    public function setName($name)
    {
        $this->name = empty($name) ? '{NONAME}' : $name;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function setStrength($strength)
    {
        $this->strength = $strength > 0 ? $strength : 0;
    }
    
    public function getStrength()
    {
        return $this->strength;
    }
    
    public function setIntelligence($intelligence)
    {
        $this->intelligence = $intelligence > 0 ? $intelligence : 0;
    }
    
    public function getIntelligence()
    {
        return $this->intelligence;
    }
    
    public function setAgility($agility)
    {
        $this->agility = $agility > 0 ? $agility : 0;
    }
    
    public function getAgility()
    {
        return $this->agility;
    }
}
