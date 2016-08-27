<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $current_language = $this->session->userdata('language');
        if (empty($current_language)) {
            $current_language = 'vietnamese';
        }
    }

    public function index($id = -1) {
        $id = intval(securityServer($id));
        $data = array();
        if ($id > 0) {
            $info = $this->db->from('news')
                    ->order_by('update', 'DESC')
                    ->where('news_id', $id)
                    ->get()
                    ->row();

            if (!empty($info)) {
                $data['info'] = $info;
                $data['release'] = $this->db->from('news')
                        ->where('news_category_id', $info->news_category_id)
                        ->order_by('update', 'DESC')
                        ->get()
                        ->result();
            }
        } else {
            // get about from new category have new category_id=1
            $info = $this->db->from('news')
                    ->where('news_category_id', '1')->where('news.status', '1')
                    ->order_by('update', 'DESC')
                    ->get()
                    ->result();
            if (!empty($info))
                $data['info'] = $info;
        }
        $newsCategory = $this->db->from('news_category')
                        ->get()->result();
        if (!empty($newsCategory))
            $data['newsCategory'] = $newsCategory;
        $data['temp'] = 'site/contact/index';
        $this->load->view('site/contact/index', isset($data) ? ($data) : null);
    }

}

?>