<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helps extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Address_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->model('area_model');
        $this->load->model('Home_Slider_model');
        $this->load->model('Intro_Slider_model');
        $data['meta_title'] = $this->config->item('name_website');
        $data['temp'] = ('site/home/index');
        $data['sliders'] = $this->area_model->get_list(array(
            'where' => array('sort>' => 0),
            'limit' => array('9' => '0'),
            'order' => array('sort', 'desc')
        ));
        $data['home_slider_image'] = $this->Home_Slider_model->get_list();
        $data['is_loop_home_slider'] = count($data['home_slider_image']) < 2 ? 'false' : 'true';
        $data['intro_slider_image'] = $this->Intro_Slider_model->get_list();
        if (count($data['intro_slider_image']) == 0)
            $data['is_loop_intro_slider'] = 'true';
        else if (count($data['intro_slider_image']) == 1)
            $data['is_loop_intro_slider'] = 'false';
        else
            $data['is_loop_intro_slider'] = 'true';
        $data['popular'] = $this->load->view('site/slidePopular', $data, TRUE);
        $data['home_slider_image'] = $this->load->view('site/homeSliderImage', $data, TRUE);
        $data['intro_slider_image'] = $this->load->view('site/introSliderImage', $data, TRUE);
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }

}
