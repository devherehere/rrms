<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ui
 *
 * @author Ake
 */
class Ui extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->model('include_file', 'inc');

    }

    function index()
    {
        $data['base_url'] = base_url();
        $content = $this->load->view('ui', $data, TRUE);
        $nav = $this->load->view('nav', $data, TRUE);
        $data = array(
            'inc' => $this->inc->get_inc_metro(),
            'nav' => $nav,
            'content' => $content,
            'custom_script' => ''
        );
        $this->parser->parse('template', $data);
    }


}
