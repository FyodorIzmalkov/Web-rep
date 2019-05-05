<?php
$folder_name = "../htdocs/private/passwd";
if ($_POST['login'] && $_POST['oldpw'] && ($_POST['submit'] === "OK") && $_POST['newpw'])
{
	$content = unserialize(file_get_contents($folder_name));
	if ($content)
	{
		$exists = 0;
		foreach ($content as $key => $data)
		{
			if ($data['login'] === $_POST['login'] && $data['passwd'] === hash('whirlpool', $_POST['oldpw']))
			{
				$exists = 1;
				$new_passw = hash('whirlpool', $_POST['newpw']);
				$content[$key]['passwd'] = $new_passw;
			}
		}
		if ($exists === 1)
		{
			$data = serialize($content);
			file_put_contents($folder_name, $data);
			header( "refresh:2; url=index.html" );
			exit("OK\n");
		}
		else
			exit("ERROR\n");
		
	}
	else
		exit("ERROR\n");
}
else
	exit("ERROR\n");