<?php
/**
 * Created by PhpStorm.
 * User: irami
 * Date: 25.02.2020
 * Time: 21:43
 */

namespace application\core;

use application\models\Model;
use application\core\View;

abstract class Controller
{
    protected $params = [];
    public $model;
    public $view;

    public function __construct($params)
    {
        $this->model = new Model();
        $this->view = new View($params);
        $this->params = $params;
    }

    abstract protected function get_response();

}