<?php

namespace app\services;


class AutoLoader
{
    public function loadClass($className)
    {
        $path = str_replace('app', ROOT_DIR, $className);
        include $path . '.php';
    }
}