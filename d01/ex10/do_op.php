#!/usr/bin/php
<?PHP
if ($argc != 4)
    echo "Incorrect Parameters\n";
else
{
    $first = trim($argv[1]);
    $op = trim($argv[2]);
    $second = trim($argv[3]);
    if ($op == "+")
        echo $first + $second."\n";
    if ($op == "-")
        echo $first - $second."\n";
    if ($op == "*")
        echo $first * $second."\n";
    if ($op == "/")
        echo $first / $second."\n";
    if ($op == "%")
        echo $first % $second."\n";
}