<?php

namespace Library\Collect;

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
            $redis = new \Redis();

            $this->store = $redis;

            $this->connect = $redis->connect($config['host'], $config['port'], 2);

            if (!$this->connect) {
                log_error('redis connect fail!');
            }
            if (!$redis->auth($config['password'])) {
                log_error('redis auth fail!');
            }
        } catch (\Exception $exception) {
            log_error($exception->getMessage());
        }

    }
}