#!/usr/bin/php
<?PHP
if ($argc > 2){
    $i = 2;
    $array = array();
    $key = $argv[1];
    while ($i < $argc)
    {
        $temp = explode(":", $argv[$i]);
        $array = array_merge($array, $temp); 
        $i++;
    }
    $i = count($array);
    while ($i >= 0)
    {
        if ($key === $array[$i])
        {
            echo $array[$i + 1]."\n";
            exit();
        }
        $i -= 2;
    }
}