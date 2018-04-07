<?php

namespace App\Library\Collect;

class RedisStore extends Store {

    protected $driver = 'redis';

    public function save($info) {

        $this->store->lpush($this->key, $this->format($info));
    }

    public function length() {

        return $this->store->llen($this->key);
    }

    public function delete() {
        return $this->store->rPop($this->key);
    }

    public function connect($config) {
        try {

            $redis = new \Predis\Client([
                'scheme'   => 'tcp',
                'host'     => $config['host'],
                'port'     => $config['port'],
                'database' => 0,
                'password' => $config['password']
            ]);
            $this->store = $redis;


        } catch (\Exception $exception) {
            log_error($exception->getMessage());
        }

    }
}