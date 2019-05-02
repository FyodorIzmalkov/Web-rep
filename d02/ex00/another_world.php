#!/usr/bin/php
<?PHP
if ($argc > 1)
{
	$str = preg_replace("/[ \t\r]+/", " ", trim($argv[1]));
	echo $str."\n";
}