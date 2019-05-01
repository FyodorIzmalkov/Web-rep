#!/usr/bin/php
<?PHP
$f = fopen('php://stdin', 'r');
$array = array();
$num = 0;
$notes_sum = 0;
$average = 0;
$keys = explode(";", fgets($f));
if ($argv[1] == "average")
{
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
    echo $average."\n";
    fclose($f);
}
else if ($argv[1] == "average_user")
{
    while ($line = fgets($f))
    {
        $temp = explode(";", $line);
        if ($temp[1] == "")
            continue;
        if ($temp[2] != "moulinette" && temp[1] != "")
        {
            $array[$temp[0]][Note] += $temp[1];
            $array[$temp[0]][Num] += 1;
        }
    }
    ksort($array);
    foreach (array_keys($array) as $elem )
    {
        echo $elem.":";
        echo $array[$elem][Note] / $array[$elem][Num];
        echo "\n";
    }
}
else if ($argv[1] = "moulinette_variance")
{
    while ($line = fgets($f))
    {
        $temp = explode(";", $line);
        if ($temp[1] == "")
            continue;
        if ($temp[2] != "moulinette" && temp[1] != "")
        {
            $array[$temp[0]][Note] += $temp[1];
            $array[$temp[0]][Num] += 1;
        }
        if ($temp[2] == "moulinette")
            $array[$temp[0]][Moul] += $temp[1];
    }
    ksort($array);
    foreach (array_keys($array) as $elem )
    {
        echo $elem.":";
        echo ($array[$elem][Note] / $array[$elem][Num]) - $array[$elem][Moul];
        echo "\n";
    }
}