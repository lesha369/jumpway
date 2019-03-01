<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// подключаем общую библиотеку + конфиг
require_once(APPPATH . 'jwconfig.php');

class Main extends CI_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('main_page');
        $this->load->view('footer');
    }

    public function about()
    {
        $this->load->view('header');
        $this->load->view('about_page');
        $this->load->view('footer');
    }

    public function trainers()
    {
        $this->load->view('header');
        $this->load->view('trainers_page');
        $this->load->view('footer');
    }

    public function foto()
    {
        $this->load->view('header');
        $this->load->view('foto_page');
        $this->load->view('footer');
    }

    public function actions()
    {
        $this->load->view('header');
        $this->load->view('actions_page');
        $this->load->view('footer');
    }
    public function raspisanie()
    {


        // переопределяем вывод ошибок
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        // наборы правил для применимаемых параметров
        $this->form_validation->set_rules('type', 'Тип занятия', 'trim|htmlspecialchars');
        $this->form_validation->set_rules('fio', 'ФИО', 'trim|required|htmlspecialchars');
        $this->form_validation->set_rules('email', 'Email-адрес', 'trim|required|valid_email|htmlspecialchars');
        $this->form_validation->set_rules('phone', 'Контактный телефон', 'trim|required|min_length[10]|max_length[35]|htmlspecialchars');
        $this->form_validation->set_rules('time', 'Длительность тренировки', 'trim|required|htmlspecialchars');
        $this->form_validation->set_rules('comments', 'Комментарий', 'trim|htmlspecialchars');

        // переопределяем сообщения об ошибках
        $this->form_validation->set_message('required', 'Отсутстует обязательный параметр: %s');
        $this->form_validation->set_message('valid_email', 'Указанный %s имеет недопустимый формат');
        $this->form_validation->set_message('min_length', '%s слишком короткий');
        $this->form_validation->set_message('max_length', '%s слишком длинный');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('header');
            if ($this->uri->segment(3) == 'individ'){
                $data['active_ind'] = 'active';
                $data['active_free'] = '';
                $data['active_group'] = '';
                $data['count_free'] = COUNT_IND;

                $this->load->view('raspisanie_free_page', $data);
            }
            elseif ($this->uri->segment(3) == 'group'){
                $data['active_ind'] = '';
                $data['active_free'] = '';
                $data['active_group'] = 'active';
                $data['count_free'] = COUNT_GROUP;

                $this->load->view('raspisanie_free_page', $data);
            }
            else{
                $data['active_ind'] = '';
                $data['active_free'] = 'active';
                $data['active_group'] = '';
                $data['count_free'] = COUNT_FREE;

                $this->load->view('raspisanie_free_page', $data);
            }

            $this->load->view('footer');
        }
        else
        {
            $time = $this->input->post('time');
            $type = $this->input->post('type');
            $fio = $this->input->post('fio');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $comments = $this->input->post('comments');

            if (empty($type)){
                $type = 'free';
            }

            $message = "Пользователь $fio ($email) \n\n хочет записаться на тренировку ($type) длительностью в $time  \n\n Коментарий: $comments \n\n Телефон: $phone";
            echo $message;


            // отправляем сообщение администратору
            //mail('lesha369@mail.ru', "New monitoring - weBBez2.0", $message,
            //  ROBOT_HEADERS);

            /*$this->load->library('email');

            $this->email->from('lesha369@mail.ru', 'jumpway');
            $this->email->to('lesha369@mail.ru');

            $this->email->subject('Email Test');
            $this->email->message($message);

            $this->email->send();*/
        }


    }




}
