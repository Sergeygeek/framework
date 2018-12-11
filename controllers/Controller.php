<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.12.2018
 * Time: 20:33
 */

namespace app\controllers;


class Controller
{
    protected $action;
    protected $defaultAction = "index";
    protected $useLayout = true;
    protected $layout = 'main';

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404";
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
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}