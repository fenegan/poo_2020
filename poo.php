<?php

require_once('Warrior.php');
require_once('Mage.php');
require_once('Rogue.php');

$a = new Warrior();
$b = new Mage();
$c = new Rogue();

$a->setName('newB');
$a->setLevel(35);

$b->setName('xXxRoXorxXx');
$b->setLevel(25);

$c->setName('Billy');

//$a->attack($b);
//$b->attack($c);
//$c->attack($a);

while ($c->isAlive())
{
    $c->attack($c);
}

// echo '<pre>';
// var_dump($a, $b, $c);
