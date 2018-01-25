<?php
require_once('Warrior.php');
require_once('Mage.php');
require_once('Rogue.php');
require_once('Golem.php');
//require_once('AbyssWatchers.php');
require_once('PaladinHoly.php');
require_once('Lardeur.php');

$a = new Warrior();
$b = new Mage();
$c = new Rogue();
$d = new PaladinHoly();
$monster = new Lardeur(500, 30);

$a->setName('newB');
$a->setLevel(1);
$b->setName('xXxRoXorxXx');
$b->setLevel(1);
$c->setName('Billy');
$c->setLevel(1);
$d->setName('Fastfire');
$d->setLevel(1);
while ($monster->isAlive()
    && ($a->isAlive() || $b->isAlive() || $c->isAlive()))
{
    $d->attack($monster);
    $a->attack($monster);
    $monster->attack($a);
    $b->attack($monster);
    $monster->attack($b);
    $c->attack($monster);
    $monster->attack($c);
    $d->heal($a);
}
// echo '<pre>';
// var_dump($a, $b, $c);