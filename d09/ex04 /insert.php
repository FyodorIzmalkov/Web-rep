<?php
if (!$_POST['name'])
	exit();
$fd = fopen('list.csv', 'a');
$flag = false;

if (!$fd)
	exit();
$_POST['id'] = uniqid();
if (!fputcsv($fd, $_POST))
	$flag = true;
fclose($fd);
if ($flag === true)
	exit();
echo $_POST['id'];