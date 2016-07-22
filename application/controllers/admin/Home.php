<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
require_once 'AdminHome.php';

class Home extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
    }

    function index() {
        $userLogin = ($this->session->userdata('userLogin')) ? $this->session->userdata('userLogin') : '';

        if ($userLogin) {
            $admin_id = $userLogin['user_id'];
            $admin_info = $this->User_model->getInfoLogin($admin_id);
            $data['role'] = $this->User_model->get_role($admin_id);
            $data['permison_add'] = $this->User_model->has_module_action_permission(get_class(),'add', $data['role']);
            if(!$data['permison_add']){
                redirect('site/No_access/'.  get_class());
            }
            $data['admin_info'] = $admin_info;
        }
        $data['is_active'] = 'home';
        $data['title'] = lang('dashboard');
        $data['temp'] = ('admin/home/index');
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
    }

}

?>