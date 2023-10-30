<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Terkait_subyek extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('terkait_subyek_model');
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
            'log_activity_desc' => 'Mengakses Halaman Data Terkait Subyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Subyek";
        $subtitle = 'Data';

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            'Data Terkait ' . $title => 'terkait_subyek/show',
        );

        $data['query'] = $this->get_data();


        $this->template->content("terkait_subyek/terkait_subyek_view", $data);
        $this->template->show('template');
    }

    public function get_data()
    {
        $data = $this->terkait_subyek_model->get_data_subyek()->result();
        return $data;
    }

    public function get_data_detail($id)
    {
        $data = $this->terkait_subyek_model->get_data_subyek_detail($id);
        return $data;
    }

    public function add_data()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Tambah Data Terkait Subyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Subyek";
        $subtitle = "Tambah";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => 'terkait_subyek',
            $subtitle .' '. $title => 'terkait_subyek/add_data',
        );

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

        $this->template->content("terkait_subyek/terkait_subyek_add", $data);
        $this->template->show('template');
    }

    public function action_add()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Menambah Data Terkait Subyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $data_subyek = [
            'subyek_nama' => $this->input->post('nama_pemilik', true),
            'subyek_jalan' => $this->input->post('jalan', true),
            'subyek_rt' => $this->input->post('rt', true),
            'subyek_rw' => $this->input->post('rw', true),
            'subyek_desa_kelurahan' => $this->input->post('kelurahan', true),
            'subyek_kecamatan' => $this->input->post('kecamatan', true),
            'subyek_kabupaten_kota' => $this->input->post('kabupaten', true),
            'subyek_provinsi' => $this->input->post('provinsi', true),
            'subyek_nomor_ktp' => $this->input->post('nomor_ktp', true),
            'subyek_pekerjaan' => $this->input->post('pekerjaan', true),
            'subyek_umur' => $this->input->post('umur', true),
            'subyek_status_perkawinan' => $this->input->post('status_perkawinan', true),
            'subyek_jumlah_anggota_keluarga' => $this->input->post('anggota_keluarga', true),
            'subyek_domisili' => $this->input->post('domisili', true),
            'subyek_domisili_lainnya' => $this->input->post('domisili_lainnya', true),
            'subyek_tahun_memiliki_tanah' => $this->input->post('tahun_milik', true),
            'subyek_input_user_id' => $this->session->userdata('user_id'),
            'subyek_input_datetime' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('tbl_subyek', $data_subyek);

        if($this->session->userdata('user_akses') == 2){
            $this->session->set_flashdata('flash', 'Data Subyek <b>Berhasil</b> Ditambahkan');
            $this->session->set_flashdata('class', 'success');
            redirect('terkait_subyek/view_data_user/'.$this->session->userdata('user_id'));
        } else {
            $this->session->set_flashdata('flash', 'Data Subyek <b>Berhasil</b> Ditambahkan');
            $this->session->set_flashdata('class', 'success');
            redirect('terkait_subyek');
        }
    }

    public function edit_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Ubah Data Terkait Subyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Subyek";
        $subtitle = "Edit";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => 'terkait_subyek/edit_data',
        );

        $res = $this->get_data_detail($id)->row();

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();
        $data['kabupaten'] = $this->helper_model->get_kabupaten($res->subyek_provinsi);
        $data['kecamatan'] = $this->helper_model->get_kecamatan($res->subyek_kabupaten_kota);
        $data['kelurahan'] = $this->helper_model->get_kelurahan($res->subyek_kecamatan);

        $prov = $this->helper_model->get_data_provinsi_id($res->subyek_provinsi)->row();
        $data['prov_id'] = $prov->provinsi_id;
        $data['prov_nama'] = $prov->provinsi_nama;

        $data['kab'] = $this->helper_model->get_kabupaten_name($res->subyek_provinsi, $res->subyek_kabupaten_kota)->row();
        $data['kec'] = $this->helper_model->get_kecamatan_name($res->subyek_kabupaten_kota, $res->subyek_kecamatan)->row();
        $data['kel'] = $this->helper_model->get_kelurahan_name($res->subyek_kecamatan ,$res->subyek_desa_kelurahan)->row();

        $data['query'] = $res;

        $this->template->content("terkait_subyek/terkait_subyek_edit", $data);
        $this->template->show('template');
    }

    public function action_edit()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengubah Data Terkait Subyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $data = [
            'subyek_nama' => $this->input->post('nama_pemilik', true),
            'subyek_jalan' => $this->input->post('jalan', true),
            'subyek_rt' => $this->input->post('rt', true),
            'subyek_rw' => $this->input->post('rw', true),
            'subyek_desa_kelurahan' => $this->input->post('kelurahan', true),
            'subyek_kecamatan' => $this->input->post('kecamatan', true),
            'subyek_kabupaten_kota' => $this->input->post('kabupaten', true),
            'subyek_provinsi' => $this->input->post('provinsi', true),
            'subyek_nomor_ktp' => $this->input->post('nomor_ktp', true),
            'subyek_pekerjaan' => $this->input->post('pekerjaan', true),
            'subyek_umur' => $this->input->post('umur', true),
            'subyek_status_perkawinan' => $this->input->post('status_perkawinan', true),
            'subyek_jumlah_anggota_keluarga' => $this->input->post('anggota_keluarga', true),
            'subyek_domisili' => $this->input->post('domisili', true),
            'subyek_domisili_lainnya' => $this->input->post('domisili', true) != '5' ? '' : $this->input->post('domisili_lainnya', true),
            'subyek_tahun_memiliki_tanah' => $this->input->post('tahun_milik', true)
        ];

        $this->db->where('subyek_id', $this->input->post('id'));
        $this->db->update('tbl_subyek', $data);
        if($this->session->userdata('user_akses') == 2){
            $this->session->set_flashdata('flash', 'Data Subyek <b>Berhasil</b> Diubah');$this->session->set_flashdata('class', 'success');
            redirect('terkait_subyek/view_data_user/'.$this->session->userdata('user_id'));
        } else {
            $this->session->set_flashdata('flash', 'Data Subyek <b>Berhasil</b> Diubah');$this->session->set_flashdata('class', 'success');
            redirect('terkait_subyek');
        }
    }

    public function detail_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Detail Data Terkait Subyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Subyek";
        $subtitle = "Detail";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => 'terkait_subyek/detail_data',
        );

        $res = $this->get_data_detail($id)->row();

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();
        $data['kabupaten'] = $this->helper_model->get_kabupaten($res->subyek_provinsi);
        $data['kecamatan'] = $this->helper_model->get_kecamatan($res->subyek_kabupaten_kota);
        $data['kelurahan'] = $this->helper_model->get_kelurahan($res->subyek_kecamatan);

        $prov = $this->helper_model->get_data_provinsi_id($res->subyek_provinsi)->row();
        $data['prov_id'] = $prov->provinsi_id;
        $data['prov_nama'] = $prov->provinsi_nama;

        $dom = $res->subyek_domisili;
        if($dom == 1) {
            $domisili = "Desa Ini";
        } elseif ($dom == 2) {
            $domisili = "Desa Lain Berbatasan Langsung";
        } elseif ($dom == 3) {
            $domisili = "Desa Lain Tidak Berbatasan Langsung";
        } elseif ($dom == 4) {
            $domisili = "Diluar Kecamatan";
        } else{
            $domisili = $res->subyek_domisili_lainnya;
        }
        $data['domisili'] = $domisili;

        $stat = $res->subyek_status_perkawinan;
        if($stat == 1) {
            $status = "Belum Menikah";
        } elseif ($stat == 2) {
            $status = "Menikah";
        } else {
            $status = "Pernah Meikah";
        }
        $data['status'] = $status;

        $data['kab'] = $this->helper_model->get_kabupaten_name($res->subyek_provinsi, $res->subyek_kabupaten_kota)->row();
        $data['kec'] = $this->helper_model->get_kecamatan_name($res->subyek_kabupaten_kota, $res->subyek_kecamatan)->row();
        $data['kel'] = $this->helper_model->get_kelurahan_name($res->subyek_kecamatan ,$res->subyek_desa_kelurahan)->row();

        $data['query'] = $res;

        $this->template->content("terkait_subyek/terkait_subyek_detail", $data);
        $this->template->show('template');
    }

    public function view_data_user($id)
    {
        $title = "Subyek";
        $subtitle = '';

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            'Data Terkait ' . $title => 'terkait_subyek/show',
        );

        $res = $this->terkait_subyek_model->get_all_subyek_user($id)->result();
        if(!empty($res)){

            // start log
            $log = [
                'log_activity_datetime' => date('Y-m-d H:i:s'),
                'log_activity_user' => $this->session->userdata('user_nama'),
                'log_activity_access' => $this->session->userdata('user_akses'),
                'log_activity_desc' => 'Mengakses Halaman Data Terkait Subyek',
            ];

            $this->db->insert('tbl_log_activity', $log);
            // end log

            $data['query'] = $res;
            $this->template->content("terkait_subyek/terkait_subyek_view", $data);
            $this->template->show('template');

        } else {

            $this->add_data();
        }
    }

    public function delete_data($id)
    {
        $check_obj = $this->terkait_subyek_model->get_subyek_obyek_id($id);
        if($check_obj->num_rows() > 0){
            $this->session->set_flashdata('flash', 'Data Subyek <b>Gagal</b> Dihapus karena masih memiliki data  <b>Obyek</b>');
            $this->session->set_flashdata('class', 'danger');
            redirect('terkait_subyek');
        } else {
            // start log
            $log = [
                'log_activity_datetime' => date('Y-m-d H:i:s'),
                'log_activity_user' => $this->session->userdata('user_nama'),
                'log_activity_access' => $this->session->userdata('user_akses'),
                'log_activity_desc' => 'Menghapus Data Terkait Subyek',
            ];

            $this->db->insert('tbl_log_activity', $log);
            // end log

            $this->terkait_subyek_model->delete_data_subyek($id);
            $this->session->set_flashdata('flash', 'Data Subyek <b>Berhasil</b> Dihapus');
            $this->session->set_flashdata('class', 'success');
            redirect('terkait_subyek');
        }
    }

    public function get_kabupaten_by_provinsi_id()
    {
        $provinsi_id = $this->input->get('provinsi_id');
        $data = $this->helper_model->get_kabupaten($provinsi_id);
        echo json_encode($data);
    }

    public function get_kecamatan_by_kabupaten_id()
    {
        $kabupaten_id = $this->input->get('kabupaten_id');
        $data = $this->helper_model->get_kecamatan($kabupaten_id);
        echo json_encode($data);
    }

    public function get_kelurahan_by_kecamatan_id()
    {
        $kecamatan_id = $this->input->get('kecamatan_id');
        $data = $this->helper_model->get_kelurahan($kecamatan_id);
        echo json_encode($data);
    }
}
