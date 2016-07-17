<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends MY_Model {

    var $table = 'area';
    var $key = 'area_id';

    public function getListAll() {
        return $this->db->get($this->table);
    }

}
