<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of include_file
 *
 * @author Ake
 */
class Include_file extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    function get_inc()
    {
        $string = "<meta charset='UTF-8'>";
        $string .= "<title></title>";
        $string .= "<link rel='stylesheet' href='base_url($this->config->item('bt_thm_css')'>";
        $string .= "<link rel='stylesheet' href='base_url($this->config->item('bt_css')'> ";
        $string .= "<link rel='stylesheet' href='base_url($this->config->item('mt_css')'> ";
        $string .= "<link rel='stylesheet' href='base_url($this->config->item('mt_res_css')'> ";
        $string .= "<link rel='stylesheet' href='base_url($this->config->item('mt_iconf_css')'> ";
        $string .= "script src='base_url($this->config->item('bt_js')'></script>";
        $string .= "<script src='base_url($this->config->item('jq_js')>'></script>";
        $string .= "<script src='base_url($this->config->item('jq_ui_js')'></script> ";
        $string .= "<script src=' base_url($this->config->item('mt_js')'></script> ";
        return $string;
    }

    function get_inc_metro()
    {

        $str = "<meta charset='UTF-8'>";
        $str .= "<title></title>";

        $str .= "<link rel='stylesheet' href='" . base_url($this->config->item('mt_css')) . "'>";
        $str .= "<link rel='stylesheet' href='" . base_url($this->config->item('mt_res_css')) . "'> ";
        $str .= "<link rel = 'stylesheet' href = '" . base_url($this->config->item('mt_iconf_css')) . "'>";
        $str .= "<link rel = 'stylesheet' href = '" . base_url($this->config->item('jq_ui_css')) . "'>";
        $str .= "<script src='" . base_url($this->config->item('jq_js')) . "'></script>";
        $str .= "<script src='" . base_url($this->config->item('jq_ui_js')) . "'></script> ";
        $str .= "<script src='" . base_url($this->config->item('jq_validate_js')) . "'></script> ";
        $str .= "<script src='" . base_url($this->config->item('mt_js')) . "'></script> ";

        return $str;
    }

}
