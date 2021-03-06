<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class FollowSocial extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model('Follow_Social_model');
    }

    function index() {

        $this->load->library('pagination');
        $total = $this->Follow_Social_model->get_total();

        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/FollowSocial/index');
        $config['per_page'] = $this->config->item('item_per_page_system') ? $this->config->item('item_per_page_system') : 10;
        ;
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
        $input['order'] = array('follow_social_id', 'ASC');

        $list = $this->Follow_Social_model->get_list($input);
        $data['total'] = $total;
        $data['list'] = $list;
        $data['start'] = $start;

        $data['title'] = 'Danh sách mạng liên kết';
        $data['temp'] = 'admin/follow_social/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function create() {

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $name = $this->input->post('name_network');
            $link = $this->input->post('link_network');
            $data = array(
                'name' => $name,
                'link' => $link,
            );
            if ($this->Follow_Social_model->create($data)) {
                $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
            } else {
                $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
            }
            redirect(base_url('admin/FollowSocial'));
        }

        $data['title'] = 'Thêm mới FollowSocial';
        $data['temp'] = 'admin/follow_social/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function edit($id) {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($id > 0) {
            $info = $this->Follow_Social_model->get_info($id);
            if (!$info) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/FollowSocial'));
            }
            $data['info'] = $info;
            if ($this->input->post()) {
                $name_network = $this->input->post('name_network');
                $link_network = $this->input->post('link_network');
                $data = array(
                    'name' => $name_network,
                    'link' => $link_network,
                );
                if ($this->Follow_Social_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
                }
                redirect(base_url('admin/FollowSocial'));
            }
            $data['title'] = 'Cập nhật FollowSocial';
            $data['temp'] = 'admin/follow_social/edit';
            $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
        }
    }
}

?>
