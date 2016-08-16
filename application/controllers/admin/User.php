<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class User extends AdminHome {

    public function __construct() {
        parent::__construct(get_class());
        $this->load->model('user_model');
    }

    public function index() {
        if(!$this->check_action_permisson('edit', get_class())){
            return;
//            redirect('site/No_access/'.  get_class());
        }
        if(!$this->check_action_permisson('view', get_class())){
            return;
//            redirect('site/No_access/'.  get_class());
        }
        if(!$this->check_action_permisson('delete', get_class())){
            return;
//            redirect('site/No_access/'.  get_class());
        }
        if(!$this->check_action_permisson('create', get_class())){
            return;
//            redirect('site/No_access/'.  get_class());
        }
        $input = array();
        $filters = array();
        if (!empty($_GET)) {
            $params = $_GET;
            foreach ($params as $key => $value) {
                $data[$key] = securityServer($value);
                if ($key != 'page') {
                    $filters[] = $key . '=' . $value;
                }
            }
        }
        $user = $this->User_model->get_logged_in_employee_info();
        /* -- Lọc user_name-- */
        $user_name = securityServer($this->input->get('user_name'));
        if ($user_name) {
            $input['like'] = array('user_name', $user_name);
        }
        /* -- Lọc ozganzation-- */
        $ozganzation = securityServer($this->input->get('ozganzation'));

        if ($ozganzation) {
            $input['or_like'] = array('ozganzation', $ozganzation);
        }
        /* -- Lọc role-- */
        $role_id = securityServer($this->input->get('role'));
        $role_id = (int) $role_id;
        if ($role_id) {
            $input['where']['user.role_id'] = $role_id;
        }
        
        if (count($user)>0) {
            $input['where']['user_id !='] = $user->user_id;
        }
        
        $this->load->model("role_model");
        $list_role = $this->role_model->get_list(array('order'=>array('order_id'=>'ASC')));
        $data['list_role'] = $list_role;

        $this->load->library('pagination');
        $total = $this->user_model->get_total($input);

        $config = array();
        $config["total_rows"] = $total;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['base_url'] = base_url('admin/user/index?'.implode('&', $filters));
        $config['per_page'] = $this->config->item('item_per_page_system')?$this->config->item('item_per_page_system'):10;
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
        $data['start'] = $start;
        $pagination_link = $this->pagination->create_links();
        $data['pagination_link'] = $pagination_link;

        $message = $this->session->flashdata();
        $data['message'] = $message;
        
        $input['limit'] = array($config['per_page'], $start);
        $input['order'] = array('user_id', 'DESC');

        $list = $this->user_model->getList($input);
        $data['total'] = $total;
        $data['list'] = $list;

        $data['title'] = 'Danh sách tài khoản';
        $data['temp'] = 'admin/user/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
    }

    function checkUserName($user_name) {

        $where = array();
        $where = array('user_name' => $user_name);
        $check = $this->user_model->check_exists($where);
        if ($check > 0) {
            $this->form_validation->set_message('checkUserName', '{field} đã tồn tại.');
            return false;
        } else {
            return true;
        }
    }

    function checkEmail($email) {

        $where = array();
        $where = array('email' => $email);
        $check = $this->user_model->check_exists($where);
        if ($check > 0) {
            $this->form_validation->set_message('checkEmail', '{field} đã tồn tại.');
            return false;
        } else {
            return true;
        }
    }

    public function create() {
        if(!$this->check_action_permisson('create', get_class()))redirect('site/No_access/'.  get_class());
        $this->load->model("role_model");
        $this->load->library('form_validation');
        $this->load->helper('form');

        $input = array();
        $input['order'] = array('role_id', 'ASC');
        $list_role = $this->role_model->get_list($input);
        $data['list_role'] = $list_role;

        if ($this->input->post()) {
            $this->form_validation->set_rules('last_name', 'Họ', 'trim|required');
            $this->form_validation->set_rules('first_name', 'Tên', 'trim|required');
            $this->form_validation->set_rules('user_name', 'Tên đăng nhập', 'trim|required|min_length[5]|max_length[12]|callback_checkUserName');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[6]|max_length[12]');
            $this->form_validation->set_rules('password_comfirm', 'Mật khẩu xác nhận', 'trim|required|min_length[6]|max_length[12]|matches[password]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_checkEmail');
            if($this->input->post('role_id')==2)$this->form_validation->set_rules('profit', 'Lợi nhuân', 'trim|required|numeric');

            if ($this->form_validation->run()) {

                $last_name = $this->input->post('last_name');
                $first_name = $this->input->post('first_name');
                $ozganzation = $this->input->post('ozganzation'); //tên cơ quan, tổ chức
                $user_name = $this->input->post('user_name');
                $password = md5($this->input->post('password'));
                $email = $this->input->post('email');
                $role_id = $this->input->post('role_id');
                $created = date('Y-m-d H:i:s');

                $data = array(
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'ozganzation' => $ozganzation,
                    'user_name' => $user_name,
                    'password' => $password,
                    'email' => $email,
                    'role_id' => $role_id,
                    'created' => $created
                );
                if($this->input->post('role_id')==2){
                    $data['profit_rate'] = $this->input->post('profit')?$this->input->post('profit'):'5';
                }else
                    $data['profit_rate'] =0;
                if ($this->user_model->create($data)) {

                    $this->session->set_flashdata('message', 'Thêm dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm dữ liệu thất bại!');
                }
                redirect(admin_url('user/index'));
            }{
                if($this->input->post('role_id')){
                    $data['role_id'] = intval($this->input->post('role_id'));
                    $data['profit_show'] = 'visible';
                    $data['profit_value'] = $this->input->post('profit')?$this->input->post('profit'):'5';
                }
            }
        }
        $data['title'] = 'Đăng kí tài khoản';
        $data['temp'] = ('admin/user/create');
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
    }

    function edit() {
        if(!$this->check_action_permisson('edit', get_class()))redirect('site/No_access/'.  get_class());
        $this->load->model("role_model");
        $this->load->library('form_validation');
        $this->load->helper('form');
        $id = $this->uri->rsegment('3');
        $id = (int) $id;
        $input = array();
        $input['order'] = array('role_id', 'ASC');
        $list_role = $this->role_model->get_list($input);
        $data['list_role'] = $list_role;
        $info = $this->user_model->get_info($id);
        if($info->role_id==2)$data['profit_show'] = 'visible';
        else $data['profit_show'] = 'hidden';
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
            redirect(admin_url('user'));
        } else {
            $data['info'] = $info;
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('last_name', 'Họ', 'trim|required');
            $this->form_validation->set_rules('first_name', 'Tên', 'trim|required');
            if($this->input->post('role_id')==2)
                $this->form_validation->set_rules('profit', 'Lợi nhuận', 'trim|required|numeric');
            if ($this->form_validation->run()) {
                $last_name = $this->input->post('last_name');
                $first_name = $this->input->post('first_name');
                $ozganzation = $this->input->post('ozganzation');
                $updated = date('Y:m:d H:i:s');
                $data = array(
                    'last_name' => $last_name,
                    'first_name' => $first_name,
                    'ozganzation' => $ozganzation,
                    'updated' => $updated
                );
                $role = $this->user_model->get_role();
                if($role==1) {
                    $role_id = $this->input->post('role_id');
                    $data['role_id'] = $role_id;
                    if($role_id==2)
                        $data['profit_rate'] = $this->input->post('profit')?$this->input->post('profit'):'5';
                    else
                        $data['profit_rate'] = 0;
                }
                
                if ($this->user_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thất bại!');
                }
                redirect(admin_url('user/index'));
            }else{
                if($info->role_id==2)$data['profit_show'] = 'visible';
                else $data['profit_show'] = 'hidden';
                $data['profit_value'] = $this->input->post('profit');
            }
        }

        $data['title'] = 'Chỉnh sửa tài khoản';
        $data['temp'] = ('admin/user/edit');
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
    }

    function view_account() {
        if(!$this->check_action_permisson('view', get_class()))redirect('site/No_access/'.  get_class());
        $data['title'] = 'Thông tin tài khoản';
        $data['temp'] = ('admin/user/view_account');
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
    }

    function edit_account() {
        $this->load->library('upload_library');
        if(!$this->check_action_permisson('edit', get_class()))redirect('site/No_access/'.  get_class());
        $data['title'] = 'Chỉnh sửa tài khoản';
        $data['temp'] = ('admin/user/edit_account');
        $user = $this->User_model->get_logged_in_employee_info();
        if(count($user)>0){
            $data['user'] = $user;
        }
        if($this->input->post()){
            $this->form_validation->set_rules('last_name', 'Họ', 'trim|required');
            $this->form_validation->set_rules('first_name', 'Tên', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'trim|required|numeric');
            if ($this->form_validation->run()) {
                if($_FILES['avarta']['error']==0){
                    $upload = './public/admin/images';
                    $image = $this->upload_library->upload($upload,'avarta');
                };
                $data['user_update'] = array(
                    'last_name'=>$this->input->post('last_name'),
                    'first_name'=>$this->input->post('first_name'),
                    'email'=>$this->input->post('email'),
                    'phone'=>$this->input->post('phone'),
                    'description'=>$this->input->post('description'),
                    'gender'=>$this->input->post('gender'),
                    'birthday'=>$this->input->post('birthday'),
                    'address'=>$this->input->post('address'),
                    'workplace'=>$this->input->post('workplace'),
                    'country'=>$this->input->post('country'),
                    'updated'=>date('Y-m-d : H-i-s')
                );
                if(isset($image))$data['user_update']['avarta'] = substr($upload, 1) . '/' . $image['data_upload']['file_name'];
                if($this->User_model->update($user->user_id,$data["user_update"])){
                    $this->session->set_flashdata(array('message'=>'Cập nhật thành công','success'=>true));
                }else{
                    $this->session->set_flashdata(array('message'=>'Cập nhật không thành công','success'=>false));
                }
                redirect(admin_url('home'));
            }else{
                
            }
        }
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
    }

    function status() {
        if(!$this->check_action_permisson('edit', get_class()))redirect('site/No_access/'.  get_class());
        $id = $this->input->post('id');
        $id = (int) $id;

        $statusInfo = $this->user_model->get_info($id, 'status');
        if (!$statusInfo) {

            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
            redirect(admin_url('user/index'));
        } else {
            if ($statusInfo->status == 1) {
                $data = array(
                    'status' => 0,
                );
            } else {
                $data = array(
                    'status' => 1,
                );
            }
        }
        if ($this->user_model->update($id, $data)) {
            
        }
    }

    function delete() {
        if(!$this->check_action_permisson('delete', get_class()))redirect('site/No_access/'.  get_class());
        $id = $this->uri->rsegment(3);
        $id = (int) $id;
        $info = $this->user_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata("message", 'Không tồn tại bản ghi');
            redirect(admin_url('user'));
        }
        if ($this->user_model->delete($id)) {
            $this->session->set_flashdata("message", 'Đã xóa dữ liệu');
            redirect(admin_url('user'));
        }
    }

    function logout() {
        if ($this->session->userdata('userLogin')) {
            $this->session->sess_destroy();
        }
        redirect(admin_url('login'));
    }
    
    function validate_user() {
        if(!$this->check_action_permisson('edit', get_class()))redirect('site/No_access/'.  get_class());
        $id = $this->input->post('id');
        $id = (int) $id;

        $statusInfo = $this->user_model->get_info($id, 'validate_code');
        if (!$statusInfo) {

            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
            redirect(admin_url('user/index'));
        } else {
            if ($statusInfo->validate_code != '') {
                $data = array(
                    'validate_code' => '',
                );
            }
            if ($this->user_model->update($id, $data)) {
                echo json_encode(array('success'=>true));
            }else{
                echo json_encode(array('success'=>false));
            }
        }
    }
    
    public function suggest_user($query = '') {
        $query = securityServer($this->input->get('term'));
        $user = $this->User_model->get_logged_in_employee_info();
//        echo json_encode(array('12222'=>$query));exit;
        $input = array();
        $input['where'] = array('user_id!='=>$user->user_id);
        $input['like'] = array('user_name',$query);
        $input['select'] = array('user_id','user_name');
        $input['join'] = array();
        $data = $this->User_model->get_list($input);
        echo json_encode($data);
        exit();
    }
   
}
