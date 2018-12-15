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
    protected $loader;
    protected $twig;


    public function __construct($loader, $twig)
    {
        $this->loader = $loader;
        $this->twig = $twig;
    }

    public function render($template, $params = [])
    {
        $template .= ".php";
        $template = $this->twig->load($template, $params = []);
        echo $template->render();
    }
}