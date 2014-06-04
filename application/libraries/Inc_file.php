<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Inc_file
{

    var $str;

    function Inc_file()
    {
        $this->str = "";
        $CI = & get_instance();
        $CI->load->helper('url');
    }

    function doit($data)
    {
        echo $data;

    }

    function AddCss($path)
    {
        $str = "<link rel='stylesheet' href='" + base_url($CI->config->item($path)) + "'>";

    }

    function AddJava($path)
    {
        $string .= "script src='base_url($this->config->item('bt_js')'></script>";
    }

    function get_inc()
    {

        return $this->str;
    }


}
