<?php

abstract class Character
{
    private static $xpPerLevel = 100;

    private $hp;
    private $level;
    private $xp;
    private $name;
    
    private $strength;
    private $intelligence;
    private $agility;
    
    private $debug;
    
    public function __construct()
    {
        $this->setDebug(true);
        
        $this->setLevel(1);
        $this->setXp(0);
        $this->setHp(100);
        $this->setName('[NONAME]');
        $this->setStrength(10);
        $this->setIntelligence(10);
        $this->setAgility(10);
    }
    
    public abstract function getDamage();
    
    public function attack(Character $enemy)
    {
        if ($this->isAlive())
        {
            if ($enemy->isAlive())
            {
                $this->log('Attacks '.$enemy->getName());
                $enemy->takeDamage($this->getDamage(), $this);
                if (!$enemy->isAlive())
                    $this->addXp($enemy->getXpOnDeath());
            }
            else
                $this->log("Attacks an already dead enemy (".$enemy->getName().")");
        }
        else
            $this->log('Tries to attack '.$enemy->getName() . ' but is already dead');
    }
    
    public function takeDamage($damage, Character $enemy = null)
    {
        $this->setHp($this->getHp() - $damage);
        $this->log("Takes ".$damage.' damage, '.$this->getHp().' hp left');
        if (!$this->isAlive())
            $this->log('Died');
    }
    
    public function getFullName()
    {
        return $this->getName() . ' the ' . get_class($this);
    }
    
    public function addXp($xp)
    {
        $this->log("Gains ".$xp." XP");
        $this->setXp($this->getXp() + $xp);
        while ($this->getXp() >= self::$xpPerLevel)
        {
            $this->gainLevel();
            $this->setXp($this->getXp() - self::$xpPerLevel);
        }
    }
    
    public function gainLevel()
    {
        $this->setLevel($this->getLevel() + 1);
        $this->log('Gained a level ! Now level '.$this->getLevel());
    }
    
    public function getXpOnDeath()
    {
        return $this->getLevel() * 10;
    }
    
    public function isAlive()
    {
        return $this->getHp() > 0;
        
        // Alternative syntax :
        // if ($this->getHp() > 0)
        //     return true;
        // else
        //     return false;
    }
    
    protected function log($text)
    {
        if ($this->getDebug())
            echo $this->getFullName() . ' : ' . $text . '<br>';
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
    
    public function setXp($xp)
    {
        $this->xp = $xp > 0 ? $xp : 0;
    }
    
    public function getXp()
    {
        return $this->xp;
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
    
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }
    
    public function getDebug()
    {
        return $this->debug;
    }
}
