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
        $user_id = $this->session->userdata('userLoginSite');
        if(isset($user_id))$user_id = $user_id['user_id'];
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
        $data['price_all_night_add_fee'] = $priceCaculator['money'];
        $data['prices'] = $this->load->view('site/room/caculatorPrices',array('price'=>$priceCaculator),true);
        // phân biệt họ thuê nguyên cân hay thuê phòng riêng
        $data_insert = array(
            'post_room_id' => $id_decode[0],
            'user_id' => $user_id,
            'payment_type' => $priceCaculator['money'],
            'checkin' => $data['checkin']->format('Y-m-d'),
            'checkout' => $data['checkout']->format('Y-m-d'),
            'guests' => $data['guests'],
            'refer_id'=>$id_decode[0]
        );
        if($prices->parent_id==0){
            // get vê toàn bộ phòng riêng của nó về
            $childs = $this->db->from('post_room')->where('parent_id',$prices->post_room_id)->get()->result();
            $data_child = array();
            foreach ($childs as $row){
                $data_child[] = array(
                    'post_room_id' => $row->post_room_id,
                    'user_id' => $user_id,
                    'payment_type' => $priceCaculator['money'],
                    'checkin' => $data['checkin']->format('Y-m-d'),
                    'checkout' => $data['checkout']->format('Y-m-d'),
                    'guests' => $data['guests']
                ); 
            }
            $this->db->insert_batch('order', $data_child); 
        }else{
            $data_insert_parent = array(
                'post_room_id' => $id_decode[0],
                'user_id' => $user_id,
                'payment_type' => $priceCaculator['money'],
                'checkin' => $data['checkin']->format('Y-m-d'),
                'checkout' => $data['checkout']->format('Y-m-d'),
                'guests' => $data['guests'],
                'post_room_id' => $prices->parent_id
            );
            $this->order_room_model->create($data_insert_parent);
        }
        $this->order_room_model->create($data_insert);
//        gửi email
        $input = array();
        $input = array(
            'where' => array(
                'user_id' => $user_id,
            )
        );
        $data['doitac'] = $this->User_model->get_row(array('where' => array('user_id' => $prices->user_id)));
        $data['user'] = $this->User_model->get_row($input);

        $config = get_config_email($this->config->item('address_email'), $this->config->item('pass_email'));
        $email_contact = $this->email_model->getEmailBook(array('1', '2', '3'))->result();
        //replace email content
        $content_gui_dat_phong = $email_contact[2]->description;
        $content_gui_doi_tac = $email_contact[1]->description;
        $content_gui_quan_tri = $email_contact[0]->description;
        $dataSuccessMail = array('success'=>true,'message'=>'');
        if($this->sendEmail($this, $data['user']->email, $email_contact[2]->email_title,                $this->replaceContenEmail($content_gui_dat_phong,$data), $config)){
            $dataSuccessMail['message'].='Gửi thành công cho bạn.';
        
        }else{
            $this->session->set_flashdata($dataSuccessMail);
        }
        if($this->sendEmail($this, $this->config->item('address_email'), $email_contact[1]->email_title, $this->replaceContenEmail_dt($content_gui_doi_tac,$data), $config)){
            $dataSuccessMail['message'] .="<br/>Gửi thành công cho đối tác";
        }else{
            $this->session->set_flashdata($dataSuccessMail);
        }
        if($this->sendEmail($this, $data['doitac']->email, $email_contact[0]->email_title,              $this->replaceContenEmail($content_gui_quan_tri,$data), $config)){
            $dataSuccessMail['message'] .="<br/>Gửi thành công cho Người quản trị";
        }else{
            $this->session->set_flashdata($dataSuccessMail);
        }
        $this->session->set_flashdata($dataSuccessMail);
        pre($dataSuccessMail);
