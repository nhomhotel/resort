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
            $data['error'] = 'Ngày trả phòng phải lớn hơn ngày nhận phòng';
            echo json_encode($data);
            exit;
        }
        if ($data['checkin'] < $dateNow || $data['checkout'] < $dateNow) {
            $data['error'] = 'ngày nhập phải tính từ thời điểm hiện tại trở đi';
            echo json_encode($data);
            exit();
        }
        if($this->order_room_model->check_exists_room($decode_id[0],$data['checkin'],$data['checkout'])){
            $data['error'] = 'Phòng đã được đặt trước.';
            echo json_encode($data);
            exit();
        };
        $priceCaculator = $this->book_library->getMoney(array('checkin'=>$data['checkin']->format('Y-m-d'),'checkout'=>$data['checkout']->format('Y-m-d')),$guests,$prices);
        //giá 1 đêm
//        $price_night_vn = $prices->price_night_vn;
//        $max_guest = $prices->num_guest;
//        // giá vượt quá số người
//        $price_guest_more_vn = $prices->price_guest_more_vn;
//        //phí dọn dẹp
//        $clearning_fee_vn = $prices->clearning_fee_vn;
//        $sub_day = $data['checkout']->diff($data['checkin']);
//        $distance_day = $sub_day->days + 1;
//        $price_all_night = $distance_day * $price_night_vn;
//        if ($guests <= $max_guest) {
//            $guest_change = 0;
//        } else {
//            $guest_change = $guests - $max_guest;
//        }
//        if ($guest_change <= 0) {
//            $price_all_night_add_fee = $price_all_night + $clearning_fee_vn;
//        } else {
//            $price_all_night_add_fee = $price_all_night + $clearning_fee_vn + ($guest_change) * $price_guest_more_vn;
//        }
        $data['prices'] = $this->load->view('site/room/caculatorPrices',array('price'=>$priceCaculator),true);
//        $data['prices'] = '<table class="price-details" style="width: 100%;"> '
//                . '<tbody> '
//                . '<tr> <th>VND <span class="nightly-price">' . $price_night_vn . '</span> × ' . $distance_day . ' Đêm</th> '
//                . '<td>VND <span>' . number_format($price_all_night) . '</span></td> '
//                . '</tr><tr><td><span>Số người: </span>' . $guests . '</td></tr> '
//                . '<tr><td>Số người Vượt quá giới hạn</td><td style="a">' . $guest_change . 'x' . $price_guest_more_vn . '</td></tr>'
//                . '<tr class="cleaning-fee"> '
//                . '<th>Phí dọn dẹp</th> '
//                . '<td>VND <span>' . number_format($clearning_fee_vn) . '</span></td> '
//                . '</tr> '
//                . '<tr class="total"> '
//                . '<th>Tổng (bao gồm tất cả phí)</th> <td>VND <span>' . number_format($price_all_night_add_fee) . '</span></td> </tr> '
//                . '</tbody> </table>';
        echo json_encode($data);
        exit;
    }

}

?>