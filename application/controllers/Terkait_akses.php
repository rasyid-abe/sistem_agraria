<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Terkait_akses extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('terkait_akses_model');
        $this->load->model('helper_model');
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
            'log_activity_desc' => 'Mengakses Halaman Data Terkait Akses',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Akses";

        $data = array();
        $data['header_title'] = $title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            'Data Terkait ' . $title => 'terkait_akses/show',
        );

        $data['query'] = $this->get_data();

        $this->template->content("terkait_akses/terkait_akses_view", $data);
        $this->template->show('template');
    }

    public function get_data()
    {
        $data = $this->terkait_akses_model->get_data_akses()->result();
        return $data;
    }

    public function add_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Tambah Data Terkait Akses',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Akses";
        $subtitle = "Tambah";

        $data = array();
        $data['header_title'] = $title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            'Obyek' => '#',
            $subtitle .' '. $title => 'terkait_akses/add_data',
        );
        $data['invent'] = $this->helper_model->get_inventaris_number($id);
        $data['id_obyek'] = $id;

        $this->template->content("terkait_akses/terkait_akses_add", $data);
        $this->template->show('template');
    }

    public function get_data_detail($id)
    {
        $data = $this->terkait_akses_model->get_data_akses_detail($id);
        return $data;
    }

    public function detail_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Data Terkait Akses',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Akses";
        $subtitle = "Detail";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            'Obyek' => '#',
            $subtitle .' '. $title => 'terkait_akses/detail_data',
        );

        $res = $this->get_data_detail($id)->row();
        if($res->akses_inventaris_nomor != ''){
            $data['query'] = $res;
            $this->template->content("terkait_akses/terkait_akses_detail", $data);
            $this->template->show('template');
        } else {
            $this->add_data($res->akses_obyek_id);
        }

    }

    public function action_add()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Menambah Data Terkait Akses',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        if($this->input->post('potensi_akses', true) != ''){
            $potensi = json_encode($this->input->post('potensi_akses', true));
            $potensi_lainnya = $this->input->post('potensi_akses_lainnya', true);
        } else {
            $potensi = '';
            $potensi_lainnya = '';
        }

        $data = [
            'akses_obyek_id' => $this->input->post('id_obyek', true),
            'akses_inventaris_nomor' => $this->input->post('invent_obyek', true),
            'akses_sertifikat_dijamin' => $this->input->post('pernah_dijaminkan', true),
            'akses_potensi' => $potensi,
            'akses_potensi_lainnya' => $potensi_lainnya,
            'akses_bantuan_jenis' => $this->input->post('jenis_bantuan', true),
            'akses_bantuan_dari' => $this->input->post('bantuan_dari', true),
            'akses_bantuan_tanggal' => $this->input->post('tanggal_bantuan', true),
            'akses_pendapatan_sebelum' => $this->input->post('pendapatan_sebelum_sertifikat', true),
            'akses_pendapatan_sesudah' => $this->input->post('pendapatan_sesudah_sertifikat', true),
            'akses_input_user_id' => $this->session->userdata('user_id'),
            'akses_input_datetime' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('tbl_akses', $data);
        $this->session->set_flashdata('flash', 'Data Akses <b>Berhasil</b> Ditambahkan');
        redirect('terkait_akses');
    }

    public function edit_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Ubah Data Terkait Akses',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Akses";
        $subtitle = "Edit";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            'Obyek' => '#',
            $subtitle .' '. $title => 'terkait_akses/edit_data',
        );

        $res = $this->get_data_detail($id)->row();
        $data['invent'] = $this->helper_model->get_inventaris_number($id);
        $data['id_obyek'] = $id;
        $data['query'] = $res;

        $this->template->content("terkait_akses/terkait_akses_edit", $data);
        $this->template->show('template');
    }

    public function action_edit()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengubah Data Terkait Akses',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        if($this->input->post('potensi_akses', true) != ''){
            $potensi = json_encode($this->input->post('potensi_akses', true));
            $potensi_lainnya = $this->input->post('potensi_akses_lainnya', true);
        } else {
            $potensi = '';
            $potensi_lainnya = '';
        }

        $data = [
            'akses_inventaris_nomor' => $this->input->post('invent_obyek', true),
            'akses_sertifikat_dijamin' => $this->input->post('pernah_dijaminkan', true),
            'akses_potensi' => $potensi,
            'akses_potensi_lainnya' => $potensi_lainnya,
            'akses_bantuan_jenis' => $this->input->post('jenis_bantuan', true),
            'akses_bantuan_dari' => $this->input->post('bantuan_dari', true),
            'akses_bantuan_tanggal' => $this->input->post('tanggal_bantuan', true),
            'akses_pendapatan_sebelum' => $this->input->post('pendapatan_sebelum_sertifikat', true),
            'akses_pendapatan_sesudah' => $this->input->post('pendapatan_sesudah_sertifikat', true),
            'akses_input_user_id' => $this->session->userdata('user_id'),
            'akses_input_datetime' => date('Y-m-d H:i:s'),
        ];

        $this->db->where('akses_obyek_id', $this->input->post('id_obyek'));
        $this->db->update('tbl_akses', $data);

        $this->session->set_flashdata('flash', 'Data Akses <b>Berhasil</b> Ditambah');
        redirect('terkait_akses/detail_data/'. $this->input->post('id_obyek'));
    }

    public function delete_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Menghapus Data Terkait Akses',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $this->terkait_akses_model->delete_data_akses($id);
        $this->session->set_flashdata('flash', 'Data Subyek <b>Berhasil</b> Dihapus');
        redirect('terkait_subyek');
    }

}
