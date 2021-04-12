<?php

return [
    'all' => [
        // Страницы доступные для всех пользователей
        'login',
    ],
    'authorize' => [
      // Авторизированные пользователи
        'register',
    ],
    'guest' => [
        // Гости
    ],
    'admin' => [
        // Администратор
        'logout',
        'add',
        'edit',
        'delete',
    ],

];
