<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class ManagerNews extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model('Manager_Text_model');
    }

    function index() {

        $this->load->library('pagination');
        $total = $this->Manager_Text_model->get_total();
        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/ManagerNews/index');
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
        $input['order'] = array('manager_news_id', 'ASC');

        $list = $this->Manager_Text_model->get_list($input);
        $data['total'] = $total;
        $data['list'] = $list;
        $data['start'] = $start;
        $data['title'] = 'Danh sách Text';
        $data['temp'] = 'admin/manager_news/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function create() {

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $data = array(
                'title' => $title,
                'content' => $content,
            );
            if ($this->Manager_Text_model->create($data)) {
                $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
            } else {
                $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
            }
            redirect(base_url('admin/ManagerNews'));
        }
        $data['title'] = 'Thêm mới text';
        $data['temp'] = 'admin/manager_news/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function edit($id) {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($id > 0) {
            $info = $this->Manager_Text_model->get_info($id);
            if (!$info) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/ManagerNews'));
            }
            $data['info'] = $info;
            if ($this->input->post()) {
                $title = $this->input->post('title');
                $content = $this->input->post('content');
                $title_en = $this->input->post('title_en');
                $content_en = $this->input->post('content_en');
                $data = array(
                    'title' => $title,
                    'content' => $content,
                    'title_en' => $title_en,
                    'content_en' => $content_en,
                );
                if ($this->Manager_Text_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
                }
                redirect(base_url('admin/ManagerNews'));
            }
            $data['title'] = 'Cập nhật text';
            $data['temp'] = 'admin/manager_news/edit';
            $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
        }
    }
    
    function about(){
        
        $this->load->view('');
    }

}

?>
