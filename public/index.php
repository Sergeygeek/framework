<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
//include ROOT_DIR . "services/AutoLoader.php";
include ROOT_DIR . "/vendor/autoload.php";

//spl_autoload_register([new \app\services\AutoLoader(), 'loadClass']);

$request = new \app\services\Request();
$controllerName = $request->getControllerName()?: DEFAULT_CONTROLLER;
$actionName = $request->getActionName();

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    /** @var \app\controllers\Controller $controller */
    $controller = new $controllerClass(new \app\services\renderers\TemplateRenderer());
    $controller->runAction($actionName);
}
