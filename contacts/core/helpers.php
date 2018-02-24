<?php

function config($key, $default = null)
{
    global $config;

    return array_key_exists($key, $config) ? $config[$key] : $default;
}

function toUrl($url)
{
    return config('baseUrl') . '/' . trim($url, '/');
}