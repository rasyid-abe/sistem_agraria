<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->show();
    }

    public function show()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Data User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "User";

        $data = array();
        $data['header_title'] = $title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            'Data ' . $title => 'user/show',
        );

        $data['query'] = $this->get_data();

        $this->template->content("user/user_view", $data);
        $this->template->show('template');
    }

    public function get_data()
    {
        $data = $this->user_model->get_data_user()->result();
        return $data;
    }

    public function add_data()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Tambah Data User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log
        $title = "User";
        $subtitle = "Tambah";

        $data = array();
        $data['header_title'] = $title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => 'user/add_data',
        );

        $this->template->content("user/user_add", $data);
        $this->template->show('template');
    }

    public function action_add()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Menambah Data User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $data = [
            'user_nama' => $this->input->post('nama', true),
            'user_jenis_kelamin' => $this->input->post('gender', true),
            'user_agama' => $this->input->post('agama', true),
            'user_alamat' => $this->input->post('alamat', true),
            'user_hp' => $this->input->post('no_hp', true),
            'user_email' => $this->input->post('email', true),
            'user_username' => $this->input->post('username', true),
            'user_password' => password_hash(12345678, PASSWORD_DEFAULT),
            'user_akses' => $this->input->post('akses', true),
            'user_input_user_id' => $this->session->userdata('user_id'),
        ];
        $this->db->insert('tbl_user', $data);
        $this->session->set_flashdata('flash', 'Data User <b>Berhasil</b> Ditambahkan');
        redirect('user');
    }

    public function get_data_detail($id)
    {
        $data = $this->user_model->get_data_user_detail($id);
        return $data;
    }

    public function detail_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Detail Data User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "User";
        $subtitle = "Detail";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => 'user',
            $subtitle .' '. $title => 'user/detail_data',
        );

        $res = $this->get_data_detail($id)->row();

        $stat = $res->user_jenis_kelamin;
        if($stat == 1) {
            $status = "Perempuan";
        } else {
            $status = "Laki-laki";
        }
        $data['gender'] = $status;

        $data['query'] = $res;

        $this->template->content("user/user_detail", $data);
        $this->template->show('template');
    }

    public function profile_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Profil User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Profile";
        $subtitle = "User";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => 'user/profile_data',
        );

        $res = $this->get_data_detail($id)->row();

        $stat = $res->user_jenis_kelamin;
        if($stat == 1) {
            $status = "Perempuan";
        } else {
            $status = "Laki-laki";
        }
        $data['gender'] = $status;

        $data['query'] = $res;

        $this->template->content("user/user_profile", $data);
        $this->template->show('template');
    }

    public function edit_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Ubah Data User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "User";
        $subtitle = "Edit";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => 'user',
            $subtitle .' '. $title => 'user/edit_data',
        );

        $res = $this->get_data_detail($id)->row();
        $data['query'] = $res;

        $this->template->content("user/user_edit", $data);
        $this->template->show('template');
    }

    public function action_edit()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengubah Data User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $data = [
            'user_nama' => $this->input->post('nama', true),
            'user_jenis_kelamin' => $this->input->post('gender', true),
            'user_agama' => $this->input->post('agama', true),
            'user_alamat' => $this->input->post('alamat', true),
            'user_hp' => $this->input->post('no_hp', true),
            'user_email' => $this->input->post('email', true),
            'user_username' => $this->input->post('username', true),
            'user_akses' => $this->input->post('akses', true),
            'user_input_user_id' => $this->session->userdata('user_id'),
        ];

        $this->db->where('user_id', $this->input->post('id'));
        $this->db->update('tbl_user', $data);

        if($this->session->userdata('user_id') == $this->input->post('id')){
            $this->session->set_flashdata('flash', 'Data User <b>Berhasil</b> Diubah');
            $this->session->set_flashdata('class', 'success');
            redirect('user/profile_data/'.$this->session->userdata('user_id'));
        } else {
            $this->session->set_flashdata('flash', 'Data User <b>Berhasil</b> Diubah');
            $this->session->set_flashdata('class', 'success');
            redirect('user');
        }

    }

    public function edit_password($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Ubah Password User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Password";
        $subtitle = "Edit";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => 'user',
            $subtitle .' '. $title => 'user/edit_password',
        );

        $res = $this->get_data_detail($id)->row();
        $data['query'] = $res;

        $this->template->content("user/user_password", $data);
        $this->template->show('template');
    }

    public function change_password()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengubah Password User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $id = $this->input->post('id');
        $akses = $this->input->post('akses');
        $password = $this->input->post('old_password', true);

        $res = $this->get_data_detail($id)->row();
        $pass_verify = $res->user_password;
        if (password_verify($password, $pass_verify)) {
            $data = [
                'user_password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            ];
            $this->db->where('user_id', $id);
            $this->db->update('tbl_user', $data);
            if($this->session->userdata('user_id') == $id){
                $this->session->set_flashdata('flash', 'Password <b>Berhasil</b> Diubah');
                $this->session->set_flashdata('class', 'success');
                redirect('user/profile_data/'.$this->session->userdata('user_id'));
            } else {
                $this->session->set_flashdata('flash', 'Password <b>Berhasil</b> Diubah');
                $this->session->set_flashdata('class', 'success');
                redirect('user/detail_data/'.$id);
            }
        } else {
            if($this->session->userdata('user_id') == $id){
                $this->session->set_flashdata('flash', 'Password <b>Gagal</b> Diubah');
                $this->session->set_flashdata('class', 'danger');
                redirect('user/profile_data/'.$this->session->userdata('user_id'));
            } else {
                $this->session->set_flashdata('flash', 'Password <b>Gagal</b> Diubah');
                $this->session->set_flashdata('class', 'danger');
                redirect('user/detail_data/'.$id);
            }
        }
    }

    public function delete_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Menghapus Data User',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $this->user_model->delete_data_user($id);
        $this->session->set_flashdata('flash', 'Data User <b>Berhasil</b> Dihapus');
        redirect('user');
    }
}
