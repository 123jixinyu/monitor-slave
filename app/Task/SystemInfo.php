<?php

namespace App\Task;

use App\Library\Collect\RedisStore;

class SystemInfo extends Task {

    public function handle() {

        $system = new \App\Library\Collect\SystemInfo();

        //获取系统信息
        $sysInfo                     = $system->getSystemInfo();
        $sysInfo['disk_total_space'] = round(@disk_total_space(".") / (1024 * 1024 * 1024), 3);
        $sysInfo['disk_free_space']  = round(@disk_free_space(".") / (1024 * 1024 * 1024), 3);
        $sysInfo['memTotal']         = round($sysInfo['memTotal'] / 1024, 3);
        $sysInfo['memFree']          = round($sysInfo['memFree'] / 1024, 3);
        $sysInfo['memCached']        = round($sysInfo['memCached'] / 1024, 3);
        $sysInfo['memRealUsed']      = round($sysInfo['memRealUsed'] / 1024, 3);
        $sysInfo['memRealFree']      = round($sysInfo['memRealFree'] / 1024, 3);
        $sysInfo['now']              = date('Y-m-d H:i:s', time());
        $sysInfo['net']              = $system->getNetworkFlow();
        $sysInfo['win_n']            = $sysInfo['win_n'] ? $sysInfo['win_n'] : @php_uname();

        $this->store($sysInfo);

    }

    public function store($info) {


        $store = new RedisStore();

        if ($store->length() >= env('MAX_LENGTH', 10)) {
            $store->delete();
        }
        $store->save($info);

        log_info('store success');
    }
}


