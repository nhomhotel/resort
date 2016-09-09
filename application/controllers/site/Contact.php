<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('Contact_model');
    }

    public function index() {
        $this->load->library('upload_library');
        $this->load->model('Contact_model');
        $this->load->library('email');
        if ($this->input->post('commit')) {
            $this->form_validation->set_rules('user_name', lang('contact_your_name'), 'trim|required|callback_checkUserName');
            $this->form_validation->set_rules('user_email', lang('contact_email'), 'trim|required|valid_email');
            $this->form_validation->set_rules('user_subject', lang('contact_subject'), 'trim|required');
            $this->form_validation->set_rules('user_body', lang('contact_message'), 'trim|required');
            if ($_FILES['file_attachment']['error'] == 0) {
                $check_image = checkUploadImage('file_attachment');
                $data['error_image'] = !empty($check_image['error']) ? $check_image['error'] : null;
                if (empty($check_image)) {
                    $upload_path = './uploads/contact';
                    $image_data = $this->upload_library->upload($upload_path, 'file_attachment');
                    if (!isset($image_data['error_upload']))
                        $image = substr($upload_path, 1) . '/' . $image_data['data_upload']['file_name'];
                }
            }
            $this->recaptcha->recaptcha_check_answer(
                    $_SERVER['REMOTE_ADDR'], $this->input->post('recaptcha_challenge_field'), $this->input->post('recaptcha_response_field')
            );
            if (!$this->recaptcha->getIsValid()) {
                $data['captcha_error'] = 'incorrect captcha';
            }
            if ($this->form_validation->run()) {
                $result = array();
                $user_name = onlyCharacter(securityServer($this->input->post('user_name')));
                $email = onlyCharacter(securityServer($this->input->post('user_email')));
                $subject = onlyCharacter(securityServer($this->input->post('user_subject')));
                $message = onlyCharacter(securityServer($this->input->post('user_body')));

                $data_contact = array(
                    'user_name' => $user_name,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                    'isAnswer'=>0
                );
                if (!empty($image)) {
                    $data_contact['file_attachment'] = $image;
                }
                if($this->load->Contact_model->create($data_contact)){
                    
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
                    
                            }
                }else{
                    $result['error']  ='error inster data';
                }
            }
        }
        $data['temp'] = 'site/contact/index';
        $data['captcha'] = $this->recaptcha->recaptcha_get_html();
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    function checkUserName($str) {
        $str = onlyCharacter(securityServer($str));
        if (!preg_match('/[a-zA-Z ]/', $str)) {
            return false;
        }
        return true;
    }

}

?>