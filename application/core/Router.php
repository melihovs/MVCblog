<?php
// Класс Router - отвечает за маршрутизацию в фреймворке
namespace application\core;

use application\core\View;

class Router {

    protected $routes = [];
    protected $params = [];

	function __construct() {
		$arr = require 'application/config/routes.php';
		foreach ($arr as $key => $val) {
		    $this->add($key, $val);
        }
	}

    // функция добавления маршрута
	function add($route, $params) {
	    $route = '#^'.$route.'$#';
	    $this->routes[$route] = $params;


    }
    // функция проверки существования маршрута
    function match() {
	    $url = trim($_SERVER['REQUEST_URI'],'/'); // записываем в переменную адресную строку
	    foreach ($this->routes as $route => $params) {
	        if (preg_match($route, $url, $matches)) {
	            $this->params = $params;
	            return true;
            }
        }
        return false;
    }
    // функция запуска роутера
    public function run() {
	    if ($this->match()) {
	        $path = 'application\controllers\\'.ucfirst($this->params['controller'].'Controller');
	        if (class_exists($path)) {
	            $action = $this->params['action'].'Action';
	            if(method_exists($path, $action)) {
	                $controller = new $path($this->params);
                    $controller -> $action();
                } else {
	               View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        }
	    else {
            View::errorCode(404);
        }


    }
}

