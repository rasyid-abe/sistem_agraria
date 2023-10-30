<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
            $this->template->content("registrasi/registrasi_view");
            $this->template->show('template_login');
    }

    public function action_register()
    {
        $data = [
            'user_nama' => $this->input->post('nama', true),
            'user_username' => $this->input->post('username', true),
            'user_email' => $this->input->post('email', true),
            'user_password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'user_akses' => $this->input->post('akses', true),
            'user_input_user_id' => 4,
        ];
        $this->db->insert('tbl_user', $data);
        $this->session->set_flashdata('flash', 'Anda <b>Berhasil</b> Registrasi');
        redirect('registrasi');
    }
}
