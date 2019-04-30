#!/usr/bin/php
<?PHP
if ($argc > 1)
{
    $i = 1;
    $array = array();
    while ($i < $argc)
    {
        $temp = array_filter(explode(" ", $argv[$i]));
        $array = array_merge($array, $temp);
        $i++;
    }
    sort($array);
    foreach ($array as $elem)
    {
        echo "$elem\n";
    }
}
?>