<?php

namespace Library\System;

class TaskManager {

    private static $_instance = null;

    private $params = [];

    private function __construct() {

    }

    private function __clone() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function register($params) {

        $this->params = $params;
        return $this;
    }

    public function run() {

        if (!$this->params || empty($this->params)) {
            exit('no task to handle!');
        }

        foreach ($this->params as $task => $param) {
            call_user_func_array([new $task, 'handle'], $param);
        }

    }

}