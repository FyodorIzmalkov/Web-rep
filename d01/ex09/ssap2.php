#!/usr/bin/php
<?PHP
if ($argc > 1)
{
    function ft_connect_argv($argv, $argc)
    {
        $i = 1;
        while ($i < $argc)
        {
            $result .= " ".$argv[$i]." ";
            $i++;
        }
        return $result;
    }

    function ft_clean_spaces($array)
    {
        $str = trim($array);
        while ((strpos($str, "  ") == true))
            $str = str_replace("  ", " ", $str);
        return $str;
    }

    function ft_symbol_check($a, $i)
    {
        if (!is_numeric($a[$i]) && ($a[$i] < chr(97) || $a[$i] > chr(122)))
            return 1;
        return 0;
    }

    function ft_strlen($str)
    {
        $i = 0;
        while ($str[$i] != ''){
            $i++;
        }
        return $i;
    }

    function ft_sort($a, $b)
    {
        $first = strtolower($a);
        $second = strtolower($b);
        $flen = ft_strlen($first);
        $slen = ft_strlen($second);
        $i = 0;
        while ($i < $flen && $i < $slen)
        {
            if ((ft_symbol_check($first, $i) == 1) && (ft_symbol_check($second, $i) == 0))
                return 1;
            if  ((ft_symbol_check($first, $i) == 0) && (ft_symbol_check($second, $i) == 1))
                return -1;
            if (is_numeric($first[$i]) && (!is_numeric($second[$i])))
                return 1;
            if ((!is_numeric($first[$i])) && is_numeric($second[$i]))
                return -1;
            if ($first[$i] < $second[$i])
                return -1;
            if ($first[$i] > $second[$i])
                return 1;
            $i++;
        }
        return (0);
    }

    $array = ft_connect_argv($argv, $argc);
    $array = ft_clean_spaces($array);
    $array = explode(" ", $array);
    usort($array, "ft_sort");
    foreach ($array as $elem)
    {
        echo "$elem\n";
    }
}