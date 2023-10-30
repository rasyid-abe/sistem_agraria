<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $array_items = array(
            'user_id',
            'user_nama',
            'user_agama',
            'user_alamat',
            'user_hp',
            'user_username',
            'user_logged_in'
        );

        $this->session->unset_userdata($array_items);

        if ($this->session->userdata('user_logged_in')) {
            $this->session->sess_destroy();
        }

        $redirect = _login_uri;
        redirect($redirect);
    }

}
