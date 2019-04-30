#!/usr/bin/php
<?PHP
while (42)
{
    echo "Enter a number: ";
    $input = trim(fgets(STDIN));
    if (is_numeric($input))
    {
        if ($input % 2 == 0)
            echo "The number $input is even\n";
        else
            echo "The number $input is odd\n";
    }
    else if (feof(STDIN))
    {
        echo "\n";
        exit();
    }
    else
        echo "'$input' is not a number\n";
}
?>