<?php

if(!function_exists('config'))
{
    function config($key, $default = null): string
    {
        $keys = explode('.', $key);
        $config = require __DIR__ . '/config/' . $keys[0] . '.php';
        return $config[$keys[1]] ?? $default;
    }
}