#!/usr/bin/php
<?PHP
if ($argc != 2 || (filter_var($argv[1], FILTER_VALIDATE_URL)) === false)
	exit();
$folder_name = preg_replace("/^http:\/\//", "", $argv[1]);
$file = file_get_contents($argv[1]);
preg_match_all('/<img.*src="([^"]*)"/', $file, $matches);
$is_pic = false;
$directory_created = false;
foreach ($matches[1] as $elem)
{
	if (strpos($elem, $folder_name) === false){
		if (($pic = file_get_contents($argv[1].$elem)) === false)
			continue;
	
		else
			$is_pic = true;
	}
	else
	{
		if (($pic = file_get_contents($elem)) === false)
			continue;
		else
			$is_pic = true;
	}
	if ($is_pic && !$directory_created)
	{
		mkdir($folder_name, 0777, true);
		$directory_created = true;
	}
	if ($is_pic && $directory_created)
	{
		$file_name = strrchr($elem, "/");
		file_put_contents($folder_name."/".$file_name, $pic);
		$is_pic = false;
	}
}