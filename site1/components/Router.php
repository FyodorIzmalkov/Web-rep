<?php

class Router{
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php'; // path to dir and to routes
		$this->routes = include($routesPath);
	}

	public function run()
	{
		// получить строку запроса
		// URI это то что идет после слеша в сайте localhost/news/
		if (!empty($_SERVER['REQUEST_URI']))
		{
			$uri = trim($_SERVER['REQUEST_URI'], '/');
		}
		echo $uri;
	}

}