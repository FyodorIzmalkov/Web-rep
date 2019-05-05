<?php
session_start();
if (!$_SESSION['loggued_on_user'])
	exit("ERROR\n");
$file_path = "../htdocs/private/chat";
date_default_timezone_set("Europe/Moscow");
?>
<html>
<head>
	<style>
		input[type=text]{
			width: 70%;
			height: 25px;
			border: solid black 1px;
			box-shadow: 0.1vw 0.05vw 0.1vw black;
		}
		input[type=submit]{
			width: 4%;
			height: 25px;
			border: solid black 1px;
			border-radius: 1vw;
			box-shadow: 0.1vw 0.05vw 0.1vw black;
		}
	</style>
</head>
<body>
	<div class="chat">
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	<form action="speak.php" method="POST">
	<input type="text" name="msg" value=""/>
	<input type="submit" name="submit" value="Send"/>
	</form>
	</div>
</body>
</html>
<?php
if (isset($_POST['msg']))
{
	if ((file_get_contents($file_path)) === false)
		file_put_contents($file_path, "");
	if ($_POST['msg']){
		$data = unserialize(file_get_contents($file_path));
		$fd = fopen($file_path, "w");
		flock($fd, LOCK_EX);
		$to_add['login'] = $_SESSION['loggued_on_user'];
		$to_add['time'] = time();
		$to_add['msg'] = $_POST['msg'];
		$data[] = $to_add;
		file_put_contents($file_path, serialize($data));
		fclose($fd);
	}
}