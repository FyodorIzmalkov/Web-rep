<?php
class News{
	

	//returns single news item with specified id
	public static function getNewsItemById($id)
	{
		// запрос к БД
		$id = intval($id);

		if ($id)
		{
			$host = 'localhost:8100';
			$dbname = 'dbname';
			$user = 'root';
			$password = '12345';
			$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
		}
	}

	//Returns an array of news items
	public static function getNewsList()
	{
		//запрос к БД

		$host = 'localhost:8100';
		$dbname = 'dbname';
		$user = 'root';
		$password = '12345';
		$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

		$newsList = array();

		$result = $db->query('SELECT id, title, date, short_content '
				.'FROM news '
				.'ORDER BY date DESC '
				.'LIMIT 10');

		$i = 0;
		while ($row = $result->fetch())
		{
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$i++;
		}
		return $newsList;
	}
}