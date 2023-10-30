<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        $this->load->library('authentication');

        if(!$this->authentication->auth_user()) {
            //show_error('Shove off, this is for admins.');
            $referer = rawurlencode('http://' . $_SERVER['HTTP_HOST'] . preg_replace('@/+$@', '', $_SERVER['REQUEST_URI']) . '/');
            $origin = isset($_SERVER['HTTP_REFERER']) ? rawurlencode($_SERVER['HTTP_REFERER']) : $referer;
            $redirect = _login_uri . '?redirect_url=' . $origin;
            redirect($redirect);

        }  else {
            return TRUE;
        }
    }
}
