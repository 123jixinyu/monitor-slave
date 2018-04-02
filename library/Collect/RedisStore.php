<?php

namespace Library\Collect;

class RedisStore extends Store {

    protected $driver = 'redis';

    public function save($info) {

        $this->store->lpush('test', $this->format($info));
    }

    public function connect($config) {

        error_reporting(1);
        $redis = new \Redis();

        $this->store = $redis;

        $this->connect = $redis->connect($config['host'], $config['port'], 2);

        if (!$this->connect) {
            log_error('redis connect fail!');
        }
        if (!$redis->auth($config['password'])) {
            log_error('redis auth fail!');
        }
    }
}