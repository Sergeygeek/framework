<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.12.2018
 * Time: 20:33
 */

namespace app\controllers;

use app\services\renderers\IRenderer;


class Controller
{
    protected $action;
    protected $defaultAction = "index";
    protected $useLayout = true;
    protected $layout = 'main';

    protected $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            throw new \Exception("Страница не найдена, мы работаем над этой ошибкой");
        }
    }

    protected function render($template, $params){
        if($this->useLayout){
            return $this->renderTemplate("layouts/{$this->layout}",
                ['content' => $this->renderTemplate($template, $params)]);
        }
        return $this->renderTemplate($template, $params);
    }

    protected function renderTemplate($template, $params)
    {
        return $this->renderer->render($template, $params);
    }
}