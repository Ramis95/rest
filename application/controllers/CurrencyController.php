<?php
/**
 * Created by PhpStorm.
 * User: irami
 * Date: 25.02.2020
 * Time: 21:47
 */

namespace application\controllers;

use application\core\Controller;

final class CurrencyController extends Controller
{
    public function get_response()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Credentials: true");
        header("Content-Type: application/json");

        $result = $this->model->get_current_by_date($this->params['get']);

        if($result)
        {
            http_response_code(200);
            echo json_encode($result);
        }
        else
        {
            http_response_code(404);
            echo json_encode(array("message" => "Error! Not found:("), JSON_UNESCAPED_UNICODE);
        }

    }

}