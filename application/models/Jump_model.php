<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// подключаем общую библиотеку + конфиг
require_once(APPPATH . 'jwconfig.php');

class Jump_model extends CI_Model {

    function get_free_plases($all_places, $date, $time, $type){
        if (!$type){
            $type = 'free';
        }
        foreach ($this->db->query("select count(*) as count from raspisanie where `date` = '$date' and `time` = '$time' and `type` = '$type'")->result_array() as $row){
            $free_places = $all_places - $row['count'];
        }
        return $free_places;
    }

    function get_trainer($day, $mounth, $year){
        $das = date("w", mktime(0,0,0,$mounth,$day,$year));
        $data = [1 => 'Денис Коваль', 2 => 'Олег Жаров', 3 => 'Денис коваль', 4 => 'Олег Жаров', 5 => 'Олег Жаров', 6 => 'Олег Жаров', 0 => 'Яна Меньшикова'];
        return $data[$das];
    }

    function get_day($day, $mounth, $year){
        $das = date("w", mktime(0,0,0,$mounth,$day,$year));
        $data = [1 => 'Понедельник', 2 => 'Вторник', 3 => 'Среда', 4 => 'Четверг', 5 => 'Пятница', 6 => 'Суббота', 0 => 'Воскресенье'];
        return $data[$das];
    }

    function get_raspisanie_admin(){
        return $this->db->get_where('raspisanie', ['confirm' => NULL])->result_array();
    }


}
