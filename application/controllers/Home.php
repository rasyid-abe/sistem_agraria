<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Home extends CI_Controller
{

    public function index()
    {
        $this->load->view('home/home_view');
    }

    public function nestlist()
    {
        $this->load->view('nestlist/nestlist_view');
    }
}
