<?php
session_start();
if (!$_SESSION['loggued_on_user'])
	exit("ERROR\n");
$file_path = "../htdocs/private/chat";
date_default_timezone_set("Europe/Moscow");
if ($_POST['msg'])
{
	if ((file_get_contents($file_path)) === false)
		file_put_contents($file_path, "");
	else
	{
		$data = unserialize(file_get_contents($file_path));
		$fd = fopen($file_path, "w");
		flock($fd, LOCK_EX);
	}
}

?>
<html>
<head>
	<style>
		input[type=text]{
			width: 70%;
			height: 25px;
			border: solid black 1px;
		}
		input[type=submit]{
			width: 4%;
			height: 25px;
			border: solid black 1px;
		}
	</style>
</head>
<body>
	<div class="chat">
	<form action="speak.php" method="POST">
	<input type="text" name="msg" value=""/>
	<input type="submit" name="submit" value="Send"/>
</form>
	</div>
</body>
</html>