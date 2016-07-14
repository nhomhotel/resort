<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
    public function index(){
    }
    public function pageNotFound(){
        $this->output->set_status_header('404'); // setting header to 404
        $data['meta_title'] = 'STAR VIEW Home page';
        $data['temp'] = ('site/error/pagenotfound');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }
}
