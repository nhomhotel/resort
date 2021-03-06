<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'AdminHome.php';

class Post_room extends AdminHome {

    function __construct() {
        parent::__construct(get_class());
        $this->load->model("Post_room_model");
        $this->load->model("Order_room_model");
        $this->load->model("Address_model");
        $this->load->model("Area_model");
        $this->load->model("house_type_model");
        $this->load->model("room_type_model");
        $this->load->model("amenities_model");
        $this->load->model("experience_model");
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    function index() {
        $this->load->model('Post_room_model');
        $this->load->library('pagination');
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
        if($user==null || $user==''){
            redirect(admin_url('login'));
        }
        if($user->role_id==2)$input['where'] = array('post_room.user_id'=> $user->user_id);
        $post_room_name = onlyCharacter(securityServer($this->input->get('post_room_name')));
        if ($post_room_name) {
            $input['like'] = array('post_room_name_ascii', $post_room_name);
        }
        $user_name = onlyCharacter(securityServer($this->input->get('user_name')));
        if ($user_name) {
            $join = array('user'=>'user.user_id::user_id');
            $input['or_like'] = array('user_name', $user_name);
        }
        $total = $this->Post_room_model->get_total($input,  isset($join)?$join:NULL);
        $data['total'] = $total;
        $config = array();
        $config["total_rows"] = $total;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['base_url'] = base_url('admin/post_room/index?'.implode('&', $filters));
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

        $list_room = $this->Post_room_model->getListInfo_where($input);
        if ($list_room) {
            $data['list_room'] = $list_room;
        }
        $data['user'] = $user;
        $data['title'] = 'Danh sách';
        $data['temp'] = 'admin/post_room/index';
        $this->load->view('admin/layout', isset($data) ? $data : '');
    }

    function post($id = -1) {
        $post_info = $this->session->userdata('post_info');
        if($this->session->userdata('current_link')!='post_price'){
            if ($post_info != NULL) {
                foreach ($post_info as $key => $value) {
                    $post_info[$key] = '';
                    $this->session->unset_userdata($post_info[$key]);
                }
            }
        }else{
            $this->session->unset_userdata('current_link');
        }
        if ($this->session->userdata('userLogin')) {
            $userLogin = $this->session->userdata('userLogin');
        }
        if ($id > 0) {
            $data_post_room = $this->Post_room_model->get_row(array('where' => array('post_room_id' => $id)));
            $data['address'] = $this->Address_model->get_row(array('where' => array('address_id' => $data_post_room->address_id)));
            $data['area_room'] = $this->Area_model->get_row(array('where' => array('area_id' => $data['address']->area_id)));
        }

        $input = array();
        $input['where'] = array('status' => 1);
        $this->load->model("area_model");
        $list_house_type = $this->house_type_model->get_list($input);
        $list_room_type = $this->room_type_model->get_list($input);
        $list_amenities = $this->amenities_model->get_list($input);
        $no_area[0] = new stdClass();
        $no_area[0]->area_id = -1;
        $no_area[0]->name = 'Chọn khu vực';
        $no_area[0]->name_en = 'Select area';
        $list_area      = array_merge($no_area,$this->area_model->get_list());
        $list_experience = $this->experience_model->getListAll($input);

        $data["list_house_type"] = $list_house_type;
        $data["list_room_type"] = $list_room_type;
        $data["list_amenities"] = $list_amenities;
        $data["list_experience"] = $list_experience;
        $data["list_area"] = $list_area;

        if ($this->input->post()) {

            $this->form_validation->set_rules('address_street', 'Address Street', 'trim|required');
            $this->form_validation->set_rules('district', 'District', 'trim|required');
            $this->form_validation->set_rules('provincial', 'Provincial', 'trim|required');
            $this->form_validation->set_rules('zip_code', 'zip_code', 'trim|required|numeric|max_length[6]');
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('post_room_name', 'post_room_name', 'trim|required');
            $this->form_validation->set_rules('description', 'description', 'trim|required|min_length[300]|max_length[1000]');
            $this->form_validation->set_rules('acreage', 'Acreage', 'numeric');
            $room_type = $this->input->post('room_type')?$this->input->post('room_type'):1;
            if($room_type!=1){
                $this->form_validation->set_rules('parent_id', 'Căn gốc', 'trim|required|numeric|callback_checkRoomParent');
            }
            if ($this->form_validation->run()) {

                $parent_id = $this->input->post('parent_id');
                if($this->input->post('room_type')==1)$parent_id=0;
                $address_detail = $this->input->post('address_detail');
                $lat = $this->input->post('lat');
                $lng = $this->input->post('lng');
                $address_street = $this->input->post('address_street');
                $address_street_ascii = onlyCharacter(securityServer(($this->input->post('address_street'))));
                $address_detail_ascii = onlyCharacter(securityServer(($this->input->post('address_detail'))));
                $address_2 = $this->input->post('address_2');
                $district = $this->input->post('district');
                $district_ascii = onlyCharacter(securityServer($district));
                $provincial = $this->input->post('provincial');
                $provincial_ascii = onlyCharacter(securityServer($provincial));
                $zip_code = $this->input->post('zip_code');
                $country = $this->input->post('country');
                $country_ascii = onlyCharacter(securityServer($country));
                $area_id = $this->input->post('area_name');

                $post_room_name = $this->input->post('post_room_name');
                $description = $this->input->post('description');
                $house_type = $this->input->post('house_type');
                $room_type = $this->input->post('room_type');
                $num_guest = $this->input->post('num_guest');
                $num_bedroom = $this->input->post('num_bedroom');
                $num_bed = $this->input->post('num_bed');
                $num_bathroom = $this->input->post('num_bathroom');
                $acreage = $this->input->post('acreage');
                $user_id = (isset($userLogin) && is_array($userLogin)) ? $userLogin['user_id'] : 0;
                if ($this->input->post('amenities') && is_array($this->input->post('amenities'))) {
                    $amenities = implode(',', $this->input->post('amenities'));
                } else {
                    $amenities = NULL;
                }
                if ($this->input->post('experience') && is_array($this->input->post('experience'))) {
                    $experience = implode(',', $this->input->post('experience'));
                } else {
                    $experience = NULL;
                }
                $sess = array(
                    'address' => array(
                        'address_detail' => $address_detail,
                        'lat' => $lat,
                        'lng' => $lng,
                        'address_street' => $address_street,
                        'address_street_ascii'=>$address_street_ascii,
                        'address_detail_ascii'=>$address_detail_ascii,
                        'address_2' => $address_2,
                        'district' => $district,
                        'district_ascii' => $district_ascii,
                        'provincial' => $provincial,
                        'provincial_ascii' => $provincial_ascii,
                        'zip_code' => $zip_code,
                        'country' => $country,
                        'country_ascii' => $country_ascii,
                        'area_id'       => $area_id
                    ),
                    'parent_id' => $parent_id,
                    'post_room_name' => $post_room_name,
                    'post_room_name_ascii'=> onlyCharacter(securityServer($post_room_name)),
                    'description' => $description,
                    'house_type' => $house_type,
                    'room_type' => $room_type,
                    'num_guest' => $num_guest,
                    'num_bedroom' => $num_bedroom,
                    'num_bed' => $num_bed,
                    'num_bathroom' => $num_bathroom,
                    'acreage' => $acreage,
                    'amenities' => $amenities,
                    'experience' => $experience,
                    'user_id' => $user_id
                );
                $data_sess['post_info_post'] = $sess;
                $this->session->set_userdata($data_sess);
                redirect(admin_url('post_room/post_price/' . $id));
            }
            else{
                $data['room_type'] = $this->input->post('room_type');
                $data['num_bathroom'] = $this->input->post('num_bathroom');
            }
        }
        $data['title'] = 'Đăng phòng cho thuê';
        $data['temp'] = 'admin/post_room/post';
        $this->load->view('admin/layout', isset($data) ? $data : '');
    }

    function post_price($id = -1) {

        if ($this->session->userdata('post_info_post') !== NULL) {
            $post_info = $this->session->userdata('post_info_post');
        }
        if (!isset($post_info)) {
            redirect(admin_url('post_room/edit/' . $id));
        }
        if ($this->session->userdata('post_news') !== NULL) {
            $post_news['post_news'] = $this->session->userdata('post_news');
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules("price_night_vn", "Price night", "trim|required|integer");
            $this->form_validation->set_rules("price_night_en", "Price night", "trim|required|integer");

            if ($this->form_validation->run()) {
                $price_night_vn = $this->input->post('price_night_vn');

                if ($this->input->post('price_night_en') == '') {

                    $price_night_en = $price_night_vn;
                } else {

                    $price_night_en = $this->input->post('price_night_en');
                }
                $price_lastweek_vn = $this->input->post('price_lastweek_vn');
                $price_lastweek_en = $this->input->post('price_lastweek_en');

                if ($this->input->post('type_last_week')) {

                    $type_last_week = implode(',', $this->input->post('type_last_week'));
                } else {
                    $type_last_week = NULL;
                }

                $price_week_vn = $this->input->post('price_week_vn');
                $price_week_en = $this->input->post('price_week_en');
                $price_month_vn = $this->input->post('price_month_vn');
                $price_month_en = $this->input->post('price_month_en');
                $deposit_vn = $this->input->post('deposit_vn');
                $deposit_en = $this->input->post('deposit_en');
                $price_guest_more_vn = $this->input->post('price_guest_more_vn');
                $price_guest_more_en = $this->input->post('price_guest_more_en');
                $clearning_fee_vn = $this->input->post('clearning_fee_vn');
                $clearning_fee_en = $this->input->post('clearning_fee_en');
                if ($this->input->post('clearning_type')) {
                    $clearning_type = $this->input->post('clearning_type');
                } else {
                    $clearning_type = NULL;
                }
                $cancel_police = $this->input->post('cancel_police');
                $regulations = $this->input->post('regulations');

                $sess = array(
                    'price_night_vn' => $price_night_vn,
                    'price_night_en' => $price_night_en,
                    'price_lastweek_vn' => $price_lastweek_vn,
                    'price_lastweek_en' => $price_lastweek_en,
                    'type_last_week' => $type_last_week,
                    'price_week_vn' => $price_week_vn,
                    'price_week_en' => $price_week_en,
                    'price_month_vn' => $price_month_vn,
                    'price_month_en' => $price_month_en,
                    'deposit_vn' => $deposit_vn,
                    'deposit_en' => $deposit_en,
                    'price_guest_more_vn' => $price_guest_more_vn,
                    'price_guest_more_en' => $price_guest_more_en,
                    'clearning_fee_vn' => $clearning_fee_vn,
                    'clearning_fee_en' => $clearning_fee_en,
                    'clearning_type' => $clearning_type,
                    'cancel_police' => $cancel_police,
                    'regulations' => $regulations
                );

                $post_price['post_price'] = $sess;
                $this->session->set_userdata($post_price);
                redirect(admin_url('post_room/post_photo'));
            }
        }
        $data['title'] = 'Đăng phòng cho thuê';
        $data['temp'] = 'admin/post_room/post_price';
        $this->load->view('admin/layout', isset($data) ? $data : '');
    }

    function edit_price($id = -1) {

        if ($this->session->userdata('post_info') !== NULL) {
            $post_info = $this->session->userdata('post_info');
        }
        if (!isset($post_info)) {
            redirect(admin_url('post_room/edit/' . $id));
        }
        if ($this->session->userdata('post_news') !== NULL) {
            $post_news['post_news'] = $this->session->userdata('post_news');
        }
        if ($id > 0) {
            $data['id'] = $id;
            $data['data_post_room'] = $this->Post_room_model->get_row(array('where' => array('post_room_id' => $id)));
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules("price_night_vn", "Price night", "trim|required|integer");
            $this->form_validation->set_rules("price_night_en", "Price night", "trim|required|integer");

            if ($this->form_validation->run()) {
                $price_night_vn = $this->input->post('price_night_vn');

                if ($this->input->post('price_night_en') == '') {

                    $price_night_en = $price_night_vn;
                } else {

                    $price_night_en = $this->input->post('price_night_en');
                }
                $price_lastweek_vn = $this->input->post('price_lastweek_vn');
                $price_lastweek_en = $this->input->post('price_lastweek_en');

                if ($this->input->post('type_last_week')) {

                    $type_last_week = implode(',', $this->input->post('type_last_week'));
                } else {
                    $type_last_week = NULL;
                }

                $price_week_vn = $this->input->post('price_week_vn');
                $price_week_en = $this->input->post('price_week_en');
                $price_month_vn = $this->input->post('price_month_vn');
                $price_month_en = $this->input->post('price_month_en');
                $deposit_vn = $this->input->post('deposit_vn');
                $deposit_en = $this->input->post('deposit_en');
                $price_guest_more_vn = $this->input->post('price_guest_more_vn');
                $price_guest_more_en = $this->input->post('price_guest_more_en');
                $clearning_fee_vn = $this->input->post('clearning_fee_vn');
                $clearning_fee_en = $this->input->post('clearning_fee_en');
                if ($this->input->post('clearning_type')) {
                    $clearning_type = $this->input->post('clearning_type');
                } else {
                    $clearning_type = NULL;
                }
                $cancel_police = $this->input->post('cancel_police');
                $regulations = $this->input->post('regulations');

                $sess = array(
                    'price_night_vn' => $price_night_vn,
                    'price_night_en' => $price_night_en,
                    'price_lastweek_vn' => $price_lastweek_vn,
                    'price_lastweek_en' => $price_lastweek_en,
                    'type_last_week' => $type_last_week,
                    'price_week_vn' => $price_week_vn,
                    'price_week_en' => $price_week_en,
                    'price_month_vn' => $price_month_vn,
                    'price_month_en' => $price_month_en,
                    'deposit_vn' => $deposit_vn,
                    'deposit_en' => $deposit_en,
                    'price_guest_more_vn' => $price_guest_more_vn,
                    'price_guest_more_en' => $price_guest_more_en,
                    'clearning_fee_vn' => $clearning_fee_vn,
                    'clearning_fee_en' => $clearning_fee_en,
                    'clearning_type' => $clearning_type,
                    'cancel_police' => $cancel_police,
                    'regulations' => $regulations
                );

                $post_price['post_price'] = $sess;
                $this->session->set_userdata($post_price);
                redirect(admin_url('post_room/edit_photo/' . $id));
            }
        }
        $data['title'] = 'Đăng phòng cho thuê';
        $data['temp'] = 'admin/post_room/post_price';
        $this->load->view('admin/layout', isset($data) ? $data : '');
    }

    function post_photo($id = -1) {

        if ($this->session->userdata('post_info_post') !== NULL) {
            $post_info = $this->session->userdata('post_info_post');
        }
        if ($this->session->userdata('post_price') !== NULL) {
            $post_price = $this->session->userdata('post_price');
        }
        if (!isset($post_info) && !isset($post_price)) {
            redirect(admin_url('post_room/post'));
        } else if (isset($post_info) && !isset($post_price)) {
            redirect(admin_url('post_room/post_price'));
        }

        $this->load->model('address_model');

        if ($this->input->post('submit')) {
            $created = date('Y-m-d : H-i-s');
            $updated = $created;
            $sess = array(
                'created' => $created,
                'updated' => $updated
            );
            $upload_path = './uploads/room';
            $this->load->library('upload_library');
            $imageList = array();
            if ($_FILES['image_list']['error'][0] == 0){
                $imageList = $this->upload_library->upload_files($upload_path, 'image_list');
                $imageList = str_replace('./uploads', '/uploads', $imageList);
            }
            if(count($imageList)>0){
                $image_list = json_encode($imageList);
                $sess['image_list'] = $image_list;
            }
            $data_sess['post_photo'] = $sess;
            $this->session->set_userdata($data_sess);
            $post_photo = $this->session->userdata('post_photo');
            /*
             * 	Thêm dữ liệu từ session post_info
             *
             * 	Thêm dữ liệu vào table address, get id_address
             * 	unset address trong array post_info
             */
            $address_id = $this->address_model->insertGetId($post_info['address']);
            unset($post_info['address']);
            $post_info['address_id'] = $address_id;

            $post = array_merge($post_info, $post_price, $post_photo);

            if ($this->Post_room_model->create($post)) {
                $this->session->unset_userdata('post_info');
                $this->session->unset_userdata('post_price');
                $this->session->unset_userdata('post_photo');
                redirect(admin_url('post_room/index'));
            }
        }

        $data['title'] = 'Đăng phòng cho thuê';
        $data['temp'] = 'admin/post_room/post_photo';
        $this->load->view('admin/layout', isset($data) ? $data : '');
    }

    function edit_photo($id = -1) {

        if ($this->session->userdata('post_info') !== NULL) {
            $post_info = $this->session->userdata('post_info');
        }
        if ($this->session->userdata('post_price') !== NULL) {
            $post_price = $this->session->userdata('post_price');
        }

        if (!isset($post_info) && !isset($post_price)) {
            redirect(admin_url('post_room/edit'));
        } else if (isset($post_info) && !isset($post_price)) {
            redirect(admin_url('post_room/edit_price'));
        }
        if ($id > 0) {
            $data['data_post_room'] = $this->Post_room_model->get_row(array('where' => array('post_room_id' => $id)));
            $data['id'] = $id;
        }
        $this->load->model('address_model');

        if ($this->input->post('submit')) {
            $updated = date('Y-m-d : H-i-s');
            $sess = array(
                'updated' => $updated
            );
            $upload_path = './uploads/room';
            $this->load->library('upload_library');
            $imageList = array();
            if ($_FILES['image_list']['error'][0] == 4)
                $imageList = $data['data_post_room']->image_list;
            else{
                $imageList = $this->upload_library->upload_files($upload_path, 'image_list');
                $imageList = str_replace('./uploads', '/uploads', $imageList);
                $sess['image_list'] = json_encode($imageList);
            }
            $data_sess['post_photo'] = $sess;
            $this->session->set_userdata($data_sess);
            $post_photo = $this->session->userdata('post_photo');
            /*
             * 	Thêm dữ liệu từ session post_info
             *
             * 	Thêm dữ liệu vào table address, get id_address
             * 	unset address trong array post_info
             */
            $address_id = $post_info['address_id'];
            $this->address_model->update($post_info['address_id'],$post_info['address']);
            unset($post_info['address']);
            $post_info['address_id'] = $address_id;

            $post = array_merge($post_info, $post_price, $post_photo);

            if ($this->Post_room_model->update($id, $post)) {
                $this->session->unset_userdata('post_info');
                $this->session->unset_userdata('post_price');
                $this->session->unset_userdata('post_photo');
                redirect(admin_url('post_room/index'));
            }
        }

        $data['title'] = 'Đăng phòng cho thuê';
        $data['temp'] = 'admin/post_room/post_photo';
        $this->load->view('admin/layout', isset($data) ? $data : '');
    }

    function status() {
        $id = $this->input->post('id');
        $id = (int) $id;

        $statusInfo = $this->Post_room_model->get_info($id, 'status');
        if (!$statusInfo) {

            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
            redirect(admin_url('post_room/index'));
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
        if ($this->Post_room_model->update($id, $data)) {
            
        }
    }

    function delete() {
        if(!$this->check_action_permisson('delete', get_class())){
            redirect('site/No_access/'.  get_class());
        }
        $this->load->model("Order_room_model");
        $this->load->model('address_model');
        $id = $this->uri->rsegment(3);
        $id = (int) $id;

        $info = $this->Post_room_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại bản ghi!');
            redirect(admin_url('post_room/index'));
        } else {
            $check_order = $this->Order_room_model->get_row(array('where'=>array('post_room_id'=>$id)));
            if($check_order>0){
                $this->session->set_flashdata('message', 'Đã tồn tại giao dịch bán hàng? không thể xóa được');
                redirect(admin_url('post_room/index'));
            }
            $address_id = $info->address_id;
            $this->address_model->delete($address_id);
            $this->Post_room_model->delete($id);
            $image_link = json_decode($info->image_list);
            if (is_array($image_link)) {
                foreach ($image_link as $img) {
                    if (file_exists($img)) {
                        unlink($img);
                    }
                }
            }
            redirect(admin_url('post_room'));
        }
    }

    function edit($id = -1) {
        if ($this->session->userdata('userLogin')) {
            $userLogin = $this->session->userdata('userLogin');
        }
        if ($id > 0) {
            $data_post_room = $this->Post_room_model->get_row(array('where' => array('post_room_id' => $id)));
            if(count($data_post_room)>0)$data['post_room'] = $data_post_room;
            /* Load Parent */
            if (!empty($data_post_room->parent_id)) {
                $data_post_room->parent = $this->Post_room_model->get_row(array('where' => array('post_room_id' => $data_post_room->parent_id)));
                if(count($data_post_room->parent)>0)$data['post_room_parent'] = $data_post_room->parent;
                
            }
            $no_area[0] = new stdClass();
            $no_area[0]->area_id = -1;
            $no_area[0]->name = 'Chọn khu vực';
            $no_area[0]->name_en = 'Select area';
            $data['address'] = $this->Address_model->get_row(array('where' => array('address_id' => $data_post_room->address_id)));
            $data['area_room'] = $this->Area_model->get_row(array('where' => array('area_id' => $data['address']->area_id)));
            if(count($data['area_room'])==0){
                $data['area_room'] = $no_area[0];
            }
            $this->load->model("house_type_model");
            $this->load->model("room_type_model");
            $this->load->model("amenities_model");
            $this->load->model("area_model");
            $this->load->model("experience_model");

            $this->load->library('form_validation');
            $this->load->helper('form');
            $input = array();
            $input['where'] = array('status' => 1);
            $list_house_type = $this->house_type_model->get_list($input);
            $list_room_type = $this->room_type_model->get_list($input);
            $list_amenities = $this->amenities_model->get_list($input);
            $list_area = array_merge($no_area, $this->area_model->get_list());
            $list_experience = $this->experience_model->getListAll($input);

            $data["list_house_type"] = $list_house_type;
            $data["list_room_type"] = $list_room_type;
            $data["list_amenities"] = $list_amenities;
            $data["list_area"] = $list_area;
            $data["list_experience"] = $list_experience;
            $data['data_post_room'] = $data_post_room;
            $data['post_room_id'] = $id;

            if ($this->input->post()) {

                $this->form_validation->set_rules('address_street', 'Address Street', 'trim|required');
                $this->form_validation->set_rules('district', 'District', 'trim|required');
                $this->form_validation->set_rules('provincial', 'Provincial', 'trim|required');
                $this->form_validation->set_rules('zip_code', 'zip_code', 'trim|required|numeric|max_length[6]');
                $this->form_validation->set_rules('country', 'Country', 'trim|required');
                $this->form_validation->set_rules('post_room_name', 'post_room_name', 'trim|required');
                $this->form_validation->set_rules('description', 'description', 'trim|required|min_length[300]|max_length[1000]');
                $this->form_validation->set_rules('acreage', 'Acreage', 'numeric');
                $room_type = $this->input->post('room_type')?$this->input->post('room_type'):1;
                if($room_type!=1){
                    $this->form_validation->set_rules('parent_id', 'Căn gốc', 'trim|required|numeric|callback_checkRoomParent');
                }
                if ($this->form_validation->run()) {
                    $parent_id = $this->input->post('parent_id');
                    if($this->input->post('room_type')==1)$parent_id=0;
                    $address_detail = $this->input->post('address_detail');
                    $lat = $this->input->post('lat');
                    $lng = $this->input->post('lng');
                    $address_street = $this->input->post('address_street');
                    $address_street_ascii = onlyCharacter(securityServer(($this->input->post('address_street'))));
                    $address_detail_ascii = onlyCharacter(securityServer(($this->input->post('address_detail'))));
                    $address_2 = $this->input->post('address_2');
                    $district = $this->input->post('district');
                    $district_ascii = onlyCharacter(securityServer($district));
                    $provincial = $this->input->post('provincial');
                    $provincial_ascii = onlyCharacter(securityServer($provincial));
                    $zip_code = $this->input->post('zip_code');
                    $country = $this->input->post('country');
                    $country_ascii = onlyCharacter(securityServer($country));
                    $area_id = $this->input->post('area_name');

                    $post_room_name = $this->input->post('post_room_name');
                    $description = $this->input->post('description');
                    $house_type = $this->input->post('house_type');
                    $room_type = $this->input->post('room_type');
                    $num_guest = $this->input->post('num_guest');
                    $num_bedroom = $this->input->post('num_bedroom');
                    $num_bed = $this->input->post('num_bed');
                    $num_bathroom = $this->input->post('num_bathroom');
                    $acreage = $this->input->post('acreage');
                    $user_id = (isset($userLogin) && is_array($userLogin)) ? $userLogin['user_id'] : 0;
                    if ($this->input->post('amenities') && is_array($this->input->post('amenities'))) {
                        $amenities = implode(',', $this->input->post('amenities'));
                    } else {
                        $amenities = NULL;
                    }
                    if ($this->input->post('experience') && is_array($this->input->post('experience'))) {
                        $experience = implode(',', $this->input->post('experience'));
                    } else {
                        $experience = NULL;
                    }
                    $sess = array(
                        'address' => array(
                            'address_detail' => $address_detail,
                            'lat' => $lat,
                            'lng' => $lng,
                            'address_street' => $address_street,
                            'address_detail_ascii'=>$address_detail_ascii,
                            'address_street_ascii'=>$address_street_ascii,
                            'address_2' => $address_2,
                            'district' => $district,
                            'district_ascii' => $district_ascii,
                            'provincial' => $provincial,
                            'provincial_ascii' => $provincial_ascii,
                            'zip_code' => $zip_code,
                            'country' => $country,
                            'country_ascii' => $country_ascii,
                            'area_id'       => $area_id
                        ),
                        'address_id'=>$data_post_room->address_id,
                        'parent_id' => $parent_id,
                        'post_room_name' => $post_room_name,
                        'post_room_name_ascii'=> onlyCharacter(securityServer($post_room_name)),
                        'description' => $description,
                        'house_type' => $house_type,
                        'room_type' => $room_type,
                        'num_guest' => $num_guest,
                        'num_bedroom' => $num_bedroom,
                        'num_bed' => $num_bed,
                        'num_bathroom' => $num_bathroom,
                        'acreage' => $acreage,
                        'amenities' => $amenities,
                        'experience' => $experience,
                        'user_id' => $user_id
                    );
                    $data_sess['post_info'] = $sess;
                    $this->session->set_userdata($data_sess);
                    redirect(admin_url('post_room/edit_price/' . $id));
                }
            }
            $data['title'] = 'Đăng phòng cho thuê';
            $data['temp'] = 'admin/post_room/post';
            $this->load->view('admin/layout', isset($data) ? $data : '');
        }
    }

    /* Get results for auto complete search */

    public function ajax_search() {
        $keyword = $this->input->get('term');
        $result = array();

        /* Check empty keyword */
        if (empty($keyword)) {
            echo json_encode($result);
            return;
        }
//        $this->db->where('user_id',$user->user_id);
        $user = $this->User_model->get_logged_in_employee_info();
        /* Filters and return results */
        $this->Post_room_model->db->select('post_room_id, post_room_name');
        $this->Post_room_model->db->from('post_room');
        if($user->role_id==2){
            $this->Post_room_model->db->where('user_id',$user->user_id);
        }
        $this->db->where('parent_id',0);
        $this->Post_room_model->db->where('post_room_name_ascii LIKE "%' . stripUnicode($keyword) . '%"');
        $result = $this->Post_room_model->db->get()->result();
        echo json_encode($result);
        return;
    }

    public function calendar($post_room_id = null) {
        $user = $this->User_model->get_logged_in_employee_info();
        if($user==null || $user==''){
            redirect(admin_url('login'));
        }
        if (empty($post_room_id)) {
            return site_url('admin/home');
        }

        $data['post_room'] = $this->Post_room_model->get_row(array('where' => array('post_room_id' => $post_room_id)));

        if (empty($data['post_room'])) {
            return site_url('admin/home');
        }

        /* Prepared times */

        $time = time();
        $begin_day = date('d/m/Y', strtotime('first day of this month'));
        $end_day = date('d/m/Y', strtotime(date('Y', $time) . '-' . date('m', $time) . '-' . cal_days_in_month(CAL_GREGORIAN, date('m', $time), date('Y', $time))));

        /* Find Ordered Room In Range Day */

        $this->db->select('post_room.post_room_id, post_room.post_room_name, order.order_id, order.checkin, order.checkout, order.refer_id, order.guests AS num_guests');
        $this->db->from('post_room');
        $this->db->join('order', 'order.post_room_id = post_room.post_room_id');
        $this->db->where('(checkin >= "' . $begin_day . '" OR checkout <= "' . $end_day . '")');
        $this->db->where('post_room.post_room_id = ' . $post_room_id . ' OR post_room.parent_id = ' . $post_room_id);
        if($user->role_id==2){
            $this->db->where('post_room.user_id',$user->user_id);
        }
        $result = $this->db->get()->result();
        /* Register Events In Calendar */

        $events = array();

        foreach ($result as $row) {
            if (empty($row->refer_id)) {
                $item = array(
                    'title' => '(' . $row->num_guests . ' KH) thuê phòng ' . htmlspecialchars($row->post_room_name),
                    'start' => $row->checkin,
                    'end' => date('Y-m-d', strtotime($row->checkout) + (24 * 60 * 60)),
                    'url' => site_url('admin/post_room/edit/' . $row->post_room_id)
                );
                $events[] = $item;
            }
        }

        /* Render Layout */

        $data['events'] = json_encode($events);
        $data['title'] = 'Lịch đăng ký phòng ' . htmlspecialchars($data['post_room']->post_room_name);
        $data['link'] = site_url('admin/post_room/edit/' . $post_room_id);
        $data['description'] = 'Danh sách các ngày đã đặt theo lịch trong tháng/tuần/ngày';
        $data['temp'] = 'admin/calendar/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }
    
    function checkRoomParent($parent_id){
        $where = array();
        $where = array('post_room_id' => $parent_id);
        $check = $this->Post_room_model->check_exists($where);
        if (!$check) {
            $this->form_validation->set_message('checkRoomParent', '{field} chưa tồn tại.');
            return false;
        } else {
            return true;
        }
    }
    
    function suggest_name_room(){
        $this->load->model('Post_room_model');
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
        $select = array('post_room_id','post_room_name');
        $join = array();
        $data = $this->Post_room_model->get_list($input,$join,$select);
        echo json_encode($data);
        exit;
    }
    
    function suggest_user_name(){
        $this->load->model('Post_room_model');
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
        $join = array('user'=>'user.user_id::post_room.user_id');
        $data = $this->Post_room_model->get_list($input,$join,$select);
        echo json_encode($data);
        exit;
    }

}

?>