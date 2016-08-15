<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class BillHistory extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model('Bill_history_model');
//        $this->load->library('simple_image_library');
    }

    function index($id=-1) {
        if($id>0){
            $this->load->library('pagination');
            $input = array();
            $input['where']['bill_history_id'] = $id;
            $total = $this->Bill_history_model->get_total($input);

            $config = array();
            $config["total_rows"] = $total;
            $config['base_url'] = base_url('admin/BillHistory/index');
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'page';
            $config['per_page'] = $this->config->item('item_per_page_system')?$this->config->item('item_per_page_system'):10;;
            $config['uri_segment'] = 4;
            $config['next_link'] = 'Trang kế tiếp';
            $config['prev_link'] = 'Trang trước';
            $config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);
            $page = securityServer($this->input->get('page'))?intval(securityServer($this->input->get('page'))):1;
            if ($page>1) {
                $segment = $page;
            } else {
                $segment = 1;
            }
            $segment = (int) $segment;
            $start = ($segment - 1) * $config['per_page'];
            $pagination_link = $this->pagination->create_links();
            $data['pagination_link'] = $pagination_link;

            $message = $this->session->flashdata();
            $data['message'] = $message;

            $input['limit'] = array($config['per_page'], $start);
            $input['order'] = array('bill_history_id', 'ASC');

            $list = $this->Bill_history_model->get_list($input,array('user'=>'user.user_id::bill_history.user_id'));
            $list_admin = $this->Bill_history_model->get_list($input,array('user'=>'user.user_id::bill_history.admin_id'));
            $data['total'] = $total;
            $data['list_admin'] = $list_admin;
            $data['list'] = $list;
            $data['start'] = $start;

            $data['title'] = 'Danh sách khu vực';
            $data['temp'] = 'admin/bill_history/index';
            $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
        }
    }

}

?>