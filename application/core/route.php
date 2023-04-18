<?php
class Route {

    function start()
    {
        // контроллер и действие по умолчанию
            $controller_name = 'index';
            $model_name = 'db';
            $action_name = 'index';
            $routes = isset($_GET['url']) ? $_GET['url'] : $routes = '';
        // получаем имя контроллера, model, action
        if (!empty($routes)) {
            $routes = explode("/",$routes);
            foreach ($routes as $key => $value) {
                switch ($key) {
                    case 0:
                        $controller_name = 'controller_'.$value;
                        $model_name = 'model_'.$value;
                        break;
                    case 1:
                        $action_name = 'action_'.$value;
                        break;
                }
            }
        // подцепляем файл с классом контроллера
            $controller_file = strtolower($controller_name).'.php';
            $controller_path = "application/controllers/".$controller_file;
            if(file_exists($controller_path))
            {
                include "application/controllers/".$controller_file;
            }
        // создаем контроллер + add model
        $controller = new $controller_name;
        $action = $action_name;
        if (method_exists($controller,$action)) {
            $controller->$action($model_name,$action);
        }
        // создаем контроллер default
        } elseif(empty($routes)){
            $controller_name = 'controller_'.$controller_name ;
            $model_name = 'model_'.$model_name;
            $action_name = 'action_'.$action_name ;
            // подцепляем файл с классом контроллера
            $controller_file = strtolower($controller_name).'.php';
            $controller_path = "application/controllers/".$controller_file;
            if(file_exists($controller_path))
            {
                include "application/controllers/".$controller_file;
            }
        // создаем контроллер + add model
        $controller = new $controller_name;
        $action = $action_name;
        if (method_exists($controller,$action)) {
            $controller->$action($model_name);
        }
        }
        else
		{
		    Route::ErrorPage404();
		}
	}
	function ErrorPage404()
	{
                        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
                         header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
?>