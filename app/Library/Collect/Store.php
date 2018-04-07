<?php

namespace App\Library\Collect;

abstract class Store {

    protected $driver = null;

    protected $connect = null;

    protected $store = null;

    protected $format = 'json';

    protected $key = null;

    public function __construct() {
        if(!$this->store){
            $this->connect($this->getDriverConfig());
        }
        $this->key = $this->getKey();
    }

    abstract function save($info);

    abstract function connect($config);

    abstract function length();

    abstract function delete();

    public function getKey() {

        return env('APP_KEY');
    }

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