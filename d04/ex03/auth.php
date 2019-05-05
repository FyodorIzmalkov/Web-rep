<?php
function auth($login, $passwd)
{
	$folder_name = "../htdocs/private/passwd";
	$pass = hash('whirlpool', $passwd);
	$tmp = file_get_contents($folder_name);
	if ($tmp === false)
		return false;
	$file_content = unserialize($tmp);
	foreach ($file_content as $key => $data)
	{
		if ($data['login'] == $login && $data['passwd'] == $pass){
			return true;
		}
	}
	return false;
}