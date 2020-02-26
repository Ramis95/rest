<?php
/**
 * Created by PhpStorm.
 * User: irami
 * Date: 26.02.2020
 * Time: 22:13
 */

namespace application\controllers;

use application\libs\Db;

class Parser
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function parse_course()
    {
        $i = 1;
        while ($i<31)
        {
            $parse_date = str_pad($i, 2, '0', STR_PAD_LEFT) . '/01/2020';
            $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $parse_date;

            $xml = simplexml_load_file($url);
            $xml = (array)$xml;

            $valutes = $xml['Valute'];

            $day = str_pad($i, 2, '0', STR_PAD_LEFT);
            $date = strtotime('2020/01/' . $day) + 86400;

            foreach ($valutes as $valute)
            {
                $valute_arr = (array)$valute;

                $valuteID = $valute_arr['@attributes']['ID'];
                $numCode = $valute_arr['NumCode'];
                $сharCode = $valute_arr['CharCode'];
                $name = $valute_arr['Name'];
                $value = $valute_arr['Value'];

                $this->db->query("INSERT INTO ?n (`valuteID`, `numCode`, `сharCode`, `name`, `value`, `date`) VALUES (?s, ?s, ?s, ?s, ?s, ?s)", 'currency', $valuteID, $numCode, $сharCode, $name, $value, $date);
            }
            $i++;
        }
    }
}