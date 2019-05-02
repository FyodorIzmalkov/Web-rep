#!/usr/bin/php
<?PHP
if ($argc != 2 || (curl_init($argv[0])) == FALSE)
{
	echo "qqqq\n";
	exit();
}
$c = curl_init($argv[1]);