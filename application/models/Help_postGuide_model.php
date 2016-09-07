<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Help_postGuide_model extends MY_Model {

    var $table = 'help_post_guide';
    var $key = 'post_guide_id';
    function deleteTag($tagID){
        $resultTag = $this->db->from($this->table)
                ->like ("CONCAT(',',tags,',')",','.$tagID.',')
                ->get()->result();
        if(empty($resultTag))return FALSE;
        foreach ($resultTag as &$value){
            $tmpTag = @explode(',', $value->tags);
            $search = array_search($tagID, $tmpTag);
            if(!$search &&$search>=0){
                unset($tmpTag[$search]);
            }
            $value->tags = implode(',', $tmpTag);
        }
        $dataUpdateTag = array();
        foreach ($resultTag as $value1){
            $dataUpdateTag[] = array(
                'tags'=>$value1->tags,
                'post_guide_id'=>$value1->post_guide_id
            );
        }
        if($this->db->update_batch($this->table, $dataUpdateTag, $this->key))return true;
        else RETURN false;
    }
    
    public function deleteListTag($arrTagID){
        if(!empty($arrTagID)){
            $arrTagID = array_unique($arrTagID);
             $this->db->from($this->table);
            foreach ($arrTagID as &$value){
                $value = intval($value);
                $this->db->like ("CONCAT(',',tags,',')",','.$value.',');
            }
            $resultTags = $this->db->get()->result();
            if(empty($resultTags))return FALSE;
            foreach ($resultTags as &$value){
                $tmpTags = @explode(',', $value->tags);
                foreach ($arrTagID as $value1){
                    $search = array_search($value1, $tmpTags);
                    if($search!==FALSE&&$search>=0){
                        unset($tmpTags[$search]);
                    }
                }
                $value->tags = implode(',', $tmpTags);
            }
            $dataUpdateTags = array();
            foreach ($resultTags as $value2){
                $dataUpdateTags[] = array(
                    'tags'=>$value2->tags,
                    'post_guide_id'=>$value2->post_guide_id
                );
            }
            if($this->db->update_batch($this->table, $dataUpdateTags, $this->key))return true;
            else RETURN false;
        }
    }

}
