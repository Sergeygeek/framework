<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.12.2018
 * Time: 22:49
 */

namespace app\services\renderers;


use app\base\App;

class TemplateRenderer implements IRenderer
{
    public function render($template, $params = [])
    {
        ob_start();
        extract($params);
        $templatePath = App::call()->config['templatesDir'] . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}