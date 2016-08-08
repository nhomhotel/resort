<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spaces extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('post_room_model');
        $this->load->model('order_room_model');
        $this->load->library('Book_library');
    }

    public function index() {
        redirect(base_url());
    }

    public function prices($id = '') {
        $this->load->library('Book_library');
        $encode = $this->config->item('encode_id');
        $decode_id = $encode->decode($id);
        $data = array();
        if ($id == '' || count($decode_id) <= 0) {
            $data['href'] = base_url();
            echo json_encode($data);
            exit;
        }
        $checkin = $this->input->post('checkin') ? $this->input->post('checkin') : '';
        $checkout = $this->input->post('checkout') ? $this->input->post('checkout') : '';
        $guests = $this->input->post('guests') ? (int) $this->input->post('guests') : '';
        if ($checkin == '' || $checkout == '' || $guests == '' || !is_int($guests)) {
            $data['href'] = base_url();
            echo json_encode($data);
            exit;
        }
        $input = array(
            'where' => array(
                'post_room_id' => $decode_id[0],
            )
        );
        $prices = $this->post_room_model->get_row($input);
        $date1 = new DateTime();
        $date2 = new DateTime();
        $dateNow = new DateTime();
        $data['checkin'] = $date1->setDate(
                date('Y', strtotime(str_replace('/', '-', $checkin))), date('m', strtotime(str_replace('/', '-', $checkin))), date('d', strtotime(str_replace('/', '-', $checkin)))
        );
        $data['checkout'] = $date2->setDate(
                date('Y', strtotime(str_replace('/', '-', $checkout))), date('m', strtotime(str_replace('/', '-', $checkout))), date('d', strtotime(str_replace('/', '-', $checkout)))
        );
        if ($data['checkin'] > $data['checkout']) {
            echo json_encode(array('error'=>'Ngày trả phòng phải lớn hơn ngày nhận phòng'));
            exit;
        }
        if ($data['checkin'] < $dateNow || $data['checkout'] < $dateNow) {
            echo json_encode(array('error'=>'Ngày nhập phải tính từ thời điểm hiện tại trở đi'));
            exit();
        }
        if($this->order_room_model->check_exists_room($decode_id[0],$data['checkin'],$data['checkout'])){
            echo json_encode(array('error'=>'Phòng đã được đặt trước.'));
            exit();
        };
        $tax = $this->config->item('tax')?array('vat'=>10):array();
        $priceCaculator = $this->book_library->getMoney(array('checkin'=>$data['checkin']->format('Y-m-d'),'checkout'=>$data['checkout']->format('Y-m-d')),$guests,$prices,-1,$tax);
        $data['prices'] = $this->load->view('site/room/caculatorPrices',array('price'=>$priceCaculator),true);
        echo json_encode($data);
        exit;
    }

}

?>