//        redirect('/');
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
    
    function paymentOnline(){
        $this->load->model('Bill_history_model');
        $user = $this->User_model->get_logged_in_employee_info();
        if($this->input->post('token')){
            $this->form_validation->set_rules('name_customer', 'Tên khách hàng', 'trim|required|min_length[6]|callback_checkUserName');
            $this->form_validation->set_rules('payment_type', 'Loại hình thanh toán', 'trim|required|callback_checkPaymentType');
            $this->form_validation->set_rules('ids', 'Mã đơn hàng', 'trim|required|callback_checkIds');
            $this->form_validation->set_rules('token', 'Mã xác nhận', 'trim|required|callback_checkToken');
            if(securityServer($this->input->post('payment_type')=='cash')){
                $this->form_validation->set_rules('payment_type_cash', 'Tài khoản', 'trim|required|numeric');
            }elseif(securityServer($this->input->post('payment_type')=='bank')){
                $this->form_validation->set_rules('payment_type_bank', 'Tài khoản', 'trim|required|numeric');
                $this->form_validation->set_rules('payment_type_CVV', 'CVV',  'trim|required|numeric');
            }
            if ($this->form_validation->run()) {
                if(securityServer($this->input->post('payment_type')=='cash')){
                    $moneyPay = securityServer($this->input->post('payment_type_cash'));
                    $arrIds = explode(',', securityServer($this->input->post('ids')));
                    $IdsFix = array();
                    $payment = '';
                    $total = 0;
                    if(count($arrIds)>0){
                        foreach ($arrIds as $row) {
                            $IdsFix[] = intval($row);
                        }
                    }
                    $data_room=$this->db->from('order')
                        ->join('post_room','post_room.post_room_id=order.post_room_id')->join('user','user.user_id=post_room.user_id')
                        ->where('refer_id!=',0)->where_in('order_id',$IdsFix)
                        ->get()->result();
                    foreach ($data_room as $row){
                        $payment = $row->payment_type*(1-$row->profit_rate/100);
                        $total+=$payment;
                    }
                    if($moneyPay<$total){
                        // trường hợp đang thanh toán
                        echo json_encode(array('success'=>FALSE, 'messages'=>'Bạn đang thanh toán ít hơn số tiền phải trả cho các đơn hàng '.$total));
                        exit;
                        
                    }else if($moneyPay==$total){
                        $created = date('Y-m-d H:i:s');
                        $data['bill_history'] = array(
                            'order_room_id'=>  implode(',', $IdsFix),
                            'admin_id'=> ($user->user_id),
                            'user_id'=>($data_room[0]->user_id),
                            'money_payment'=> $moneyPay,
                            'payment_reason'=>  securityServer($this->input->post('paymentReason')),
                            'create'=>$created
                        );
                        $data['payment'] = array(
                            'payment_status'=>1
                        );
                        $id = $this->Bill_history_model->create($data['bill_history']);
                        if($id)$data['payment']['bill_history_ids'] = $id;
                        if($this->db->where_in('order_id',$IdsFix)->update('order',$data['payment'])){
                            echo json_encode(array('success'=>true, 'messages'=>'Đã thanh toán thành công đơn hàng '.$moneyPay));
                            $this->session->set_flashdata(array('message'=>'Đã thanh toán thành công đơn hàng '.$moneyPay,'success'=>true));
                        }
                        else {
                            $this->session->set_flashdata(array('message'=>'Đã thanh toán không thành công đơn hàng '.$moneyPay,'success'=>FALSE));
                            echo json_encode(array('success'=>FALSE, 'messages'=>'Đã thanh toán không thành công đơn hàng '.$moneyPay));
                        }
                        exit;
                    }else{
                        $created = date('Y-m-d H:i:s');
                        $data['bill_history'] = array(
                            'order_room_id'=>  implode(',', $IdsFix),
                            'admin_id'=> ($user->user_id),
                            'user_id'=>($data_room[0]->user_id),
                            'money_payment'=> $moneyPay,
                            'payment_reason'=>  securityServer($this->input->post('paymentReason')),
                            'create'=>$created
                        );
                        $data['payment'] = array(
                            'payment_status'=>1
                        );
                        $id = $this->Bill_history_model->create($data['bill_history']);
                        if($id)$data['payment']['bill_history_ids'] = $id;
                        if($this->db->where_in('order_id',$IdsFix)->update('order',$data['payment'])){
                            echo json_encode(array('success'=>true, 'messages'=>'Đã thanh toán thành công đơn hàng '.$moneyPay));
                            $this->session->set_flashdata(array('message'=>'Đã thanh toán thành công đơn hàng '.$moneyPay,'success'=>true));
                        }
                        else{
                            $this->session->set_flashdata(array('message'=>'Đã thanh toán không thành công đơn hàng '.$moneyPay,'success'=>FALSE));
                            echo json_encode(array('success'=>FALSE, 'messages'=>'Đã thanh toán không thành công đơn hàng '.$moneyPay));
                        }
                        exit;
                    }
                }
                echo json_encode(array('success'=>true, 'messages'=>'Đã thanh toán thành công đơn hàng'));
                exit;
            }else{
                echo json_encode(array('success'=>false, 'messages'=>validation_errors()));
                exit;
            }
        }
        
    }
    
    function checkUserName($user_name) {

        $where = array();
        $where = array('user_name' => $user_name);
        $check = $this->User_model->check_exists($where);
        if ($check <= 0) {
            $this->form_validation->set_message('checkUserName', '{field} chưa tồn tại.');
            return false;
        } else {
            return true;
        }
    }
    
    function checkPaymentType($paymentType) {
        if($paymentType =='cash'||$paymentType=='bank'){
            return true;
        }else {
            $this->form_validation->set_message('checkPaymentType', '{field} định dạng không đúng.');
            return false;
        }
    }
    
    function checkIds($Ids) {
        $user = $this->User_model->get_logged_in_employee_info();
        $arrIds = explode(',', securityServer($Ids));
        $IdsFix = array();
        if(count($arrIds)>0){
            foreach ($arrIds as $row) {
                $IdsFix[] = intval($row);
            }
            
        }
        if($user->role_id==2){
            $this->form_validation->set_message('checkIds', 'Bạn không có quyền sử dụng chức năng này');
            return false;
        }
        $data_check = $this->db->from('order')
                ->join('post_room','order.post_room_id=post_room.post_room_id')
                ->where('payment_status',1)->where('refer_id!=',0)->where_in('order_id',$IdsFix)->get()->num_rows();
        if($data_check>0){
            $this->form_validation->set_message('checkIds', 'Đã có những đơn hàng đã thanh toán trước đó');
            return false;
        }
        $data_check = $this->db->distinct()->select('post_room.user_id')->from('order')
                ->join('post_room','order.post_room_id=post_room.post_room_id')
                ->where('payment_status',1)->where('refer_id!=',0)->where_in('order_id',$IdsFix)->get()->num_rows();
        if($data_check !=0){
            $this->form_validation->set_message('checkIds', 'Chỉ thanh toán được những đơn hàng của cùng 1 đối tác');
            return false;
        }
        return true;
    }
    
    function checkToken($token) {
        $user = $this->User_model->get_logged_in_employee_info();
        if(md5($user->user_name.$user->user_name)!=$token){
            $this->form_validation->set_message('checkToken', '{field} định dạng không đúng.');
            return false;
        }
        return true;
    }

}
