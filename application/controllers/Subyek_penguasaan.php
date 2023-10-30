<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Subyek_penguasaan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('subyek_penguasaan_model');
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
            'log_activity_desc' => 'Mengakses Halaman Penguasaan',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Penguasaan";
        $subtitle = 'Data';

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => 'subyek_penguasaan/add_data',
        );

        $data['query'] = $this->get_data();


        $this->template->content("subyek_penguasaan/subyek_penguasaan_view", $data);
        $this->template->show('template');
    }

    public function get_data()
    {
        $data = $this->subyek_penguasaan_model->get_data_subyek()->result();
        return $data;
    }

    public function get_data_detail($id)
    {
        $data = $this->subyek_penguasaan_model->get_data_subyek_detail($id);
        return $data;
    }

    public function detail_data($id)
    {

        $title = "Penguasaan";
        $subtitle = "Detail";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            'Terkait Penguasaan' => '#',
            $subtitle .' '. $title => 'subyek_penguasaan/detail_data',
        );

        $res = $this->get_data_detail($id)->row();
        if(($res->subyek_penguasaan_nama != '') && ($res->subyek_penguasaan_nomor_ktp != '')){

            // start log
            $log = [
                'log_activity_datetime' => date('Y-m-d H:i:s'),
                'log_activity_user' => $this->session->userdata('user_nama'),
                'log_activity_access' => $this->session->userdata('user_akses'),
                'log_activity_desc' => 'Mengakses Halaman Penguasaan',
            ];

            $this->db->insert('tbl_log_activity', $log);
            // end log

            $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();
            $data['kabupaten'] = $this->helper_model->get_kabupaten($res->subyek_penguasaan_provinsi);
            $data['kecamatan'] = $this->helper_model->get_kecamatan($res->subyek_penguasaan_kabupaten_kota);
            $data['kelurahan'] = $this->helper_model->get_kelurahan($res->subyek_penguasaan_kecamatan);

            $prov = $this->helper_model->get_data_provinsi_id($res->subyek_penguasaan_provinsi)->row();
            $data['prov_id'] = $prov->provinsi_id;
            $data['prov_nama'] = $prov->provinsi_nama;

            $dom = $res->subyek_penguasaan_domisili;
            if($dom == 1) {
                $domisili = "Desa Ini";
            } elseif ($dom == 2) {
                $domisili = "Desa Lain Berbatasan Langsung";
            } elseif ($dom == 3) {
                $domisili = "Desa Lain Tidak Berbatasan Langsung";
            } elseif ($dom == 4) {
                $domisili = "Diluar Kecamatan";
            } else{
                $domisili = $res->subyek_penguasaan_domisili_lainnya;
            }
            $data['domisili'] = $domisili;

            $stat = $res->subyek_penguasaan_status_perkawinan;
            if($stat == 1) {
                $status = "Belum Menikah";
            } elseif ($stat == 2) {
                $status = "Menikah";
            } else {
                $status = "Pernah Meikah";
            }
            $data['status'] = $status;

            $data['kab'] = $this->helper_model->get_kabupaten_name($res->subyek_penguasaan_provinsi, $res->subyek_penguasaan_kabupaten_kota)->row();
            $data['kec'] = $this->helper_model->get_kecamatan_name($res->subyek_penguasaan_kabupaten_kota, $res->subyek_penguasaan_kecamatan)->row();
            $data['kel'] = $this->helper_model->get_kelurahan_name($res->subyek_penguasaan_kecamatan ,$res->subyek_penguasaan_desa_kelurahan)->row();

            $data['query'] = $res;

            $this->template->content("subyek_penguasaan/subyek_penguasaan_detail", $data);
            $this->template->show('template');

        } else {

            // start log
            $log = [
                'log_activity_datetime' => date('Y-m-d H:i:s'),
                'log_activity_user' => $this->session->userdata('user_nama'),
                'log_activity_access' => $this->session->userdata('user_akses'),
                'log_activity_desc' => 'Mengakses Halaman Tambah Data Penguasaan',
            ];

            $this->db->insert('tbl_log_activity', $log);
            // end log

            $title = "Penguasaan";
            $subtitle = "Tambah";

            $data = array();
            $data['header_title'] = $subtitle. ' ' .$title;
            $data['sub_title'] = $subtitle;
            $data['arr_breadcrumbs'] = array(
                'Terkait Penguasaan' => '#',
                $subtitle .' '. $title => 'terkait_subyek/add_data',
            );

            $data['subyek_id'] = $id;
            $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();
            $this->template->content("subyek_penguasaan/subyek_penguasaan_add", $data);
            $this->template->show('template');
        }
    }

    public function action_add()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Menambah Data Penguasaan',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $data_penguasaan = [
            'subyek_penguasaan_nama' => $this->input->post('nama_pemilik_penguasaan', true),
            'subyek_penguasaan_jalan' => $this->input->post('jalan_penguasaan', true),
            'subyek_penguasaan_rt' => $this->input->post('rt_penguasaan', true),
            'subyek_penguasaan_rw' => $this->input->post('rw_penguasaan', true),
            'subyek_penguasaan_desa_kelurahan' => $this->input->post('kelurahan_penguasaan', true),
            'subyek_penguasaan_kecamatan' => $this->input->post('kecamatan_penguasaan', true),
            'subyek_penguasaan_kabupaten_kota' => $this->input->post('kabupaten_penguasaan', true),
            'subyek_penguasaan_provinsi' => $this->input->post('provinsi_penguasaan', true),
            'subyek_penguasaan_nomor_ktp' => $this->input->post('nomor_ktp_penguasaan', true),
            'subyek_penguasaan_pekerjaan' => $this->input->post('pekerjaan_penguasaan', true),
            'subyek_penguasaan_umur' => $this->input->post('umur_penguasaan', true),
            'subyek_penguasaan_status_perkawinan' => $this->input->post('status_perkawinan_penguasaan', true),
            'subyek_penguasaan_jumlah_anggota_keluarga' => $this->input->post('anggota_keluarga_penguasaan', true),
            'subyek_penguasaan_domisili' => $this->input->post('domisili_penguasaan', true),
            'subyek_penguasaan_domisili_lainnya' => $this->input->post('domisili_lainnya_penguasaan', true),
            'subyek_penguasaan_tahun_memiliki_tanah' => $this->input->post('tahun_milik_penguasaan', true),
            'subyek_penguasaan_input_user_id' => $this->session->userdata('user_id'),
            'subyek_penguasaan_input_datetime' => date('Y-m-d H:i:s')
        ];
        $this->db->where('subyek_penguasaan_obyek_id', $this->input->post('subyek_id'));
        $this->db->update('tbl_subyek_penguasaan', $data_penguasaan);

        $this->session->set_flashdata('flash', 'Data Subyek <b>Berhasil</b> Ditambahkan');
        $this->session->set_flashdata('class', 'success');
        redirect('subyek_penguasaan/detail_data/'.$this->input->post('subyek_id'));
    }

    public function edit_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Ubah Data Penguasaan',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Penguasaan";
        $subtitle = "Edit";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            'Terkait Penguasaan' => '#',
            $subtitle .' '. $title => 'subyek_penguasaan/edit_data',
        );

        $res = $this->get_data_detail($id)->row();

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();
        $data['kabupaten'] = $this->helper_model->get_kabupaten($res->subyek_penguasaan_provinsi);
        $data['kecamatan'] = $this->helper_model->get_kecamatan($res->subyek_penguasaan_kabupaten_kota);
        $data['kelurahan'] = $this->helper_model->get_kelurahan($res->subyek_penguasaan_kecamatan);

        $prov = $this->helper_model->get_data_provinsi_id($res->subyek_penguasaan_provinsi)->row();
        $data['prov_id'] = $prov->provinsi_id;
        $data['prov_nama'] = $prov->provinsi_nama;

        $data['kab'] = $this->helper_model->get_kabupaten_name($res->subyek_penguasaan_provinsi, $res->subyek_penguasaan_kabupaten_kota)->row();
        $data['kec'] = $this->helper_model->get_kecamatan_name($res->subyek_penguasaan_kabupaten_kota, $res->subyek_penguasaan_kecamatan)->row();
        $data['kel'] = $this->helper_model->get_kelurahan_name($res->subyek_penguasaan_kecamatan ,$res->subyek_penguasaan_desa_kelurahan)->row();

        $data['query'] = $res;

        $this->template->content("subyek_penguasaan/subyek_penguasaan_edit", $data);
        $this->template->show('template');
    }

    public function action_edit()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengubah Data Penguasaan Penguasaan',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $data = [
            'subyek_penguasaan_nama' => $this->input->post('nama_pemilik', true),
            'subyek_penguasaan_jalan' => $this->input->post('jalan', true),
            'subyek_penguasaan_rt' => $this->input->post('rt', true),
            'subyek_penguasaan_rw' => $this->input->post('rw', true),
            'subyek_penguasaan_desa_kelurahan' => $this->input->post('kelurahan', true),
            'subyek_penguasaan_kecamatan' => $this->input->post('kecamatan', true),
            'subyek_penguasaan_kabupaten_kota' => $this->input->post('kabupaten', true),
            'subyek_penguasaan_provinsi' => $this->input->post('provinsi', true),
            'subyek_penguasaan_nomor_ktp' => $this->input->post('nomor_ktp', true),
            'subyek_penguasaan_pekerjaan' => $this->input->post('pekerjaan', true),
            'subyek_penguasaan_umur' => $this->input->post('umur', true),
            'subyek_penguasaan_status_perkawinan' => $this->input->post('status_perkawinan', true),
            'subyek_penguasaan_jumlah_anggota_keluarga' => $this->input->post('anggota_keluarga', true),
            'subyek_penguasaan_domisili' => $this->input->post('domisili', true),
            'subyek_penguasaan_domisili_lainnya' => $this->input->post('domisili', true) != '5' ? '' : $this->input->post('subyek_penguasaan_domisili_lainnya', true),
            'subyek_penguasaan_tahun_memiliki_tanah' => $this->input->post('tahun_milik', true)
        ];

        $this->db->where('subyek_penguasaan_id', $this->input->post('id'));
        $this->db->update('tbl_subyek_penguasaan', $data);
        $redirect = 'subyek_penguasaan/detail_data/'. $this->input->post('id');
        $this->session->set_flashdata('flash', 'Data Subyek Penguasaan <b>Berhasil</b> Diubah');
        $this->session->set_flashdata('class', 'success');
        redirect($redirect);
    }

    public function delete_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Menghapus Data Penguasaan',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $this->subyek_penguasaan_model->delete_data_subyek($id);
        $this->session->set_flashdata('flash', 'Data Subyek <b>Berhasil</b> Dihapus');
        redirect('subyek_penguasaan');
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
