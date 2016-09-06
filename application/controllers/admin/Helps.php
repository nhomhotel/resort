<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class Helps extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model('Help_topic_model');
        $this->load->model('Help_tag_model');
        $this->load->model('Help_postGuide_model');
    }

    function topic() {
        $this->load->library('pagination');
        $total = $this->db->from('help_topic')->get()->num_rows();
        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = admin_url('Helps/topic');
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

        $input = array();
        $input['limit'] = array($config['per_page'], $start);
        $data['start'] = $start;
        $input['order'] = array('topic_id', 'ASC');

        $message = $this->session->flashdata();
        $data['message'] = $message;
        $list = $this->db->from('help_topic')->get()->result();
        $data['total'] = $total;
        $data['list'] = $list;
        $data['title'] = 'Danh sách topic';
        $data['temp'] = 'admin/Help/topic/index';
        $this->load->view('admin/layout', (isset($data)) ? $data : NULL);
    }

    function createTopic() {
        $this->load->model('Help_topic_model');
        if ($this->input->post()) {
            $title = $this->input->post('titleTopic');
            $title_en = $this->input->post('titleTopic_en');
            $status = $this->input->post('statusTopic');
            $data = array(
                'title' => $title,
                'title_en' => $title_en,
                'status' => $status
            );
            if ($this->Help_topic_model->create($data)) {
                $this->session->set_flashdata('message', 'Thêm dữ liệu thành công');
            } else {
                $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại');
            }
            redirect(base_url('admin/helps/topic'));
        }
        $data['title'] = 'Thêm mới text';
        $data['temp'] = 'admin/help/topic/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function editTopic($id = -1) {
        if ($id > 0) {
            if ($this->input->post('submit')) {
                $title = $this->input->post('titleTopic');
                $title_en = $this->input->post('titleTopic_en');
                $status = $this->input->post('statusTopic');
                $data = array(
                    'title' => $title,
                    'title_en' => $title_en,
                    'status' => $status
                );
                if ($this->Help_topic_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại');
                }
                redirect(base_url('admin/helps/topic'));
            }
            $input = array(
                'where' => array(
                    'topic_id' => $id,
                )
            );
            $data['title'] = 'Chỉnh sửa topic';
            $data['info'] = $this->Help_topic_model->get_row($input);
            $data['temp'] = 'admin/Help/topic/edit';
            $this->load->view('admin/layout', (isset($data)) ? $data : NULL);
        }
    }

    function createTag() {
        $this->load->model('Help_tag_model');
        if ($this->input->post()) {
            $name = onlyCharacter(securityServer($this->input->post('nameTag')));
            $data = array(
                'name' => $name,
            );
            $search = $this->Help_tag_model->get_row(array('where' => array('name' => $name)));
            if (empty($search)) {
                if ($this->Help_tag_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại');
                }
                redirect(base_url('admin/helps/tag'));
            } else {
                $this->session->set_flashdata('message', 'Tag da ton tai');
                redirect(base_url('admin/helps/createTag'));
            }
        }
        $data['message'] = $this->session->flashdata('message');
        $data['title'] = 'Thêm mới text';
        $data['temp'] = 'admin/help/tag/create';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function editTag($id = -1) {
        if ($id > 0) {
            if ($this->input->post('submit')) {
                $name = onlyCharacter(securityServer($this->input->post('nameTag')));
                $data = array(
                    'name' => $name,
                );
                $search = $this->Help_tag_model->get_row(array('where' => array('name' => $name)));
                if (empty($search)) {
                    if ($this->Help_tag_model->update($id, $data)) {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    } else {
                        $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Tag đã tồn tại !');
                }
                redirect(base_url('admin/helps/tag'));
            }
            $input = array(
                'where' => array(
                    'tag_id' => $id,
                )
            );
            $data['title'] = 'Chỉnh sửa tag';
            $data['info'] = $this->Help_tag_model->get_row($input);
            $data['temp'] = 'admin/Help/tag/edit';
            $this->load->view('admin/layout', (isset($data)) ? $data : NULL);
        }
    }

    function deletePostGuide($id = -1) {
        if ($id > 0) {
            $data['info'] = $this->Help_postGuide_model->get_info($id);
            if (!$data['info']) {
                $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
                redirect(base_url('admin/news'));
            }
            if ($this->News_model->delete($id))
                $this->session->set_flashdata('message', 'Xóa dữ liệu thành công!');
        }
        redirect(base_url('admin/news'));
    }
    
    function deleteTopic($id = -1) {
        if ($id > 0) {
            if ($this->input->post('submit')) {
                $title = $this->input->post('titleTopic');
                $title_en = $this->input->post('titleTopic_en');
                $status = $this->input->post('statusTopic');
                $data = array(
                    'title' => $title,
                    'title_en' => $title_en,
                    'status' => $status
                );
                if ($this->Help_topic_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại');
                }
                redirect(base_url('admin/helps/topic'));
            }
            $input = array(
                'where' => array(
                    'topic_id' => $id,
                )
            );
            $data['title'] = 'Chỉnh sửa topic';
            $data['info'] = $this->Help_topic_model->get_row($input);
            $data['temp'] = 'admin/Help/topic/edit';
            $this->load->view('admin/layout', (isset($data)) ? $data : NULL);
        }
    }
    
    function deleteTag($id = -1) {
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

    function save($id = -1) {
        if ($id > 0) {
            $data = array(
                'email_title' => $this->input->post('title_email') ? trim($this->input->post('title_email')) : '',
                "description" => $this->input->post('edit_email') ? trim($this->input->post('edit_email')) : '',
                'email_type' => $this->input->post('type_email') ? trim($this->input->post('type_email')) : '',
            );
            if ($this->Email_model->update($id, $data))
                echo json_encode(array('success' => true, 'message' => $data['description']));
            else {
                echo json_encode(array('success' => FALSE, 'message' => 'error_email_update'));
            }
        }
    }

    function contact() {
        $this->load->library('pagination');
        $total = $this->Email_model->get_total();

        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = admin_url('Helps/index');
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

        $input = array();
        $input['limit'] = array($config['per_page'], $start);
        $data['start'] = $start;
        $input['order'] = array('help_id', 'ASC');

        $message = $this->session->flashdata();
        $data['message'] = $message;
        $list = $this->db->from('email_history')
                        ->where('type', 'contact')
                        ->get()->result();
        if (!empty($info))
            $data['list'] = $list;
        $data['total'] = $total;
        $data['title'] = 'Danh sách email';
        $data['temp'] = 'admin/helps/contact';
        $this->load->view('admin/layout', (isset($data)) ? $data : NULL);
    }

    function createPostGuide() {

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post()) {
            $this->form_validation->set_rules('titlePostGuide', 'Tiêu đề', 'trim|required');
            $this->form_validation->set_rules('titlePostGuide_en', 'Tiêu đề(en)', 'trim|required');
            $this->form_validation->set_rules('contentPostGuide', 'Nội dung', 'trim|required');
            $this->form_validation->set_rules('contentPostGuide_en', 'nội dung(en)', 'trim|required');
            $this->form_validation->set_rules('tags', 'tag', 'trim|required');
            $this->form_validation->set_rules('topicPostGuide', 'Topic', 'trim|required|numeric|callback_checkTopic');
            if ($this->form_validation->run()) {
                $title = $this->input->post('titlePostGuide');
                $content = $this->input->post('contentPostGuide');
                $title_en = $this->input->post('titlePostGuide_en');
                $content_en = $this->input->post('contentPostGuide_en');
                $status = $this->input->post('statusPostGuide');
                $tag = $this->input->post('tags');
                $topic_id = intval($this->input->post('topicPostGuide'));
                $data = array(
                    'title' => $title,
                    'content' => $content,
                    'title_en' => $title_en,
                    'content_en' => $content_en,
                    'status' => $status,
                    'tags' => $tag,
                    'topic_id' => $topic_id
                );
                if ($this->Help_postGuide_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                }
                redirect(base_url('admin/helps/postGuide'));
            } else {
                pre(validation_errors());
                return;
            }
        }
        $data['title'] = 'Thêm mới text';
        $data['temp'] = 'admin/help/postGuide/create';
        $data['topics'] = $this->Help_topic_model->get_list(array('where' => array('status' => 1)));
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    function postGuide() {
        $this->load->library('pagination');
        $this->load->model('Help_postGuide_model');
        $total = $this->Help_postGuide_model->get_total();
        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = admin_url('Helps/postGuide');
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

        $input = array();
        $input['limit'] = array($config['per_page'], $start);
        $data['start'] = $start;
        $input['order'] = array('post_guide_id', 'ASC');

        $message = $this->session->flashdata();
        $data['message'] = $message;
        $list = $this->db->from('help_post_guide')
                        ->select('help_post_guide.*,help_topic.title as topic_title')
                        ->join('help_topic', 'help_topic.topic_id=help_post_guide.topic_id')
                        ->get()->result();
        $tags = array();
        foreach ($list as $line => $row) {
            $tmpTags = $row->tags;
            if ($tmpTags != '')
                $tmpTags = explode(',', $tmpTags);
            $_tags = $this->db->from('help_tag')
                            ->where_in('tag_id', $tmpTags)
                            ->get()->result();
            foreach ($_tags as $_tag) {
                $tags[$line] = $_tag->name . ',';
            }
        }
        $data['total'] = $total;
        $data['list'] = $list;
        $data['tags'] = $tags;
        $data['title'] = 'Danh sách bài viết';
        $data['temp'] = 'admin/Help/postGuide/index';
        $this->load->view('admin/layout', (isset($data)) ? $data : NULL);
    }

    function editPostGuide($id = -1) {
        if ($id > 0) {
            if ($this->input->post('submit')) {
                $title = $this->input->post('titlePostGuide');
                $content = $this->input->post('contentPostGuide');
                $title_en = $this->input->post('titlePostGuide_en');
                $content_en = $this->input->post('contentPostGuide_en');
                $status = $this->input->post('statusPostGuide');
                $tag = $this->input->post('tags');
                $data = array(
                    'title' => $title,
                    'content' => $content,
                    'title_en' => $title_en,
                    'content_en' => $content_en,
                    'status' => $status,
                    'tag' => $tag,
                );
                if ($this->Help_postGuide_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại');
                }
                redirect(base_url('admin/helps/postGuide'));
            }
            $input = array(
                'where' => array(
                    'postGuide_id' => $id,
                )
            );
            $data['title'] = 'Chỉnh sửa bài viết';
            $data['info'] = $this->Help_postGuide_model->get_row($input);
            $data['temp'] = 'admin/Help/postGuide/edit';
            $this->load->view('admin/layout', (isset($data)) ? $data : NULL);
        }
    }

    function tag() {
        $this->load->library('pagination');
        $total = $this->Help_tag_model->get_total();
        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = admin_url('Helps/tag');
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

        $input = array();
        $input['limit'] = array($config['per_page'], $start);
        $data['start'] = $start;
        $input['order'] = array('tag_id', 'ASC');

        $message = $this->session->flashdata();
        $data['message'] = $message;
        $list = $this->Help_tag_model->get_list();
        $data['total'] = $total;
        $data['list'] = $list;
        $data['title'] = 'Danh sách bài viết';
        $data['temp'] = 'admin/Help/tag/index';
        $this->load->view('admin/layout', (isset($data)) ? $data : NULL);
    }

    function suggest_tag() {
        $this->load->model('Help_tag_model');
        $keyword = onlyCharacter(securityServer($this->input->get('term')));
        $tags = onlyCharacter(securityServer($this->input->get('Tags')));
        $listTag = explode(',', $tags);
        if (trim($tags) != '') {
            foreach ($listTag as &$row) {
                $row = intval($row);
            }
            $listTag = array_unique($listTag);
        }
        $result = array();
        /* Check empty keyword */
        if (empty($keyword)) {
            echo json_encode($result);
            return;
        }
        $this->db->from('help_tag')
                ->select('tag_id, name')
                ->like('name', $keyword);
        if (count($listTag) > 0) {
            $this->db->where_not_in('tag_id', $listTag);
        }
        $result = $this->db->get()->result();
        echo json_encode($result);
        exit;
    }

    function checkTopic($topicID) {
        $topicID = intval(onlyCharacter(securityServer($topicID)));
        $result = $this->Help_topic_model->get_row(array('where' => array('topic_id' => $topicID)));
        if (empty($result)) {
            $this->form_validation->set_message('checkLogin', 'không đúng.');
            return false;
        }
        return true;
    }

    function statusPostGuide() {
        $id = intval($this->input->post('id'));
        $data = $this->Help_postGuide_model->changeStatus($id);
        if (isset($data['error']))
            return $data['error'];
        else
            return array('success' => TRUE);
        exit;
    }
    
    function statusTopic() {
        $id = intval($this->input->post('id'));
        $data = $this->Help_topic_model->changeStatus($id);
        if (isset($data['error']))
            return $data['error'];
        else
            return array('success' => TRUE);
        exit;
    }
    

}

?>