<?php

namespace Library\System;

class Log {

    private static $instance = null;

    private $prefix = '';

    private $file = 'monitor.log';

    private function __construct() {

    }

    public static function instance() {

        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function info($message) {
        file_put_contents($this->file, $this->prefix . date('Y-m-d H:i:s', time()) . ' : '. $message . PHP_EOL, FILE_APPEND);
    }

    public function setPrefix($prefix = '') {
        $this->prefix = $prefix;
        return $this;
    }

}