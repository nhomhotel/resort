<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_room_model extends MY_Model {

    var $table = 'post_room';
    var $key = 'post_room_id';

    function getListInfo($input = array()) {
        if (count($input) > 0) {
            $this->db->from("address");
            $this->db->join('post_room', 'address.address_id=post_room.address_id');
            if (isset($input['location']) && $input['location'] != NULL)
                $this->db->or_like('address.address_detail_ascii', $input['location']);
            if (isset($input['guest']) && $input['guest'] != NULL)
                $this->db->where('post_room.num_guest>=', $input['guest']);
//                        $this->db->or_like('lower(district_ascii)', $query); 
//                        $this->db->or_like('lower(provincial_ascii)', $query); 
//                        $this->db->or_like('lower(country_ascii)', $query);
        }
//			$this->db->select('post_room.*,b.address_detail,c.user_name, d.house_type_name,e.room_type_name, f.role_name');
//			$this->db->from($this->table);
//			$this->get_list_set_input($input);
//			$this->db->join('address b','post_room.address_id = b.address_id');
        $this->db->join('user c', 'post_room.user_id = c.user_id', 'left');
        $this->db->join('house_type d', 'post_room.house_type = d.house_type_id');
        $this->db->join('room_type e', 'post_room.room_type = e.room_type_id');
        $this->db->join('role f', 'c.role_id = f.role_id', 'left');
        $query = $this->db->get();
//                        echo $this->db->last_query();
        if ($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getInfoDetail($id, $input = array()) {

        $this->db->select('post_room.*,b.address_detail,b.lat,b.lng,c.last_name,c.first_name,c.user_name,c.created as user_created, d.house_type_name, d.house_type_name_en, e.room_type_name, e.room_type_name_en');
        $this->db->from($this->table);
        $this->get_list_set_input($input);
        $this->db->join('address b', 'post_room.address_id = b.address_id');
        $this->db->join('user c', 'post_room.user_id = c.user_id', 'left');
        $this->db->join('house_type d', 'post_room.house_type = d.house_type_id');
        $this->db->join('room_type e', 'post_room.room_type = e.room_type_id');
        $this->db->where($this->key, $id);
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->row();
        } else {
            return false;
        }
    }

    function search($search_input = array(), $limit = 1000, $start = 0, $house_type = array(), $size_type = array(), $amenities = array(), $price_range = array(), $experience = array()) {
        $this->db->select('post_room.*,house_type.house_type_name,house_type.house_type_id,address.address_detail,room_type.room_type_name');
        $this->db->from('post_room');
        $this->db->join('address', 'address.address_id = post_room.address_id');
        $this->db->join('room_type', 'room_type.room_type_id=post_room.room_type');
        $this->db->join('house_type', 'house_type.house_type_id=post_room.house_type');
        $this->db->join('order', 'order.post_room_id=post_room.post_room_id', 'left');
        $this->db->join('user c', 'post_room.user_id = c.user_id', 'left');
        $this->db->join('role f', 'c.role_id = f.role_id', 'left');
        if (isset($search_input) && count($search_input) > 0) {
            if (isset($search_input['location']) && trim($search_input['location']) != '') {
                $query = explode(', ', $search_input['location']);
                if (count($query) >= 3) {
                    $this->db->where('lower(address_street_ascii) like \'%' . $query[0] . '%\' or ' . 'lower(district_ascii) like \'%' . $query[0] . '%\'');
                    $this->db->where('lower(provincial_ascii) like \'%' . $query[1] . '%\'');
                    $this->db->where('lower(country_ascii) like \'%' . $query[2] . '%\'');
                } elseif (count($query) == 2) {
                    $this->db->where('lower(address_street_ascii) like \'%' . $query[0] . '%\' or ' . 'lower(provincial_ascii) like \'%' . $query[0] . '%\'');
                    $this->db->where('lower(country_ascii) like \'%' . $query[1] . '%\'');
                } else {
                    $this->db->where('lower(address_street_ascii) like \'%' . $query[0] . '%\' or ' . 'lower(district_ascii) like \'%' . $query[0] . '%\'  or ' . 'lower(provincial_ascii) like \'%' . $query[0] . '%\' or ' . 'lower(country_ascii) like \'%' . $query[0] . '%\'');
                }
            }
            if (isset($search_input['guest']) && trim($search_input['guest']) != '') {
                $this->db->where('post_room.num_guest>=', trim($search_input['guest']));
            }
            if (isset($search_input['bedroom']) && trim($search_input['bedroom']) != '') {
                $this->db->where('post_room.num_bedroom', trim($search_input['bedroom']));
            }
            if (isset($search_input['beds']) && trim($search_input['beds']) != '') {
                $this->db->where('post_room.num_bed', trim($search_input['beds']));
            }
        }
        $this->db->group_by('post_room.post_room_id');
        $this->db->limit($limit);
        $this->db->offset($start);
        return $this->db->get();
    }

    function getListInfo_where($input = array()) {

        $this->db->select('tbl_post_room.*,b.address_detail,c.user_name, d.house_type_name,e.room_type_name, f.role_name');
        $this->db->from($this->table);
        $this->get_list_set_input($input);
        $this->db->join('tbl_address b', 'tbl_post_room.address_id = b.address_id');
        $this->db->join('tbl_user c', 'tbl_post_room.user_id = c.user_id', 'left');
        $this->db->join('tbl_house_type d', 'tbl_post_room.house_type = d.house_type_id');
        $this->db->join('tbl_room_type e', 'tbl_post_room.room_type = e.room_type_id');
        $this->db->join('tbl_role f', 'c.role_id = f.role_id', 'left');
        $query = $this->db->get();
        if ($query->num_rows()) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function deleteAmenities($amenityID){
        $this->db->from('post_room');
            $this->db->like ("CONCAT(',',amenities,',')",','.$amenityID.',');
        $resultAmenities = $this->db->get()->result();
        if(empty($resultAmenities))return FALSE;
        foreach ($resultAmenities as &$value){
            $tmpAmenities = @explode(',', $value->amenities);
            $search = array_search($amenityID, $tmpAmenities);
            if(!$search &&$search>=0){
                unset($tmpAmenities[$search]);
            }
            $value->amenities = implode(',', $tmpAmenities);
        }
        $dataUpdateAmenities = array();
        foreach ($resultAmenities as $value1){
            $dataUpdateAmenities[] = array(
                'amenities'=>$value1->amenities,
                'post_room_id'=>$value1->post_room_id
            );
        }
        if($this->db->update_batch('post_room', $dataUpdateAmenities, 'post_room_id'))return true;
        else RETURN false;
    }
    
    public function deleteListAmenities($arrAmenitiesID){
        if(!empty($arrAmenitiesID)){
            $arrAmenitiesID = array_unique($arrAmenitiesID);
             $this->db->from('post_room');
            foreach ($arrAmenitiesID as &$value){
                $value = intval($value);
                $this->db->like ("CONCAT(',',amenities,',')",','.$value.',');
            }
            $resultAmenities = $this->db->get()->result();
            if(empty($resultAmenities))return FALSE;
            foreach ($resultAmenities as &$value){
                $tmpAmenities = @explode(',', $value->amenities);
                foreach ($arrAmenitiesID as $value1){
                    $search = array_search($value1, $tmpAmenities);
                    if($search!==FALSE&&$search>=0){
                        unset($tmpAmenities[$search]);
                    }
                }
                $value->amenities = implode(',', $tmpAmenities);
            }
            $dataUpdateAmenities = array();
            foreach ($resultAmenities as $value2){
                $dataUpdateAmenities[] = array(
                    'amenities'=>$value2->amenities,
                    'post_room_id'=>$value2->post_room_id
                );
            }
            if($this->db->update_batch('post_room', $dataUpdateAmenities, 'post_room_id'))return true;
            else RETURN false;
        }
    }

}

?>