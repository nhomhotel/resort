<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends MY_Controller
{
    const ITEM_PER_PAGE = 10;

    function __construct()
    {
        parent:: __construct();
        $this->load->model('post_room_model');
        $this->load->model('Address_model');
        $this->load->model('Amenities_model');
        $this->load->model('Experience_model');
        $current_language = $this->session->userdata('language');
        if (empty($current_language)) {
            $current_language = 'vietnamese';
        }
        $this->lang->load('room_search_lang', $current_language);
    }

    public function index()
    {
        redirect(base_url());
    }

    /*
    public function search(){
        $data['encode'] = $this->config->item('encode_id');
        $_location = trim($this->input->get('location'));
        $query = '?';
        if($_location!=NULL) $_location = vn_str_filter (strtolower ($_location));

        if(isset($_GET['location'])&&trim($_GET['location'])!=''){
            $data['location'] = trim($_GET['location']);
            $query .='location=?'.trim($_GET['location']);
        }
        if(isset($_GET['checkin'])&&trim($_GET['checkin'])!=''){
            $data['checkin'] = trim($_GET['checkin']);
            $query .='checkin=?'.trim($_GET['checkin']);
        }
        if(isset($_GET['checkout'])&&trim($_GET['checkout'])!=''){
            $data['checkout'] = trim($_GET['checkout']);
            $query .='checkout=?'.trim($_GET['checkout']);
        }
        if(isset($_GET['guest'])&&trim($_GET['guest'])!=''){
            $data['guest'] = trim($_GET['guest']);
            $query .='guest=?'.trim($_GET['guest']);
        }

        $search_input = array(
            'location'  =>  $_location,
            'checkin'   =>  trim($this->input->get('checkin')),
            'checkout'  =>  trim($this->input->get('checkout')),
            'guest'     =>  trim($this->input->get('guest')),
        );
        $total = $this->post_room_model->search($search_input)->num_rows();
        $data['total'] = $total;

        if($query=='?')$query='';
        $config['total_rows'] = $data['total'];
        $config['base_url'] = rtrim(base_url()."room/search?location=".$query);
        $config['per_page'] = 4;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['uri_segment'] = 4;
        // config pagintion với bootraps
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['pagination_link'] = $this->pagination->create_links();
        $data['per_page'] = $config['per_page'];

        $amenities = $this->input->post('amenities')?$this->input->post('amenities'):'';
        $experiences = $this->input->post('experiences')?$this->input->post('experiences'):'';
        $bedroom = $this->input->post('bedroom')?$this->input->post('bedroom'):'';
        $bathroom = $this->input->post('bathroom')?$this->input->post('bathroom'):'';
        $beds = $this->input->post('beds')?$this->input->post('beds'):'';

        if($amenities!=''||$experiences!=''||$bedroom!=''||$bathroom!=''||$beds!=''){
            echo json_encode(array(
                'result'    =>'result',
            ));
            exit;
        }

        $start = isset($_GET['page'])&&trim($_GET['page'])!=''?($_GET['page']-1)*$data['per_page']:0;
        $this->load->library('pagination', $config);
        $list_room = $this->post_room_model->search($search_input,$data['per_page'],$start)->result();
        if(count($list_room)>0){
        //get room type
            foreach ($list_room as $line => $room){
                $data['room_type'][$line] = array($room->house_type_name, $room->house_type_id);
                $data['amenities'] = !isset($data['amenities'])?explode(',', $room->amenities):array_merge($data['amenities'],array_diff(explode(',', $room->amenities),$data['amenities']));
                $data['experience'] = !isset($data['experience'])?explode(',', $room->experience):array_merge($data['experience'],array_diff(explode(',', $room->experience),$data['experience']));
                $data['price_range'][$line] = $room->price_night_vn;
            }
            $data['table_amenities']= get_checkbox_manage_table('amenities','Tiện nghi',  $this, 120,$this->Amenities_model->getListAll());
            $data['table_experiences'] = get_checkbox_manage_table('experiences','Trải nghiệm',  $this, 120,$this->Experience_model->getListAll());
            $data['list_room'] = $list_room;
            sort($data['price_range']);
            $data['price_range_min'] = min($data['price_range']);
            $data['price_range_max'] = $data['price_range_min']*100; 
            unset($data['price_range']);
            if($list_room){
                    $data['list_room'] = $list_room;
            }
            else{
                $data['list_room'] = NULL;
            }
        }
        $data['temp'] = ('site/room/list_room');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
}
    */

    function room_detail($id)
    {
        if ($id == null) {
            redirect(base_url());
        }
        $encode = $this->config->item('encode_id')->decode($id);

        if (count($encode) <= 0) {
            redirect(base_url());
        } else {
            $data['id_encode'] = $id;
        }

        if (isset($_GET['ch_in']) && trim($_GET['ch_in']) != '') {
            $data['ch_in'] = trim($_GET['ch_in']);
        }
        if (isset($_GET['ch_out']) && trim($_GET['ch_out']) != '') {
            $data['ch_out'] = trim($_GET['ch_out']);
        }
        if (isset($_GET['guest']) && trim($_GET['guest']) != '') {
            $data['guest'] = trim($_GET['guest']);
        }
        $this->load->model('amenities_model');
        $id_decode = (int)$encode[0];
        $data_room = array(
            'room_id' => $id_decode,

        );
        $this->session->set_userdata($data_room);
        $input = array();

        $list_amenities = $this->amenities_model->get_list();
        $data['list_amenities'] = $list_amenities;
        $info = $this->post_room_model->getInfoDetail($id_decode, $input);

        if ($info) {
            $data['info'] = $info;
        }
        $data['meta_title'] = 'room_detail';
        $data['temp'] = ('site/room/room_detail');
        $this->load->view('site/layout_index', isset($data) ? ($data) : null);
    }

    function order_room($id = '')
    {
        if (!isset($_SESSION['user_name'])) {
            redirect('home/register');
        } else {
            $user_id = $this->session->userdata('user_id');
            if (!isset($user_id) || $user_id == '') {
                redirect(base_url());
            }
            if ($id == '') {
                redirect(base_url());
            }
            $id_decode = $this->config->item('encode_id')->decode($id);
            if (count($id_decode) <= 0) {
                redirect(base_url());
            } else {
                $data['id_encode'] = $id;
            }
            $checkin = $this->input->get('checkin') ? $this->input->get('checkin') : '';
            $checkout = $this->input->get('checkout') ? $this->input->get('checkout') : '';
            $guests = $this->input->get('guests') ? $this->input->get('guests') : '';
            if ($checkin == '' || $checkout == '' || $guests == '') {
                redirect(base_url() . 'room/room_detail/' . $data['id_encode']);
            }
            $input = array(
                'where' => array(
                    'post_room_id' => $id_decode[0],
                )
            );
            $date1 = new DateTime();
            $date2 = new DateTime();
            $dateNow = new DateTime();
            $data['checkin'] = $date1->setDate(
                date('Y', strtotime(str_replace('/', '-', $checkin))),
                date('m', strtotime(str_replace('/', '-', $checkin))),
                date('d', strtotime(str_replace('/', '-', $checkin)))
            );
            $data['guests'] = $guests;
            $data['checkout'] = $date2->setDate(
                date('Y', strtotime(str_replace('/', '-', $checkout))),
                date('m', strtotime(str_replace('/', '-', $checkout))),
                date('d', strtotime(str_replace('/', '-', $checkout)))
            );
            if ($data['checkin'] > $data['checkout']) {
                redirect(base_url() . 'room/room_detail/' . $data['id_encode']);
            }
            if ($data['checkin'] < $dateNow || $data['checkout'] < $dateNow) {
                redirect(base_url() . 'room/room_detail/' . $data['id_encode']);
            }
            $prices = $this->post_room_model->get_row($input);
            $data['name_room'] = $prices->post_room_name;
            //giá 1 đêm
            $data['price_night_vn'] = $prices->price_night_vn;
            $data['max_guest'] = $prices->num_guest;
            // giá vượt quá số người
            $data['price_guest_more_vn'] = $prices->price_guest_more_vn;
            //phí dọn dẹp
            $data['clearning_fee_vn'] = $prices->clearning_fee_vn;
            $data['sub_day'] = $data['checkout']->diff($data['checkin']);
            $data['distance_day'] = $data['sub_day']->days + 1;
            $data['price_all_night'] = $data['distance_day'] * $data['price_night_vn'];
            if ($guests <= $data['max_guest']) {
                $data['guest_change'] = 0;
            } else {
                $data['guest_change'] = $guests - $data['max_guest'];
            }
            if ($data['guest_change'] <= 0) {
                $data['price_all_night_add_fee'] = $data['price_all_night'] + $data['clearning_fee_vn'];
            } else {
                $data['price_all_night_add_fee'] = $data['price_all_night'] + $data['clearning_fee_vn'] + ($data['guest_change']) * $data['price_guest_more_vn'];
            }
            $input = array();
            $input = array(
                'where' => array(
                    'user_id' => $user_id,
                )
            );
            $data['user'] = $this->user_model->get_row($input);
//                        pre($data['user']);return;
            $data['meta_title'] = 'order room';
            $data['temp'] = ('site/room/order');
            $this->load->view('site/layout_index', isset($data) ? ($data) : null);
        }
    }

    function validate_room($id = '')
    {
        $data['temp'] = ('site/room/order');
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }

    function list_room()
    {
        $amenities = $this->input->get('amenities') ? $this->input->get('amenities') : '';
        $experiences = $this->input->get('experiences') ? $this->input->get('experiences') : '';
        $bedroom = $this->input->get('bedroom') ? $this->input->get('bedroom') : '';
        $bathroom = $this->input->get('bathroom') ? $this->input->get('bathroom') : '';
        $beds = $this->input->get('beds') ? $this->input->get('beds') : '';
        $amenities = $this->input->get('amenities') ? $this->input->get('amenities') : '';
        $amenities = $this->input->get('amenities') ? $this->input->get('amenities') : '';


    }

    public function search()
    {
        $show_query = $this->input->get('show_query');
        if (!empty($show_query)) {
            $this->output->enable_profiler(TRUE);
        }

        $data = array();
        $data['encode'] = $this->config->item('encode_id');
        $data['per_page'] = self::ITEM_PER_PAGE;
        $data['sort_by'] = 'popular';

        /* Step 1. Get Parameters */

        $filters = array();

        if (!empty($_GET)) {
            $params = $_GET;
            foreach ($params as $key => $value) {
                $data[$key] = $value;
                if ($key != 'page') {
                    $filters[] = $key . '=' . $value;
                }
            }
            if (!empty($data['guests'])) {
                $data['guest'] = $data['guests'];
            }
            if (isset($data['amenities_ids'])) {
                $data['amenities_ids'] = explode(',', $data['amenities_ids']);
            }
            if (isset($data['experiences_ids'])) {
                $data['experiences_ids'] = explode(',', $data['experiences_ids']);
            }
            if (!isset($data['per_page'])) {
                $data['per_page'] = self::ITEM_PER_PAGE;
            }
        }

        /* Step 2. Select Room Ordered In Filter Range Day */

        if (!empty($params['checkin']) && !empty($params['checkout'])) {
            $date_parts = explode('/', $params['checkin']);
            if (count($date_parts) === 3) {
                $checkin_day = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];
            }
            $date_parts = explode('/', $params['checkout']);
            if (count($date_parts) === 3) {
                $checkout_day = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];
            }
        }

        if (isset($checkin_day) && isset($checkout_day)) {
            $this->db->select('DISTINCT `post_room_id`', false);
            $this->db->from('order');
            $this->db->where('(checkin >= "'.$checkin_day.'" AND checkin <= "'.$checkout_day.'")');
            $this->db->or_where('(checkout >= "'.$checkin_day.'" AND checkout <= "'.$checkout_day.'")');
            $result = $this->db->get()->result();
            $exclude_post_room_ids = array();
            foreach ($result as $row) {
                $exclude_post_room_ids[$row->post_room_id] = $row->post_room_id;
            }
        }

        /* Step 3. Generate query by filter parameters */

        $this->db->select('SQL_CALC_FOUND_ROWS null as rows', false);
        $this->db->select('post_room.*,house_type.house_type_name,house_type.house_type_id,address.address_detail,room_type.room_type_name');
        $this->db->from('post_room');
        $this->db->join('address', 'address.address_id = post_room.address_id');
        $this->db->join('room_type', 'room_type.room_type_id = post_room.room_type');
        $this->db->join('house_type', 'house_type.house_type_id = post_room.house_type');
        $this->db->join('user c', 'post_room.user_id = c.user_id', 'left');
        $this->db->join('role f', 'c.role_id = f.role_id', 'left');
        $this->db->join('post_room_amenities pa', 'post_room.post_room_id = pa.post_room_id', 'left');
        $this->db->join('post_room_experience pe', 'post_room.post_room_id = pe.post_room_id', 'left');

        if (!empty($params)) {

            /* Filter Locations */

            if (!empty($params['location'])) {
                $this->load->helper('text');
                $location_parts = explode(',', $params['location']);
                foreach ($location_parts as $index => $location) {
                    $location_parts[$index] = str_replace(' ', '', strtolower(trim(convert_accented_characters($location_parts[$index]))));
                }
                if (count($location_parts) >= 3) {
                    $this->db->where('(replace(lower(address_street_ascii), " ", "") LIKE \'%' . $location_parts[0] . '%\' OR ' . 'replace(lower(district_ascii), " ", "") LIKE \'%' . $location_parts[0] . '%\')');
                    $this->db->where('replace(lower(provincial_ascii), " ", "") LIKE \'%' . $location_parts[1] . '%\'');
                    $this->db->where('replace(lower(country_ascii), " ","") LIKE \'%' . $location_parts[2] . '%\'');
                } elseif (count($location_parts) == 2) {
                    $this->db->where('(replace(lower(address_street_ascii), " ", "") LIKE \'%' . $location_parts[0] . '%\' OR ' . 'replace(lower(provincial_ascii), " ", "") LIKE \'%' . $location_parts[0] . '%\')');
                    $this->db->where('replace(lower(country_ascii), " ","") LIKE \'%' . $location_parts[1] . '%\'');
                } else {
                    $this->db->where('(replace(lower(address_street_ascii), " ", "") LIKE \'%' . $location_parts[0] . '%\' OR ' . 'replace(lower(district_ascii), " ", "") LIKE \'%' . $location_parts[0] . '%\'  OR ' . 'replace(lower(provincial_ascii), " ", "") LIKE \'%' . $location_parts[0] . '%\' OR ' . 'replace(lower(country_ascii), " ","") LIKE \'%' . $location_parts[0] . '%\')');
                }
            }

            /* Filter Checkin, Checkout Day */

            if (!empty($exclude_post_room_ids)) {
                $this->db->where_not_in('post_room.post_room_id', $exclude_post_room_ids);
            }

            /* Filter By Num Guests */

            if (!empty($params['guests'])) {
                $this->db->where('post_room.num_guest >= ', intval($params['guests']));
            }

            /* Filter By Num Bathrooms */

            if (!empty($params['bedrooms'])) {
                if (intval($params['bedrooms']) < 10) {
                    $this->db->where('post_room.num_bedroom', intval($params['bedrooms']));
                } else {
                    $this->db->where('post_room.num_bedroom >= ', intval($params['bedrooms']));
                }
            }

            /* Filter By Num Bathrooms */

            if (!empty($params['bathrooms'])) {
                if (intval($params['bathrooms']) < 10) {
                    $this->db->where('post_room.num_bathroom', intval($params['bathrooms']));
                } else {
                    $this->db->where('post_room.num_bathroom >= ', intval($params['bathrooms']));
                }
            }

            $current_language = $this->session->userdata('language');
            if (empty($current_language)) {
                $current_language = 'vietnamese';
            }
            $data['current_language'] = $current_language;
            $dollar_value = 22000;

            /* Filter By Min / Max value */

            if (!empty($params['min'])) {
                switch ($current_language) {
                    case 'vietnamese':
                        $params['min'] = intval($params['min']) * $dollar_value;
                        $this->db->where('post_room.price_night_vn >= ' . intval($params['min']));
                        break;
                    case 'english':
                        $this->db->where('post_room.price_night_en >= ' . intval($params['min']));
                        break;
                    default:
                        $params['min'] = intval($params['min']) * $dollar_value;
                        $this->db->where('post_room.price_night_vn >= ' . $params['min']);
                        break;
                }
            }

            if (!empty($params['max'])) {
                switch ($current_language) {
                    case 'vietnamese':
                        $params['max'] = intval($params['max']) * $dollar_value;
                        $this->db->where('post_room.price_night_vn <= ' . intval($params['max']));
                        break;
                    case 'english':
                        $this->db->where('post_room.price_night_en <= ' . intval($params['max']));
                        break;
                    default:
                        $params['max'] = intval($params['max']) * $dollar_value;
                        $this->db->where('post_room.price_night_vn <= ' . intval($params['max']));
                        break;
                }
            }

            /* Filter By Num Beds */

            if (!empty($params['beds'])) {
                if (intval($params['beds']) < 10) {
                    $this->db->where('post_room.num_bed', intval($params['beds']));
                } else {
                    $this->db->where('post_room.num_bed >= ', intval($params['beds']));
                }
            }

            /* Filter By Amenities */

            if (!empty($data['amenities_ids'])) {
                $this->db->where_in('pa.amenities_id', $data['amenities_ids']);
            }

            /* Filter By Experiences */

            if (!empty($data['experiences_ids'])) {
                $this->db->where_in('pe.experience_id', $data['experiences_ids']);
            }

            /* Filter By Rent Type */

            if (!empty($params['rent_type'])) {
                if ($params['rent_type'] == 'house') {
                    $this->db->where('post_room.parent_id = 0');
                } elseif ($params['rent_type'] == 'room') {
                    $this->db->where('post_room.parent_id <> 0');
                }
            }

            /* Sort By */
            if (!empty($params['sort_by']) && in_array($params['sort_by'], array('price_up', 'price_down'))) {
                switch ($params['sort_by']) {
                    case 'price_up':
                        $direction = 'ASC';
                        break;
                    case 'price_down':
                        $direction = 'DESC';
                        break;
                    default:
                        break;
                }
                switch ($current_language) {
                    case 'vietnamese':
                        $this->db->order_by('post_room.price_night_vn', $direction);
                        break;
                    case 'english':
                        $this->db->order_by('post_room.price_night_en', $direction);
                        break;
                    default:
                        $this->db->order_by('post_room.price_night_vn', $direction);
                        break;
                }
            }
        }

        $start = isset($_GET['page']) && trim($_GET['page']) != '' ? ($_GET['page'] - 1) * $data['per_page'] : 0;
        $this->db->group_by('post_room.post_room_id');
        $this->db->limit(self::ITEM_PER_PAGE);
        $this->db->offset($start);
        $result = $this->db->get();
        $data['total'] = $this->db->query('SELECT FOUND_ROWS() count;')->row()->count;
        $list_room = $result->result();
        $result->free_result();

        if (count($list_room) > 0) {
            //get room type
            foreach ($list_room as $line => $room) {
                $data['room_type'][$line] = array($room->house_type_name, $room->house_type_id);
                $data['amenities'] = !isset($data['amenities']) ? explode(',', $room->amenities) : array_merge($data['amenities'], array_diff(explode(',', $room->amenities), $data['amenities']));
                $data['experience'] = !isset($data['experience']) ? explode(',', $room->experience) : array_merge($data['experience'], array_diff(explode(',', $room->experience), $data['experience']));
                $data['price_range'][$line] = $room->price_night_vn;
            }

            $data['amenities'] = $this->Amenities_model->getListAll()->result();
            $data['experiences'] = $this->Experience_model->getListAll()->result();

            $data['list_room'] = $list_room;
            sort($data['price_range']);
            $data['price_range_min'] = min($data['price_range']);
            $data['price_range_max'] = $data['price_range_min'] * 100;
            unset($data['price_range']);
            $data['list_room'] = $list_room;
        }

        $data['temp'] = ('site/room/list_room');

        $config['base_url'] = rtrim(base_url() . 'room/search?' . implode('&', $filters));
        $config['total_rows'] = $data['total'];
        $config['per_page'] = $data['per_page'];
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['pagination_link'] = $this->pagination->create_links();
        $this->load->view('site/layout', isset($data) ? ($data) : null);
    }
}

?>