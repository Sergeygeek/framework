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
    protected $requestMethod;

    public function __construct()
    {
        $this->requestStr = $_SERVER['REQUEST_URI'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
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

    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    public function isGet()
    {
        return $this->requestMethod == 'GET';
    }

    public function isPost()
    {
        return $this->requestMethod == 'POST';
    }

    public function isAjax()
    {
        return strtolower($_SERVER['HTTP_X_REQUEST_WITH']) === 'xmlhttprequest';
    }
}