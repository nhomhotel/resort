<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends MY_Controller {

    function __construct() {
        parent:: __construct();
        $this->load->model('post_room_model');
        $this->load->model('Address_model');
        $this->load->model('Amenities_model');
        $this->load->model('Experience_model');
    }

    public function index() {
        if ($_POST['language'] == 'vie') {
            $this->session->set_userdata('language', 'vietnamese');
        } else {
            $this->session->set_userdata('language', 'english');
        }
        echo json_encode(array('success' => 'true'));
        exit;
    }

}

?>