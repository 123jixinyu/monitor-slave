<?php

include "library/functions.php";

include "library/autoload.php";

$task = require_once "app/config/task.php";

\Library\System\TaskManager::getInstance()->register($task)->run();