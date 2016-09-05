<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['temp'] = ('site/help/index');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }
}
