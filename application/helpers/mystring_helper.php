<?php

// admin url
if (!function_exists('admin_url')) {

    function admin_url($str = '') {
        return base_url('admin/' . $str);
    }

}
// pre array
if (!function_exists('pre')) {

    function pre($arr = array()) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

}

if (!function_exists('lang')) {

    function lang($str = '') {
        $CI = & get_instance();
        $lang = $CI->lang->line($str);
        return (!empty($lang)) ? $lang : $str;
    }

}

if (!function_exists('get_lang')) {

    function get_lang() {
        if (!isset($_COOKIE['php_lang'])) {
            return array(
                'lang' => 'vietnamese',
                'suffix' => ''
            );
        } else {
            return array(
                'lang' => $_COOKIE['php_lang'],
                'suffix' => ($_COOKIE['php_lang'] == 'vietnamese') ? '' : '_en'
            );
        }
    }

}


if (!function_exists('str_like')) {

    function str_like($str) {
        $str = trim($str);
        $str = stripUnicode($str);
        $str = str_replace(' ', '%', $str);
        return $str;
    }

}

if (!function_exists('stripUnicode')) {

    function stripUnicode($str) {
        if (!$str)
            return false;
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd' => 'đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y' => 'ý|ỳ|ỷ|ỹ|y',
        );
        foreach ($unicode as $nonUnicode => $uni)
            $str = preg_replace("/(" . $uni . ")/", $nonUnicode, $str);
        return $str;
    }

}

function vn_str_filter($str) {

    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd' => 'đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D' => 'Đ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach ($unicode as $nonUnicode => $uni) {

        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }

    return $str;
}

