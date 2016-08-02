<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->model("role_model");
        $input = array();
        $input['order'] = array('role_id', 'ASC');
        $list_role = $this->role_model->get_list($input);
        $data['list_role'] = $list_role;

        $this->load->library('pagination');
        $total = $this->user_model->get_total();

        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/user/index');
        $config['per_page'] = $this->config->item('item_per_page_site')?$this->config->item('item_per_page_site'):10;;;
        $config['uri_segment'] = 4;
        $config['next_link'] = 'Trang kế tiếp';
        $config['prev_link'] = 'Trang trước';
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        if ($this->uri->segment('4') && $this->uri->segment('4') > 1) {
            $segment = $this->uri->segment('4');
        } else {
            $segment = 1;
        }

        $segment = (int) $segment;
        $start = ($segment - 1) * $config['per_page'];
        $pagination_link = $this->pagination->create_links();
        $data['pagination_link'] = $pagination_link;

        $message = $this->session->flashdata();
        $data['message'] = $message;

        $input = array();
        $input['limit'] = array($config['per_page'], $start);
        $input['order'] = array('user_id', 'DESC');


        /* -- Lọc user_name-- */
        $user_name = $this->input->get('user_name');
        if ($user_name) {
            $input['like'] = array('user_name', $user_name);
        }
        /* -- Lọc ozganzation-- */
        $ozganzation = $this->input->get('ozganzation');

        if ($ozganzation) {
            $input['or_like'] = array('ozganzation', $ozganzation);
        }
        /* -- Lọc role-- */
        $role_id = $this->input->get('role');
        $role_id = (int) $role_id;
        if ($role_id) {
            $input['where']['tbl_user.role_id'] = $role_id;
        }

        //Lay session userLogin de list user != userLogin
        if (!is_NULL($this->session->userdata('userLogin'))) {
            $userLogin = $this->session->userdata('userLogin');
            $input['where']['user_id !='] = $userLogin['user_id'];
        }
        $list = $this->user_model->getList($input);
        $data['total'] = $total;
        $data['list'] = $list;

        $data['title'] = 'Danh sách tài khoản';
        $data['temp'] = 'admin/user/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
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
//        $role_id = 3;

        $input = array();
        $input['order'] = array('role_id', 'ASC');
        $list_role = $this->role_model->get_list($input);
        $data['list_role'] = $list_role;
        if (count($_POST) > 0) {
            $role_id = $role_id;
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
                        $data['password'] = rand(100000, 999999);
                        $id = $this->user_model->create($data);
                        if ($id) {
                            echo json_encode(array(
                                'success' => true,
                                'message' => 'Tao thanh cong user',
                            ));
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

}
