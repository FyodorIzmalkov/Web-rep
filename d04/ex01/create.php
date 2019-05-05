<?php
$folder_name = "../htdocs/private";
$filename = "/passwd";
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === "OK")
	{
		if (file_exists($folder_name) === false)
			mkdir($folder_name, 0777, TRUE);
		if (file_exists($folder_name.$filename) === true)
		{
			$file_content = unserialize(file_get_contents($folder_name.$filename));
			$exists = false;
			foreach ($file_content as $key => $data)
			{
				if ($data['login'] === $_POST['login'])
				{
					$exists = true;
				}
			}
			if ($exists === false)
			{
				$to_add = array();
				$hashed_pass = hash('whirlpool', $_POST['passwd']);
				$to_add['login'] = $_POST['login'];
				$to_add['passwd'] = $hashed_pass;
				$file_content[] = $to_add;
				file_put_contents($folder_name.$filename, serialize($file_content));
				echo "OK\n";
			}
			else
				echo "ERROR\n";
		}
		else
		{
			$to_add = array();
			$hashed_pass = hash('whirlpool', $_POST['passwd']);
			$to_add['login'] = $_POST['login'];
			$to_add['passwd'] = $hashed_pass;
			$to_put[] = $to_add;
			file_put_contents($folder_name.$filename, serialize($to_put));
			echo "OK\n";
		}
	}
	else
		echo "ERROR\n";