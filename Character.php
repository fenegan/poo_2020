<?php

class Character
{
    private $hp;
    private $level;
    private $name;
    
    public function __construct()
    {
        $this->setLevel(1);
        $this->setHp(10);
        $this->setName('[NONAME]');
    }
    
    public function attack(Character $enemy)
    {
        $enemy->setHp($enemy->hp - $this->level);
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
        $this->name = $name === '' ? '{NONAME}' : $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
}
