<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// подключаем общую библиотеку + конфиг
require_once(APPPATH . 'jwconfig.php');

class Paneladminway extends CI_Controller {

    public function zajavki()
    {
        $this->load->view('header');

        $data['data'] = $this->jump_model->get_raspisanie_admin();
        $data['name_day'] = $this->jump_model->get_day(date('d',time()), date('m',time()), date('Y',time()));
        $data['trainer'] = $this->jump_model->get_trainer(date('d',time()), date('m',time()), date('Y',time()));


        $this->load->view('paneladmin/main_page', $data);
        $this->load->view('footer');
    }
}
