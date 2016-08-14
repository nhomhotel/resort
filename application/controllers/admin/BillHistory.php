<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
require_once 'AdminHome.php';

class BillHistory extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
    }

    function index() {
        if(!$this->check_action_permisson('add', get_class())) {
            redirect('site/No_access/'.  get_class());
        }
        $infoUser = $this->User_model->get_logged_in_employee_info();
        if($infoUser)$data['admin_info'] = $infoUser;
        $data['is_active'] = 'home';
        $data['title'] = lang('dashboard');
        $data['temp'] = ('admin/home/index');
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
    }

}

?>