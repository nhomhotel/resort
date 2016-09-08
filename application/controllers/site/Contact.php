<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    function __construct() {
        parent:: __construct();
    }

    public function index() {
        $this->load->library('Recaptcha');
        if($this->input->post('commit')){
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
            exit;
        }
        $data['temp'] = 'site/contact/index';
        $data['captcha'] = $this->recaptcha->recaptcha_get_html();
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

}

?>