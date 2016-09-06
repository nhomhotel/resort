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
        $data['language'] = getLanguage();
        $data['topics'] = $this->db->from('help_topic')
                ->where('help_topic.status',1)
                ->get()->result();
        if(!empty($data['topics'])){
            $topic1 = array();
            $topic2 = array();
            $nTopics = count($data['topics']);
            if($nTopics==1)$topic1 = $data['topics'];
            else{
            $topic1 = array_slice($data['topics'], 0, ceil($nTopics / 2));
            $topic2 = array_slice($data['topics'], ceil($nTopics / 2));
            }
            $topic1_key = array();
            $topic2_key = array();
            foreach ($topic1 as $row){
                $topic1_key[] = $row->topic_id;
            }
            foreach ($topic2 as $row){
                $topic2_key[] = $row->topic_id;
            }
        }
        $data['post_guides_topic1'] = $this->db->from('help_post_guide')
                ->select('help_post_guide.*,help_topic.title as topic_title,help_topic.title_en as topic_title_en')
                ->where('help_post_guide.status',1)->where('help_topic.status',1)
                ->where_in('help_post_guide.topic_id',$topic1_key)
                ->join('help_topic','help_topic.topic_id=help_post_guide.topic_id','right')
                ->get()->result();
        if(!empty($topic2_key)){
            $data['post_guides_topic2'] = $this->db->from('help_post_guide')
                ->select('help_post_guide.*,help_topic.title as topic_title,help_topic.title_en as topic_title_en')
                ->where('help_post_guide.status',1)->where('help_topic.status',1)
                ->where_in('help_post_guide.topic_id',$topic2_key)
                ->join('help_topic','help_topic.topic_id=help_post_guide.topic_id','right')
                ->get()->result();
        }
//        pre($data);return;
        $data['temp'] = ('site/help/index');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }
    
    public function viewTopic($topicID){
        $data['language'] = getLanguage();
        $topicID = intval(onlyCharacter(securityServer($topicID)));
        $data['help_topic'] = $this->db->from('help_post_guide')
                ->select('help_post_guide.*,help_topic.title as topic_title,help_topic.title_en as topic_title_en')
                ->where('help_post_guide.status',1)->where('help_topic.status',1)
                ->where('help_post_guide.topic_id',$topicID)
                ->join('help_topic','help_topic.topic_id=help_post_guide.topic_id','right')
                ->get()->result();
        $data['temp'] = ('site/help/topic');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }
    
    public function viewArticle($articleID){
        $data['language'] = getLanguage();
        $topicID = intval(onlyCharacter(securityServer($articleID)));
        $data['help_article'] = $this->db->from('help_post_guide')
                ->select('help_post_guide.*,help_topic.title as topic_title,help_topic.title_en as topic_title_en')
                ->where('help_post_guide.status',1)->where('help_topic.status',1)
                ->where('help_post_guide.post_guide_id',$articleID)
                ->join('help_topic','help_topic.topic_id=help_post_guide.topic_id','right')
                ->get()->row();
//        pre($data);
//                return;
        $data['temp'] = ('site/help/article');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }
    
    public function search(){
        $data = array();
        $data['language'] = getLanguage();
        $q = onlyCharacter(securityServer($this->input->get('q')),2);
        $data['question'] = $q;
        $tags = explode(' ', $q);
        $this->db->from('help_tag');
        foreach ($tags as $row){
            $this->db->like('name',$row);
        }
        $listTag = $this->db->get()->result();
        $tagID = array();
        foreach ($listTag as $row){
            $tagID[] = ','.$row->tag_id.',';
        }
        if(empty($tagID)){
            $data['listArticle'] = null;
        }
        else{
            $this->db->from('help_post_guide');
            $this->db->where_in('CONCAT(",",tags,",")',$tagID);
            $listArticle = $this->db->get()->result();
            if(!empty($listArticle)){
                $data['listArticle'] = $listArticle;
            }
        }
        $data['temp'] = ('site/help/search');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }
}
