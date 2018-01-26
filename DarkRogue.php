<?php
require_once('Monster.php');

class DarkRogue extends Monster
{
    private $shield;
    public function __construct($hp, $damage)
    {
        parent::__construct($hp, $damage);
        $this->setName('Dark Rogue');
        $this -> setShield(1);
    }

    public function attack(FighterInterface $enemy)
    {
        if ($this->isAlive())
        {
            if ($enemy->isAlive())
            {
                    $this->log('Attacks ' . $enemy->getName());
                    $enemy->takeDamage($this->getdamage(), $this);
            }
            else
                $this->log("Attacks an already dead enemy (".$enemy->getName().")");
        }
        else
            $this->log('Tries to attack '.$enemy->getName() . ' but is already dead');
    }

    public function takeDamage($damage, FighterInterface $enemy = null){
        $dodge = rand(1, 4);
        if ($dodge > 1){
            if ($this->getShield() > 0)
            {
                $this->setShield($this->getShield() - $damage);
                $this->log("Absorbs ".$damage.' damage, '.$this->getShield().' shield left');
            }
            else
                parent::takeDamage($damage, $enemy);
        } else {
            $this->log("Dodges");
            $this->log('Attacks hidden into shadows ' . $enemy->getName());
            $enemy->takeDamage($this -> getdamage()*5, $this);
        }
        }

        public function setShield($shield){
            $this->shield = $shield > 0 ? $shield : 0;
        }

         private function getShield()
        {
            return $this->shield;
        }

    public function getXpOnDeath()
    {
        return 100;
    }
}