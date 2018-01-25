<?php

require_once('FighterInterface.php');

abstract class Monster implements FighterInterface
{
    private $hp;
    private $damage;
    private $name;
    
    private $debug;
    
    public function __construct($hp, $damage)
    {
        $this->setDebug(true);
        
        $this->setHp($hp);
        $this->setDamage($damage);
    }

    public abstract function attack(FighterInterface $enemy);
    public abstract function getXpOnDeath();
    
    protected function log($text)
    {
        if ($this->getDebug())
            echo '<b>'.$this->getName() . ' :</b> ' . $text . '<br>';
    }
    
    public function takeDamage($damage, FighterInterface $enemy = null)
    {
        $this->setHp($this->getHp() - $damage);
        $this->log("Takes ".$damage.' damage, '.$this->getHp().' hp left');
        if (!$this->isAlive())
            $this->log('Died');
    }
    protected function GainHp($damage, FighterInterface $enemy = null)
    {
        $this->setHp($this->getHp() + $damage);
        $this->log("Gain ".$damage.' health, '.$this->getHp().' hp now');
    }
    
    public function isAlive()
    {
        return $this->getHp() > 0;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getHp()
    {
        return $this->hp;
    }
    
    public function setHp($hp)
    {
        $this->hp = $hp > 0 ? $hp : 0;
    }
    
    protected function getDamage()
    {
        return $this->damage;
    }
    
    protected function setDamage($damage)
    {
        $this->damage = $damage > 1 ? $damage : 1;
    }
    
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }
    
    public function getDebug()
    {
        return $this->debug;
    }
}
