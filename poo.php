<?php

require_once('Warrior.php');
require_once('Mage.php');
require_once('Rogue.php');

$a = new Warrior();
$b = new Mage();
$c = new Rogue();

$a->setName('newB');
$a->setLevel(1);

$b->setName('xXxRoXorxXx');
$b->setLevel(25);

$c->setName('Billy');
$c->setLevel(1);

//$a->attack($b);
//$b->attack($c);
//$c->attack($a);

while ($c->isAlive() && $a->isAlive())
{
    $a->attack($c);
    $c->attack($a);
}

// echo '<pre>';
// var_dump($a, $b, $c);
