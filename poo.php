<?php

require_once('Warrior.php');
require_once('Mage.php');
require_once('Rogue.php');

$a = new Warrior();
$b = new Mage();

$a->setName('newB');

$b->setHp(1000);
$b->setLevel(50);
$b->setName('xXxRoXorxXx');

$a->attack($b);
$b->attack($a);

echo '<pre>';
var_dump($a, $b);
