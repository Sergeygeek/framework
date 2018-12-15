<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
include ROOT_DIR . "services/AutoLoader.php";
include ROOT_DIR . "/vendor/autoload.php";



//spl_autoload_register([new \app\services\AutoLoader(), 'loadClass']);

$controllerName = $_GET['c']?: DEFAULT_CONTROLLER;
$actionName = $_GET['a'];

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

if(class_exists($controllerClass)){
    $twigLoader = new Twig_Loader_Filesystem(TEMPLATES_DIR);
    $twigEnvironment = new Twig_Environment($twigLoader);
    /** @var \app\controllers\Controller $controller */
    $controller = new $controllerClass(new \app\services\renderers\TwigRenderer($twigLoader, $twigEnvironment));
    $controller->runAction($actionName);
}
