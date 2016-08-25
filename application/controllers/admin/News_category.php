<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class News_category extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model('News_category_model');
//        $this->load->library('simple_image_library');
    }

    function index() {

        $this->load->library('pagination');
        $total = $this->News_category_model->get_total();

        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/News_category/index');
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
        $input['order'] = array('News_category_id', 'ASC');

        $list = $this->News_category_model->get_list($input);
        $data['total'] = $total;
        $data['list'] = $list;
        $data['start'] = $start;

        $data['title'] = 'Danh sách danh mục tin';
        $data['temp'] = 'admin/News_category/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function create() {

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('News_category_name', 'Mô tả', 'trim|required');
            $this->form_validation->set_rules('News_category_name_en', 'Mô tả tiếng anh', 'trim|required');
            if (empty($_FILES['image_News_category']['name']))
                $this->form_validation->set_rules('image_News_category', 'Ảnh', 'required');
            if ($this->form_validation->run()) {
                $description = $this->input->post('News_category_name');
                $description_en = $this->input->post('News_category_name_en');
                $upload_path = './uploads/news_category';
                $this->load->library('upload_library');
                $image_data = $this->upload_library->upload($upload_path, 'image_News_category');
                if (!isset($image_data['error_upload']))
                    $image = substr($upload_path, 1) . '/' . $image_data['data_upload']['file_name'];
                else
                    $image = substr($upload_path, 1) . '/' . 'no_image_available.jpg';
                $data = array(
                    'description' => $description,
                    'description_en' => $description_en,
                    'image' => $image,
                    'status'=>intval($this->input->post('status_news_category'))
                );
                if ($this->News_category_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                }
                redirect(base_url('admin/News_category'));
            }
        }

        $data['title'] = 'Thêm mới danh mục tin';
        $data['temp'] = 'admin/News_category/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function edit($id) {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($id > 0) {
            $info = $this->News_category_model->get_info($id);
            if (!$info) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/News_category'));
            }
            $data['info'] = $info;
            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('News_category_name', 'News_category_name', 'trim|required');
                $this->form_validation->set_rules('News_category_name_en', 'News_category_name_en', 'trim|required');
                if ($this->form_validation->run()) {
                    $description = $this->input->post('News_category_name');
                    $description_en = $this->input->post('News_category_name_en');
                    $status = intval($this->input->post('status_news_category'));
                    if (!empty($_FILES['image_News_category']['name'])) {
                        $upload_path = './uploads/news_category';
                        $this->load->library('upload_library');
                        $image_data = $this->upload_library->upload($upload_path, 'image_News_category');
                        if (!isset($image_data['error_upload']))
                            $image = substr($upload_path, 1) . '/' . $image_data['data_upload']['file_name'];
                        else
                            $image = substr($upload_path, 1) . '/' . 'no_image_available.jpg';
                        $data = array(
                            'description' => $description,
                            'description_en' => $description_en,
                            'status' => $status,
                            'image' => $image,
                        );
                    }else {
                        $data = array(
                            'description' => $description,
                            'description_en' => $description_en,
                            'status' => $status,
                        );
                    }
                    if ($this->News_category_model->update($id, $data)) {
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                    } else {
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                    }
                    redirect(base_url('admin/News_category'));
                }
            }
            $data['title'] = 'Cập nhật danh mục tin';
            $data['temp'] = 'admin/News_category/edit';
            $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
        }
    }

    function delete($id) {
        if ($id > 0) {
            $data['info'] = $this->News_category_model->get_info($id);
            if (!$data['info']) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/News_category'));
            }
            if ($this->News_category_model->delete($id))
                $this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
        }
        redirect(base_url('admin/News_category'));
    }

    function deleteAll() {
        if ($this->input->post('arrId')) {
            $arrId = $this->input->post('arrId');
            foreach ($arrId as $id) {
                $this->News_category_model->delete($id);
            }
        }
    }

}
?>
