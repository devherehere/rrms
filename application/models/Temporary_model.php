<?php


class Temporary_Model extends CI_Model
{
    var $hours_rule = 3;

    function __construct()
    {
        parent::__construct();
        timezones('UP7');

    }

    function get_room_all()
    {

        $query = $this->db->query('select * from room where type_room_id = 1  order by room_id asc');
        return $query;
    }


    function get_room_checkin()
    {

        $query = $this->db->query('select * from room  where type_room_id = 1 and room_status = 0 order by room_id asc ');
        return $query;
    }


    function  get_room_checkout()
    {
        $rule = array(
            'type_room_id' => 1,
            'room_status' => 1
        );

        $this->db->order_by('room_id', 'asc');
        $query = $this->db->get_where('room', $rule);

        return $query;

    }

    function room_check_in($room_id)
    {
        $data = array(
            'room_status' => '1'
        );
        $this->db->where('room_id', $room_id);
        $this->db->update('room', $data);
        $date = date('Y-m-d ');
        $time = date('H:i:s');
        $time_stop = date('H:i:s', mktime(date('H') + $this->hours_rule, date('i'), date('s'), 0, 0, 0));

        $data2 = array(
            'room_id' => $room_id,
            'date' => $date,
            'time' => $time,
            'time_stop' => $time_stop
        );

        $this->db->insert('check_in', $data2);


    }

    function  room_check_out($room_id)
    {
        $data = array(
            'room_status' => '0'
        );
        $this->db->where('room_id', $room_id);
        $this->db->update('room', $data);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $data2 = array(
            'room_id' => $room_id,
            'date' => $date,
            'time' => $time
        );

        $this->db->insert('check_out', $data2);


    }


    function num_room_empty()
    {
        $query = $this->db->query('select * from room  where type_room_id = 1 and room_status = 0 order by room_id asc ');
        return $query->num_rows();
    }

    function num_room_all()
    {
        $query = $this->db->get('room');
        return $query->num_rows();

    }

    function num_room_temp_all()
    {
        $query = $this->db->get_where('room', array('type_room_id' => '1'));
        return $query->num_rows();
    }

    function  num_room_check_in()
    {
        $rule = array(
            'type_room_id' => 1,
            'room_status' => 1

        );
        $query = $this->db->get_where('room', $rule);
        return $query->num_rows();
    }


    function get_top_time_check_in($room_id)
    {
        $rule = array(
            'room_id' => $room_id

        );
        $this->db->limit(1);
        $this->db->order_by('date', ' desc');
        $this->db->order_by('time', ' desc');
        $query = $this->db->get_where('check_in', $rule);
        return $query;

    }

    function get_top_time_check_out($room_id)
    {
        $rule = array(
            'room_id' => $room_id
        );

        $this->db->limit(1);
        $this->db->order_by('date', ' desc');
        $this->db->order_by('time', ' desc');
        $query = $this->db->get_where('check_out', $rule);
        return $query;

    }


}


?>