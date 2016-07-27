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

}
