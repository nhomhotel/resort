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
            '' => '-- Chọn thời điểm --',
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

    /*
     * @var $date string
     * @return $date string
     */
    protected function _format_date($date) {
        $date_parts = explode('/', $date);
        if (count($date_parts) === 3) {
            $date = sprintf('%s-%s-%s', $date_parts[2], $date_parts[1], $date_parts[0]);
        }
        return $date;
    }

    /*
     * Maximum at level 2
     * @var $column string
     * @return $column string
     */
    protected function _get_next_column($column) {
        if (strlen($column) == 1) {
            if ($column != 'Z') {
                $column = chr(ord($column) + 1);
            } else {
                $column = 'AA';
            }
        } elseif (strlen($column) == 2) {
            if ($column[1] != 'Z') {
                $column[1] = $this->_get_next_column($column[1]);
            }
        }
        return $column;
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
                $data['filters']['to_day'] = date('d/m/Y', strtotime(date('Y', $time) . '-' . date('m', $time) . '-' . cal_days_in_month(CAL_GREGORIAN, date('m', $time), date('Y', $time))));
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
            case 'custom':
                /* Do nothing to hold date filters */
                break;
            default:
                $data['filters']['from_day'] = date('d/m/Y', strtotime('- 1 years'));
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
            $data['days'][date('Y-m-d', $time)] = array(
                'date' => date('d/m', $time),
                'guests' => 0,
                'rooms' => array()
            );
        }

        /* Get Query Result */
        $this->db->select('post_room.post_room_id, post_room.parent_id, post_room.post_room_name, order.order_id, order.checkin, order.checkout, order.guests, order.refer_id');
        $this->db->from('post_room');
        $this->db->join('order', 'order.post_room_id = post_room.post_room_id');
        $this->db->where('checkin >= "' . $this->_format_date($data['filters']['from_day']) . '" AND checkout <= "' . $this->_format_date($data['filters']['to_day']) . '"');
        $this->db->order_by('checkin', 'ASC');
        $data['result'] = $this->db->get()->result();

        /* Sum Guests When Needed */
        $data['collection'] = array();
        foreach ($data['result'] as $key => $row) {
            foreach ($data['result'] as $inner_row) {
                if ($inner_row->parent_id == $row->post_room_id || $inner_row->post_room_id == $row->post_room_id) {
                    if (isset($data['result'][$key]->visible)) {
                        $data['result'][$key]->visible += 1;
                    } else {
                        $data['result'][$key]->visible = 0;
                    }
                    $data['result'][$key]->children[] = $inner_row;
                }
            }
            foreach($data['days'] as $key => $day) {
                if (strtotime($key) >= strtotime($row->checkin) && strtotime($key) <= strtotime($row->checkout)) {
                    if (empty($row->refer_id)) {
                        $data['days'][$key]['guests'] += intval($row->guests);
                        @$data['days'][$key]['rooms'][$row->post_room_id] += intval($row->guests);
                    }
                }
            }
        }

        /* Render Collection */
        foreach ($data['result'] as $row) {
            $data['collection'][$row->post_room_id] = $row;
        }

        $export_excel = $this->input->post('export_excel');
        if (!empty($export_excel)) {

            /* Require Excel Lib */
            require_once (APPPATH . 'libraries/PHPExcel/Classes/PHPExcel.php');
            $this->load->helper('download');

            $obj_excel = new PHPExcel();
            $obj_excel->getProperties()->setCreator('saddsas')
                ->setLastModifiedBy('adsaas')
                ->setTitle('Lịch đặt phòng theo tháng')
                ->setSubject('')
                ->setDescription('Danh sách lịch đặt phòng theo tháng')
                ->setKeywords('Booking')
                ->setCategory('Booking Report');

            $sheet = 0;
            $row_index = 1;
            $obj_excel->setActiveSheetIndex($sheet);
            $obj_excel->getActiveSheet()->mergeCells("A$row_index:Z$row_index")->setCellValue("A$row_index", 'LỊCH ĐẶT PHÒNG TỪ NGÀY ('.$data['filters']['from_day'].' - '.$data['filters']['to_day'].')');
            $obj_excel->getActiveSheet()->getStyle("A$row_index")->getAlignment()->setWrapText(true);
            $obj_excel->getActiveSheet()->getStyle("A$row_index")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $row_index++;
            $obj_excel->getActiveSheet()->setCellValue("A$row_index", 'STT');
            $obj_excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $obj_excel->getActiveSheet()->setCellValue("B$row_index", 'Căn hộ');
            $obj_excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $obj_excel->getActiveSheet()->setCellValue("C$row_index", 'Phòng');
            $obj_excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $column_index = 'C';

            foreach($data['days'] as $key => $day) {
                $obj_excel->getActiveSheet()->setCellValue($this->_get_next_column($column_index) . $row_index, $day['date']);
                $column_index = $this->_get_next_column($column_index);
            }

            $row_index++;
            $num_house = 1;
            foreach ($data['collection'] as $row) {
                if (empty($row->parent_id)) {
                    $obj_excel->getActiveSheet()->setCellValue("A$row_index", $num_house);
                    $obj_excel->getActiveSheet()->setCellValue("B$row_index", $row->post_room_name);
                }
                if (!empty($row->parent_id)) {
                    $obj_excel->getActiveSheet()->setCellValue("C$row_index", $row->post_room_name);
                } else {
                    $obj_excel->getActiveSheet()->setCellValue("C$row_index", 'Nguyên căn');
                }
                $column_index = 'C';
                foreach($data['days'] as $day) {
                    if (isset($day['rooms'][$row->post_room_id])) {
                        $obj_excel->getActiveSheet()->setCellValue($this->_get_next_column($column_index) . $row_index, $day['rooms'][$row->post_room_id]);
                    } else {
                        $obj_excel->getActiveSheet()->setCellValue($this->_get_next_column($column_index) . $row_index, 0);
                    }
                    $column_index = $this->_get_next_column($column_index);
                }
                $row_index++;
            }

            $obj_excel->getActiveSheet()->mergeCells("A$row_index:C$row_index")->setCellValue("A$row_index", 'Tổng số khách theo ngày');
            $obj_excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $column_index = 'C';
            foreach($data['days'] as $day) {
                $obj_excel->getActiveSheet()->setCellValue($this->_get_next_column($column_index) . $row_index, $day['guests']);
                $column_index = $this->_get_next_column($column_index);
            }

            $obj_writer = PHPExcel_IOFactory::createWriter($obj_excel, 'Excel2007');
            $file_name = './resources/report-booking.xlsx';
            $obj_writer->save($file_name);
            force_download('report-booking.xlsx', file_get_contents($file_name));

        }

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