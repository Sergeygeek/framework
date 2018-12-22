<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
//include ROOT_DIR . "services/AutoLoader.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";

//spl_autoload_register([new \app\services\AutoLoader(), 'loadClass']);
\app\base\App::call()->run($config);
