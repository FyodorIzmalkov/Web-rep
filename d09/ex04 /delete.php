<?php
if (!$_POST['id']){
	exit();
}
file_put_contents('list.csv', preg_replace("/" . $_POST['id'] . ".+/", '', file_get_contents('list.csv')));