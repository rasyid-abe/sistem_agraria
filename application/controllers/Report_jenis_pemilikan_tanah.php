<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Report_jenis_pemilikan_tanah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->model('helper_model');
    }

    public function index()
    {
        $this->show();
    }

    public function show()
    {
        $title = "Report Jenis Pemilikan Tanah";

        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman ' . $title,
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $data = array();
        $data['header_title'] = $title;
        $data['arr_breadcrumbs'] = array(
            'Report' => '#',
            'Data ' . $title => 'report_jenis_pemilikan_tanah',
        );

        $filter = '';

        $terdaftar = $this->tanah_terdaftar($filter);
        $tidak_terdaftar = $this->tanah_tidak_terdaftar($filter);

        $data['terdaftar'] = $terdaftar;
        $data['tidak_terdaftar'] =$tidak_terdaftar;

        $data['total_terdaftar'] = $this->report_model->get_total_terdaftar($filter);
        $data['total_tidak_terdaftar'] = $this->report_model->get_total_tidak_terdaftar($filter);

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

        $this->template->content("report/jenis_pemilikan_tanah_view", $data);
        $this->template->show('template');

    }

    public function show_filter()
    {
        if(in_array('Filter', $_POST)){
            $filter = [
                'desa_kelurahan' => $this->input->post('kelurahan', true),
                'kecamatan' => $this->input->post('kecamatan', true),
                'kabupaten_kota' => $this->input->post('kabupaten', true),
                'provinsi' => $this->input->post('provinsi', true),
            ];

            $title = "Report Jenis Pemilikan Tanah";

            $data = array();
            $data['header_title'] = $title;
            $data['arr_breadcrumbs'] = array(
                'Report' => '#',
                'Data ' . $title => 'report_jenis_pemilikan_tanah',
            );

            $terdaftar = $this->tanah_terdaftar($filter);
            $tidak_terdaftar = $this->tanah_tidak_terdaftar($filter);

            $data['terdaftar'] = $terdaftar;
            $data['tidak_terdaftar'] =$tidak_terdaftar;

            $data['total_terdaftar'] = $this->report_model->get_total_terdaftar($filter);
            $data['total_tidak_terdaftar'] = $this->report_model->get_total_tidak_terdaftar($filter);

            $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

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

            $this->template->content("report/jenis_pemilikan_tanah_view", $data);
            $this->template->show('template');

        } else {

            // start log
            $log = [
                'log_activity_datetime' => date('Y-m-d H:i:s'),
                'log_activity_user' => $this->session->userdata('user_nama'),
                'log_activity_access' => $this->session->userdata('user_akses'),
                'log_activity_desc' => 'Mengeksport Data ' . $title,
            ];

            $this->db->insert('tbl_log_activity', $log);
            // end log

            $filter = [
                'desa_kelurahan' => $this->input->post('kelurahan', true),
                'kecamatan' => $this->input->post('kecamatan', true),
                'kabupaten_kota' => $this->input->post('kabupaten', true),
                'provinsi' => $this->input->post('provinsi', true),
            ];

            $data = array();

            $data['date'] = date('Y-m-d H:i:s');

            $terdaftar = $this->tanah_terdaftar($filter);
            $tidak_terdaftar = $this->tanah_tidak_terdaftar($filter);

            $data['terdaftar'] = $terdaftar;
            $data['tidak_terdaftar'] =$tidak_terdaftar;

            $data['total_terdaftar'] = $this->report_model->get_total_terdaftar($filter);
            $data['total_tidak_terdaftar'] = $this->report_model->get_total_tidak_terdaftar($filter);

            $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

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

            $this->load->view('export/jenis_pemilikan_tanah', $data);

        }

    }

    public function tanah_terdaftar($filter)
    {
        $data = $this->report_model->get_data_tanah_terdaftar($filter);

        $bidang100 = 0;
        $luas100 = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah <= 100 ){
                $bidang100++;
                $luas100 = $luas100 + $row->obyek_luas_tanah;
            }
        }

        $bidang200 = 0;
        $luas200 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 100 ) && ($row->obyek_luas_tanah <= 200)){
                $bidang200++;
                $luas200 = $luas200 + $row->obyek_luas_tanah;
            }
        }

        $bidang300 = 0;
        $luas300 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 200 ) && ($row->obyek_luas_tanah <= 300)){
                $bidang300++;
                $luas300 = $luas300 + $row->obyek_luas_tanah;
            }
        }

        $bidang400 = 0;
        $luas400 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 300 ) && ($row->obyek_luas_tanah <= 400)){
                $bidang400++;
                $luas400 = $luas400 + $row->obyek_luas_tanah;
            }
        }

        $bidang500 = 0;
        $luas500 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 400 ) && ($row->obyek_luas_tanah <= 500)){
                $bidang500++;
                $luas500 = $luas500 + $row->obyek_luas_tanah;
            }
        }

        $bidang600 = 0;
        $luas600 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 500 ) && ($row->obyek_luas_tanah <= 600)){
                $bidang600++;
                $luas600 = $luas600 + $row->obyek_luas_tanah;
            }
        }

        $bidang700 = 0;
        $luas700 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 600 ) && ($row->obyek_luas_tanah <= 700)){
                $bidang700++;
                $luas700 = $luas700 + $row->obyek_luas_tanah;
            }
        }

        $bidang800 = 0;
        $luas800 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 700 ) && ($row->obyek_luas_tanah <= 800)){
                $bidang800++;
                $luas800 = $luas800 + $row->obyek_luas_tanah;
            }
        }

        $bidang900 = 0;
        $luas900 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 800 ) && ($row->obyek_luas_tanah <= 900)){
                $bidang900++;
                $luas900 = $luas900 + $row->obyek_luas_tanah;
            }
        }

        $bidang1000 = 0;
        $luas1000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 900 ) && ($row->obyek_luas_tanah <= 1000)){
                $bidang1000++;
                $luas1000 = $luas1000 + $row->obyek_luas_tanah;
            }
        }

        $bidang2000 = 0;
        $luas2000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 1000 ) && ($row->obyek_luas_tanah <= 2000)){
                $bidang2000++;
                $luas2000 = $luas2000 + $row->obyek_luas_tanah;
            }
        }

        $bidang3000 = 0;
        $luas3000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 2000 ) && ($row->obyek_luas_tanah <= 3000)){
                $bidang3000++;
                $luas3000 = $luas3000 + $row->obyek_luas_tanah;
            }
        }

        $bidang4000 = 0;
        $luas4000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 3000 ) && ($row->obyek_luas_tanah <= 4000)){
                $bidang4000++;
                $luas4000 = $luas4000 + $row->obyek_luas_tanah;
            }
        }

        $bidang5000 = 0;
        $luas5000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 4000 ) && ($row->obyek_luas_tanah <= 5000)){
                $bidang5000++;
                $luas5000 = $luas5000 + $row->obyek_luas_tanah;
            }
        }

        $bidang6000 = 0;
        $luas6000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 5000 ) && ($row->obyek_luas_tanah <= 6000)){
                $bidang6000++;
                $luas6000 = $luas6000 + $row->obyek_luas_tanah;
            }
        }

        $bidang7000 = 0;
        $luas7000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 6000 ) && ($row->obyek_luas_tanah <= 7000)){
                $bidang7000++;
                $luas7000 = $luas7000 + $row->obyek_luas_tanah;
            }
        }

        $bidang8000 = 0;
        $luas8000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 7000 ) && ($row->obyek_luas_tanah <= 8000)){
                $bidang8000++;
                $luas8000 = $luas8000 + $row->obyek_luas_tanah;
            }
        }

        $bidang9000 = 0;
        $luas9000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 8000 ) && ($row->obyek_luas_tanah <= 9000)){
                $bidang9000++;
                $luas9000 = $luas9000 + $row->obyek_luas_tanah;
            }
        }

        $bidang10000 = 0;
        $luas10000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 9000 ) && ($row->obyek_luas_tanah <= 10000)){
                $bidang10000++;
                $luas10000 = $luas10000 + $row->obyek_luas_tanah;
            }
        }

        $bidang20000 = 0;
        $luas20000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 10000 ) && ($row->obyek_luas_tanah <= 20000)){
                $bidang20000++;
                $luas20000 = $luas20000 + $row->obyek_luas_tanah;
            }
        }

        $bidangmore = 0;
        $luasmore = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah > 20000 ){
                $bidangmore++;
                $luasmore = $luasmore + $row->obyek_luas_tanah;
            }
        }

        $bidang = array();
        $bidang['bidang100'] = $bidang100;
        $bidang['luas100'] = $luas100;
        $bidang['bidang200'] = $bidang200;
        $bidang['luas200'] = $luas200;
        $bidang['bidang300'] = $bidang300;
        $bidang['luas300'] = $luas300;
        $bidang['bidang400'] = $bidang400;
        $bidang['luas400'] = $luas400;
        $bidang['bidang500'] = $bidang500;
        $bidang['luas500'] = $luas500;
        $bidang['bidang600'] = $bidang600;
        $bidang['luas600'] = $luas600;
        $bidang['bidang700'] = $bidang700;
        $bidang['luas700'] = $luas700;
        $bidang['bidang800'] = $bidang800;
        $bidang['luas800'] = $luas800;
        $bidang['bidang900'] = $bidang900;
        $bidang['luas900'] = $luas900;
        $bidang['bidang1000'] = $bidang1000;
        $bidang['luas1000'] = $luas1000;
        $bidang['bidang2000'] = $bidang2000;
        $bidang['luas2000'] = $luas2000;
        $bidang['bidang3000'] = $bidang3000;
        $bidang['luas3000'] = $luas3000;
        $bidang['bidang4000'] = $bidang4000;
        $bidang['luas4000'] = $luas4000;
        $bidang['bidang5000'] = $bidang5000;
        $bidang['luas5000'] = $luas5000;
        $bidang['bidang6000'] = $bidang6000;
        $bidang['luas6000'] = $luas6000;
        $bidang['bidang7000'] = $bidang7000;
        $bidang['luas7000'] = $luas7000;
        $bidang['bidang8000'] = $bidang8000;
        $bidang['luas8000'] = $luas8000;
        $bidang['bidang9000'] = $bidang9000;
        $bidang['luas9000'] = $luas9000;
        $bidang['bidang10000'] = $bidang10000;
        $bidang['luas10000'] = $luas10000;
        $bidang['bidang20000'] = $bidang20000;
        $bidang['luas20000'] = $luas20000;
        $bidang['bidangmore'] = $bidangmore;
        $bidang['luasmore'] = $luasmore;

        return $bidang;
    }

    public function tanah_tidak_terdaftar($filter)
    {
        $data = $this->report_model->get_data_tanah_tidak_terdaftar($filter);

        $bidang100 = 0;
        $luas100 = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah <= 100 ){
                $bidang100++;
                $luas100 = $luas100 + $row->obyek_luas_tanah;
            }
        }

        $bidang200 = 0;
        $luas200 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 100 ) && ($row->obyek_luas_tanah <= 200)){
                $bidang200++;
                $luas200 = $luas200 + $row->obyek_luas_tanah;
            }
        }

        $bidang300 = 0;
        $luas300 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 200 ) && ($row->obyek_luas_tanah <= 300)){
                $bidang300++;
                $luas300 = $luas300 + $row->obyek_luas_tanah;
            }
        }

        $bidang400 = 0;
        $luas400 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 300 ) && ($row->obyek_luas_tanah <= 400)){
                $bidang400++;
                $luas400 = $luas400 + $row->obyek_luas_tanah;
            }
        }

        $bidang500 = 0;
        $luas500 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 400 ) && ($row->obyek_luas_tanah <= 500)){
                $bidang500++;
                $luas500 = $luas500 + $row->obyek_luas_tanah;
            }
        }

        $bidang600 = 0;
        $luas600 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 500 ) && ($row->obyek_luas_tanah <= 600)){
                $bidang600++;
                $luas600 = $luas600 + $row->obyek_luas_tanah;
            }
        }

        $bidang700 = 0;
        $luas700 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 600 ) && ($row->obyek_luas_tanah <= 700)){
                $bidang700++;
                $luas700 = $luas700 + $row->obyek_luas_tanah;
            }
        }

        $bidang800 = 0;
        $luas800 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 700 ) && ($row->obyek_luas_tanah <= 800)){
                $bidang800++;
                $luas800 = $luas800 + $row->obyek_luas_tanah;
            }
        }

        $bidang900 = 0;
        $luas900 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 800 ) && ($row->obyek_luas_tanah <= 900)){
                $bidang900++;
                $luas900 = $luas900 + $row->obyek_luas_tanah;
            }
        }

        $bidang1000 = 0;
        $luas1000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 900 ) && ($row->obyek_luas_tanah <= 1000)){
                $bidang1000++;
                $luas1000 = $luas1000 + $row->obyek_luas_tanah;
            }
        }

        $bidang2000 = 0;
        $luas2000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 1000 ) && ($row->obyek_luas_tanah <= 2000)){
                $bidang2000++;
                $luas2000 = $luas2000 + $row->obyek_luas_tanah;
            }
        }

        $bidang3000 = 0;
        $luas3000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 2000 ) && ($row->obyek_luas_tanah <= 3000)){
                $bidang3000++;
                $luas3000 = $luas3000 + $row->obyek_luas_tanah;
            }
        }

        $bidang4000 = 0;
        $luas4000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 3000 ) && ($row->obyek_luas_tanah <= 4000)){
                $bidang4000++;
                $luas4000 = $luas4000 + $row->obyek_luas_tanah;
            }
        }

        $bidang5000 = 0;
        $luas5000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 4000 ) && ($row->obyek_luas_tanah <= 5000)){
                $bidang5000++;
                $luas5000 = $luas5000 + $row->obyek_luas_tanah;
            }
        }

        $bidang6000 = 0;
        $luas6000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 5000 ) && ($row->obyek_luas_tanah <= 6000)){
                $bidang6000++;
                $luas6000 = $luas6000 + $row->obyek_luas_tanah;
            }
        }

        $bidang7000 = 0;
        $luas7000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 6000 ) && ($row->obyek_luas_tanah <= 7000)){
                $bidang7000++;
                $luas7000 = $luas7000 + $row->obyek_luas_tanah;
            }
        }

        $bidang8000 = 0;
        $luas8000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 7000 ) && ($row->obyek_luas_tanah <= 8000)){
                $bidang8000++;
                $luas8000 = $luas8000 + $row->obyek_luas_tanah;
            }
        }

        $bidang9000 = 0;
        $luas9000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 8000 ) && ($row->obyek_luas_tanah <= 9000)){
                $bidang9000++;
                $luas9000 = $luas9000 + $row->obyek_luas_tanah;
            }
        }

        $bidang10000 = 0;
        $luas10000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 9000 ) && ($row->obyek_luas_tanah <= 10000)){
                $bidang10000++;
                $luas10000 = $luas10000 + $row->obyek_luas_tanah;
            }
        }

        $bidang20000 = 0;
        $luas20000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 10000 ) && ($row->obyek_luas_tanah <= 20000)){
                $bidang20000++;
                $luas20000 = $luas20000 + $row->obyek_luas_tanah;
            }
        }

        $bidangmore = 0;
        $luasmore = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah > 20000 ){
                $bidangmore++;
                $luasmore = $luasmore + $row->obyek_luas_tanah;
            }
        }

        $bidang = array();
        $bidang['bidang100'] = $bidang100;
        $bidang['luas100'] = $luas100;
        $bidang['bidang200'] = $bidang200;
        $bidang['luas200'] = $luas200;
        $bidang['bidang300'] = $bidang300;
        $bidang['luas300'] = $luas300;
        $bidang['bidang400'] = $bidang400;
        $bidang['luas400'] = $luas400;
        $bidang['bidang500'] = $bidang500;
        $bidang['luas500'] = $luas500;
        $bidang['bidang600'] = $bidang600;
        $bidang['luas600'] = $luas600;
        $bidang['bidang700'] = $bidang700;
        $bidang['luas700'] = $luas700;
        $bidang['bidang800'] = $bidang800;
        $bidang['luas800'] = $luas800;
        $bidang['bidang900'] = $bidang900;
        $bidang['luas900'] = $luas900;
        $bidang['bidang1000'] = $bidang1000;
        $bidang['luas1000'] = $luas1000;
        $bidang['bidang2000'] = $bidang2000;
        $bidang['luas2000'] = $luas2000;
        $bidang['bidang3000'] = $bidang3000;
        $bidang['luas3000'] = $luas3000;
        $bidang['bidang4000'] = $bidang4000;
        $bidang['luas4000'] = $luas4000;
        $bidang['bidang5000'] = $bidang5000;
        $bidang['luas5000'] = $luas5000;
        $bidang['bidang6000'] = $bidang6000;
        $bidang['luas6000'] = $luas6000;
        $bidang['bidang7000'] = $bidang7000;
        $bidang['luas7000'] = $luas7000;
        $bidang['bidang8000'] = $bidang8000;
        $bidang['luas8000'] = $luas8000;
        $bidang['bidang9000'] = $bidang9000;
        $bidang['luas9000'] = $luas9000;
        $bidang['bidang10000'] = $bidang10000;
        $bidang['luas10000'] = $luas10000;
        $bidang['bidang20000'] = $bidang20000;
        $bidang['luas20000'] = $luas20000;
        $bidang['bidangmore'] = $bidangmore;
        $bidang['luasmore'] = $luasmore;

        return $bidang;
    }
}
