<?php
session_start();
require_once('auth.php');
if ($_POST['login'] && $_POST['passwd'])
{
	if ((auth($_POST['login'], $_POST['passwd'])) === true)
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		echo "Password or login is wrong\n";
		header( "refresh:1; url=index.html" );
		exit();
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>42Chat</title>
		<style>
			body{
				background-color: #ffffe6;
			}
			#speak{
				background-color: #ccffff;
				border: solid black 2px;
				box-shadow: 0.1vw 0.05vw 0.1vw black;
			}
			#chat{
				background-color: #e6e6e6;
				border: solid black 2px;
				box-shadow: 0.1vw 0.05vw 0.1vw black;
			}
			#logout{
				border: solid black 2px;
				width : 10%;
				height: 1vw;
				box-shadow: 0.1vw 0.05vw 0.1vw black;
			}
		</style>
	</head>
	<body>
		<iframe src="chat.php" width="100%" height="550px" name="chat" id="chat"></iframe>
		<iframe src="speak.php" width="100%" height="50px" name="speak" id="speak"></iframe>
		<form action="logout.php" method="POST">
		<input type="submit" name="logout" value="Logout" id="logout">
		</form>
	</body>
</html>