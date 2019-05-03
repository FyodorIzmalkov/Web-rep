#!/usr/bin/php
<?PHP
if ($argc != 3 || (file_exists($argv[1]) === false))
	exit ();
if (($file = file_get_contents($argv[1])) === false)
	exit();
ini_set('display_errors', 0);
$array = explode("\n", $file);
$array = array_filter($array);
$i = 0;
$query = $argv[2];
foreach($array as $elem)
{
	$arr = explode(";", $elem);
	if ($i === 0)
	{
		if ($query != $arr[0] && $query != $arr[1] &&
			$query != $arr[2] && $query != $arr[3] && $query != $arr[4])
				exit();
	}
	else {
		$name["$arr[4]"] = $arr[0];
		$surname["$arr[1]"] = $arr[1];
		$last_name["$arr[1]"] = $arr[0];
		$IP["$arr[1]"] = $arr[3];
		$mail["$arr[1]"] = $arr[2];
	}
	$i++;
}
$stdin = fopen ("php://stdin", "r");
while ($stdin && !feof($stdin))
{
	echo "Enter your command: ";
	$command = fgets($stdin);
	$end = feof($stdin);
	if ($end === true )
	{
		echo "^D\n";
		exit();
	}
	$result = eval($command);
 	if ($result === false) {
		 echo "PHP Parse error:  syntax error, unexpected T_STRING in [....]\n";
	}
}
fclose($stdin);
echo "\n";