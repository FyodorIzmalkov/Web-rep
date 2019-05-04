<?php

class Router{
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php'; // path to dir and to routes
		$this->routes = include($routesPath);
	}

	// returns request string
	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI']))
			return trim($_SERVER['REQUEST_URI'], '/');

	}
	public function run()
	{
		// получить строку запроса
		// URI это то что идет после слеша в сайте localhost/news/ 
		$uri = $this->getURI();

		// проверить наличие такого запроса в routes.php
		foreach ($this->routes as $uriPattern => $path)
		{
			// сравниваем $uriPattern и $uri
			if (preg_match("~$uriPattern~", $uri))
			{
				// получаем внутренний путь из внешнего
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				// определить какой контроллер и action обрабатывают запрос
				$segments = explode('/', $internalRoute);
				// array_shift - получает значение первого элемента в массиве и удаляет
				// его из массива
				$controllerName = array_shift($segments).'Controller';
				// ucfirst - makes a strings first character uppercase
				$controllerName = ucfirst($controllerName);
				$actionName = 'action'.ucfirst(array_shift($segments));	
				$parameters = $segments;

				// подключить файл класса контроллера
				$controllerFile = ROOT. '/controllers/' . $controllerName . '.php';

				if (file_exists($controllerFile))
				{
					include_once($controllerFile);
				}

				// создать объект, вызвать метод (action)

				$controllerObject = new $controllerName;

				// вызывает функцию которая содрежится в переменой actionName
				// у объекта controllerObject при этом передает ему массив с $parameters;
				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				if ($result != null)
					break;
			}
		}
	}

}