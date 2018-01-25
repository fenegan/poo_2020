<?php

require_once('Monster.php');

class Ghom extends Monster
{
    public function __construct($hp, $damage)
    {
        parent::__construct($hp, $damage);
        $this->setName('Ghom');
    }
    
    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive())
        {
            if ($enemy->isAlive())
            { $success = rand(0, 100);
                if ($success<25)
                {
                    $this->log("One by one");
                }
                if ($success>25)
                {
                    $this->log("Take this");
                }
                if ($success<2)
                {
                    $this->log("Say bacon one more time");
                }
                    $this->log('Attacks '.$enemy->getName());
                    
                    $enemy->takeDamage($this->getDamage(), $this);
                    $success = rand(40, 100);
                
                if ($success)
                {
                    $this->log("DoubleStrike on(".$enemy->getName().")");
                    $this->Doublestrike($enemy);
                }
                $success = rand(0, 100);
                if ($success<5)
                {
                    $this->log("Your weakness are exposed, human(".$enemy->getName().")");
                    $this->Drain($enemy);
                }
            }
            else
                $this->log("Attacks an already dead enemy (".$enemy->getName().")");
        }
        else
            $this->log('Tries to attack '.$enemy->getName() . ' but is already dead');
    }
    public function takeDamage($damage, FighterInterface $enemy = null)
    {
            parent::takeDamage($damage, $enemy);
            $success = rand(0, 100);
                
                if ($success<20)
                {
                    $this->log("Poisened a Character(".$enemy->getName().")");
                    $enemy->takeDamage(10, $this);
                }
                if($this->getHp()>1 && $this->getHp()<40)  {
                    $success = rand(0, 100);
                    if ($success>15)
                    $this->log("I need a refreshment");
                    $this->Gainhp(20);
                }             
    }
    private function Doublestrike($enemy)
    {
        $enemy->takeDamage(10, $this);
        
    }
    private function Drain($enemy)
    {
        $enemy->takeDamage(15, $this);
        $this->Gainhp(15);
        
    }
    public function getXpOnDeath()
    {
        return 300;
    }
}
