<?php

echo '<pre>';

$a = 42;
echo "Hello\nWorld $a !";
echo '<br>';
echo 'Hello\nWorld $a !';
echo '<br>';

echo 6 * 7;
echo '<br>';
$nbr = 1 + 1;
echo $nbr * $nbr;
echo '<br>';

function sum($a, $b)
{
    return $a + $b;
}
echo sum(sum(1, 1), 22);
echo '<br>';

for ($i = 0 ; $i < 10 ; $i++)
    echo $i . ' ';
echo '<br>';

$arr = [1, 2, 3, "soleil !", 'test' => 'ok'];
foreach ($arr as $key => $entry)
    echo $entry . ' is at key ' . $key . '<br>';
echo '<br>';

function print_to_zero($nbr)
{
    echo $nbr . '<br>';
    if ($nbr > 0)
        print_to_zero($nbr - 1);
    echo $nbr . '<br>';
}
print_to_zero(15);
echo '<br>';

function f1()
{
    echo 'a';
    f2();
    echo 'b';
}
function f2()
{
    echo 'c';
}
f1();
echo '<br>';
echo '<br>';

