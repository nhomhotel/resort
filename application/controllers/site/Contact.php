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
        $check = true;
        if ($this->input->post('commit')) {
            $this->form_validation->set_rules('user_name', lang('contact_your_name'), 'trim|required|callback_checkUserName');
            $this->form_validation->set_rules('user_email', lang('contact_email'), 'trim|required|valid_email');
            $this->form_validation->set_rules('user_subject', lang('contact_subject'), 'trim|required');
            $this->form_validation->set_rules('user_body', lang('contact_message'), 'trim|required');
            if ($_FILES['file_attachment']['error'] == 0) {
                $check_image = checkUploadImage('file_attachment');
                $data['error_image'] = !empty($check_image['error']) ? $check_image['error'] : null;
                $check = !empty($check_image['error']) ? FALSE : TRUE;
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
                $check =  FALSE ;
            }
            if ($check &&$this->form_validation->run()) {
                $result = array();
                $user_name = onlyCharacter(securityServer($this->input->post('user_name')));
                $email = (securityServer($this->input->post('user_email')));
                $subject = (securityServer($this->input->post('user_subject')));
                $message = (securityServer($this->input->post('user_body')));

                $data_contact = array(
                    'user_name' => $user_name,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                    'isAnswer'=>0
                );
                if (!empty($image)) {
                    $data_contact['file_attachment'] = $image;
                    $file_attachment = '<img src="'.base_url().substr($data_contact['file_attachment'], 1).'"/>';
                }
                if($this->Contact_model->create($data_contact)){
                    $emailContatTemplate = $this->db->from('email')
                            ->where('email_type',EMAIL_TYPE_CONTACT)
                            ->get()->row();
                    $emailMessage = array();
                    $this->email->initialize(get_config_email($this->config->item('address_email'), $this->config->item('pass_email')));
                    $this->email->from($this->config->item('address_email'), $this->config->item('name_website')); 
                    $this->email->to($this->config->item('address_email'));

                    $this->email->subject($emailContatTemplate->email_title);
                    $email_content = $emailContatTemplate->description;
                    $email_content = str_replace('__user_name__', $data_contact['user_name'], $email_content);
                    $email_content = str_replace('__subject__', $data_contact['subject'], $email_content);
                    $email_content = str_replace('__message__', $data_contact['message'], $email_content);
                    $email_content = str_replace('__file_attachment__', !empty($file_attachment)?$file_attachment:'Không có', $email_content);
                    $email_content = str_replace('__email__contact__', $data_contact['email'], $email_content);
                    $this->email->message($email_content);
                    if($this->email->send()){
                        //add data into history mail
                        $this->db->insert('email_history',array(
                            'user_id'=>$data_contact['user_name'],
                            'title'=>$emailContatTemplate->email_title,
                            'content'=>$email_content,
                            'time'=>date('Y-m-d'),
                            'status'=>1,
                            'type'=>'Email contact'
                        ));
                        $emailMessage['message']='Yêu cầu đã được gửi đến quản trị viên';
                        $emailMessage['success'] = true;
                    }
                    else{
                        $this->db->insert('email_history',array(
                            'user_id'=>$data_contact['user_name'],
                            'title'=>$emailContatTemplate->email_title,
                            'content'=>$email_content,
                            'time'=>date('Y-m-d'),
                            'status'=>0,
                            'type'=>'Email contact'
                        ));
                        $emailMessage['message']='Có lỗi trong việc gửi mail';
                        $emailMessage['success'] = FALSE;
                    }
                }
                else{
                    $emailMessage['message']='Có lỗi trong việc liên hệ';
                    $emailMessage['success'] = FALSE;
                    redirect(base_url().'lien-he');
                }
                $this->session->set_flashdata($emailMessage);
                redirect('/');
            }
            else{
                $data['info']['user_name'] = onlyCharacter(securityServer($this->input->post('user_name')));
                $data['info']['user_email'] = (securityServer($this->input->post('user_email')));
                $data['info']['user_subject'] = (securityServer($this->input->post('user_subject')));
                $data['info']['user_body'] = (securityServer($this->input->post('user_body')));
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