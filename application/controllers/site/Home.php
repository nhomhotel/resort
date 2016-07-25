<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Address_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->model('area_model');
        $data['meta_title'] = $this->config->item('name_website');
        $data['temp'] = ('site/home/index');
        $data['sliders'] = $this->area_model->get_list(array(
            'where' => array('sort>' => 0),
            'limit' => array('9' => '0')
        ));
        $data['popular'] = $this->load->view('site/slidehome', $data, TRUE);
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }

    public function bookroom() {
        $data['meta_title'] = 'Bookroom - ';
        $data['temp'] = ('site/home/bookroom');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function listroom() {
        $data['meta_title'] = 'Listroom';
        $data['temp'] = ('site/home/listroom');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }

    public function login() {
        if ($this->session->userdata('user_id') != null)
            redirect(base_url());
        if (count($_POST) > 0) {
            $redirect = $this->input->get('redirect') != null ? trim($this->input->get('redirect')) : base_url();
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            if ($this->form_validation->run()) {
                $data = array(
                    'where' => array(
                        'email' => $this->input->post('email'),
                        'password' => md5($this->input->post('password')),
                    )
                );
                $dataUser = $this->User_model->get_row($data);
                if ($dataUser != NULL && count($dataUser)) {
                    $this->session->set_userdata(array(
                        'user_id' => $dataUser->user_id,
                        'last_name' => $dataUser->last_name,
                        'first_name' => $dataUser->first_name,
                        'user_name' => $dataUser->user_name,
                        'email' => $dataUser->email,
                        'phone' => $dataUser->phone,
                        'avarta' => $dataUser->avarta,
                        'role_id' => $dataUser->role_id,
                    ));
                    redirect($redirect);
                } else {
                    $this->session->set_flashdata('login_message', 'Tài khoản hoặc mật khẩu không đúng!');
                    redirect('home/login');
                }
                exit;
            }
        }
        $data['meta_title'] = 'Login';
        $data['temp'] = ('site/home/login');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function postnews1() {
        $data['meta_title'] = 'Postnews1';
        $data['temp'] = ('site/home/postnews1');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function postnews2() {
        $data['meta_title'] = 'Postnews2';
        $data['temp'] = ('site/home/postnews2');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function postnews3() {
        $data['meta_title'] = 'Postnews3';
        $data['temp'] = ('site/home/postnews3');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function postnews_success() {
        $data['meta_title'] = 'Postnews_success';
        $data['temp'] = ('site/home/postnews_success');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function register() {
        $data['meta_title'] = 'Register';
        $data['temp'] = ('site/home/register');

        if ($this->session->userdata('user_name')) {
            redirect(base_url());
        } else {
            if ($this->input->post()) {
                $this->load->library('form_validation');
                $this->load->helper('form');
                $this->form_validation->set_rules('user_name', 'Tên đăng nhập', 'trim|required|min_length[6]|max_length[12]|callback_checkUserName');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_checkEmail');
                $this->form_validation->set_rules('last_name', 'Họ ', 'trim|required');
                $this->form_validation->set_rules('first_name', 'Têm', 'trim|required');
                $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[6]|numeric');

                //chạy và kiểm tra các tập luật
                if ($this->form_validation->run()) {
                    $last_name = $this->input->post('last_name');
                    $first_name = $this->input->post('first_name');
                    $user_name = $this->input->post('user_name');
                    $password = md5($this->input->post('password'));
                    $email = $this->input->post('email');
                    $role_id = 3;
                    $created = date('Y:m:d H:i:s');

                    $data = array(
                        'last_name' => $last_name,
                        'first_name' => $first_name,
                        'user_name' => $user_name,
                        'password' => $password,
                        'email' => $email,
                        'role_id' => $role_id,
                    );
                    if ($this->User_model->create($data)) {
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message', 'Đăng ký tài khoản thành công!');
                    } else {
                        $this->session->set_flashdata('message', 'Đăng ký thất bại!');
                    }
                    redirect(base_url('/'));
                }
            }
        }
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function process($query = '') {
        //get data from address_model vs $query
        $query = strtolower(trim($_POST['query']));
        $query_no = vn_str_filter($query);
        $data = $this->Address_model->getAddress($query_no);
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                //search theo tên đường
                if (count(explode(strtolower($query_no), strtolower($value['address_detail_ascii']))) > 1) {
                    $result[$key] = $value['address_detail'];
                    //search theo tên quan, huyện    
                } elseif (count(explode(strtolower($query_no), strtolower($value['district_ascii']))) > 1) {
                    $result[$key] = $value['district'] . ', ' . $value['provincial'] . ', ' . $value['country'];
                    //search theo tên tỉnh, thành phố
                } elseif (count(explode(strtolower($query_no), strtolower($value['provincial_ascii']))) > 1) {
                    $result[$key] = $value['provincial'] . ', ' . $value['country'];
                    //search theo tên quốc gia
                } elseif (count(explode(strtolower($query_no), strtolower($value['country_ascii']))) > 1) {
                    $result[$key] = $value['country'];
                    // search mặc định
                } else {
//                $result[$key] = $value['address_street'].', '.$value['district'].', '.$value['provincial'].', '.$value['country'];
                    $result[$key] = $value['address_detail'];
                }
            }
            $result = array_unique($result);
            echo json_encode($result);
        } else
            echo json_encode(array(
                'result' => '',
            ));
        exit();
    }

    function Test() {
        $this->load->model('Post_room_model');
        $this->load->library('book_library');
        pre($this->book_library->getMoney(array('checkin' => '2016-8-1', 'checkout' => '2016-8-20'), 5, '', 1, array('vat' => 10)));
    }

    function checkUserName($user_name) {

        $where = array();
        $where = array('user_name' => $user_name);
        $check = $this->User_model->check_exists($where);
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
        $check = $this->User_model->check_exists($where);
        if ($check > 0) {
            $this->form_validation->set_message('checkEmail', '{field} đã tồn tại.');
            return false;
        } else {
            return true;
        }
    }

}
