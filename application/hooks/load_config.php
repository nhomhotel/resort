<?php
require_once APPPATH .'libraries/Hashids/HashGenerator.php';
require_once APPPATH .'libraries/Hashids/Hashids.php';
use Hashids\Hashids;
function load_config(){
    $CI = &get_instance();
    foreach ($CI->App_config_model->get_all()->result() as $app_config){
        $CI->config->set_item($app_config->key, $app_config->value);
    }
    
    if($CI->config->item('language')){
        $CI->lang->switch_to($CI->config->item('language'));
    }
    $CI->load->helper('lang');
    $language_tmp = getDefaultLanguage();
    $language = $CI->session->userdata('language');
    if($language ==NULL){
        if(preg_match('/[vi|vietname|vn]/', $language_tmp)){
            $CI->session->set_userdata('language','vietnamese');
        }else{
            $CI->session->set_userdata('language','english');
        }
    }
    $language = $CI->session->userdata('language');
    $CI->lang->switch_to($language);
    
//    if($language!=null){
//        $CI->lang->switch_to($language);
//    }
//    else{
//        $CI->session->set_userdata('language','english');
//        $CI->lang->switch_to('english');
//    }
//    
//    if(isset($CI->session->userdata('language'))){
//        $CI->lang->switch_to($CI->session->userdata('language'));
//    }else{
//        $CI->lang->switch_to($CI->session->userdata('english'));
//    }
}

function load_encode(){
    $CI = &get_instance();
    $encode = new Hashids('this is encode id', 10, 'abcdefghijklmnopqrstxyz1234567890');
    $encode_validate_user = new Hashids('this is validate user pass email', 10, 'abcdefghijklmnopqrstxyz1234567890');
    $encode_pass_user = new Hashids('this is password usser', 10, 'abcdefghijklmnopqrstxyz1234567890');
    $CI->config->set_item('encode_id',$encode);
    $CI->config->set_item('encode_user',$encode_validate_user);
    $CI->config->set_item('encode_pass_user',$encode_pass_user);
}