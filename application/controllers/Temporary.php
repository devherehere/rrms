<?php
/**
 * Created by PhpStorm.
 * User: AKE
 * Date: 18/5/2557
 * Time: 23:31 น.
 */

class Temporary extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->model('include_file', 'inc');
        $this->load->model('Temporary_Model', 'tmp');

    }

    function index()
    {
        $data = array(
            'base_url' => base_url(),
            'query' => $this->tmp->get_room_all(),
            'num_room_empty' => $this->tmp->num_room_empty(),
            'num_room_temp_all' => $this->tmp->num_room_temp_all(),
            'num_room_check_in' => $this->tmp->num_room_check_in()
        );
        $content = $this->load->view('display_room_all', $data, TRUE);
        $nav = $this->load->view('nav', $data, TRUE);
        $data2 = array(
            'inc' => $this->inc->get_inc_metro(),
            'nav' => $nav,
            'content' => $content,

        );

        $this->parser->parse('template', $data2);

    }


    function check_in()
    {
        $room_id = $this->uri->segment(3);
        $query = $this->tmp->get_room_checkin();

        if ($room_id === FALSE) {
            $data = array(
                'base_url' => base_url(),
                'query' => $query
            );

            if ($query->num_rows() > 0) {

                $content = $this->load->view('display_room_check_in', $data, TRUE);

            } else {
                $content = 'ไม่มีข้อมูล';

            }

            $nav = $this->load->view('nav', $data, TRUE);
            $data2 = array(
                'inc' => $this->inc->get_inc_metro(),
                'nav' => $nav,
                'content' => $content
            );

            $this->parser->parse('template', $data2);

        } else {

            $this->tmp->room_check_in($room_id);
            echo $this->db->last_query();
        }


    }


    function check_out()
    {
        $room_id = $this->uri->segment(3);
        $query = $this->tmp->get_room_checkout();

        if ($room_id === FALSE) {

            $data = array(
                'base_url' => base_url(),
                'query' => $query
            );

            if ($query->num_rows() > 0) {

                $content = $this->load->view('display_room_check_out', $data, TRUE);

            } else {
                $content = 'ไม่มีข้อมูล';
            }


            $nav = $this->load->view('nav', $data, TRUE);
            $data2 = array(
                'inc' => $this->inc->get_inc_metro(),
                'nav' => $nav,
                'content' => $content
            );
            $this->parser->parse('template', $data2);
        } else {

            $this->tmp->room_check_out($room_id);

        }


    }

    /*
     * Action for Ajax
     *
     *
     *
     * */

    function top_time_check_in($room_id)
    {
        $row = $this->tmp->get_top_time_check_in($room_id)->row();
        echo $row->time;

    }


    function display_detail_check_in($room_id)
    {
        $data = array(
            'query' => $this->tmp->get_top_time_check_in($room_id),
            'room_id' => $room_id
        );

        echo $this->load->view('ajax_display_detail_check_in', $data, true);


    }


    function compare_date($room_id)
    {
        $time_check_in = $this->tmp->get_top_time_check_in($room_id)->row()->time;
        $time_stop = $this->tmp->get_top_time_check_in($room_id)->row()->time_stop;
        $time_check_out = $this->tmp->get_top_time_check_out($room_id)->row()->time;
        $fine = "";
        if ($time_stop > $time_check_out) {
            $fine = 'ไม่เสียค่าปรับ';
            $class = 'text-success';
        } else if ($time_stop < $time_check_out) {
            $fine = 'เสียค่าปรับ';
            $class = 'text-alert';
        }

        $data = array(
            'time_check_in' => $time_check_in,
            'time_stop' => $time_stop,
            'time_check_out' => $time_check_out,
            'room_id' => $room_id,
            'fine' => $fine,
            'class' => $class

        );

        echo $this->load->view('ajax_display_compare_time', $data, true);


    }


}