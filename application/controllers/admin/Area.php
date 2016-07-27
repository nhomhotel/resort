<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class Area extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model('area_model');
//        $this->load->library('simple_image_library');
    }

    function index() {

        $this->load->library('pagination');
        $total = $this->area_model->get_total();

        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/area/index');
        $config['per_page'] = $this->config->item('item_per_page_system')?$this->config->item('item_per_page_system'):10;;
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
        $input['order'] = array('area_id', 'ASC');

        $list = $this->area_model->get_list($input);
        $data['total'] = $total;
        $data['list'] = $list;
        $data['start'] = $start;

        $data['title'] = 'Danh sách khu vực';
        $data['temp'] = 'admin/area/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function create() {

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('area_name', 'area_name', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('area_name_en', 'area_name_en', 'trim|required|min_length[5]');
            if (empty($_FILES['image_area']['name']))
                $this->form_validation->set_rules('image_area', 'image_area', 'required');
            if ($this->form_validation->run()) {
                $name = $this->input->post('area_name');
                $name_en = $this->input->post('area_name_en');
                $sort = $this->input->post('sort');
                $upload_path = './uploads/area';
                $this->load->library('upload_library');
                $image_data = $this->upload_library->upload($upload_path, 'image_area');
                if (!isset($image_data['error_upload']))
                    $image = substr($upload_path, 1) . '/' . $image_data['data_upload']['file_name'];
                else
                    $image = substr($upload_path, 1) . '/' . 'no_image_available.jpg';
                $data = array(
                    'name' => $name,
                    'name_en' => $name_en,
                    'sort' => $sort,
                    'image' => $image,
                );
                if ($this->area_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                }
                redirect(base_url('admin/area'));
            }
        }

        $data['title'] = 'Thêm mới tiện nghi';
        $data['temp'] = 'admin/area/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function edit($id) {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($id > 0) {
            $info = $this->area_model->get_info($id);
            if (!$info) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/area'));
            }
            $data['info'] = $info;
            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('area_name', 'area_name', 'trim|required|min_length[5]');
                $this->form_validation->set_rules('area_name_en', 'area_name_en', 'trim|required|min_length[5]');
                if ($this->form_validation->run()) {
                    $name = $this->input->post('area_name');
                    $name_en = $this->input->post('area_name_en');
                    $sort = $this->input->post('sort');
                    if (!empty($_FILES['image_area']['name'])) {
                        $upload_path = './uploads/area';
                        $this->load->library('upload_library');
                        $image_data = $this->upload_library->upload($upload_path, 'image_area');
                        if (!isset($image_data['error_upload']))
                            $image = substr($upload_path, 1) . '/' . $image_data['data_upload']['file_name'];
                        else
                            $image = substr($upload_path, 1) . '/' . 'no_image_available.jpg';
                        $data = array(
                            'name' => $name,
                            'name_en' => $name_en,
                            'sort' => $sort,
                            'image' => $image,
                        );
                    }else {
                        $data = array(
                            'name' => $name,
                            'name_en' => $name_en,
                            'sort' => $sort,
                        );
                    }
                    if ($this->area_model->update($id, $data)) {
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                    } else {
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                    }
                    redirect(base_url('admin/area'));
                }
            }
            $data['title'] = 'Cập nhật khu vực';
            $data['temp'] = 'admin/area/edit';
            $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
        }
    }

    function delete($id) {
        if ($id > 0) {
            $data['info'] = $this->area_model->get_info($id);
            if (!$data['info']) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/area'));
            }
            if ($this->area_model->delete($id))
                $this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
        }
        redirect(base_url('admin/area'));
    }

    function deleteAll() {
        if ($this->input->post('arrId')) {
            $arrId = $this->input->post('arrId');
            foreach ($arrId as $id) {
                $this->area_model->delete($id);
            }
        }
    }

}

?>