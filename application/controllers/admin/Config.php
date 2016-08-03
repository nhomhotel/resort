<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'AdminHome.php';

class Config extends AdminHome {

    public function __construct() {
        parent::__construct(get_class());
    }

    public function index() {
        $data['temp'] = ('admin/config');
        $this->load->view('admin/layout', isset($data) ? ($data) : null);
    }

    public function save() {
        //upload file
        $data_save = array(
            'nameCompany' => $this->input->post('name_company') ? trim($this->input->post('name_company')) : '',
            'name_website' => $this->input->post('name_website') ? trim($this->input->post('name_website')) : '',
            'language' => $this->input->post('language') ? trim($this->input->post('language')) : 'vietnamese',
            'address_email' => $this->input->post('address_email') ? trim($this->input->post('address_email')) : '',
            'pass_email' => $this->input->post('pass_email') ? trim($this->input->post('pass_email')) : '',
            'item_per_page_site' => $this->input->post('item_per_page_site') ? trim($this->input->post('item_per_page_site')) : '',
            'item_per_page_system' => $this->input->post('item_per_page_system') ? trim($this->input->post('item_per_page_system')) : '',
            'tax' => $this->input->post('tax') ? trim($this->input->post('tax')) : 0,
            'thousands_separator' => $this->input->post('thousands_separator') ? trim($this->input->post('thousands_separator')) : ',',
            'decimal_point' => $this->input->post('decimal_point') ? trim($this->input->post('decimal_point')) : '.',
            'number_of_decimals' => $this->input->post('number_of_decimals') ? trim($this->input->post('number_of_decimals')) : 2,
            
        );
        if ($this->App_config_model->batch_save($data_save))
            echo json_encode(array('title' => 'success', 'message' => lang('config_saved_successfully')));
        else {
            echo json_encode(array('title' => 'error', 'message' => lang('config_saved_error')));
        }
    }

}