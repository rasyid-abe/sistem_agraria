<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');

    }
    public function index()
    {
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        //cek apakah masih ada session administrator
        if ($this->session->userdata('user_logged_in')) {
            redirect('dashboard');
        } else {
            $this->load->helper('form');
            if (isset($_GET['redirect_url']) && trim($_GET['redirect_url']) != '') {
                $data['redirect_url'] = $_GET['redirect_url'];
            } else {
                $data['redirect_url'] = '';
            }
            $this->template->content("login/login_view", $data);
            $this->template->show('template_login');
        }
    }

    public function verifikasi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password', true);
        $redirect_url = $this->input->post('redirect_url');

        $data = $this->login_model->get_valid_akun($username);
        if($data->num_rows() > 0) {
            $row = $data->row();
            $pass_verify = $row->user_password;
            if (($row->user_username === $username) && password_verify($password, $pass_verify)) {
                if($row->user_akses >= 0){
                    $array_items = array(
                        'user_id' => $row->user_id,
                        'user_nama' => $row->user_nama,
                        'user_agama' => $row->user_agama,
                        'user_alamat' => $row->user_alamat,
                        'user_hp' => $row->user_hp,
                        'user_username' => $row->user_username,
                        'user_akses' => $row->user_akses,
                        'user_logged_in' => TRUE,
                    );
                    $this->session->set_userdata($array_items);

                    if(trim($redirect_url) != '') {
                        $redirect = rawurldecode($redirect_url);
                    } else {
                        $redirect = 'dashboard';
                    }
                } else {
                    //tidak memiliki akses
                    $this->session->set_flashdata('confirmation', '<p><b>Maaf</b> anda tidak diperbolehkan login. Silahkan hubungi admin.</p>');
                    $this->session->set_flashdata('username', $this->input->post('username'));
                    if(trim($redirect_url) != '') {
                        $redirect = _login_uri . '?redirect_url=' . rawurlencode($redirect_url);
                    } else {
                        $redirect = _login_uri;
                    }
                }
            } else {
                //password salah
                $this->session->set_flashdata('confirmation', '<p><b>Username</b> atau <b>Password</b> yang Anda masukkan salah.</p>');
                $this->session->set_flashdata('username', $this->input->post('username'));
                if(trim($redirect_url) != '') {
                    $redirect = _login_uri . '?redirect_url=' . rawurlencode($redirect_url);
                } else {
                    $redirect = _login_uri;
                }

            }
        } else {
            //data tidak ditemukan
            $this->session->set_flashdata('confirmation', '<p><b>Username</b> atau <b>Password</b> yang Anda masukkan salah.</p>');
            $this->session->set_flashdata('username', $this->input->post('username'));
            if(trim($redirect_url) != '') {
                $redirect = _login_uri . '?redirect_url=' . rawurlencode($redirect_url);
            } else {
                $redirect = _login_uri;
            }
        }

        redirect($redirect);
    }
}
