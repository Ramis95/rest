<?php
/**
 * Created by PhpStorm.
 * User: irami
 * Date: 26.02.2020
 * Time: 19:51
 */

namespace application\core;

class View
{

    public $params = [];

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function render($vars = [])
    {
        extract($vars);
        $template = 'application/views/' . $this->params['action'] . '.php';

        if(file_exists($template))
        {
            ob_start();
            require $template;
            $content = ob_get_clean();
            require 'application/views/template.php';
        }
        else
        {

        }
    }
}