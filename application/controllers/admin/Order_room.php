<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class Order_room extends AdminHome {
    function __construct() {
        parent::__construct(get_class());
        $this->load->model('Order_room_model');
    }

    function index() {
        $this->load->library('pagination');
        $user = $this->User_model->get_logged_in_employee_info();
        $input = array();
        if($user==null || $user==''){
            redirect(admin_url('login'));
        }
        $role_id = $user->role_id;
        if ($role_id == 3) {
            $this->session->destroy();
            redirect(admin_url('login'));
        } elseif ($role_id == 2) {

            $input['where'] = array('post_room.user_id'=> $user->user_id);
        }
        
        $filters = array();
        $search = array();
        if (!empty($_GET)) {
            $params = $_GET;
            foreach ($params as $key => $value) {
                $data[$key] = securityServer($value);
                if ($key != 'page'&&$data[$key]!='') {
                    $filters[] = $key . '=' . $value;
                    $search[$key] = $value;
                }
            }
        }
        //phần chung
        $input['where']['refer_id!='] =0; 
        $post_room_name = onlyCharacter(securityServer($this->input->get('post_room_name')));
        if ($post_room_name) {
            $input['like'] = array('post_room_name_ascii', $post_room_name);
        }
        $user_name = onlyCharacter(securityServer($this->input->get('user_name')));
        if ($user_name) {
            $join['user'] = 'post_room.user_id::user_id';
            $input['like'] = array('user_name', $user_name);
        }
        $total = $this->Order_room_model->_get_total($user,$search);
        
        
        $config = array();
        $config["total_rows"] = $total;
        $config['base_url'] = base_url('admin/order_room/index?'.  implode('&', $filters));
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['per_page'] = $this->config->item('item_per_page_system')?$this->config->item('item_per_page_system'):10;;
        $config['uri_segment'] = 4;
        $config['next_link'] = 'Trang kế tiếp';
        $config['prev_link'] = 'Trang trước';
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = securityServer($this->input->get('page'))?intval(securityServer($this->input->get('page'))):1;
        if ($page>1) {
            $segment = $page;
        } else {
            $segment = 1;
        }
        $segment = (int) $segment;
        $start = ($segment - 1) * $config['per_page'];
        $pagination_link = $this->pagination->create_links();
        $data['pagination_link'] = $pagination_link;

        $message = $this->session->flashdata();
        $data['message'] = $message;
        $input['limit'] = array($config['per_page'], $start);
        $data['start'] = $start;
        $input['order'] = array('order_id', 'ASC');
        $list = $this->Order_room_model->_get_list($user,$search,$config['per_page'],$start)->result();
        $data['profit'] = $this->Order_room_model->_get_profit($user,$search,$config['per_page'],$start)->result();
        $data['total'] = $total;
        $data['list'] = $list;
        $data['user'] = $user;
        $data['title'] = 'Danh sách phòng đã đặt';
        $data['temp'] = 'admin/order_room/index';
        $data['table_body_order'] = $this->load->view('admin/order_room/table_body_order',$data,true);
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }
    
    function paymentStatus(){
        $id  = intval($this->input->post('id'));
        $field = 'payment_status';

        $statusInfo = $this->Order_room_model->get_info($id, $field);
        if (!$statusInfo) {
            echo json_encode(array('message'=> 'Không tồn tại bản ghi!'));
        } else {
            if ($statusInfo->payment_status == 1)
                $data = array('payment_status' => 0,);
            
                else $data = array('payment_status' => 1,);
        }
        if ($this->Order_room_model->update($id, $data)) {
            echo json_encode(array('status'=> true));
        }
        exit;
    }
    
    function suggest_name_room(){
        $this->load->model('Order_room_model');
        $user = $this->User_model->get_logged_in_employee_info();
        $keyword = onlyCharacter(securityServer($this->input->get('term')));
        $result = array();

        /* Check empty keyword */
        if (empty($keyword)) {
            echo json_encode($result);
            return;
        }
        
;        $input = array();
        if(count($user)>0&&$user->role_id==2){
            $input['where'] = array('user_id'=>$user->user_id);
        }
        $input['like'] = array('post_room_name_ascii',$keyword);
        $input['group_by']='post_room.post_room_id';
        $select = array('post_room.post_room_id','post_room_name');
        $join = array('post_room'=>'post_room.post_room_id::order.post_room_id');
        $data = $this->Order_room_model->get_list($input,$join,$select);
        echo json_encode($data);
        exit;
    }
    
    function suggest_user_name(){
        $this->load->model('Order_room_model');
//        $this->load->model('Post_room_model');
        $user = $this->User_model->get_logged_in_employee_info();
        $keyword = onlyCharacter(securityServer($this->input->get('term')));
        $result = array();

        /* Check empty keyword */
        if (empty($keyword)) {
            echo json_encode($result);
            return;
        }
        
;        $input = array();
        if(count($user)>0&&$user->role_id==2){
            $input['where'] = array('user_id'=>$user->user_id);
        }
        $input['like'] = array('user_name',$keyword);
        $this->db->distinct();
        $select = array('user_name');
        $join = array('post_room'=>'order.post_room_id::post_room.post_room_id', 'user'=>'post_room.user_id::user.user_id');
        $data = $this->Order_room_model->get_list($input,$join,$select);
        echo json_encode($data);
        exit;
    }
    
    function do_payment(){
        $user = $this->User_model->get_logged_in_employee_info();
        if(!$user)redirect (admin_url('login'));
        $ids=$this->input->post('arrId');
        if(!is_array($ids)){
            echo json_encode(array('success'=>'false','message'=>'Đơn hàng không hợp lệ<br/>xin thử lại'));
            exit;
        }
        $data = array();
        foreach ($ids as $id){
            $data['ids'][] = intval(securityServer($id));
        }
        if($user->role_id==2){
            echo json_encode(array('success'=>false,'message'=>'Bạn không có quyền sử dụng chức năng này'));
            exit;
        }
        $data_check = $this->db->from('order')
                ->join('post_room','order.post_room_id=post_room.post_room_id')
                ->where('payment_status',1)->where('refer_id!=',0)->where_in('order_id',$data['ids'])->get()->num_rows();
        if($data_check>0){
            echo json_encode(array('success'=>false,'message'=>'Đã có những đơn hàng đã thanh toán trước đó<br/>Đề nghị thử lại'));
            exit;
        }
        $data_check = $this->db->distinct()->select('post_room.user_id')->from('order')
                ->join('post_room','order.post_room_id=post_room.post_room_id')
                ->where('refer_id!=',0)->where_in('order_id',$data['ids'])->get();
//        echo json_encode(array('1'=>$this->db->last_query()));exit;
        if($data_check->num_rows() !=1){
            echo json_encode(array('success'=>false,'message'=>'Chỉ thanh toán được những đơn hàng của cùng 1 đối tác.<br/>Xin thử lại'));
            exit;
        }
        $data['total_payment'] = $this->db->select('SUM(payment_type) as total_money')->from('order')->where_in('order_id',$data['ids'])->get()->row();
        $data['doitac'] =$this->db->from('user')->select('user_name,profit_rate')->where('user_id',$data_check->result()[0]->user_id)->get()->row();
        $data['token']=  md5($user->user_name.$user->user_name);
        $data['payment'] = $this->load->view('admin/order_room/paymentConfirmation',$data,true);
        echo json_encode(array('success'=>true,'message'=>$data));
        exit;
    }
    
    function do_bill(){
        $this->load->library('Payment_library');
        $user = $this->User_model->get_logged_in_employee_info();
        if(!$user)redirect (admin_url('login'));
        $ids=$this->input->post('arrId');
        if(!is_array($ids)){
            echo json_encode(array('success'=>false,'message'=>'Đơn hàng không hợp lệ<br/>xin thử lại'));
            exit;
        }
        $idFix = array();
        foreach ($ids as $id){
            $idFix[] = intval(securityServer($id));
        }
        $id=  intval(securityServer($ids[0]));
        if($user->role_id==2){
            echo json_encode(array('success'=>false,'message'=>'Bạn không có quyền sử dụng chức năng này'));
            exit;
        }
        $data_check = $this->db->distinct()->select('post_room.user_id')->from('order')
            ->join('post_room','post_room.post_room_id=order.post_room_id')->join('user','user.user_id=post_room.user_id')
            ->where('refer_id!=',0)->where_in('order_id',$idFix)
            ->get()->num_rows();
        if($data_check!=1){
            echo json_encode(array('success'=>false,'message'=>'Chỉ có thể xuất nhiều hóa đơn của cùng 1 đối tác!'));
            exit;
        }
        $data_room=$this->db->from('order')
            ->join('post_room','post_room.post_room_id=order.post_room_id')->join('user','user.user_id=post_room.user_id')
            ->where('refer_id!=',0)->where_in('order_id',$idFix)
            ->get()->result();
        if(count($data_room)<1){
            echo json_encode(array('success'=>false,'message'=>'Đơn hàng không hợp lệ<br/>xin thử lại'));
            exit;
        }
        $data['bill'] = $this->load->view('admin/order_room/phieu-chi',array('data'=>$data_room),true);
        echo json_encode(array('success'=>true,'message'=>$data));
        exit;
    }
}

?>