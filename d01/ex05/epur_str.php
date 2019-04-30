#!/usr/bin/php
<?PHP
if ($argc > 1)
{
    $str = trim($argv[1]);
    while ((strpos($str, "  ") == true))
        $str = str_replace("  ", " ", $str);
    echo "$str\n";
}
?>