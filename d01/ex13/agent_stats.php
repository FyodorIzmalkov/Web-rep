#!/usr/bin/php
<?PHP
$f = fopen('php://stdin', 'r');
$array = array();
$num = 0;
$notes_sum = 0;
$average = 0;
$line = fgets($f);
while ($line = fgets($f))
{
    $temp = explode(";", $line);
    $array = array_merge($array, $temp);
    if ($temp[1] != "" && $temp[2] != "moulinette")
    {
        $notes_sum += $temp[1];
        $num++;
    }
}
$average = $notes_sum / $num;
echo $average;
fclose($f);