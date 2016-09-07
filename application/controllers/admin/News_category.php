<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class News_category extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model('News_category_model');
    }

    function index() {
        $this->load->model('News_category_model');
        $this->load->library('pagination');
        $total = $this->News_category_model->get_total();

        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/news_category/index');
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
        $data['temp'] = 'admin/news_category/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function create() {

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('News_category_description', 'Mô tả', 'trim|required');
            $this->form_validation->set_rules('News_category_description_en', 'Mô tả (en)', 'trim|required');
            $this->form_validation->set_rules('News_category_title', 'Tiêu đề', 'trim|required');
            $this->form_validation->set_rules('News_category_title_en', 'Tiêu đề(en)', 'trim|required');
            if (empty($_FILES['image_News_category']['name']))
                $this->form_validation->set_rules('image_News_category', 'Ảnh', 'required');
            if ($this->form_validation->run()) {
                $description = $this->input->post('News_category_description');
                $description_en = $this->input->post('News_category_description_en');
                $title = $this->input->post('News_category_title');
                $title_en = $this->input->post('News_category_title_en');
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
                    'title' => $title,
                    'title_en' => $title_en,
                    'image' => $image,
                    'status'=>intval($this->input->post('status_news_category'))
                );
                if ($this->News_category_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                }
                redirect(base_url('admin/news_category'));
            }
        }

        $data['title'] = 'Thêm mới danh mục tin';
        $data['temp'] = 'admin/news_category/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function edit($id) {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($id > 0) {
            $info = $this->News_category_model->get_info($id);
            if (!$info) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/news_category'));
            }
            $data['info'] = $info;
            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('News_category_description', 'Mô tả', 'trim|required');
                $this->form_validation->set_rules('News_category_description_en', 'Mô tả(en)', 'trim|required');
                $this->form_validation->set_rules('News_category_title', 'Tiêu đề', 'trim|required');
                $this->form_validation->set_rules('News_category_title_en', 'Tiêu đề(en)', 'trim|required');
                if ($this->form_validation->run()) {
                    $description = $this->input->post('News_category_description');
                    $description_en = $this->input->post('News_category_description_en');
                    $title = $this->input->post('News_category_title');
                    $title_en = $this->input->post('News_category_title_en');
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
                            'title' => $title,
                            'title_en' => $title_en,
                            'status' => $status,
                            'image' => $image,
                        );
                    }else {
                        $data = array(
                            'description' => $description,
                            'description_en' => $description_en,
                            'title' => $title,
                            'title_en' => $title_en,
                            'status' => $status,
                        );
                    }
                    if ($this->News_category_model->update($id, $data)) {
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                    } else {
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                    }
                    redirect(base_url('admin/news_category'));
                }
            }
            $data['title'] = 'Cập nhật danh mục tin';
            $data['temp'] = 'admin/news_category/edit';
            $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
        }
    }

    function delete($id) {
        $id = intval(onlyCharacter(securityServer($id)));
        if ($id > 0) {
            $data_info = $this->db->from('news_category')
                    ->select('news.content')
                    ->join('news','news.news_category_id = news_category.news_category_id','left')
                    ->where('news_category.news_category_id',$id)
                    ->get()->row();
            if(empty($data_info)){
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/News_category'));
            }elseif(!empty ($data_info->content)){
                $this->session->set_flashdata('message', 'Không xóa được được danh mục vì đã tồn tại bài viết');
                redirect(base_url('admin/News_category'));
            }
            if ($this->News_category_model->delete($id))
                $this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
            else{
                $this->session->set_flashdata('message', 'Xóa dữ liệu thất bại!');
            }
        }
        redirect(base_url('admin/news_category'));
    }

    function deleteAll() {
        if ($this->input->post('arrId')) {
            $arrId = onlyCharacter(securityServer($this->input->post('arrId')));
            foreach ($arrId as &$id) {
                $id = intval($id);
            }
            $data_info = $this->db->from('news_category')
                    ->select('news.content')
                    ->join('news','news.news_category_id = news_category.news_category_id','left')
                    ->where_in('news_category.news_category_id',$arrId)
                    ->get()->result();
            if(empty($data_info)){
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/News_category'));
            }else{
                foreach ($data_info as $row){
                    if(!empty($row->content)){
                        $this->session->set_flashdata('message', 'Không xóa được được danh mục vì đã tồn tại bài viết');
                        redirect(base_url('admin/News_category'));
                    }
                }
                if($this->db->where_in('news_category_id',$arrId)->delete('news_category')){
                    $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
                    redirect(base_url('admin/News_category'));
                }else{
                    $this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
                    redirect(base_url('admin/News_category'));
                }
            }
        }
    }
    
    function status(){
        $id = intval($this->input->post('id'));
        $data=$this->News_category_model->changeStatus($id);
        if(isset($data['error'])) return $data['error'];
        else return array('success'=>TRUE);
        exit;
    }

}
?>
