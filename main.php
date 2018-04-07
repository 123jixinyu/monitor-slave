<?php

define('BASE_PATH', __DIR__);


include 'vendor/autoload.php';

$task = require_once "app/config/task.php";

\App\Library\System\TaskManager::getInstance()->register($task)->run();
