<?php

namespace Library\Collect;

abstract class Store {

    protected $driver = null;

    protected $connect = null;

    protected $store = null;

    protected $format = 'json';

    public function __construct() {

        $this->connect($this->getDriverConfig());
    }

    abstract function save($info);

    abstract function connect($config);

    public function getDriverConfig() {

        return config('store.driver.' . $this->driver);
    }

    public function format($data) {
        switch ($this->format) {
            case 'json':
                return json_encode($data);

        }
    }
}