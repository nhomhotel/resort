<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'AdminHome.php';

class Calendar extends AdminHome
{

    function __construct()
    {
        parent::__construct(get_class());
    }

    function index()
    {
        /* Prepared times */

        $time = time();
        $begin_day = date('d/m/Y', strtotime('first day of this month'));
        $end_day = date('d/m/Y', strtotime(date('Y', $time) . '-' . date('m', $time) . '-' . cal_days_in_month(CAL_GREGORIAN, date('m', $time), date('Y', $time))));
				$userLogin = $this->User_model->get_logged_in_employee_info();
        /* Find Ordered Room In Range Day */

        $this->db->select('post_room.post_room_id, post_room.post_room_name, order.order_id, order.checkin, order.checkout, order.refer_id, order.guests AS num_guests');
        $this->db->from('post_room');
        $this->db->join('order', 'order.post_room_id = post_room.post_room_id');
				if($userLogin->role_id==2)
            $this->db->where('post_room.user_id', $userLogin->user_id);
        $this->db->where('checkin >= "' . $begin_day . '" OR checkout <= "' . $end_day . '"');
        $result = $this->db->get()->result();

        /* Register Events In Calendar */

        $events = array();

        foreach ($result as $row) {
            if (empty($row->refer_id)||$row->refer_id!=0) {
                $item = array(
                    'title' => '(' . $row->num_guests . ' KH) thuê phòng ' . htmlspecialchars($row->post_room_name),
                    'start' => $row->checkin,
                    'end' => date('Y-m-d', strtotime($row->checkout) + (24 * 60 * 60)),
                    'url' => site_url('admin/post_room/edit/' . $row->post_room_id)
                );
                $events[] = $item;
            }
        }

        /* Render Layout */

        $data['events'] = json_encode($events);
        $data['title'] = 'Lịch đăng ký phòng';
        $data['description'] = 'Danh sách các phòng đã đăng ký theo lịch trong tháng/tuần/ngày';
        $data['temp'] = 'admin/calendar/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }
}

?>