<?php

if (!function_exists('env')) {


    function env($key, $default = '') {
        $data = [];
        $file = fopen(".env", "r");
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
        $filePath   = 'app/config/' . $configFile . '.php';
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