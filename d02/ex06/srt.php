#!/usr/bin/php
<?PHP
if ($argc != 2 || (file_exists($argv[1]) === false))
	exit();
if (($file = file_get_contents($argv[1])) === false)
	exit();
preg_match_all("/(\n*\d)\n(\d\d:\d\d:\d\d,\d\d\d --> \d\d:\d\d:\d\d,\d\d\d)\n(\w*)/", $file, $array, PREG_SET_ORDER);
function ft_compare($first, $second)
{
	if ($first[2] === $second[2])
		return 0;
	else if ($first[2] < $second[2])
		return -1;
	else
		return 1;
}

usort($array, ft_compare);
foreach($array as $row => $inner_array){
	if ($row)
		echo "\n";
	echo ($row + 1)."\n";
	echo ($inner_array[2])."\n";
	echo ($inner_array[3])."\n";
}