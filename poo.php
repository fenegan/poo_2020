<?php

require_once('Warrior.php');
require_once('Mage.php');
require_once('Rogue.php');

$a = new Warrior();
$b = new Mage();
$c = new Rogue();

$a->setName('newB');
$b->setName('xXxRoXorxXx');
$c->setName('Billy');

$a->attack($b);
$b->attack($c);
$c->attack($a);

// echo '<pre>';
// var_dump($a, $b, $c);
