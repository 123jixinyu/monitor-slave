<?php

if (!function_exists('env')) {


    function env($key, $default = '') {
        $data = [];
        $file = fopen(BASE_PATH.DIRECTORY_SEPARATOR.".env", "r");
        $i    = 0;
        while (!feof($file)) {
            $data[$i] = fgets($file);
            $i++;
        }
        fclose($file);
        $contents = [];
        foreach ($data as $line) {
            $line      = trim($line);
            $delimiter = strpos($line, '=');
            if ($line && ($delimiter > 0 && $delimiter < strlen($line) - 1)) {
                $values               = explode('=', $line);
                $contents[$values[0]] = $values[1];
            }
        }

        return isset($contents[$key]) ? $contents[$key] : $default;
    }
}

if (!function_exists('config')) {

    function config($config_path) {
        $keys       = explode('.', $config_path);
        $configFile = array_shift($keys);
        $filePath   = BASE_PATH.DIRECTORY_SEPARATOR.'app/config/' . $configFile . '.php';
        if (!file_exists($filePath)) {
            return null;
        }
        $configs = require_once $filePath;

        foreach ($keys as $key) {
            if (!isset($configs[$key])) {
                return null;
            }
            $configs = $configs[$key];
        }
        return $configs;
    }

}

if (!function_exists('log_info')) {

    function log_info($message) {
        \Library\System\Log::instance()->info($message);
    }
}

if (!function_exists('log_error')) {

    function log_error($message) {
        \Library\System\Log::instance()->setPrefix('ERROR:')->info($message);
    }
}
