<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/AutoLoader.php";

spl_autoload_register([new \app\services\AutoLoader(), 'loadClass']);

$controllerName = $_GET['c']?: DEFAULT_CONTROLLER;
$actionName = $_GET['a'];

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    /** @var \app\controllers\Controller $controller */
    $controller = new $controllerClass;
    $controller->runAction($actionName);
}
