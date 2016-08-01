<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Hashids\Hashids;

class payments extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mail_template_model');
        $this->load->model('mail_history_model');
        $this->load->model('email_model');
        $this->load->library('email');
        $this->load->model('order_room_model');
        $this->load->model('post_room_model');
        $this->load->library('Book_library');
    }

    public function index() {
        
    }

    function book($id = '') {
        //check điều kiện
        $user_id = $this->session->userdata('user_id');
        if (!isset($user_id) || $user_id == '') {
            redirect(base_url());
        }
        if ($id == '') {
            redirect(base_url());
        }
        $id_decode = $this->config->item('encode_id')->decode($id);

        if (count($id_decode) <= 0) {
            redirect(base_url());
        } else {
            $id_encode = $id;
        }
        $checkin = $this->input->get('checkin') ? $this->input->get('checkin') : '';
        $checkout = $this->input->get('checkout') ? $this->input->get('checkout') : '';
        $guests = $this->input->get('guests') ? $this->input->get('guests') : '';
        if ($checkin == '' || $checkout == '' || $guests == '') {
            redirect(base_url() . 'room/room_detail/' . $id_encode);
        }
        // thanh toán online
        // thêm vào db
        $input = array(
            'where' => array(
                'post_room_id' => $id_decode[0],
            )
        );
        $date1 = new DateTime();
        $date2 = new DateTime();
        $dateNow = new DateTime();
        $data['checkin'] = $date1->setDate(
                date('Y', strtotime(str_replace('/', '-', $checkin))), date('m', strtotime(str_replace('/', '-', $checkin))), date('d', strtotime(str_replace('/', '-', $checkin)))
        );
        $data['guests'] = $guests;
        $data['checkout'] = $date2->setDate(
                date('Y', strtotime(str_replace('/', '-', $checkout))), date('m', strtotime(str_replace('/', '-', $checkout))), date('d', strtotime(str_replace('/', '-', $checkout)))
        );
        if ($data['checkin'] > $data['checkout']) {
            redirect(base_url() . 'room/room_detail/' . $data['id_encode']);
        }
        if ($data['checkin'] < $dateNow || $data['checkout'] < $dateNow) {
            redirect(base_url() . 'room/room_detail/' . $data['id_encode']);
        }
        //check room in database
        if ($this->order_room_model->check_exists_room($id_decode[0], $data['checkin'], $data['checkout'])) {
            echo 'Phòng này đã có người đặt trước đó.';
            return;
        }
        $prices = $this->post_room_model->get_row($input);
        $data['name_room'] = $prices->post_room_name;
        $priceCaculator = $this->book_library->getMoney(array('checkin'=>$data['checkin']->format('Y-m-d'),'checkout'=>$data['checkout']->format('Y-m-d')),$guests,$prices);
        $data['prices'] = $this->load->view('site/room/caculatorPrices',array('price'=>$priceCaculator),true);
        $data_insert = array(
            'post_room_id' => $id_decode[0],
            'user_id' => $user_id,
            'payment_type' => $priceCaculator['money'],
            'checkin' => $data['checkin']->format('Y-m-d'),
            'checkout' => $data['checkout']->format('Y-m-d'),
            'guests' => $data['guests'],
            'refer_id'=>$id_decode[0]
        );
        if($prices->parent_id!=0){
            $data_insert_parent = array(
                'post_room_id' => $id_decode[0],
                'user_id' => $user_id,
                'payment_type' => $priceCaculator['money'],
                'checkin' => $data['checkin']->format('Y-m-d'),
                'checkout' => $data['checkout']->format('Y-m-d'),
                'guests' => $data['guests'],
                'post_room_id' => $prices->parent_id
            );
        }
        $this->order_room_model->create($data_insert);
        if(isset($data_insert_parent))$this->order_room_model->create($data_insert_parent);
        //gửi email
        $input = array();
        $input = array(
            'where' => array(
                'user_id' => $user_id,
            )
        );
        $data['doitac'] = $this->User_model->get_row(array('where' => array('user_id' => $prices->user_id)));
        $data['user'] = $this->User_model->get_row($input);

        $config = get_config_email($this->config->item('address_email'), $this->config->item('pass_email'));
        echo $this->email->print_debugger();
        $email_contact = $this->email_model->getEmailBook(array('1', '2', '3'))->result();
        //replace email content
        $content_gui_dat_phong = $email_contact[2]->description;
        $content_gui_doi_tac = $email_contact[1]->description;
        $content_gui_quan_tri = $email_contact[0]->description;
        
        if($this->sendEmail($this, $data['user']->email, $email_contact[2]->email_title,                $this->replaceContenEmail($content_gui_dat_phong,$data), $config))echo 'Đã gửi mail thành công';;
        if($this->sendEmail($this, $this->config->item('address_email'), $email_contact[1]->email_title, $this->replaceContenEmail_dt($content_gui_doi_tac,$data), $config))echo 'Đã gửi mail thành công';;
        if($this->sendEmail($this, $data['doitac']->email, $email_contact[0]->email_title,              $this->replaceContenEmail($content_gui_quan_tri,$data), $config))echo 'Đã gửi mail thành công';;
        echo 'Đã gửi mail thành công';
    }

    function sendEmail(&$mail_object, $mailTo, $mailSubject, $content, $config) {
        $this->email->initialize($config);
        $this->email->from($this->config->item('address_email'), $this->config->item('name_company'));
        $mail_object->email->to($mailTo);
        $mail_object->email->set_mailtype("html");
        $mail_object->email->subject($mailSubject);
        $mail_object->email->message(nl2br($content));
        return $mail_object->email->send();
    }
    
    function replaceContenEmail($data_content, $data){
        $data_content = str_replace('__user_name__', $data['user']->first_name, $data_content);
        $data_content = str_replace('__user_name__', $data['user']->first_name, $data_content);
        $data_content = str_replace('__customer_name__', $data['user']->last_name, $data_content);
        $data_content = str_replace('__phone_number__', $data['user']->phone, $data_content);

        $data_content = str_replace('__room_name__', $data['name_room'], $data_content);
        $data_content = str_replace('__email_address__', $data['user']->email, $data_content);
        $data_content = str_replace('__check_in__', $data['checkin']->format('d-m-Y'), $data_content);
        $data_content = str_replace('__check_out__', $data['checkout']->format('d-m-Y'), $data_content);
        $data_content = str_replace('__prices__', $data['price_all_night_add_fee'], $data_content); //$data_content['guests']
        $data_content = str_replace('__guest__', $data['guests'], $data_content);
        return $data_content;
    }
    function replaceContenEmail_dt($data_content, $data){
        $data_content = str_replace('__user_name__', $data['doitac']->first_name, $data_content);
        $data_content = str_replace('__user_name__', $data['doitac']->first_name, $data_content);
        $data_content = str_replace('__customer_name__', $data['doitac']->last_name, $data_content);
        $data_content = str_replace('__phone_number__', $data['doitac']->phone, $data_content);

        $data_content = str_replace('__room_name__', $data['name_room'], $data_content);
        $data_content = str_replace('__email_address__', $data['user']->email, $data_content);
        $data_content = str_replace('__check_in__', $data['checkin']->format('d-m-Y'), $data_content);
        $data_content = str_replace('__check_out__', $data['checkout']->format('d-m-Y'), $data_content);
        $data_content = str_replace('__prices__', $data['price_all_night_add_fee'], $data_content); //$data_content['guests']
        $data_content = str_replace('__guest__', $data['guests'], $data_content);
        return $data_content;
    }

}
