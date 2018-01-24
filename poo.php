<?php

require('Character.php');

$a = new Character();
$b = new Character();
$c = new Character();

$a->setName('newB');

$b->setHp(1000);
$b->setLevel(50);
$b->setName('xXxRoXorxXx');

$a->attack($b);
$b->attack($a);

echo '<pre>';
var_dump($a, $b);
