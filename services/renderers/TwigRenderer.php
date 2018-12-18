<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.12.2018
 * Time: 22:50
 */

namespace app\services\renderers;


class TwigRenderer implements IRenderer
{
    protected $templater;


    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(TEMPLATES_DIR . "twig");
        $this->templater = new \Twig_Environment($loader);
    }

    public function render($template, $params = [])
    {
        $template .= ".twig";
        echo $template->render($template, $params);
    }
}