<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Address_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['language'] = getLanguage();
        $this->load->model('Amenities_model');
        $this->load->model('area_model');
        $this->load->model('Home_Slider_model');
        $this->load->model('Intro_Slider_model');
        $data['meta_title'] = $this->config->item('name_website');
        $data['sliders'] = $this->area_model->get_list(array(
            'where' => array('sort>' => 0),
            'limit' => array('9' => '0'),
            'order'=>array('sort','desc')
        ));
        $data['home_slider_image'] = $this->Home_Slider_model->get_list();
        $data['is_loop_home_slider'] = count($data['home_slider_image'])<2 ?'false':'true';
        $data['intro_slider_image'] = $this->Intro_Slider_model->get_list();
        if(count($data['intro_slider_image'])==0)$data['is_loop_intro_slider'] = 'true';
        else if(count($data['intro_slider_image'])==1)$data['is_loop_intro_slider'] = 'false';
        else $data['is_loop_intro_slider'] = 'true';
        $data['popular'] = $this->load->view('site/slidePopular', $data, TRUE);
        $data['home_slider_image'] = $this->load->view('site/homeSliderImage', $data, TRUE);
        $data['intro_slider_image'] = $this->load->view('site/introSliderImage', $data, TRUE);
        $data['manageText'] = $this->db->from('manager_text')
                ->get()->result();
        $data['temp'] = ('site/home/index');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }

    public function bookroom() {
        $data['meta_title'] = 'Bookroom - ';
        $data['temp'] = ('site/home/bookroom');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function listroom() {
        $data['meta_title'] = 'Listroom';
        $data['temp'] = ('site/home/listroom');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }

    public function login() {
        $this->load->library('My_ciphers_library');
        $token = array(
            'dateTime'=>strtotime(date('Y-m-d')),
            'IpAddress'=>getIpAddressClient()
        );
        $data['token']= $this->my_ciphers_library->encryption(serialize($token));
        if ($this->session->userdata('userLoginSite') != null)
            redirect(base_url());
        if (count($_POST) > 0) {
            $redirect = $this->input->get('redirect') != null ? trim($this->input->get('redirect')) : base_url();
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            if ($this->form_validation->run()) {
                $data = array(
                    'where' => array(
                        'email' => $this->input->post('email'),
                        'password' => md5($this->input->post('password')),
                        'validate_code'=>''
                    )
                );
                $dataUser = $this->User_model->get_row($data);
                if ($dataUser != NULL && count($dataUser)) {
                    $userLoginSite= array(
                        'user_id' => $dataUser->user_id,
                        'last_name' => $dataUser->last_name,
                        'first_name' => $dataUser->first_name,
                        'user_name' => $dataUser->user_name,
                        'email' => $dataUser->email,
                        'phone' => $dataUser->phone,
                        'avarta' => $dataUser->avarta,
                        'role_id' => $dataUser->role_id,);
                    $this->session->set_userdata('userLoginSite',$userLoginSite);
                    redirect($redirect);
                } else {
                    $this->session->set_flashdata('login_message', lang('login_account').' / '.lang('register_password').lang('register_not_validate').' !');
                    redirect('home/login');
                }
                exit;
            }
        }
        $data['meta_title'] = 'Login';
        $data['temp'] = ('site/home/login');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function postnews1() {
        $data['meta_title'] = 'Postnews1';
        $data['temp'] = ('site/home/postnews1');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function postnews2() {
        $data['meta_title'] = 'Postnews2';
        $data['temp'] = ('site/home/postnews2');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function postnews3() {
        $data['meta_title'] = 'Postnews3';
        $data['temp'] = ('site/home/postnews3');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function postnews_success() {
        $data['meta_title'] = 'Postnews_success';
        $data['temp'] = ('site/home/postnews_success');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function register() {
        $this->load->library('email');
        $this->load->model('Email_model');
        $data['meta_title'] = 'Register';
        $data['temp'] = ('site/home/register');

        if ($this->session->userdata('user_name')) {
            redirect(base_url());
        } else {
            if ($this->input->post()) {
                $this->load->library('form_validation');
                $this->load->helper('form');
                $this->form_validation->set_rules('user_name', lang('register_user_name'), 'trim|required|min_length[6]|max_length[12]|callback_checkUserName');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_checkEmail');
                $this->form_validation->set_rules('last_name', lang('register_last_name'), 'trim|required');
                $this->form_validation->set_rules('first_name', lang('register_first_name'), 'trim|required');
                $this->form_validation->set_rules('password', lang('register_password'), 'trim|required|min_length[6]');

                //chạy và kiểm tra các tập luật
                if ($this->form_validation->run()) {
                    $last_name = $this->input->post('last_name');
                    $first_name = $this->input->post('first_name');
                    $user_name = $this->input->post('user_name');
                    $password = md5($this->input->post('password'));
                    $email = $this->input->post('email');
                    $role_id = 3;
                    $created = date('Y-m-d H:i:s');
                    $parameter = array(
                        'user'=>$user_name,
                        'active'=>true
                    );
                    $data = array(
                        'last_name' => $last_name,
                        'first_name' => $first_name,
                        'user_name' => $user_name,
                        'password' => $password,
                        'email' => $email,
                        'role_id' => $role_id,
                        'created'=>$created,
                        'validate_code'=>  getConfirmEmailCode($user_name,$parameter), 
                    );
                    if ($this->User_model->create($data)) {
                        $message_register = 'Đăng ký tài khoản thành công';
                        $email_template = $this->Email_model->get_row(array('where'=>array("email_type"=>"6")));
                        if(count($email_template)>0){
                            $this->email->initialize(get_config_email($this->config->item('address_email'), $this->config->item('pass_email')));
                            $this->email->from($this->config->item('address_email'), $this->config->item('name_website')); 
                            $this->email->to($email);
                            
                            $this->email->subject($email_template->email_title);
                            $email_content = $email_template->description;
                            $email_content = str_replace('__user_name__', $data['user_name'], $email_content);
                            $email_content = str_replace('__first_name__', $data['first_name'], $email_content);
                            $email_content = str_replace('__last_name__', $data['last_name'], $email_content);
                            $email_content = str_replace('__password__', $this->input->post('password'), $email_content);
                            $email_content = str_replace('__email__', $data['email'], $email_content);
                            $email_content = str_replace('__confirm__user_account__', $data['validate_code'], $email_content);
                            $this->email->message($email_content);
                            if($this->email->send()){
                                $message_register.='Thông tin tài khoản đã được gửi<br/>Kiểm tra mail để xác minh tài khoản';
                            }else  $message_register.='Có lỗi trong việc gửi mail xác minh tài khoản<br/>Liên hệ quản trị để biết thông tin';
                        }
                        $this->session->set_flashdata('message_register', $message_register);
                        
                    } else {
                        $this->session->set_flashdata('message_register', 'Đăng ký thất bại!');
                    }
                    redirect(base_url('/'));
                }
            }
        }
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    public function process($query = '') {
        //get data from address_model vs $query
        $query = strtolower(trim($_POST['query']));
        $query_no = onlyCharacter(securityServer(vn_str_filter($query)));
        $data = $this->Address_model->getAddress($query_no); 
        if (count($data) > 0) {
            foreach ($data as $key => $value) {
                //search theo tên đường
                if (count(explode(strtolower($query_no), strtolower($value['address_detail_ascii']))) > 1) {
                    $result[$key] = $value['address_detail'];
                    //search theo tên quan, huyện    
                } elseif (count(explode(strtolower($query_no), strtolower($value['district_ascii']))) > 1) {
                    $result[$key] = $value['district'] . ', ' . $value['provincial'] . ', ' . $value['country'];
                    //search theo tên tỉnh, thành phố
                } elseif (count(explode(strtolower($query_no), strtolower($value['provincial_ascii']))) > 1) {
                    $result[$key] = $value['provincial'] . ', ' . $value['country'];
                    //search theo tên quốc gia
                } elseif (count(explode(strtolower($query_no), strtolower($value['country_ascii']))) > 1) {
                    $result[$key] = $value['country'];
                    // search mặc định
                } else {
//                $result[$key] = $value['address_street'].', '.$value['district'].', '.$value['provincial'].', '.$value['country'];
                    $result[$key] = $value['address_detail'];
                }
            }
            $result = array_unique($result);
            echo json_encode($result);
        } else
            echo json_encode(array());
        exit();
    }

    function Test() {
//        $this->load->model('Post_room_model');
//        $this->load->library('book_library');
//        pre($this->book_library->getMoney(array('checkin' => '2016-8-1', 'checkout' => '2016-8-20'), 5, '', 1, array('vat' => 10)));
        $this->email->initialize(get_config_email($this->config->item('address_email'), $this->config->item('pass_email')));
        
        $email_template = $this->Email_model->get_row(array('where'=>array("email_type"=>"6")));
        $this->email->from('lehai04.1991@gmail.com', '123'); 
        $this->email->to('zefredzocohen@gmail.com');
        $this->email->subject($email_template->email_title);
        $email_content = $email_template->description;
        $email_content = str_replace('__user_name__', "lehai", $email_content);
        $email_content = str_replace('__first_name__', "le", $email_content);
        $email_content = str_replace('__last_name__', 'hai', $email_content);
        $email_content = str_replace('__password__', '12345678', $email_content);
        $email_content = str_replace('__email__', "abc.com", $email_content);
        $email_content = str_replace('__confirm__user_account__', getConfirmEmailCode(substr('lehai', 0,10)), $email_content);
        $this->email->message($email_content);
        if($this->email->send()){
            echo 'send mail thanh cong';
        }else  echo $this->email->print_debugger();
    }
    function test2(){
        $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a0123");
    
    # show key size use either 16, 24 or 32 byte keys for AES-128, 192
    # and 256 respectively
    $key_size =  strlen($key);
    echo "Key size: " . $key_size . "<br/>";
    
    $plaintext = "This string was AES-256 / CBC / ZeroBytePadding encrypted.";

    # create a random IV to use with CBC encoding
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv(DEC_IV_SIZE, MCRYPT_RAND);
    
    # creates a cipher text compatible with AES (Rijndael block size = 128)
    # to keep the text confidential 
    # only suitable for encoded input that never ends with value 00h
    # (because of default zero padding)
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, DEC_IV);

    # prepend the IV for it to be available for decryption
    $ciphertext = DEC_IV . $ciphertext;
    
    # encode the resulting cipher text so it can be represented by a string
    $ciphertext_base64 = base64_encode($ciphertext);

    echo  $ciphertext_base64 . "<br/>";

    # === WARNING ===

    # Resulting cipher text has no integrity or authenticity added
    # and is not protected against padding oracle attacks.
    
    # --- DECRYPTION ---
    
    $ciphertext_dec = base64_decode('cALI0AL2OuYEaa3ffYHtofAAkcPT0+jURKLSYu+B1jQ=');
    
    # retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, DEC_IV_SIZE);
    
    # retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec = substr($ciphertext_dec, DEC_IV_SIZE);

    # may remove 00h valued characters from end of plain text
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    
    var_dump($plaintext_dec=='aaaa');
    }
    
    function test3(){
        $tmpAmenities[]=Array(30,25,8,4,2);
        $tmpAmenities[]=Array( 30, 25,9,8,3,2);
        $arrAmenitiesID = array(30,25);
        foreach ($resultAmenities as &$value){
                $tmpAmenities = @explode(',', $value->amenities);
                foreach ($arrAmenitiesID as $value1){
                    pre('search:'.$value1);
                    $search = array_search($value1, $tmpAmenities);
                    if(!$search &&$search>=0){
                        pre('vi tri'.$search    );
                        unset($tmpAmenities[$search]);
                    }
                }
                $value->amenities = implode(',', $tmpAmenities);
            }
    }
    function checkUserName($user_name) {

        $where = array();
        $where = array('user_name' => $user_name);
        $check = $this->User_model->check_exists($where);
        if ($check > 0) {
            $this->form_validation->set_message('checkUserName', '{field} '.lang('register_exits'));
            return false;
        } else {
            return true;
        }
    }

    function checkEmail($email) {

        $where = array();
        $where = array('email' => $email);
        $check = $this->User_model->check_exists($where);
        if ($check > 0) {
            $this->form_validation->set_message('checkEmail', '{field} '.lang('register_exits'));
            return false;
        } else {
            return true;
        }
    }
    
    function __book($id = '') {
        echo 1;return;
        $id_decode = $this->config->item('encode_id')->decode($id);

        if (count($id_decode) <= 0) {
            redirect(base_url());
        } else {
            $id_encode = $id;
        }
        $checkin = $this->input->get('checkin') ? $this->input->get('checkin') : '';
        $checkout = $this->input->get('checkout') ? $this->input->get('checkout') : '';
        $guests = $this->input->get('guests') ? $this->input->get('guests') : '';
        if ($checkin == '' || $checkout == '' || $guests == '') {
            redirect(base_url() . 'room/room_detail/' . $id_encode);
        }
        // thanh toán online
        // thêm vào db
        $input = array(
            'where' => array(
                'post_room_id' => $id_decode[0],
            )
        );
        $date1 = new DateTime();
        $date2 = new DateTime();
        $dateNow = new DateTime();
        $data['checkin'] = $date1->setDate(
                date('Y', strtotime(str_replace('/', '-', $checkin))), date('m', strtotime(str_replace('/', '-', $checkin))), date('d', strtotime(str_replace('/', '-', $checkin)))
        );
        $data['guests'] = $guests;
        $data['checkout'] = $date2->setDate(
                date('Y', strtotime(str_replace('/', '-', $checkout))), date('m', strtotime(str_replace('/', '-', $checkout))), date('d', strtotime(str_replace('/', '-', $checkout)))
        );
        if ($data['checkin'] > $data['checkout']) {
            redirect(base_url() . 'room/room_detail/' . $data['id_encode']);
        }
        if ($data['checkin'] < $dateNow || $data['checkout'] < $dateNow) {
            redirect(base_url() . 'room/room_detail/' . $data['id_encode']);
        }
        //check room in database
        if ($this->order_room_model->check_exists_room($id_decode[0], $data['checkin'], $data['checkout'])) {
            echo 'Phòng này đã có người đặt trước đó.';
            return;
        }
        $prices = $this->post_room_model->get_row($input);
        $data['name_room'] = $prices->post_room_name;
        $priceCaculator = $this->book_library->getMoney(array('checkin'=>$data['checkin']->format('Y-m-d'),'checkout'=>$data['checkout']->format('Y-m-d')),$guests,$prices);
        $data['price_all_night_add_fee'] = $priceCaculator['money'];
        $data['prices'] = $this->load->view('site/room/caculatorPrices',array('price'=>$priceCaculator),true);
        // phân biệt họ thuê nguyên cân hay thuê phòng riêng
        $data_insert = array(
            'post_room_id' => $id_decode[0],
            'user_id' => $user_id,
            'payment_type' => $priceCaculator['money'],
            'checkin' => $data['checkin']->format('Y-m-d'),
            'checkout' => $data['checkout']->format('Y-m-d'),
            'guests' => $data['guests'],
            'refer_id'=>$id_decode[0]
        );
        if($prices->parent_id==0){
            // get vê toàn bộ phòng riêng của nó về
            $childs = $this->db->from('post_room')->where('parent_id',$prices->parent_id)->get()->result();
            $data_child = array();
            foreach ($childs as $row){
                $data_child[] = array(
                    'post_room_id' => $row->post_room_id,
                    'user_id' => $user_id,
                    'payment_type' => $priceCaculator['money'],
                    'checkin' => $data['checkin']->format('Y-m-d'),
                    'checkout' => $data['checkout']->format('Y-m-d'),
                    'guests' => $data['guests']
                );
            }
            $this->db->insert_batch('order', $data_child); 
        }else{
            if($prices->parent_id!=0){
                $data_insert_parent = array(
                    'post_room_id' => $id_decode[0],
                    'user_id' => $user_id,
                    'payment_type' => $priceCaculator['money'],
                    'checkin' => $data['checkin']->format('Y-m-d'),
                    'checkout' => $data['checkout']->format('Y-m-d'),
                    'guests' => $data['guests'],
                    'post_room_id' => $prices->parent_id
                );
                $this->order_room_model->create($data_insert_parent);
            }
        }
        $this->order_room_model->create($data_insert);
    }

}
