<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_room_model extends MY_Model {

    var $table = 'order';
    var $key = 'order_id';

    function get_list_room($input =array()) {
        $this->db->from('order');
        $this->db->join('user', 'user.user_id=order.user_id');
        $this->db->join('post_room', 'post_room.post_room_id = order.post_room.post_room_id');
        if($input)
            $this->get_list_set_input($input);
        return $this->db->get();
    }
    function get_profit_no_search($userInfo,$limit,$start) {
        $this->db->from('order');
        $this->db->join('post_room','order.post_room_id=post_room.post_room_id');
        if($userInfo->role_id==2)
            $this->db->where('post_room.user_id',$userInfo->user_id);
        $this->db->where('order.refer_id!=',0);
        $this->db->join('user','post_room.user_id=user.user_id');
        $this->db->limit($limit,$start);
        $this->db->order_by('order_id','DESC');
        return $this->db->get();
    }

    // kiểm tra xem phòng đã được đặt hay chưa
    // true: đã ton tai
    // false: chưa tồn tại
    function check_exists_room($id, $checkin, $checkout) {
        if (!$this->check_exists(array('post_room_id'=> $id)))
            return FALSE;
        $this->db->from('order');
//                $this->db->or_where('checkin<=',$checkout);
//                $this->db->or_where('checkout>=',$checkin);
        $this->db->where('post_room_id', $id);
        $result = $this->db->get()->result();
        $date1 = new DateTime();
        $date2 = new DateTime();
        foreach ($result as $key => $value) {
            $date1->setDate(
                    date('Y', strtotime($value->checkin)), date('m', strtotime($value->checkin)), date('d', strtotime($value->checkin))
            );
            $date2->setDate(
                    date('Y', strtotime($value->checkout)), date('m', strtotime($value->checkout)), date('d', strtotime($value->checkout))
            );
            if (($checkout < $date1 && ($checkin <= $checkout)) || ($checkin <= $checkout) && ($checkin > $date2))
                continue;
            else
                return TRUE;
        }
        return FALSE;
    }
    
    function get_total_no_search($userInfo=array()){
        $this->db->from('order');
        $this->db->join('post_room','order.post_room_id=post_room.post_room_id');
        if($userInfo->role_id==2)
            $this->db->where('post_room.user_id',$userInfo->user_id);
        $this->db->where('order.refer_id!=',0);
        $this->db->join('user','order.user_id=user.user_id');
        $this->db->order_by('order_id','DESC');
        return $this->db->get()->num_rows();
    }
    
    function get_total_search($search,$userInfo=array()){
        $this->db->from('order');
        $this->db->join('post_room','order.post_room_id=post_room.post_room_id');
        if($userInfo->role_id==2)
            $this->db->where('post_room.user_id',$userInfo->user_id);
        $this->db->where('order.refer_id!=',0);
        if(is_array($search)&&isset($search['user_name'])){
            $this->db->join('user','post_room.user_id=user.user_id');
            $this->db->like('user.user_name',$search['user_name']);
        }
        if(is_array($search)&&isset($search['post_room_name'])){
            $this->db->like('post_room_name_ascii', $search['post_room_name']);
        }
        $this->db->order_by('order_id','DESC');
    }
    
    function get_list_no_search($userInfo=array(),$limit,$start){
        $this->db->from('order');
        $this->db->join('post_room','order.post_room_id=post_room.post_room_id');
        if($userInfo->role_id==2)
            $this->db->where('post_room.user_id',$userInfo->user_id);
        $this->db->where('order.refer_id!=',0);
        $this->db->join('user','order.user_id=user.user_id');
        $this->db->limit($limit,$start);
        $this->db->order_by('order_id','DESC');
        return $this->db->get();
    }
    
    function get_profit_search($userInfo=array()){
        $this->db->from('order');
        $this->db->join('post_room','order.post_room_id=post_room.post_room_id');
        if($userInfo->role_id==2)
            $this->db->where('post_room.user_id',$userInfo->user_id);
        $this->db->where('order.refer_id!=',0);
        if(is_array($search)&&isset($search['user_name'])){
            $this->db->join('user','post_room.user_id=user.user_id');
            $this->db->like('user.user_name',$search['user_name']);
        }
        if(is_array($search)&&isset($search['post_room_name'])){
            $this->db->like('post_room_name_ascii', $search['post_room_name']);
        }
        $this->db->order_by('order_id','DESC');
    }
    
    function _get_list($userInfo, $search=array(),$order_id=-1,$limit=10000,$start=0){
        $this->db->from('order');
        $this->db->join('post_room','order.post_room_id=post_room.post_room_id');
        if(isset($userInfo)&&$userInfo->role_id==2)
            $this->db->where('post_room.user_id',$userInfo->user_id);
        $this->db->where('order.refer_id!=',0);
        if($order_id>0){
            $this->db->join('user','order.user_id=user.user_id');
            $this->db->where_in('order_id',$order_id);
        }else{
        if(isset($search['user_name'])){
            $this->db->join('user','order.user_id=user.user_id');
            $this->db->like('user.user_name',$search['user_name']);
        }else{
            $this->db->join('user','order.user_id=user.user_id');
        }
        }
        if(isset($search['post_room_name'])){
            $this->db->like('post_room_name_ascii', $search['post_room_name']);
        }
        if(isset($search['status'])&&convert_accented_characters($search['status'])=='paid'){
            $this->db->where('payment_status', 1);
        }else if(isset($search['status'])) $this->db->where('payment_status', 0);
//        if($order_id>0){
//            $this->db->where('order_id',$order_id);
//        }
        $this->db->order_by('order_id','DESC');
        $this->db->limit($limit,$start);
        return $this->db->get();
    }
    
    function _get_total($userInfo, $search=array(),$order_id=-1){
        $this->db->from('order');
        $this->db->join('post_room','order.post_room_id=post_room.post_room_id');
        if(isset($userInfo)&&$userInfo->role_id==2)
            $this->db->where('post_room.user_id',$userInfo->user_id);
        $this->db->where('order.refer_id!=',0);
        if(isset($search['user_name'])){
            $this->db->join('user','post_room.user_id=user.user_id');
            $this->db->like('user.user_name',$search['user_name']);
        }else{
            $this->db->join('user','order.user_id=user.user_id');
        }
        if(isset($search['post_room_name'])){
            $this->db->like('post_room_name_ascii', $search['post_room_name']);
        }
        if(isset($search['status'])&&convert_accented_characters($search['status'])=='paid'){
            $this->db->where('payment_status', 1);
        }else if(isset($search['status'])) $this->db->where('payment_status', 0);
        if($order_id>0){
            $this->db->where('order_id',$order_id);
        }
        $this->db->order_by('order_id','DESC');
        return $this->db->get()->num_rows();
    }
    
    function _get_profit($userInfo, $search=array(),$order_id=-1,$limit=10000,$start=0){
//        $this->db->select('user.*');
        $this->db->from('order');
        $this->db->join('post_room','order.post_room_id=post_room.post_room_id');
        if(isset($userInfo)&&$userInfo->role_id==2)
            $this->db->where('post_room.user_id',$userInfo->user_id);
        $this->db->where('order.refer_id!=',0);
        $this->db->join('user','post_room.user_id=user.user_id');
        if(isset($search['user_name'])){
            $this->db->like('user.user_name',$search['user_name']);
        }
        if(isset($search['post_room_name'])){
            $this->db->like('post_room_name_ascii', $search['post_room_name']);
        }
        if(isset($search['status'])&&convert_accented_characters($search['status'])=='paid'){
            $this->db->where('payment_status', 1);
        }else if(isset($search['status'])) $this->db->where('payment_status', 0);
        if($order_id>0){
            $this->db->where('order_id',$order_id);
        }
        $this->db->order_by('order_id','DESC');
        $this->db->limit($limit,$start);
        return $this->db->get();
    }
    
}

?>