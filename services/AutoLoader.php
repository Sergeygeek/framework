<?php

namespace app\services;


class AutoLoader
{
    private $fileExtension = '.php';

    public function loadClass($className)
    {
        $path = str_replace(['app\\', '\\'], [ROOT_DIR, '/'], $className);
        $path .= $this->fileExtension;
        if(file_exists($path)){
            include $path;
        }
    }
}