<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class HomeSlider extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model('Home_Slider_model');
//        $this->load->library('simple_image_library');
    }

    function index() {

        $this->load->library('pagination');
        $total = $this->Home_Slider_model->get_total();

        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/HomeSlider/index');
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
        $input['order'] = array('home_slider_id', 'ASC');

        $list = $this->Home_Slider_model->get_list($input);
        $data['total'] = $total;
        $data['list'] = $list;
        $data['start'] = $start;

        $data['title'] = 'Danh sách Slider';
        $data['temp'] = 'admin/home_slider/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function create() {

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('view_home', 'Vị trí hiển chọn chưa đúng', 'trim|required|numeric');
            if (empty($_FILES['image_home_slider']['name']))
                $this->form_validation->set_rules('image_home_slider', 'Ảnh', 'required');
            if ($this->form_validation->run()) {
                $link_home_slider = $this->input->post('link_home_slider')?$this->input->post('link_home_slider'):'';
                $view_home = $this->input->post('view_home')?$this->input->post('view_home'):0;
                $upload_path = './uploads/homeslider';
                $this->load->library('upload_library');
                $image_data = $this->upload_library->upload($upload_path, 'image_home_slider');
                if (!isset($image_data['error_upload']))
                    $image = substr($upload_path, 1) . '/' . $image_data['data_upload']['file_name'];
                else
                    $image = substr($upload_path, 1) . '/' . 'no_image_available.jpg';
                $data = array(
                    'image' => $image,
                    'view_home' => $view_home,
                    'link' => $link_home_slider,
                );
                if ($this->Home_Slider_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                }
                redirect(base_url('admin/HomeSlider'));
            }
        }

        $data['title'] = 'Thêm mới Slider';
        $data['temp'] = 'admin/home_slider/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function edit($id) {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($id > 0) {
            $info = $this->Home_Slider_model->get_info($id);
            if (!$info) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/HomeSlider'));
            }
            $data['info'] = $info;
            if ($this->input->post()) {
                $this->form_validation->set_rules('view_home', 'Vị trí hiển chọn chưa đúng', 'trim|required|numeric');
                if ($this->form_validation->run()) {
                    $view_home = $this->input->post('view_home')?$this->input->post('view_home'):'0';
                    $link_home_slider = $this->input->post('link_home_slider')?$this->input->post('link_home_slider'):'';
                    $sort = $this->input->post('sort');
                    if (!empty($_FILES['image_home_slider']['name'])) {
                        $upload_path = './uploads/homeslider';
                        $this->load->library('upload_library');
                        $image_data = $this->upload_library->upload($upload_path, 'image_home_slider');
                        if (!isset($image_data['error_upload']))
                            $image = substr($upload_path, 1) . '/' . $image_data['data_upload']['file_name'];
                        else
                            $image = substr($upload_path, 1) . '/' . 'no_image_available.jpg';
                        $data = array(
                            'image' => $image,
                            'view_home' => $view_home,
                            'link' => $link_home_slider,
                        );
                    }else {
                        $data = array(
                            'view_home' => $view_home,
                            'link' => $link_home_slider,
                        );
                    }
                    if ($this->Home_Slider_model->update($id, $data)) {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
                    } else {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
                    }
                    redirect(base_url('admin/HomeSlider'));
                }
            }
            $data['title'] = 'Cập nhật Slider';
            $data['temp'] = 'admin/home_slider/edit';
            $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
        }
    }

    function delete($id) {
        if ($id > 0) {
            $data['info'] = $this->Home_Slider_model->get_info($id);
            if (!$data['info']) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/HomeSlider'));
            }
            if ($this->Home_Slider_model->delete($id))
                $this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
        }
        redirect(base_url('admin/home_slider'));
    }

    function deleteAll() {
        if ($this->input->post('arrId')) {
            $arrId = $this->input->post('arrId');
            foreach ($arrId as $id) {
                $this->Home_Slider_model->delete($id);
            }
        }
    }
    
    function status() {
        if(!$this->check_action_permisson('edit', get_class()))redirect('site/No_access/'.  get_class());
        $id = $this->input->post('id');
        $id = (int) $id;

        $statusInfo = $this->Home_Slider_model->get_info($id, 'view_home');
        if (!$statusInfo) {

            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
            redirect(admin_url('HomeSlider/index'));
        } else {
            if ($statusInfo->view_home == 1) {
                $data = array(
                    'view_home' => 0,
                );
            } else {
                $data = array(
                    'view_home' => 1,
                );
            }
        }
        if ($this->Home_Slider_model->update($id, $data)) {
            
        }
    }

}

?>
