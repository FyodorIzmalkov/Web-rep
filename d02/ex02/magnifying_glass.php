#!/usr/bin/php
<?PHP
if ($argc != 2 || !file_exists($argv[1]))
	exit();
$fd = fopen($argv[1], 'r');
$page = "";
while ($line = fgets($fd))
	$page .= $line;

	function ft_to_upper($matches){
		return strtoupper($matches[0]);
	}

	function ft_get2($matches)
	{
		return preg_replace_callback("/\".*?\"/s", "ft_to_upper", $matches[0]);
	}

	function ft_get($matches){
		$innate = preg_replace_callback("/>.*?</s", "ft_to_upper", $matches[0]);
		return preg_replace_callback("/<a .*?title=\".*?\"/s", "ft_get2",$innate);
	}

$result = preg_replace_callback("/(<a .*?<\/a>)/s", "ft_get", $page);
   if ($result !== "")
   	echo $result."\n";;