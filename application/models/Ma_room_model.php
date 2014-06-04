<?php
/**
 * Created by PhpStorm.
 * User: Ake
 * Date: 20/5/2557
 * Time: 14:33 น.
 */

class Ma_room_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('table');
    }

    function display_all_room()
    {
        $this->db->select('*');
        $this->db->from('room');
        $this->db->join('type_room', 'room.type_room_id = type_room.type_room_id');
        $query = $this->db->get();

        return $query;
    }

    function display_all_type_room()
    {
        $query = $this->db->get('type_room');
        return $query;

    }

    function type_room($type_room_id)
    {
        $rule = array(
            'type_room_id' => $type_room_id

        );
        $query = $this->db->get_where('type_room', $rule);
        return $query;

    }

    function add_type_room($name, $price)
    {
        $rule = array(
            'type_room_name' => $name,
            'type_room_price' => $price

        );
        $this->db->insert('type_room', $rule);

    }

    function edit_type_room($id, $rule)
    {
        $this->db->where('type_room_id', $id);
        $this->db->update('type_room', $rule);


    }

    function del_type_room($type_room_id)
    {
        $this->db->where('type_room_id', $type_room_id);
        $this->db->delete('type_room');

    }


    function add_room($room_id, $type_room)
    {
        $rule = array(
            'room_id' => $room_id,
            'type_room_id' => $type_room,
            'room_status' => '0'
        );
        $this->db->insert('room', $rule);


    }

    function edit_room($room_id, $type_room)
    {
        $rule = array(
            'type_room_id' => $type_room
        );
        $this->db->where('room_id', $room_id);
        $this->db->update('room', $rule);


    }

    function  del_room($room_id)
    {
        $this->db->where('room_id', $room_id);
        $this->db->delete('room');


    }

} 