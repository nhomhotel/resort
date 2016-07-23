<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'AdminHome.php';

class AdminHome extends MY_Controller {

    var $module_id;

    function __construct($module_id = NULL) {
        parent::__construct();
//        echo 1;die;
        $this->module_id = $module_id;
        $module_admin = $this->uri->segment(1);
        switch ($module_admin) {
            case 'admin': {
                    $this->_checkLogin();
                    break;
                }
            default: {
                    break;
                }
        }
        if (!$this->check_permisson($this->module_id)) {
            redirect('site/no_access/' . $this->module_id);
        }
    }

    function _checkLogin() {
        $userLogin = $this->User_model->is_logged_in();
        if (!$userLogin) {
            redirect(admin_url('login'));
        }
    }

//    function check_action_permission($action_id, $module_id) {
//        if ($module_id = null)
//            return true;
//        else {
//            $this->db->get_where();
//        }
//    }

    function check_action_permisson($action_id, $module_id) {
        $userLogin = $this->User_model->get_logged_in_employee_info();
        if ($userLogin) {
            $data['permison'] = $this->User_model->has_module_action_permission($module_id, $action_id, $userLogin->user_id, $userLogin->role_id);
            if (!$data['permison'])
                return FALSE;
            return true;
        }
        return false;
    }

    function check_permisson($module_id) {
        $userLogin = $this->User_model->get_logged_in_employee_info();
        if ($userLogin) {
            if (!$this->User_model->has_module_permission($module_id, $userLogin->user_id, $userLogin->role_id))
                return false;
            else
                return true;
        }
        return false;
    }

}

?>