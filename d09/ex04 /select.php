<?php
$fd = fopen('list.csv', 'r');
$arr = array();

if (!$fd)
	exit();
while ($ret = fgetcsv($fd)){
	$arr[$ret[0]] = $ret[1];
}
echo json_encode($arr);
fclose($fd);