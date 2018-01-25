<?php

interface FighterInterface
{
    public function attack(FighterInterface $enemy);
    public function takeDamage($damage, FighterInterface $enemy = null);
    public function getName();
    public function getXpOnDeath();
    public function getHp();
    public function isAlive();
}
