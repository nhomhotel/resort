<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class Order_room extends AdminHome {
    function __construct() {
        parent::__construct(get_class());
        $this->load->model('Order_room_model');
    }

    function index() {
        $this->load->library('pagination');
        $user = $this->User_model->get_logged_in_employee_info();
        $input = array();
        if($user==null || $user==''){
            redirect(admin_url('login'));
        }
        $role_id = $user->role_id;
        if ($role_id == 3) {
            $this->session->destroy();
            redirect(admin_url('login'));
        } elseif ($role_id == 2) {

            $input['where'] = array('post_room.user_id'=> $user->user_id);
        }
        
        $filters = array();
        if (!empty($_GET)) {
            $params = $_GET;
            foreach ($params as $key => $value) {
                $data[$key] = securityServer($value);
                if ($key != 'page') {
                    $filters[] = $key . '=' . $value;
                }
            }
        }
        //phần chung
        $input['where']['refer_id!='] =0; 
        $post_room_name = onlyCharacter(securityServer($this->input->get('post_room_name')));
        if ($post_room_name) {
            $input['like'] = array('post_room_name_ascii', $post_room_name);
        }
        $user_name = onlyCharacter(securityServer($this->input->get('user_name')));
        if ($user_name) {
            $join['user'] = 'post_room.user_id::user_id';
            $input['like'] = array('user_name', $user_name);
        }
        $total = $this->Order_room_model->_get_total($user,$filters);
        
        
        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/order_room/index?'.  implode('&', $filters));
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
        $data['start'] = $start;
        $input['order'] = array('order_id', 'ASC');
        $list = $this->Order_room_model->_get_list($user,$filters,$config['per_page'],$start)->result();
        $data['profit'] = $this->Order_room_model->_get_profit($user,$filters,$config['per_page'],$start)->result();
        $data['total'] = $total;
        $data['list'] = $list;
        $data['user'] = $user;
        $data['title'] = 'Danh sách phòng đã đặt';
        $data['temp'] = 'admin/order_room/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function create() {

        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            $this->form_validation->set_rules('amenities_name', 'Amenities', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('amenities_name_en', 'Amenities_EN', 'trim|required|min_length[2]');
            if ($this->form_validation->run()) {
                $amenities_name = $this->input->post('amenities_name');
                $amenities_name_en = $this->input->post('amenities_name_en');
                $description = $this->input->post('description');
                $description_en = $this->input->post('description_en');
                if ($this->input->post('status') == 'on') {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $created = date('Y:m:d H:i:s');
                $data = array(
                    'name' => $amenities_name,
                    'name_en' => $amenities_name_en,
                    'description' => $description,
                    'description_en' => $description_en,
                    'status' => $status,
                    'created' => $created
                );

                if ($this->amenities_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                }
                redirect(base_url('admin/amenities'));
            }
        }

        $data['title'] = 'Thêm mới tiện nghi';
        $data['temp'] = 'admin/amenities/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function edit() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $id = $this->uri->rsegment('3');
        $id = (int) $id;
        $info = $this->amenities_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
            redirect(base_url('admin/amenities'));
        }
        $data['info'] = $info;
        if ($this->input->post('submit')) {
            // echo "<pre>";
            // print_r($this->input->post());
            $this->form_validation->set_rules('amenities_name', 'Amenities', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('amenities_name_en', 'Amenities_EN', 'trim|required|min_length[2]');
            if ($this->form_validation->run()) {
                $amenities_name = $this->input->post('amenities_name');
                $amenities_name_en = $this->input->post('amenities_name_en');
                $description = $this->input->post('description');
                $description_en = $this->input->post('description_en');
                if ($this->input->post('status') == 'on') {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $created = date('Y:m:d H:i:s');
                $data = array(
                    'name' => $amenities_name,
                    'name_en' => $amenities_name_en,
                    'description' => $description,
                    'description_en' => $description_en,
                    'status' => $status,
                    'created' => $created
                );

                if ($this->amenities_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
                }
                redirect(base_url('admin/amenities'));
            }
        }
        $data['title'] = 'Cập nhật tiện nghi';
        $data['temp'] = 'admin/amenities/edit';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function delete() {
        $id = $this->uri->rsegment('3');
        $id = (int) $id;

        $data['info'] = $this->amenities_model->get_info($id);
        if (!$data['info']) {
            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
            redirect(base_url('admin/amenities'));
        }
        if ($this->amenities_model->delete($id)) {
            $this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
        }
        redirect(base_url('admin/amenities'));
    }

    function status() {

        $id = $this->input->post('id');
        $field = 'status';

        $statusInfo = $this->amenities_model->get_info($id, $field);
        if (!$statusInfo) {
            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
            redirect(admin_url('amenities/index'));
        } else {
            if ($statusInfo->status == 1)
                $data = array('status' => 0,);
            
                else$data = array('status' => 1,);
        }
        if ($this->amenities_model->update($id, $data)) {
            
        }
    }

    function deleteAll() {
        if ($this->input->post('arrId')) {
            $arrId = $this->input->post('arrId');
            foreach ($arrId as $id) {
                $this->amenities_model->delete($id);
            }
        }
    }

    function lang($lang = '') {
        setcookie('php_lang', $lang, NULL, "/");
        $redirect = $this->input->get('redirect');
        $redirect = !empty($redirect) ? (base_url($redirect)) : '.';
        redirect($redirect);
    }
    
    function paymentStatus(){
        $id  = intval($this->input->post('id'));
        $field = 'payment_status';

        $statusInfo = $this->Order_room_model->get_info($id, $field);
        if (!$statusInfo) {
            echo json_encode(array('message'=> 'Không tồn tại bản ghi!'));
        } else {
            if ($statusInfo->payment_status == 1)
                $data = array('payment_status' => 0,);
            
                else $data = array('payment_status' => 1,);
        }
        if ($this->Order_room_model->update($id, $data)) {
            echo json_encode(array('status'=> true));
        }
        exit;
    }

}

?>