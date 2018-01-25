<?php

require_once('Warrior.php');
require_once('Mage.php');
require_once('Rogue.php');
require_once('Lardeur.php');
require_once('Golem.php');
require_once('Ghom.php');

$a = new Warrior();
$b = new Mage();
$c = new Rogue();
//$monster = new Lardeur(500, 30);
//$monster = new Golem(1000, 20);
$monster = new Ghom(600, 10);

$a->setName('newB');
$a->setLevel(1);

$b->setName('xXxRoXorxXx');
$b->setLevel(1);

$c->setName('Billy');
$c->setLevel(1);

$time = 300000;

while ($monster->isAlive()
       && ($a->isAlive() || $b->isAlive() || $c->isAlive()))
{
    $a->attack($monster);
    ob_flush();
    flush();
    usleep($time);
    $monster->attack($a);
    $b->attack($monster);
    ob_flush();
    flush();
    usleep($time);
    $monster->attack($b);
    ob_flush();
    flush();
    usleep($time);
    $c->attack($monster);
    ob_flush();
    flush();
    usleep($time);
    $monster->attack($c);
    ob_flush();
    flush();
    usleep($time);
}
ob_end_flush();

// echo '<pre>';
// var_dump($a, $b, $c);
