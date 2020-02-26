<?php
/**
 * Created by PhpStorm.
 * User: irami
 * Date: 25.02.2020
 * Time: 21:40
 */

namespace application\models;

use application\libs\Db;

class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function get_current_by_date($get)
    {
        $result = [];

        if ($get['valuteID']) {
            $valuteID = htmlspecialchars(strip_tags($valuteID = $get['valuteID']));
        } else {
            return $result;
        }

        if ($get['from']) {
            $from = htmlspecialchars(strip_tags($get['from']));
        } else {
            $from = 0;
        }

        if ($get['to']) {
            $to = htmlspecialchars(strip_tags($get['to']));
        } else {
            $to = 9999999999;
        }
        $result = $this->db->getAll("SELECT `valuteID`, `numCode`, `сharCode`, `name`, `value`, `date` FROM ?n WHERE `valuteID` = ?s AND (date >= ?s AND date <= ?s)  ", 'currency', $valuteID, $from, $to);

        return $result;
    }

    public function authorization($post)
    {
        $result = [];

        if ($post['login']) {
            $login = htmlspecialchars(strip_tags($login = $post['login']));
        } else {
            return $result;
        }

        if ($post['password']) {
            $password = htmlspecialchars(strip_tags($password = $post['password']));
            $password = md5($password.'secret');
        } else {
            return $result;
        }

        $result = $this->db->getRow("SELECT `id`, `login` FROM ?n WHERE `login` = ?s AND `password` = ?s ", 'users', $login, $password);
        return $result;
    }

    public function all_currencies()
    {
        $result = $this->db->getAll("SELECT `id`, `valuteID`, `charCode`, `name` FROM ?n", 'currencies');
        return $result;
    }

}