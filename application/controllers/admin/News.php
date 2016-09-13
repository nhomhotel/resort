<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class News extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model('News_model');
//        $this->load->library('simple_image_library');
    }

    function index() {

        $this->load->library('pagination');
        $total = $this->News_model->get_total();

        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/news/index');
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
        $input['order'] = array('news_id', 'ASC');

        $list = $this->News_model->get_list($input);
        $list = $this->db->from('news')
                ->select('news.*,news_category.title as news_category_title')
                ->join('news_category','news_category.news_category_id=news.news_category_id')
                ->limit($config['per_page'],$start)
                ->order_by('news_id','DESC')
                ->get()->result();
        $data['total'] = $total;
        $data['list'] = $list;
        $data['start'] = $start;

        $data['title'] = 'Danh sách tin';
        $data['temp'] = 'admin/news/index';
//        $data['recapcha'] = $this->recaptcha->recaptcha_get_html();
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function create() {
        $this->load->model('News_category_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('news_title', 'Tiêu đề', 'trim|required');
            $this->form_validation->set_rules('content_news', 'Nội dung', 'trim|required');
            $this->form_validation->set_rules('news_category', 'Danh mục tin', 'trim|required|callback_checkNewsCategory');
            if ($this->form_validation->run()) {
                $news_title = $this->input->post('news_title');
                $content_news = $this->input->post('content_news');
                $news_category_id = $this->input->post('news_category');
                $status = intval($this->input->post('status'));
                
                $data = array(
                    'title' => $news_title,
                    'content' => $content_news,
                    'news_category_id'=>$news_category_id,
                    'status' => $status,
                    'create'=>  date('Y:m:d H:i:s'),
                    'update'=>date('Y:m:d H:i:s')
                );
                if ($this->News_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                }
                redirect(base_url('admin/news'));
            }
        }
        $data['news_category'] = $this->News_category_model->get_list();
        $data['title'] = 'Thêm mới tin';
        $data['temp'] = 'admin/news/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function edit($id) {
        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($id > 0) {
            $info = $this->News_model->get_info($id);
            if (!$info) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/news'));
            }
            $data['info'] = $info;
            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('titleNews', 'Tiêu đề', 'trim|required');
                $this->form_validation->set_rules('contentNews', 'Nội dung', 'trim|required');
                if ($this->form_validation->run()) {
                    $titleNews = $this->input->post('titleNews');
                    $contentNews = $this->input->post('contentNews');
                    $statusNews = intval($this->input->post('statusNews'));
                    $newsCategory = intval($this->input->post('newsCategory'));
                    $data = array(
                        'title' => $titleNews,
                        'content' => $contentNews,
                        'status' => $statusNews,
                        'news_category_id' => $newsCategory,
                        'update'=>date('Y:m:d H:i:s')
                    );
                    if ($this->News_model->update($id, $data)) {
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                    } else {
                        $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                    }
                    redirect(base_url('admin/news'));
                }
            }
            $data['title'] = 'Cập nhật tin';
            $data['news_category'] = $this->db->from('news_category')
                    ->get()->result();
            $data['temp'] = 'admin/news/edit';
            $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
        }
    }

    function delete($id) {
        if ($id > 0) {
            $data['info'] = $this->News_model->get_info($id);
            if (!$data['info']) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/news'));
            }
            if ($this->News_model->delete($id))
                $this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
        }
        redirect(base_url('admin/news'));
    }

    function deleteAll() {
        if ($this->input->post('arrId')) {
            $arrId = onlyCharacter(securityServer($this->input->post('arrId')));
            foreach ($arrId as &$id) {
                $id=intval($id);
            }
            if($this->db->where_in('news_id',$arrId)->delete('news')){
                $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
                redirect(base_url('admin/News'));
            }else{
                $this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
                redirect(base_url('admin/News'));
            }
        }
    }
    
    function checkNewsCategory($str){
        $news_category_id = intval($str);
        if($news_category_id<=0){
            $this->form_validation->set_message('checkNewsCategory', 'Danh mục tin không đúng!');
            return false;
        }
        $result = $this->db->from('news_category')->where('news_category_id',$news_category_id)->get()->row();
        if(empty($result)){
            $this->form_validation->set_message('checkNewsCategory', 'Danh mục tin không đúng!');
            return false;
        }
        return true;
    }
    
    function status(){
        $id = intval($this->input->post('id'));
        $data = $this->News_model->changeStatus($id);
        if(isset($data['error'])) return $data['error'];
        else return array('success'=>TRUE);
        exit;
    }

}

?>