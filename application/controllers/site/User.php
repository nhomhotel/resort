<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
        $userInfoSite = $this->User_model->get_logged_in_user_info();
        if(!$userInfoSite){
            $this->session->set_flashdata(array('message'=>'Bạn chưa đăng nhập','success'=>false));
            redirect('/');
        }
        $data['temp'] = 'site/user/index';
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    function checkUserName($user_name) {

        $where = array();
        $where = array('user_name' => $user_name);
        $check = $this->user_model->check_exists($where);
        if ($check > 0) {
            $this->form_validation->set_message('checkUserName', '{field} đã tồn tại.');
            return false;
        } else {
            return true;
        }
    }

    function checkEmail($email) {

        $where = array();
        $where = array('email' => $email);
        $check = $this->user_model->check_exists($where);
        if ($check > 0) {
            $this->form_validation->set_message('checkEmail', '{field} đã tồn tại.');
            return false;
        } else {
            return true;
        }
    }
    
    public function create() {
        $this->load->model("role_model");
        $this->load->library('form_validation');
        $this->load->helper('form');
        $role_id = 3;

        $input = array();
        $input['order'] = array('role_id', 'ASC');
        $list_role = $this->role_model->get_list($input);
        $data['list_role'] = $list_role;
        if (count($_POST) > 0) {

//
//            $this->form_validation->set_rules('last_name', 'Họ', 'trim|required');
//
//            $this->form_validation->set_rules('first_name','Tên', 'trim|required');
//            $this->form_validation->set_rules('user_name','Tên đăng nhập', 'trim|required|min_length[5]|max_length[12]|callback_checkUserName');
//            $this->form_validation->set_rules('password','Mật khẩu', 'trim|required|min_length[6]|max_length[12]');
//            $this->form_validation->set_rules('email','Email', 'trim|required|valid_email|callback_checkEmail');
//
//            if($this->form_validation->run()){

            $last_name = $this->input->post('last_name');
            $first_name = $this->input->post('first_name');
            $user_name = $this->input->post('user_name');
            $password = md5($this->input->post('password'));
            $email = $this->input->post('email');
            $role_id = $role_id;
            $created = date('Y:m:d H:i:s');

            $data = array(
                'last_name' => $last_name,
                'first_name' => $first_name,
                'user_name' => $user_name,
                'password' => $password,
                'email' => $email,
                'role_id' => $role_id,
            );
            if ($this->user_model->create($data)) {
                $this->session->set_userdata($data);
                $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
            } else {
                $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
            }
            redirect(base_url('home'));
//            }
        }
        $data['title'] = 'Đăng kí tài khoản';
        $data['temp'] = ('site/home/index');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function createFast() {
        $url_curl = $this->input->post('urlCurl') ? trim($this->input->post('urlCurl')) : '';
        $nameCustomer = $this->input->post('nameCustomer') ? trim($this->input->post('nameCustomer')) : '';
        $phoneNumber = $this->input->post('phoneNumber') ? trim($this->input->post('phoneNumber')) : '';
        $email = $this->input->post('email') ? trim($this->input->post('email')) : '';
        if ($nameCustomer == '' || strlen($nameCustomer) < 5 || !preg_match("/^[a-zA-Z ]+$/", $nameCustomer)) {
            echo json_encode(array('success'=>FALSE,'message'=>'Lỗi Tên'));
            exit;
        }
        if ($phoneNumber == '' || !preg_match('/[0-9]{8,11}/', $phoneNumber)) {
            echo json_encode(array('success'=>FALSE,'message'=>'Lỗi số điện thoại'));
            exit;
        }
        if ($email == '' || strlen($email) < 8 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(array('success'=>FALSE,'message'=>'Lỗi email'));
            exit;
        }
        $data['email'] = $email;
        $data['phone'] = $phoneNumber;
        $this->load->model("role_model");
        $this->load->library('form_validation');
        $this->load->helper('form');

        $input = array();
        $input['order'] = array('role_id', 'ASC');
        $list_role = $this->role_model->get_list($input);
        $data['list_role'] = $list_role;
        if (count($_POST) > 0) {
            $data = array(
                'last_name' => $nameCustomer,
                'email' => $email,
                'phone' => $phoneNumber,
//                'role_id' => $role_id,
            );

            $dataCheck = $this->user_model->check_exits_user($data);
            if (count($dataCheck) > 0) {
                echo json_encode(array(
                    'success' => true,
                    'message' => 'Ton tai',
                ));
                $data['user_name'] = $dataCheck->user_name;
                $data['user_id'] = $dataCheck->user_id;
                $this->session->set_userdata($data);
                exit();
            } elseif ($this->user_model->check_exists(array('email' => $email))) {
                echo json_encode(array('success'=>FALSE,'message' => 'email đã tồn tại trên hệ thống. bạn có thể lấy email khác để đăng ký hoặc nhấn vào quên mật khẩu để cấp lại mật khẩu và tên đăng nhập'));
                exit;
            } else {
                $data['last_name'] = $nameCustomer;
                $data['first_name'] = '1';
                $user_name = vn_str_filter($nameCustomer);
                $user_name = str_replace(' ', '_', $user_name);
                $index = 0;
                while (1) {
                    $index++;
                    if ($index > 50) {
                        echo json_encode(array(
                            'success' => FALSE,
                            'message' => 'Xin thử lại trong thời gian ngắn',
                        ));
                        break;
                    }
                    $user_name_tmp = $user_name . rand(1, 99999);
                    if ($this->user_model->check_exists(array('user_name' => $user_name_tmp))) {
                        continue;
                    } else {
                        $data['user_name'] = $user_name_tmp;
                        $data['password'] = md5($this->config->item("encode_pass_user")->encode($user_name.$phoneNumber));
                        $data['role_id'] = 3;
                        $id = $this->user_model->create($data);
                        if ($id) {
                            echo json_encode(array(
                                'success' => true,
                                'message' => 'Tao thanh cong user',
                            ));
                            $this->session->set_flashdata(array('message'=>'Bạn đã tạo tài khoản thành công<br/>Mời bạn tiếp tục đặt phòng','success'=>true));
                            $data['user_id'] = $id;
                            $this->session->set_userdata($data);
                            exit;
                        } else {
                            echo json_encode(array(
                                'success' => FALSE,
                                'message' => 'Khong tao duoc ',
                            ));
                            exit;
                        }
                    }
                }
            }
        }
        exit;
    }
    
     function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }
    
    function confirm(){
        $confirm_code = $this->input->get('confirm_code')?  securityServer($this->input->get('confirm_code')):'';
        $user = $this->input->get('user')?securityServer($this->input->get('user')):'';
        $active = $this->input->get('active')?securityServer($this->input->get('active')):'';
        if($active==''||$active!='1'||$user==''||$confirm_code==''){
            $this->session->set_flashdata('message_confirm', 'Link không tồn tại');
        }
        if(md5(convertStringToNumber($user))==$confirm_code){
            $user_info = $this->User_model->get_row(array('where'=>array('user_name'=>$user)));
            if(count($user_info)>0){
                $this->User_model->update($user_info->user_id,array('validate_code'=>''));
                $this->session->set_flashdata('message_confirm', 'Xác minh tài khoản thành công');
            }else{
                $this->session->set_flashdata('message_confirm', 'Có lỗi trong việc xác minh tài khoản!');
            }
            
        }else $this->session->set_flashdata('message_confirm', 'Link không tồn tại');
        redirect('/');
    }
    
    function edit(){
        echo 1;
    }
    
    function forgotPassword(){
       
        $this->load->library('my_ciphers_library');
        $this->load->library('email');
        $token = isTokent(securityServer($this->input->post('authenticity_token')));
        $email = securityServer($this->input->post('email'));
        if($token===FALSE ||  !filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo json_encode(array('success'=>false,'message'=>'Lỗi xác nhận'));
            exit;
        }
        $token_reset_password = array(
            'email'=>$email,
            'password'=>  ''.rand(1000, 9999)
        );
        $token_encode = $this->my_ciphers_library->encryption(serialize($token_reset_password));
        $emailRtPwdTemplate=$this->db->from('email')
                ->where('email_type',7)
                ->get()->row();
        $message_send_email= array('message'=>'');
        $this->email->initialize(get_config_email($this->config->item('address_email'), $this->config->item('pass_email')));
        $this->email->from($this->config->item('address_email'), $this->config->item('name_website')); 
        $this->email->to($email);

        $this->email->subject($emailRtPwdTemplate->email_title);
        $email_content = $emailRtPwdTemplate->description;
        $email_content = str_replace('__reset_password__user_account__', base_url().'user/resetPasswordFinish?token='.urlencode($token_encode), $email_content);
        $this->email->message($email_content);
        if($this->email->send()){
            $message_send_email['message'].='Reset password đã được gửi vào email<br/>Kiểm tra mail để xác nhận';
            $message_send_email['success'] = TRUE;
            $message_send_email['redirect'] = base_url();
            $dataContentReset = array(
                'token'=>$token_encode,
                'email'=>$email,
                'confirm'=>0,
            );
            $this->db->insert('reset_password',$dataContentReset);
        }else  {
            $message_send_email['message'].='Có lỗi trong việc gửi mail xác nhận';
            $message_send_email['success'] = FALSE;
        }
        $this->session->set_flashdata(array('success'=>$message_send_email['success'],'message'=>$message_send_email['message']));
        echo json_encode(array('success'=>$message_send_email['success'],'message'=>$message_send_email['message'],'redirect'=>!empty($message_send_email['redirect'])?$message_send_email['redirect']:NULL));
//        echo json_encode($token_reset_password);
        exit;
    }
    
    function resetPasswordFinish(){
        $this->load->library('my_ciphers_library');
        $token = ($_GET['token']);
        pre(111);
        pre($token);return;
        $tokenEncode = isTokent($token,'reset_password');
        pre($tokenEncode);
        exit;
        if($tokenEncode===FALSE){
            $this->session->set_flashdata(array('success'=>'false','message'=>'Reset password fail'));
            redirect('/');
        }
        else{
            $this->db->where('email',$tokenEncode['email'])->where('token',$token)
                    ->update('reset_password',array('token'=>'',confirm=>'1'));
            
        }
    }

}
