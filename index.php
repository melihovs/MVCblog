<?php

require 'application/lib/Dev.php';

use application\core\Router;
use application\lib\Db;

spl_autoload_register(function ($class) { // Функция автозагрузки класса по пути
	$path = str_replace('\\','/',$class.'.php'); // Путь до файла с классом с измененными слешеми
	//echo $path;
	if (file_exists($path)) { // проверяем существует ли файл
	    require $path; // подключаем файл класса
    }
    //echo '<p>'.$class.'</p>';
});

session_start();

$router = new Router;

$router->run();