<?php
/**
 * Created by PhpStorm.
 * User: irami
 * Date: 25.02.2020
 * Time: 21:47
 */

namespace application\controllers;

use application\core\Controller;

class UserController extends Controller
{
    public function login()
    {
        if($_SESSION['user'])
        {
            header('Location: /');
        }

        $arr = [];

        if(!empty($_POST))
        {
            $arr['login'] = $_POST['login'];
            $arr['error'] = false;

            $result = $this->model->authorization($_POST);
            if($result)
            {
                $_SESSION['user'] = $result;
                header('Location: /');
            }
            else
            {
                $arr['error'] = true;
            }
        }
        $this->get_response($arr);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /login');
    }

    public function main()
    {
        $arr = [];

        if(!$_SESSION['user'])
        {
            header('Location: /login');
        }

        $arr['all_currencies'] = $this->model->all_currencies();

        if(!empty($this->params['get']))
        {
            $arr['to'] = $this->params['get']['to'];
            $arr['from'] = $this->params['get']['from'];
            $arr['valuteID'] = $this->params['get']['valuteID'];

            $arr['result'] = $this->model->get_current_by_date($this->params['get']);
        }
        $this->get_response($arr);
    }

    public function get_response($arr = [])
    {
        // TODO: Implement get_response() method.

        $this->view->render($arr);
    }
}