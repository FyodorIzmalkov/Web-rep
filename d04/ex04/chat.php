<?php
date_default_timezone_set("Europe/Moscow");
$file_path = "../htdocs/private/chat";
if ((file_get_contents($file_path)) === false)
	file_put_contents($file_path, "");
$data = unserialize(file_get_contents($file_path));
if ($data)
{
	$fd = fopen($file_path, 'r');
	flock($fd, LOCK_SH);
	foreach ($data as $key => $elem)
	{
		echo date("[M d  H:i]", $elem['time'])." <b>".$elem['login']."</b>".": ".$elem['msg']."<br>";
		echo "\n";
	}
	fclose($fd);
}