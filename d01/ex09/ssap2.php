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

function ft_symbol_check($a)
{
    if (!is_numeric($a[0]) && ($a[0] < chr(97) || $a[0] > chr(122)))
        return 1;
    return 0;
}

function ft_other_check($a, $b)
{
    if (ft_symbol_check($a) && !ft_symbol_check($b))
        return 1;
    if (!ft_symbol_check($a) && ft_symbol_check($b))
        return -1;
    return 0;
}

function ft_sort($a, $b)
{
    $first = strtolower($a);
    $second = strtolower($b);
    $flen = strlen($first);
    $slen = strlen($second);
    $i = 0;
    if ($first == $second)
        return 0;
    $check = ft_other_check($first, $second);
    if ($check != 0)
        return $check == -1 ? -1 : 1;
    if (is_numeric($first[0]) && (!is_numeric($second[0])))
        return 1;
    if ((!is_numeric($first[0])) && is_numeric($second[0]))
        return -1;
    while ($i < $flen && $i < $slen)
    {
        if ($first[$i] < $second[$i])
            return -1;
        else
            return 1;
        $i++;
    }
    return (1);
}


    usort($array, "ft_sort");
    foreach ($array as $elem)
    {
        echo "$elem\n";
    }
}