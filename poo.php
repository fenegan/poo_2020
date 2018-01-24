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
$c->setLevel(35);

//$a->attack($b);
//$b->attack($c);
//$c->attack($a);

while ($c->isAlive())
{
    $a->attack($c);
}

// echo '<pre>';
// var_dump($a, $b, $c);
