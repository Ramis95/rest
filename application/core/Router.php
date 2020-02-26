<?php
/**
 * Created by PhpStorm.
 * User: irami
 * Date: 25.02.2020
 * Time: 21:39
 */

namespace application\core;

class Router
{
    protected $route = '';
    protected $get_params = [];
    protected $params = [];

    public function __construct()
    {
        $this->get_params = $_GET;
        $this->route = explode('?', $_SERVER['REQUEST_URI'])[0];
    }

    public function run()
    {
        $route_arr = explode('/', $this->route);
        if ($route_arr[1] == 'api') {
            if (!empty($this->get_params)) {
                $this->params['controller'] = 'CurrencyController';
                $this->params['action'] = 'get_response';
                $this->params['get'] = $this->get_params;
            } else {
                http_response_code(404);
                echo json_encode(array("message" => "Error! Not found:("), JSON_UNESCAPED_UNICODE);
            }
        } else {
            $routes = include 'application/libs/routes.php';
            $url_no_get = explode('?', $_SERVER['REQUEST_URI'])[0];

            foreach ($routes as $key => $route)
            {
                if ($key == $url_no_get)
                {
                    $this->params['controller'] = $route['controller'];
                    $this->params['action'] = $route['action'];
                    $this->params['get'] = $this->get_params;
                }
            }
        }

        $path = 'application\controllers\\' . $this->params['controller'];
        $action = $this->params['action'];

        if (class_exists($path))
        {
            if (method_exists($path, $action))
            {
                $controller = new $path($this->params);
                $controller->$action();
            } else {
                //Ошибка метод не найден
            }
        } else {
            //Ошибка класс не найден
        }


    }

}