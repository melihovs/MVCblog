<?php


namespace application\core;

class View {

    public $path; // Путь к вижу
    public $route;


    public function __construct($route) {
        $this->route = $route; // Получаем маршрут переданный в клас из основного контроллера
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($layout= 'default',$title ='', $vars = []) {

        $path = 'application/views/'.$this->path.'.php';
        if (file_exists($path)) {
            extract($vars);
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'application/views/layouts/'.$layout.'.php';
        } else {
            echo 'Вид не найден: '.$this->path;
        }
    }

    public static function errorCode($code) {
        http_response_code($code);
        $path = 'application/views/errors/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }

        exit;
    }

    public function redirect($url) {
        header('location: '.$url);
        exit;
    }

    public function message($status, $message) {
        exit(json_encode(
            ['status' => $status, 'message' => $message]));
    }

    public function location($url) {
        exit(json_encode(
            ['url' => $url]));
    }

}