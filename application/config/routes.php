<?php
// маршруты
// параметр названия страницы
return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
   // 'main/form1' => [
   //     'controller' => 'main',
   //     'action' => 'form1',
   // ],
   // 'main/form2' => [
   //     'controller' => 'main',
   //     'action' => 'form2',
   // ],
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],

    'news/show' => [
        'controller' => 'news',
        'action' => 'show',
    ],

];