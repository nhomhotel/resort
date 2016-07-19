<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'AdminHome.php';

/**
 * Class Report
 */
class Report extends AdminHome
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct(get_class());
    }

    /**
     * @return array
     */
    protected function _get_range() {
        $range = array(
            'custom' => 'Chọn khoảng thời gian',
            'previous_month' => 'Tháng trước',
            'month' => 'Tháng này',
            'previous_week' => 'Tuần trước',
            'week' => 'Tuần này',
            'yesterday' => 'Hôm qua',
            'today' => 'Hôm nay'
        );
        return $range;
    }

    protected function _format_date($date) {
        $date_parts = explode('/', $date);
        if (count($date_parts) === 3) {
            $date = sprintf('%s-%s-%s', $date_parts[2], $date_parts[1], $date_parts[0]);
        }
        return $date;
    }

    /**
     * Show form
     */
    function index()
    {
        /* Render Layout */
        $data['range'] = $this->_get_range();
        $data['title'] = 'Báo cáo';
        $data['description'] = 'Báo cáo trong tháng/tuần/ngày';
        $data['temp'] = 'admin/report/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }

    /**
     * Get Result
     */
    function result()
    {
        $debug = $this->input->post('debug');
        if (!empty($debug)) {
            $this->output->enable_profiler(TRUE);
        }
        /* Get Filter Parameters */
        $data['filters'] = $this->input->post('filters');

        /* Get Result */
        $time = time();
        switch ($data['filters']['range']) {
            case 'previous_month':
                $time = strtotime('first day of previous month');
                $data['filters']['from_day'] = date('d/m/Y', $time);
                $data['filters']['to_day'] = date('d/m/Y', strtotime(date('Y', $time) . '-' . date('m', $time) . '-' . cal_days_in_month(CAL_GREGORIAN, date('m', $time), date('Y', $time))));
                break;
            case 'month':
                $data['filters']['from_day'] = date('d/m/Y', strtotime('first day of this month'));
                $data['filters']['to_day'] = date('d/m/Y', $time);
                break;
            case 'previous_week':
                $data['filters']['from_day'] = date('d/m/Y', strtotime('last monday - 7 day'));
                $data['filters']['to_day'] = date('d/m/Y', strtotime('previous sunday'));
                break;
            case 'week':
                $data['filters']['from_day'] = date('d/m/Y', strtotime('last monday'));
                $data['filters']['to_day'] = date('d/m/Y', $time);
                break;
            case 'yesterday':
                $data['filters']['from_day'] = date('d/m/Y', strtotime('yesterday'));
                $data['filters']['to_day'] = date('d/m/Y', strtotime('yesterday'));
                break;
            case 'today':
                $data['filters']['from_day'] = date('d/m/Y', $time);
                $data['filters']['to_day'] = date('d/m/Y', $time);
                break;
            default:
                $data['filters']['from_day'] = date('d/m/Y', strtotime('- 3 years'));
                $data['filters']['to_day'] = date('d/m/Y', $time);
                break;
        }

        /* Get Range Day */
        $days = date_diff(
            new DateTime($this->_format_date($data['filters']['from_day'])),
            new DateTime($this->_format_date($data['filters']['to_day']))
        )->days;

        $data['days'] = array();
        for ($index = 0; $index <= $days; $index++) {
            $time = strtotime(sprintf('%s + %d day', $this->_format_date($data['filters']['from_day']), $index));
            $data['days'][md5(date('Y-m-d', $time))] = date('d/m', $time);
        }

        $this->db->select('post_room.post_room_id, post_room.parent_id, post_room.post_room_name, order.order_id, order.checkin, order.checkout, order.guests');
        $this->db->from('post_room');
        $this->db->join('order', 'order.post_room_id=post_room.post_room_id');
        $this->db->where('checkin >= "' . $this->_format_date($data['filters']['from_day']) . '" AND checkin <= "' . $this->_format_date($data['filters']['to_day']) . '"');
        $data['result'] = $this->db->get()->result();

        $data['query'] = $this->db->last_query();

        /* Render Layout */
        /* Load Predefined Filter Days */
        $data['range'] = $this->_get_range();
        $data['title'] = 'Kết quả báo cáo';
        $data['description'] = 'Báo cáo trong tháng/tuần/ngày';
        $data['temp'] = 'admin/report/index';
        $this->load->view('admin/layout', isset($data) ? ($data) : NULL);
    }
}

?>