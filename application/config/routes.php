<?php
// маршруты
// параметр названия страницы
return [
    // MainController
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'about' => [
        'controller' => 'main',
        'action' => 'about',
    ],

    'contact' => [
        'controller' => 'main',
        'action' => 'contact',
    ],

    'post/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'post',
    ],

    // AdminController
    'login' => [
        'controller' => 'admin',
        'action' => 'login',
    ],
    'logout' => [
        'controller' => 'admin',
        'action' => 'logout',
    ],
    'add' => [
        'controller' => 'admin',
        'action' => 'add',
    ],
    'edit/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'edit',
    ],
    'delete/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'delete',
    ],
    'posts' => [
        'controller' => 'admin',
        'action' => 'posts',
    ],
];