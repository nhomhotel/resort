<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Slider_model extends MY_Model {

    var $table = 'home_slider';
    var $key = 'home_slider_id';

    public function getListAll() {
        return $this->db->get($this->table);
    }

}
