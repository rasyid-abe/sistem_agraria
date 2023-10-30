<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Terkait_obyek extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('terkait_obyek_model');
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
            'log_activity_desc' => 'Mengakses Halaman Data Terkait Obyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Obyek";

        $data = array();
        $data['header_title'] = $title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            'Data Terkait ' . $title => 'terkait_obyek/show',
        );

        $data['query'] = $this->get_data();

        $this->template->content("terkait_obyek/terkait_obyek_view", $data);
        $this->template->show('template');
    }

    public function get_data()
    {
        $data = $this->terkait_obyek_model->get_data_obyek()->result();
        return $data;
    }

    public function add_data()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Tambah Data Terkait Obyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Obyek";
        $subtitle = "Tambah";

        $data = array();
        $data['header_title'] = $title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => 'terkait_obyek/add_data',
        );

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

        $this->template->content("terkait_obyek/terkait_obyek_add", $data);
        $this->template->show('template');
    }

    public function action_add()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Menambah Data Terkait Obyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        if ($this->input->post('pemilikan_tanah', true) != "Terdaftar") {
            $option = $this->input->post('belum_terdaftar', true);
            $pemilikan_lainnya = $this->input->post('surat_no', true);
        } else {
            $option = '';
            $pemilikan_lainnya = $this->input->post('pemilikan_sertifikat_no', true);
        }

        if ($this->input->post('landeform', true) == "Tanah Negara Lainnya") {
            $tanah_negara = $this->input->post('tanah_negara', true);
            if ($tanah_negara != "HGU Habis") {
                $land_nomor = $this->input->post('pelepasan_hgu', true);
            } else {
                $land_nomor = $this->input->post('hgu_habis', true);
            }
        } else {
            $land_nomor = '';
            $tanah_negara = '';
        }

        if($this->input->post('produksi_pertanian', true) != ''){
            $produksi = json_encode($this->input->post('produksi_pertanian', true));
            $produksi_lainnya = $this->input->post('produksi_pertanian_lainnya', true);
        }else {
            $produksi = '';
            $produksi_lainnya = '';
        }

        if($this->input->post('ekonomi', true) != ''){
            $ekonomi = json_encode($this->input->post('ekonomi', true));
            $ekonomi_lainnya = $this->input->post('ekonomi_lainnya', true);
        }else {
            $ekonomi = '';
            $ekonomi_lainnya = '';
        }

        if($this->input->post('usaha_jasa', true) != ''){
            $usaha_jasa = json_encode($this->input->post('usaha_jasa', true));
            $usaha_jasa_lainnya = $this->input->post('usaha_jasa_lainnya', true);
        }else {
            $usaha_jasa = '';
            $usaha_jasa_lainnya = '';
        }

        if($this->input->post('fasos_fasum', true) != ''){
            $fasos_fasum = json_encode($this->input->post('fasos_fasum', true));
            $fasos_fasum_lainnya = $this->input->post('fasos_fasum_lainnya', true);
        }else {
            $fasos_fasum = '';
            $fasos_fasum_lainnya = '';
        }

        $data = [
            'obyek_subyek_id' => $this->input->post('id_suyek', true),
            'obyek_nomor_inventaris' => $this->input->post('nis', true),
            'obyek_nib' => $this->input->post('nib', true),
            'obyek_pbb' =>$this->input->post('pbb', true),
            'obyek_jalan' => $this->input->post('jalan', true),
            'obyek_rt' => $this->input->post('rt', true),
            'obyek_rw' => $this->input->post('rw', true),
            'obyek_desa_kelurahan' => $this->input->post('kelurahan', true),
            'obyek_kecamatan' => $this->input->post('kecamatan', true),
            'obyek_kabupaten_kota' => $this->input->post('kabupaten', true),
            'obyek_provinsi' => $this->input->post('provinsi', true),
            'obyek_luas_tanah' => $this->input->post('luas_tanah', true),
            'obyek_nilai_tanah_m2' => $this->input->post('nilai_tanah', true),
            'obyek_penguasaan_tanah' => $this->input->post('penguasaan', true),
            'obyek_penguasaan_tanah_bukan_pemilik' => $this->input->post('not_owner', true),
            'obyek_penguasaan_tahan_bukan_pemilik_lainnya' => $this->input->post('not_owner_lainnya', true),
            'obyek_perolehan_tanah' => $this->input->post('perolehan_tanah', true),
            'obyek_perolehan_tanah_lainnya' => $this->input->post('perolehan_lainnya', true),
            'obyek_pemilikan_tanah' => $this->input->post('pemilikan_tanah', true),
            'obyek_pemilikan_tanah_belum_terdaftar' => $option,
            'obyek_pemilikan_tanah_sertifikat_no' => $pemilikan_lainnya,
            'obyek_penggunaan_bidang_tanah' => $this->input->post('pengunaan_bidang_tanah', true),
            'obyek_penggunaan_bidang_tanah_lainnya' => $this->input->post('pengunaan_bidang_lainnya', true),
            'obyek_jenis_pemanfaatan_tempat_tinggal' => $this->input->post('rumah_tinggal', true),
            'obyek_jenis_pemanfaatan_pertanian' => $produksi,
            'obyek_jenis_pemanfaatan_pertanian_lainnya' => $produksi_lainnya,
            'obyek_jenis_pemanaatan_ekonomi_perdaganan' => $ekonomi,
            'obyek_jenis_pemanaatan_ekonomi_perdaganan_lainnya' => $ekonomi_lainnya,
            'obyek_jenis_pemanfaatan_usaha_jasa' => $usaha_jasa,
            'obyek_jenis_pemanfaatan_usaha_jasa_lainnya' => $usaha_jasa_lainnya,
            'obyek_jenis_pemanfaatan_fasos_fasum' => $fasos_fasum,
            'obyek_jenis_pemanfaatan_fasos_fasum_lainnya' => $fasos_fasum_lainnya,
            'obyek_jenis_pemanfaatan_tidak_ada_manfaat' => $this->input->post('no_manfaat', true),
            'obyek_sengketa_konflik_perkara' => $this->input->post('skp', true),
            'obyek_potensi_landreform' => $this->input->post('landeform', true),
            'obyek_potensi_landreform_option' => $tanah_negara,
            'obyek_potensi_landreform_option_lainnya' => $land_nomor,
            'obyek_koordinat_x' => $this->input->post('koordinat_x', true),
            'obyek_koordinat_y' => $this->input->post('koordinat_y', true),
            'obyek_input_user_id' => $this->session->userdata('user_id'),
            'obyek_input_datetime' => date('Y-m-d H:i:s')
        ];

        $this->db->insert('tbl_obyek', $data);

        $id = $this->helper_model->get_last_id_obyek();
        $data_akses = [
            'akses_obyek_id' => $id,
            'akses_inventaris_nomor' => '',
            'akses_sertifikat_dijamin' => '',
            'akses_potensi' => '',
            'akses_potensi_lainnya' => '',
            'akses_bantuan_jenis' => '',
            'akses_bantuan_dari' => '',
            'akses_bantuan_tanggal' => '',
            'akses_pendapatan_sebelum' => '',
            'akses_pendapatan_sesudah' => '',
            'akses_input_user_id' => '',
            'akses_input_datetime' => ''
        ];

        $data_penguasaan = [
            'subyek_penguasaan_obyek_id' => $id,
            'subyek_penguasaan_nama' => '',
            'subyek_penguasaan_jalan' => '',
            'subyek_penguasaan_rt' => '',
            'subyek_penguasaan_rw' => '',
            'subyek_penguasaan_desa_kelurahan' => '',
            'subyek_penguasaan_kecamatan' => '',
            'subyek_penguasaan_kabupaten_kota' => '',
            'subyek_penguasaan_provinsi' => '',
            'subyek_penguasaan_nomor_ktp' => '',
            'subyek_penguasaan_pekerjaan' => '',
            'subyek_penguasaan_umur' => '',
            'subyek_penguasaan_status_perkawinan' => '',
            'subyek_penguasaan_jumlah_anggota_keluarga' => '',
            'subyek_penguasaan_domisili' => '',
            'subyek_penguasaan_domisili_lainnya' => '',
            'subyek_penguasaan_tahun_memiliki_tanah' => '',
            'subyek_penguasaan_input_user_id' => '',
            'subyek_penguasaan_input_datetime' => ''
        ];

        $this->db->insert('tbl_akses', $data_akses);
        $this->db->insert('tbl_subyek_penguasaan', $data_penguasaan);

        if($this->session->userdata('user_akses') == 2){
            $this->session->set_flashdata('flash', 'Data Obyek <b>Berhasil</b> Ditambahkan');
            redirect('terkait_obyek/view_obyek_user/'.$this->session->userdata('user_id'));
        } else {
            $this->session->set_flashdata('flash', 'Data Obyek <b>Berhasil</b> Ditambahkan');
            redirect('terkait_obyek');
        }

    }

    public function get_data_detail($id)
    {
        $data = $this->terkait_obyek_model->get_data_obyek_detail($id);
        return $data;
    }

    public function detail_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Detail Data Terkait Obyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Obyek";
        $subtitle = "Detail";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = $subtitle;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => 'terkait_obyek/detail_data',
        );

        $res = $this->get_data_detail($id)->row();
        $ktp = $this->helper_model->get_name_ktp_subyek($res->obyek_subyek_id);

        $data['nama_subyek'] = $ktp->subyek_nama;
        $data['ktp_subyek'] = $ktp->subyek_nomor_ktp;
        // $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();
        // $data['kabupaten'] = $this->helper_model->get_kabupaten($res->obyek_provinsi);
        // $data['kecamatan'] = $this->helper_model->get_kecamatan($res->obyek_kabupaten_kota);
        // $data['kelurahan'] = $this->helper_model->get_kelurahan($res->obyek_kecamatan);

        $prov = $this->helper_model->get_data_provinsi_id($res->obyek_provinsi)->row();
        $data['prov_id'] = $prov->provinsi_id;
        $data['prov_nama'] = $prov->provinsi_nama;

        $data['kab'] = $this->helper_model->get_kabupaten_name($res->obyek_provinsi, $res->obyek_kabupaten_kota)->row();
        $data['kec'] = $this->helper_model->get_kecamatan_name($res->obyek_kabupaten_kota, $res->obyek_kecamatan)->row();
        $data['kel'] = $this->helper_model->get_kelurahan_name($res->obyek_kecamatan ,$res->obyek_desa_kelurahan)->row();

        $data['query'] = $res;

        $this->template->content("terkait_obyek/terkait_obyek_detail", $data);
        $this->template->show('template');
    }

    public function view_obyek_user($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Data Terkait Obyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Obyek";

        $data = array();
        $data['header_title'] = $title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            'Data Terkait ' . $title => 'terkait_obyek/show',
        );

        $res = $this->terkait_obyek_model->get_all_obyek_user($id)->result();
        if(!empty($res)){

            $data['query'] = $res;
            $this->template->content("terkait_obyek/terkait_obyek_view", $data);
            $this->template->show('template');

        } else {

            $this->add_data();
        }

    }

    public function edit_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Ubah Data Terkait Obyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Obyek";
        $subtitle = "Edit";

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['sub_title'] = '';
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => 'terkait_obyek/edit_data',
        );

        $res = $this->get_data_detail($id)->row();
        $ktp = $this->helper_model->get_name_ktp_subyek($res->obyek_subyek_id);

        $data['nama_subyek'] = $ktp->subyek_nama;
        $data['ktp_subyek'] = $ktp->subyek_nomor_ktp;

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();
        $data['kabupaten'] = $this->helper_model->get_kabupaten($res->obyek_provinsi);
        $data['kecamatan'] = $this->helper_model->get_kecamatan($res->obyek_kabupaten_kota);
        $data['kelurahan'] = $this->helper_model->get_kelurahan($res->obyek_kecamatan);

        $prov = $this->helper_model->get_data_provinsi_id($res->obyek_provinsi)->row();
        $data['prov_id'] = $prov->provinsi_id;
        $data['prov_nama'] = $prov->provinsi_nama;

        $data['kab'] = $this->helper_model->get_kabupaten_name($res->obyek_provinsi, $res->obyek_kabupaten_kota)->row();
        $data['kec'] = $this->helper_model->get_kecamatan_name($res->obyek_kabupaten_kota, $res->obyek_kecamatan)->row();
        $data['kel'] = $this->helper_model->get_kelurahan_name($res->obyek_kecamatan ,$res->obyek_desa_kelurahan)->row();

        $data['query'] = $res;

        $this->template->content("terkait_obyek/terkait_obyek_edit", $data);
        $this->template->show('template');
    }

    public function action_edit()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengubah Data Terkait Obyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        if ($this->input->post('pemilikan_tanah', true) != "Terdaftar") {
            $option = $this->input->post('belum_terdaftar', true);
            $pemilikan_lainnya = $this->input->post('surat_no', true);
        } else {
            $option = '';
            $pemilikan_lainnya = $this->input->post('pemilikan_sertifikat_no', true);
        }

        if ($this->input->post('landeform', true) == "Tanah Negara Lainnya") {
            $tanah_negara = $this->input->post('tanah_negara', true);
            if ($tanah_negara != "HGU Habis") {
                $land_nomor = $this->input->post('pelepasan_hgu', true);
            } else {
                $land_nomor = $this->input->post('hgu_habis', true);
            }
        } else {
            $land_nomor = '';
            $tanah_negara = '';
        }

        if($this->input->post('produksi_pertanian', true) != ''){
            $produksi = json_encode($this->input->post('produksi_pertanian', true));
            $produksi_lainnya = $this->input->post('produksi_pertanian_lainnya', true);
        }else {
            $produksi = '';
            $produksi_lainnya = '';
        }

        if($this->input->post('ekonomi', true) != ''){
            $ekonomi = json_encode($this->input->post('ekonomi', true));
            $ekonomi_lainnya = $this->input->post('ekonomi_lainnya', true);
        }else {
            $ekonomi = '';
            $ekonomi_lainnya = '';
        }

        if($this->input->post('usaha_jasa', true) != ''){
            $usaha_jasa = json_encode($this->input->post('usaha_jasa', true));
            $usaha_jasa_lainnya = $this->input->post('usaha_jasa_lainnya', true);
        }else {
            $usaha_jasa = '';
            $usaha_jasa_lainnya = '';
        }

        if($this->input->post('fasos_fasum', true) != ''){
            $fasos_fasum = json_encode($this->input->post('fasos_fasum', true));
            $fasos_fasum_lainnya = $this->input->post('fasos_fasum_lainnya', true);
        }else {
            $fasos_fasum = '';
            $fasos_fasum_lainnya = '';
        }

        $id_obyek = $this->input->post('id_obyek', true);

        $data = [
            'obyek_subyek_id' => $this->input->post('id_suyek', true),
            'obyek_nomor_inventaris' => $this->input->post('nis', true),
            'obyek_nib' => $this->input->post('nib', true),
            'obyek_pbb' =>$this->input->post('pbb', true),
            'obyek_jalan' => $this->input->post('jalan', true),
            'obyek_rt' => $this->input->post('rt', true),
            'obyek_rw' => $this->input->post('rw', true),
            'obyek_desa_kelurahan' => $this->input->post('kelurahan', true),
            'obyek_kecamatan' => $this->input->post('kecamatan', true),
            'obyek_kabupaten_kota' => $this->input->post('kabupaten', true),
            'obyek_provinsi' => $this->input->post('provinsi', true),
            'obyek_luas_tanah' => $this->input->post('luas_tanah', true),
            'obyek_nilai_tanah_m2' => $this->input->post('nilai_tanah', true),
            'obyek_penguasaan_tanah' => $this->input->post('penguasaan', true),
            'obyek_penguasaan_tanah_bukan_pemilik' => $this->input->post('not_owner', true),
            'obyek_penguasaan_tahan_bukan_pemilik_lainnya' => $this->input->post('not_owner_lainnya', true),
            'obyek_perolehan_tanah' => $this->input->post('perolehan_tanah', true),
            'obyek_perolehan_tanah_lainnya' => $this->input->post('perolehan_lainnya', true),
            'obyek_pemilikan_tanah' => $this->input->post('pemilikan_tanah', true),
            'obyek_pemilikan_tanah_belum_terdaftar' => $option,
            'obyek_pemilikan_tanah_sertifikat_no' => $pemilikan_lainnya,
            'obyek_penggunaan_bidang_tanah' => $this->input->post('pengunaan_bidang_tanah', true),
            'obyek_penggunaan_bidang_tanah_lainnya' => $this->input->post('pengunaan_bidang_lainnya', true),
            'obyek_jenis_pemanfaatan_tempat_tinggal' => $this->input->post('rumah_tinggal', true),
            'obyek_jenis_pemanfaatan_pertanian' => $produksi,
            'obyek_jenis_pemanfaatan_pertanian_lainnya' => $produksi_lainnya,
            'obyek_jenis_pemanaatan_ekonomi_perdaganan' => $ekonomi,
            'obyek_jenis_pemanaatan_ekonomi_perdaganan_lainnya' => $ekonomi_lainnya,
            'obyek_jenis_pemanfaatan_usaha_jasa' => $usaha_jasa,
            'obyek_jenis_pemanfaatan_usaha_jasa_lainnya' => $usaha_jasa_lainnya,
            'obyek_jenis_pemanfaatan_fasos_fasum' => $fasos_fasum,
            'obyek_jenis_pemanfaatan_fasos_fasum_lainnya' => $fasos_fasum_lainnya,
            'obyek_jenis_pemanfaatan_tidak_ada_manfaat' => $this->input->post('no_manfaat', true),
            'obyek_sengketa_konflik_perkara' => $this->input->post('skp', true),
            'obyek_potensi_landreform' => $this->input->post('landeform', true),
            'obyek_potensi_landreform_option' => $tanah_negara,
            'obyek_potensi_landreform_option_lainnya' => $land_nomor,
            'obyek_koordinat_x' => $this->input->post('koordinat_x', true),
            'obyek_koordinat_y' => $this->input->post('koordinat_y', true),
            'obyek_input_user_id' => $this->session->userdata('user_id')
        ];

        $this->db->where('obyek_id', $id_obyek);
        $this->db->update('tbl_obyek', $data);

        if($this->session->userdata('user_akses') == 2){
            $this->session->set_flashdata('flash', 'Data Obyek <b>Berhasil</b> Diubah');
            redirect('terkait_obyek/view_obyek_user/'.$this->session->userdata('user_id'));
        } else {
            $this->session->set_flashdata('flash', 'Data Obyek <b>Berhasil</b> Diubah');
            redirect('terkait_obyek');
        }
    }

    public function delete_data($id)
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Menghapus Data Terkait Obyek',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $this->terkait_obyek_model->delete_data_obyek($id);
        $this->session->set_flashdata('flash', 'Data Akses <b>Berhasil</b> Dihapus');
        redirect('terkait_obyek');
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

    public function check_ktp_subyek()
    {
        if($this->session->userdata('user_akses') == 2){
            $ktp = $this->input->get('ktp');
            $data = $this->helper_model->check_ktp_subyek($ktp, $this->session->userdata('user_id'));
            echo json_encode($data);
        } else {
            $ktp = $this->input->get('ktp');
            $data = $this->helper_model->check_ktp_subyek($ktp);
            echo json_encode($data);
        }
    }
}
