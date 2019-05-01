#!/usr/bin/php
<?PHP
if ($argc != 2)
{
    echo "Incorrect Parameters\n";
    exit();
}
else
{
    function ft_strlen($str)
    {
        $i = 0;
        while ($str[$i] != ''){
            $i++;
        }
        return $i;
    }

    function ft_op_check($a)
    {
        if ($a == "+" || $a == "-" || $a == "*" || $a == "/" || $a == "%")
            return true;
        return false;
    }

    function ft_exit()
    {
        echo "Syntax Error\n";
        exit();
    }

    $str = trim($argv[1]);
    while ((strpos($str, "  ") == true))
        $str = str_replace("  ", " ", $str);
    $strlen = ft_strlen($str);
    $i = 0;
    $op = 0;
    $first = 0;
    $temp = 0;
    $space = 0;
    $op_flag = 0;
    while ($i < $strlen)
    {
        if (!is_numeric($str[$i]) && !ft_op_check($str[$i]) && $str[$i] != " ")
            ft_exit();
        if (ft_op_check($str[$i]))
        {
            if ($op !== 0)
                ft_exit();
            else
                $op = $str[$i];
        }
        if (is_numeric($str[$i]))
        {
            if ($first == 0){
                $first = 1;
                $j = $i;
                $j++;
                while (!ft_op_check($str[$j]))
                {
                    if ($str[$j] == " ")
                        $space = 1;
                    if (is_numeric($str[$j]) && $space == 1)
                        ft_exit();
                    if (($j + 1) < $strlen)
                        $j++;
                    else
                        break;
                }
                $space = 0;
                while ($j < $strlen)
                {
                    if (is_numeric($str[$j]))
                        $temp = $str[$j];
                    if ($str[$j] == " " && $temp != 0)
                        $space = 1;
                    if (is_numeric($str[$j]) && $space == 1)
                        ft_exit();
                    $j++;
                }
            }
        }
        $i++;
    }
    $array = explode($op, $str);
    $count = count($array);
    if ($count > 1 && $array[0] != 0 && $array[1] != 0)
        $array = array_filter($array);
    if ($count != 2)
        ft_exit();
    if (($op == "/" || $op == "%") && $array[1] == 0)
        ft_exit();
    if ($op == "+")
        echo $array[0] + $array[1]."\n";
    if ($op == "-")
        echo $array[0] - $array[1]."\n";
    if ($op == "*")
        echo $array[0] * $array[1]."\n";
    if ($op == "/")
        echo $array[0] / $array[1]."\n";
    if ($op == "%")
        echo $array[0] % $array[1]."\n";
}