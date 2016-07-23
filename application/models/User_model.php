<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

    var $table = 'user';
    var $key = 'user_id';

    function getList($input = array()) {

        $this->db->select($this->table . '.*,role_name');
        $this->get_list_set_input($input);
        $this->db->from($this->table);
        $this->db->join('role', $this->table . '.role_id = role.role_id');
        $query = $this->db->get();
        return $query->result();
    }

    function getInfoLogin($id) {
        if (!$id) {
            return false;
        }
        $this->db->select($this->table . '.*,role_name');
        $this->db->where($this->key, $id);
        $this->db->from($this->table);
        $this->db->join('role', $this->table . '.role_id = role.role_id');
        $query = $this->db->get();
        if ($query->num_rows) {
            return false;
        } else {
            return $query->row();
        }
    }

    function exists($where = array()) {
        if (count($where) > 0) {
            $this->db->from($this->table);
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
            return ($this->db->get()->num_rows() > 0);
        } else
            return false;
    }

    function get_logged_in_employee_info() {
        if ($this->is_logged_in()) {
            $userLogin = $this->session->userdata('userLogin');
            return $this->get_info_id($userLogin['user_id']);
        }

        return false;
    }

    function get_info_id($id) {
        $this->db->select('user.*,role.role_name');
        $this->db->join('role','role.role_id=user.role_id');
        $this->db->where('user.user_id',$id);
        $query = $this->db->get($this->table, 1);
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            //create object with empty properties.
            $fields = $this->db->list_fields($this->table);
            $person_obj = new stdClass;

            foreach ($fields as $field) {
                $person_obj->$field = '';
            }

            return $person_obj;
        }
    }

    function is_logged_in() {
        return $this->session->userdata('userLogin') != false;
    }

    function has_module_permission($module_id, $user_id, $role_id) {
        //if no module_id is null, allow access
        if ($module_id == null) {
            return true;
        }
        $this->db->distinct();
        $this->db->from('permissions');
        $this->db->select('module_id');
        $this->db->join('user','user.role_id = permissions.role_id');
        $this->db->where('status',1);
        $this->db->where('module_id',$module_id);
        $this->db->where('user_id',$user_id);
        $this->db->where('permissions.role_id',$role_id);
        $query = $this->db->get();
        return $query->num_rows()==1;
    }

    function has_module_action_permission($module_id, $action_id, $user_id, $role_id) {
        //if no module_id is null, allow access
        if ($module_id == null) {
            return true;
        }
        $this->db->distinct();
        $this->db->select('module_id');
        $this->db->from('permissions_actions');
        $this->db->join('user','user.role_id=permissions_actions.role_id');
        $this->db->where('user.status',1);
        $this->db->where('module_id',$module_id);
        if(is_array($action_id)){
            foreach ($action_id as $key => $value) {
                $this->db->where('action_id',$value);
            }
        }
        $this->db->where('user_id',$user_id);
        $this->db->where('permissions_actions.role_id',$role_id);
        $query = $this->db->get();
        return $query->num_rows() == 1;
    }

    function get_role(){
        $userInfo = $this->get_logged_in_employee_info();
        $this->db->from('user');
        $this->db->join('role','role.role_id=user.role_id');
        $this->db->where('user_id',$userInfo->user_id);
        $this->db->where('user.status',1);
        return $this->db->get()->row()->role_id;
    }

    function check_exits_user($input = array()) {
        $this->db->where('email', $input['email']);
        $this->db->where('phone', $input['phone']);
        $this->db->where('role_id', $input['role_id']);
        $this->db->where("(`last_name` like '" . $input['last_name'] . "' or CONCAT(`last_name`,' ',`first_name`) like '" . $input['last_name'] . "' or `user_name` like '" . $input['last_name'] . "')");
        return $this->db->get($this->table)->row();
//        return $this->db->last_query();
    }
    
    function check_exits_email_or_user_name($email,$user_name){
        $this->db->where('email', $email);
        $this->db->where('user_name', $user_name);
        return ($this->db->get($this->table)->num_rows()>=1);
    }

}
