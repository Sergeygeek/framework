<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.12.2018
 * Time: 21:52
 */

namespace app\services;


class Request
{
    protected $requestStr;
    protected $controllerName;
    protected $actionName;
    protected $params;

    public function __construct()
    {
        $this->requestStr = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    private function parseRequest()
    {
        $pattern = "#(?P<controller>\w+)[/]?(?<action>\w+)?[/]?[?]?(?P<params>.*)?#ui";
        if(preg_match_all($pattern, $this->requestStr, $matches)){
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            $this->params = $_REQUEST;
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function isAjax()
    {
        if(!empty($_SERVER['HTTP_X_REQUEST_WITH']) && strtolower($_SERVER['HTTP_X_REQUEST_WITH']) == 'xmlhttprequest'){
            return true;
        }

        if($_SERVER['HTTP_ACCEPT']){
            $accept = $_SERVER['HTTP_ACCEPT'];
            $pattern = "#json#ui";
            return preg_match_all($pattern, $accept);
        }

        return false;
    }
}