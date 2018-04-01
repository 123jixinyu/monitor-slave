<?php

namespace Library\Collect;

class RedisStore extends Store {

    protected $driver = 'redis';

    public function save($info) {

        $this->store->lpush('test', $this->format($info));
    }

    public function connect($config) {


        $redis = new \Redis();

        $this->store = $redis;

        $this->connect = $redis->connect($config['host'], $config['port'], 2);

        if (!$this->connect) {
            throw new \Exception('redis connect fail!');
        }
        if (!$redis->auth($config['password'])) {
            throw new \Exception('redis auth fail!');
        }
    }
}