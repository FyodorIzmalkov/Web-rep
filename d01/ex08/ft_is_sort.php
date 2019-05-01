<?PHP
function ft_is_sort($array)
{
    $i = count($array);
    if ($i == 0 || $i == 1)
        return true;
    for ($j = 1; $j < $i; $j++)
    {
        if ($array[$j - 1] > $array[$j])
            return false;
    }
    return true;
}