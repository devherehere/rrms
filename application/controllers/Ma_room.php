<?php
/**
 * Created by PhpStorm.
 * User: Ake
 * Date: 19/5/2557
 * Time: 10:51 น.
 */

class Ma_room extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->model('include_file', 'inc');
        $this->load->model('Ma_room_model', 'ma_room');
    }

    function index()
    {
        $data = array(
            'base_url' => base_url(),
            'all_room' => $this->ma_room->display_all_room()->result(),
            'all_type_room' => $this->ma_room->display_all_type_room()->result()
        );


        $content = $this->load->view('ma_room', $data, TRUE);
        $nav = $this->load->view('nav', $data, TRUE);

        $data2 = array(
            'inc' => $this->inc->get_inc_metro(),
            'nav' => $nav,
            'content' => $content

        );

        $this->parser->parse('template', $data2);
    }


    function add_type_room()
    {
        $type_room_name = $this->input->post('type_room_name');
        $type_room_price = $this->input->post('type_room_price');
        $this->ma_room->add_type_room($type_room_name, $type_room_price);
        $this->index();
    }


    function del_type_room($type_room_id)
    {
        $this->ma_room->del_type_room($type_room_id);
    }


    function edit_type_room()
    {
        $id = $this->input->post('type_room_id');
        $rule = array(
            'type_room_name' => $this->input->post('type_room_name'),
            'type_room_price' => $this->input->post('type_room_price')
        );
        $this->ma_room->edit_type_room($id, $rule);

    }

    function add_room()
    {
        $room_id = $this->input->post('room_id');
        $type_room = $this->input->post('type_room');

        $this->ma_room->add_room($room_id, $type_room);


    }


    function edit_room(){
        $room_id = $this->input->post('room_id');
        $type_room = $this->input->post('type_room');

        $this->ma_room->edit_room($room_id, $type_room);


    }

    function del_room()
    {
        $room_id = $this->input->post('room_id');
        $this->ma_room->del_room($room_id);


    }

}