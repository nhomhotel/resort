<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    function __construct() {
        parent:: __construct();
    }

    public function index() {
        if($this->input->post('commit')){
            $this->form_validation->set_rules('user_name', lang('contact_your_name'), 'trim|required|callback_checkUserName');

            $this->form_validation->set_rules('user_email',lang('contact_email'), 'trim|required|valid_email');
            $this->form_validation->set_rules('user_subject',lang('contact_subject'), 'trim|required');
            $this->form_validation->set_rules('user_body',lang('contact_message'), 'trim|required');
            if($_FILES['file_attachment']['error']==0){
                $this->form_validation->set_rules('user_name', lang('contact_your_name'), 'trim|required|callback_checkImageType');
            }
            if($this->form_validation->run()){
                $user_name = onlyCharacter(securityServer($this->input->post('')));
                $email = onlyCharacter(securityServer($this->input->post('')));
                $subject = onlyCharacter(securityServer($this->input->post('')));
                $message = onlyCharacter(securityServer($this->input->post('')));
                $file = onlyCharacter(securityServer($this->input->post('')));
                $this->recaptcha->recaptcha_check_answer(
                    $_SERVER['REMOTE_ADDR'],  
                    $this->input->post('recaptcha_challenge_field'), 
                    $this->input->post('recaptcha_response_field')
                );
                if ($this->recaptcha->getIsValid()) {
                    pre('success');
                } 
                else {
                    if(!$this->recaptcha->getIsValid()) {
                        $this->session->set_flashdata('error','incorrect captcha');
                        var_dump('incorrect captcha');
                    } else {
                        var_dump('incorrect credentials');
                        $this->session->set_flashdata('error','incorrect credentials');
                    }
                }
            }
        }
        $data['temp'] = 'site/contact/index';
        $data['captcha'] = $this->recaptcha->recaptcha_get_html();
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
    
    public function checkImageType(){
        
    }

}

?>