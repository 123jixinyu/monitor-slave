<?php

namespace App\Task;

class Task {

    private $params = [];

    /**
     * 加载参数
     *
     * @param $params
     */
    public function load($params) {

        $this->params = $params;
    }

    /**
     * 业务处理
     */
    public function handle() {

    }
}


