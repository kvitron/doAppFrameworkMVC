<?php

// файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

// -------------Дополнительные модули---------------

// Подключение к БД
require_once 'modules/Database.php';

// Аутентификация
require_once 'modules/Authentication.php';
\authentication\Authentication::authenticationCheck();

//--------------------------------------------------

// Подключение и запуск маршрутизатора
require_once 'core/route.php';
\routing\Route::start();
