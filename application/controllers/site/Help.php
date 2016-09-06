<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Help_topic_model');
        $this->load->model('Help_tag_model');
        $this->load->model('Help_postGuide_model');
        
    }

    public function index() {
        $data['topics'] = $this->db->from('help_topic')
                ->where('help_topic.status',1)
                ->get()->result();
        if(!empty($data['topics'])){
            $topic1 = array();
            $topic2 = array();
            $nTopics = count($data['topics']);
                $topic1 = array_slice($data['topics'], 0, ceil($n / 2));
                $topic2 = array_slice($data['topics'], ceil($n / 2));
        }
        $data['post_guides'] = $this->db->from('help_post_guide')
                ->select('help_post_guide.*,help_topic.title as topic_title')
                ->where('help_post_guide.status',1)->where('help_topic.status',1)
                ->join('help_topic','help_topic.topic_id=help_post_guide.topic_id','right')
                ->get()->result();
        pre($this->db->last_query());
                return;
        $data['temp'] = ('site/help/index');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }
}