function url_origin($s, $use_forwarded_host = false) {
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on' );
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . ( ( $ssl ) ? 's' : '' );
    $port = $s['SERVER_PORT'];
    $port = ( (!$ssl && $port == '80' ) || ( $ssl && $port == '443' ) ) ? '' : ':' . $port;
    $host = ( $use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST']) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null );
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

function full_url($s, $use_forwarded_host = false) {
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}

function validateDate($date, $format = 'd-m-Y') {
    $format = str_replace('/', '-', $format);
    $date = str_replace('/', '-', $date);
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

if (!function_exists('numberFormatToCurrency')) {

    function numberFormatToCurrency($number, $decimals = 2) {
//        return $string;
        $CI = & get_instance();
        $decimals_system_decide = true;
        if ($CI->config->item('number_of_decimals') !== NULL && $CI->config->item('number_of_decimals') != '') {
            $decimals = (int) $CI->config->item('number_of_decimals');
            $decimals_system_decide = false;
        }

        $thousands_separator = $CI->config->item('thousands_separator') ? $CI->config->item('thousands_separator') : ',';
        $decimal_point = $CI->config->item('decimal_point') ? $CI->config->item('decimal_point') : '.';
        if ($number >= 0) {
            $ret = number_format($number, $decimals, $decimal_point, $thousands_separator);
        } else {
            $ret = '<span style="white-space:nowrap;">-</span>' . number_format(abs($number), $decimals, $decimal_point, $thousands_separator) . ' ' . $currency_symbol;
        }

        if ($decimals_system_decide && $decimals >= 2) {
            return preg_replace('/(?<=\d{2})0+$/', '', $ret);
        } else {
            return $ret;
        }
    }

}

if (!function_exists('getConfirmEmailCode')) {

    function getConfirmEmailCode($str, $para = array()) {
        $CI = & get_instance();
        $result = base_url();
        $result.="user/confirm?confirm_code=" . md5(convertStringToNumber($str));
        foreach ($para as $key => $value) {
            $result.="&" . $key . '=' . $value;
        }
        return $result;
    }

}

if (!function_exists('convertStringToNumber')) {

    function convertStringToNumber($str) {
        $CI = & get_instance();
        $encode_validate_user = $CI->config->item("encode_user");
        $encode_str = crc32($str);
        if ($encode_str < 0)
            $encode_str = -$encode_str;
        return $encode_validate_user->encode($encode_str);
    }

}

if (!function_exists('securityServer')) {

    function securityServer($str) {
        $CI = & get_instance();
        if (is_array($str)) {
            foreach ($str as &$row) {
                $row = convert_accented_characters(vn_str_filter($CI->security->xss_clean(trim($row))));
            }
        } else
            $str = convert_accented_characters(vn_str_filter($CI->security->xss_clean(trim($str))));
        return ($str);
    }

}

if (!function_exists('onlyCharacter')) {

    function onlyCharacter($str) {
        $CI = & get_instance();
        $str = preg_replace('/[^a-zA-Z0-9 \/\-,]/', ' ', $str);
        $str = preg_replace('/[ ]{2,}/', ' ', $str);
        return ($str);
    }

}

function getStringNumber($amount) {
    if ($amount <= 0) {
        return $textnumber = "Tiền phải là số nguyên dương lớn hơn số 0";
    }
    $Text = array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
    $TextLuythua = array("", "nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
    $textnumber = "";
    $length = strlen($amount);

    for ($i = 0; $i < $length; $i++)
        $unread[$i] = 0;

    for ($i = 0; $i < $length; $i++) {
        $so = substr($amount, $length - $i - 1, 1);

        if (($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)) {
            for ($j = $i + 1; $j < $length; $j ++) {
                $so1 = substr($amount, $length - $j - 1, 1);
                if ($so1 != 0)
                    break;
            }

            if (intval(($j - $i ) / 3) > 0) {
                for ($k = $i; $k < intval(($j - $i) / 3) * 3 + $i; $k++)
                    $unread[$k] = 1;
            }
        }
    }

    for ($i = 0; $i < $length; $i++) {
        $so = substr($amount, $length - $i - 1, 1);
        if ($unread[$i] == 1)
            continue;

        if (($i % 3 == 0) && ($i > 0))
            $textnumber = $TextLuythua[$i / 3] . " " . $textnumber;

        if ($i % 3 == 2)
            $textnumber = 'trăm ' . $textnumber;

        if ($i % 3 == 1)
            $textnumber = 'mươi ' . $textnumber;


        $textnumber = $Text[$so] . " " . $textnumber;
    }

    //Phai de cac ham replace theo dung thu tu nhu the nay
    $textnumber = str_replace("không mươi", "lẻ", $textnumber);
    $textnumber = str_replace("lẻ không", "", $textnumber);
    $textnumber = str_replace("mươi không", "mươi", $textnumber);
    $textnumber = str_replace("một mươi", "mười", $textnumber);
    $textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
    $textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
    $textnumber = str_replace("mười năm", "mười lăm", $textnumber);
    return ucfirst($textnumber . "đồng chẵn");
}

if (!function_exists('isTokent')) {

    function isTokent($str) {
        $CI = & get_instance();
        if (strlen($str))
            ;
        $str = preg_replace('/[^a-zA-Z0-9 \/\-,]/', ' ', $str);
        $str = preg_replace('/[ ]{2,}/', ' ', $str);
        return ($str);
    }

}

if (!function_exists('getStatus')) {

    function getStatus($stdData, $stdID) {
        $CI = & get_instance();
        $return = '';
        if (get_class($stdData) === 'stdClass') {
            if ($stdData->status == 1) {
                $return = $CI->load->view('admin/template/tmp_status', array('index' => '1', 'id' => $stdID), true);
            } else {
                $return = $CI->load->view('admin/template/tmp_status', array('index' => '0', 'id' => $stdID), true);
            }
        }
        return ($return);
    }

}

if (!function_exists('shortNews')) {

    function shortNews($content, $length=250) {
        $CI = & get_instance();
        $return = '';
        if(!empty($content)){
            if(strlen($content)>250)$return=  '“'.substr ($content, 0,250).'“';
            else $return = '“'.$content.'“';
        }
        return ($return);
    }

}

if (!function_exists('NewsUrl')) {

    function NewsUrl($content,$id) {
        $return = '';
        if(!empty($content)&&!empty($id)){
            $content = strtolower(str_replace(' ', '-', onlyCharacter(vn_str_filter($content))));
            $return = base_url().'danh-sach-tin/'.  $content.'-'.$id;
        }
        else $return = base_url ().'tin-tuc';
        return ($return);
    }

}
?>