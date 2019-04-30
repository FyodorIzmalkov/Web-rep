#!/usr/bin/php
<?PHP
if ($argc > 1)
{
    $str = trim($argv[1]);
    while ((strpos($str, "  ") == true))
        $str = str_replace("  ", " ", $str);
    $array = explode(" ", $str);
    $num = count($array);

    $i = 1;
    while ($i < $num)
        echo $array[$i++]." ";
    echo $array[0]."\n";
}
?>