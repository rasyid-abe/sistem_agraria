<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Export_all extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('helper_model');
        $this->akses = $this->session->userdata('user_akses');
        $this->id = $this->session->userdata('user_id');
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
            'log_activity_desc' => 'Mengakses Halaman Export Seluruh Data Excel',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Export";
        $subtitle = 'Filter';

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => 'export/show',
        );

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

        $this->template->content("export/export_all_view", $data);
        $this->template->show('template');
    }

    public function show_filter()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Export Seluruh Data Excel',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $data = array();

        $filter = [
            'desa_kelurahan' => $this->input->post('kelurahan', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'kabupaten_kota' => $this->input->post('kabupaten', true),
            'provinsi' => $this->input->post('provinsi', true),
        ];

        if(!empty($filter['provinsi'])){
            if($filter['kabupaten_kota'] != ''){
                if($filter['kecamatan'] != ''){
                    if($filter['desa_kelurahan'] != ''){
                        $data['kel'] = $this->helper_model->get_kelurahan_name($filter['kecamatan'] ,$filter['desa_kelurahan'])->row();
                        $data['kec'] = $this->helper_model->get_kecamatan_name($filter['kabupaten_kota'], $filter['kecamatan'])->row();
                        $data['kab'] = $this->helper_model->get_kabupaten_name($filter['provinsi'], $filter['kabupaten_kota'])->row();
                        $data['prov'] = $this->helper_model->get_data_provinsi_id($filter['provinsi'])->row();
                        $prov = $this->helper_model->get_data_provinsi_id($filter['provinsi'])->row();
                        $data['prov_nama'] = $prov->provinsi_nama;
                    } else {
                        $data['kec'] = $this->helper_model->get_kecamatan_name($filter['kabupaten_kota'], $filter['kecamatan'])->row();
                        $data['kab'] = $this->helper_model->get_kabupaten_name($filter['provinsi'], $filter['kabupaten_kota'])->row();
                        $data['prov'] = $this->helper_model->get_data_provinsi_id($filter['provinsi'])->row();
                        $prov = $this->helper_model->get_data_provinsi_id($filter['provinsi'])->row();
                        $data['prov_nama'] = $prov->provinsi_nama;
                    }
                } else {
                    $data['kab'] = $this->helper_model->get_kabupaten_name($filter['provinsi'], $filter['kabupaten_kota'])->row();
                    $data['prov'] = $this->helper_model->get_data_provinsi_id($filter['provinsi'])->row();
                    $prov = $this->helper_model->get_data_provinsi_id($filter['provinsi'])->row();
                    $data['prov_nama'] = $prov->provinsi_nama;
                }
            } else {
                $data['prov'] = $this->helper_model->get_data_provinsi_id($filter['provinsi'])->row();
                $prov = $this->helper_model->get_data_provinsi_id($filter['provinsi'])->row();
                $data['prov_nama'] = $prov->provinsi_nama;
            }
        }

        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT * FROM tbl_subyek
            LEFT JOIN tbl_obyek ON subyek_id = obyek_subyek_id
            LEFT JOIN tbl_subyek_penguasaan ON obyek_id = subyek_penguasaan_obyek_id
            LEFT JOIN tbl_akses ON obyek_id = akses_obyek_id
            WHERE obyek_nomor_inventaris <> '' $where
            ";

            $query = $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT * FROM tbl_subyek
            LEFT JOIN tbl_obyek ON subyek_id = obyek_subyek_id
            LEFT JOIN tbl_subyek_penguasaan ON obyek_id = subyek_penguasaan_obyek_id
            LEFT JOIN tbl_akses ON obyek_id = akses_obyek_id
            WHERE obyek_nomor_inventaris <> '' $where
            AND subyek_input_user_id = {$this->id}
            ";

            $query = $this->db->query($sql)->result();
        }

        if(!empty($query)){
            $data['date'] = date('Y-m-d H:i:s');
            $data['data'] = $query;

            $this->load->view('export/export_all', $data);
        } else {
            redirect('export_all/empty_data');
        }

    }

    public function empty_data()
    {
        $title = "Not Found";
        $subtitle = '';

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;

        $this->template->content("empty_data/empty_data_view", $data);
        $this->template->show('template');
    }

    public function search_all_data()
    {
        $nik = $this->input->post('nik', true);

        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Cari Data terkait '. $nik,
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log



        if($this->akses == 0){
            $sql = "
            SELECT * FROM tbl_subyek WHERE subyek_nomor_ktp = {$nik}
            ";

            $res = $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT * FROM tbl_subyek WHERE subyek_nomor_ktp = {$nik}
            AND subyek_input_user_id = {$this->session->userdata('user_id')}
            ";

            $res = $this->db->query($sql)->row();
        }

        if($res != ''){
            $title = "Pencarian";
            $subtitle = "Data";

            $data = array();
            $data['header_title'] = $subtitle. ' ' .$title;
            $data['sub_title'] = $subtitle;
            $data['arr_breadcrumbs'] = array(
                $title => 'terkait_subyek',
                $subtitle .' '. $title => 'terkait_subyek/detail_data',
            );

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

            $sql_obyek = "
                SELECT * FROM tbl_obyek WHERE obyek_subyek_id = {$res->subyek_id}
            ";

            $data['obyek'] = $this->db->query($sql_obyek)->result();

            $this->template->content("search/data_view", $data);
            $this->template->show('template');
        } else {
            redirect('export_all/empty_data');
        }

    }
}
