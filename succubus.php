<?php

require_once('Monster.php');

class Succubus extends Monster
{
    public function __construct($hp, $damage)
    {
        parent::__construct($hp, $damage);
        $this->setName('Succubus');
    }

    public function sustain(){
        $sustain = $this->getDamage();
        $this->setHp($this->getHp() + $sustain);
        $this->log('recover  '.$sustain. 'hp');
    }
    
    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive())
        {
            if ($enemy->isAlive())
            {
                $success = rand(0, 1);
                
                if ($success)
                {
                    $this->log('Attacks '.$enemy->getName()); 
                    $enemy->takeDamage($this->getDamage() * 1.2, $this);
                    $this->sustain();
                
                }
                else
                    $this->log('Misses '.$enemy->getName());
            }
            else
                $this->log("Attacks an already dead enemy (".$enemy->getName().")");
        }
        else
            $this->log('Tries to attack '.$enemy->getName() . ' but is already dead');
    }
    
    public function getXpOnDeath()
    {
        return 45;
    }
}