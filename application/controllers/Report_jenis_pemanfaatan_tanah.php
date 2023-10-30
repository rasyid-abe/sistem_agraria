<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Report_jenis_pemanfaatan_tanah extends CI_Controller
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
        $title = "Report Jenis Pemanfaatan Tanah";

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
            'Data ' . $title => 'report_jenis_pemanfaatan_tanah',
        );

        $filter = '';

        $tempat_tinggal = $this->data_tempat_tinggal($filter);
        $pertanian = $this->data_pertanian($filter);
        $ekonomi = $this->data_ekonomi($filter);
        $jasa = $this->data_jasa($filter);
        $fasum = $this->data_fasum($filter);
        $useless = $this->data_useless($filter);

        $data['tempat_tinggal'] = $tempat_tinggal;
        $data['pertanian'] =$pertanian;
        $data['ekonomi'] =$ekonomi;
        $data['jasa'] =$jasa;
        $data['fasum'] =$fasum;
        $data['useless'] =$useless;

        $data['total_tempat_tinggal'] = $this->report_model->get_total_penguasaan_tempat_tinggal($filter);
        $data['total_pertanian'] = $this->report_model->get_total_penguasaan_pertanian($filter);
        $data['total_ekonomi'] = $this->report_model->get_total_penguasaan_ekonomi($filter);
        $data['total_jasa'] = $this->report_model->get_total_penguasaan_jasa($filter);
        $data['total_fasum'] = $this->report_model->get_total_penguasaan_fasum($filter);
        $data['total_useless'] = $this->report_model->get_total_penguasaan_useless($filter);

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

        $this->template->content("report/jenis_pemanfaatan_tanah_view", $data);
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

            $title = "Report Jenis Pemanfaatan Tanah";

            $data = array();
            $data['header_title'] = $title;
            $data['arr_breadcrumbs'] = array(
                'Report' => '#',
                'Data ' . $title => 'report_jenis_pemanfaatan_tanah',
            );

            $tempat_tinggal = $this->data_tempat_tinggal($filter);
            $pertanian = $this->data_pertanian($filter);
            $ekonomi = $this->data_ekonomi($filter);
            $jasa = $this->data_jasa($filter);
            $fasum = $this->data_fasum($filter);
            $useless = $this->data_useless($filter);

            $data['tempat_tinggal'] = $tempat_tinggal;
            $data['pertanian'] =$pertanian;
            $data['ekonomi'] =$ekonomi;
            $data['jasa'] =$jasa;
            $data['fasum'] =$fasum;
            $data['useless'] =$useless;

            $data['total_tempat_tinggal'] = $this->report_model->get_total_penguasaan_tempat_tinggal($filter);
            $data['total_pertanian'] = $this->report_model->get_total_penguasaan_pertanian($filter);
            $data['total_ekonomi'] = $this->report_model->get_total_penguasaan_ekonomi($filter);
            $data['total_jasa'] = $this->report_model->get_total_penguasaan_jasa($filter);
            $data['total_fasum'] = $this->report_model->get_total_penguasaan_fasum($filter);
            $data['total_useless'] = $this->report_model->get_total_penguasaan_useless($filter);

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

            $this->template->content("report/jenis_pemanfaatan_tanah_view", $data);
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

            $tempat_tinggal = $this->data_tempat_tinggal($filter);
            $pertanian = $this->data_pertanian($filter);
            $ekonomi = $this->data_ekonomi($filter);
            $jasa = $this->data_jasa($filter);
            $fasum = $this->data_fasum($filter);
            $useless = $this->data_useless($filter);

            $data['tempat_tinggal'] = $tempat_tinggal;
            $data['pertanian'] =$pertanian;
            $data['ekonomi'] =$ekonomi;
            $data['jasa'] =$jasa;
            $data['fasum'] =$fasum;
            $data['useless'] =$useless;

            $data['total_tempat_tinggal'] = $this->report_model->get_total_penguasaan_tempat_tinggal($filter);
            $data['total_pertanian'] = $this->report_model->get_total_penguasaan_pertanian($filter);
            $data['total_ekonomi'] = $this->report_model->get_total_penguasaan_ekonomi($filter);
            $data['total_jasa'] = $this->report_model->get_total_penguasaan_jasa($filter);
            $data['total_fasum'] = $this->report_model->get_total_penguasaan_fasum($filter);
            $data['total_useless'] = $this->report_model->get_total_penguasaan_useless($filter);

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

            $this->load->view('export/jenis_pemanfaatan_tanah', $data);
        }

    }

    public function data_tempat_tinggal($filter)
    {
        $data = $this->report_model->get_data_tempat_tinggal($filter);

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

        $bidang_pemilik = array();
        $bidang_pemilik['bidang100'] = $bidang100;
        $bidang_pemilik['luas100'] = $luas100;
        $bidang_pemilik['bidang200'] = $bidang200;
        $bidang_pemilik['luas200'] = $luas200;
        $bidang_pemilik['bidang300'] = $bidang300;
        $bidang_pemilik['luas300'] = $luas300;
        $bidang_pemilik['bidang400'] = $bidang400;
        $bidang_pemilik['luas400'] = $luas400;
        $bidang_pemilik['bidang500'] = $bidang500;
        $bidang_pemilik['luas500'] = $luas500;
        $bidang_pemilik['bidang600'] = $bidang600;
        $bidang_pemilik['luas600'] = $luas600;
        $bidang_pemilik['bidang700'] = $bidang700;
        $bidang_pemilik['luas700'] = $luas700;
        $bidang_pemilik['bidang800'] = $bidang800;
        $bidang_pemilik['luas800'] = $luas800;
        $bidang_pemilik['bidang900'] = $bidang900;
        $bidang_pemilik['luas900'] = $luas900;
        $bidang_pemilik['bidang1000'] = $bidang1000;
        $bidang_pemilik['luas1000'] = $luas1000;
        $bidang_pemilik['bidang2000'] = $bidang2000;
        $bidang_pemilik['luas2000'] = $luas2000;
        $bidang_pemilik['bidang3000'] = $bidang3000;
        $bidang_pemilik['luas3000'] = $luas3000;
        $bidang_pemilik['bidang4000'] = $bidang4000;
        $bidang_pemilik['luas4000'] = $luas4000;
        $bidang_pemilik['bidang5000'] = $bidang5000;
        $bidang_pemilik['luas5000'] = $luas5000;
        $bidang_pemilik['bidang6000'] = $bidang6000;
        $bidang_pemilik['luas6000'] = $luas6000;
        $bidang_pemilik['bidang7000'] = $bidang7000;
        $bidang_pemilik['luas7000'] = $luas7000;
        $bidang_pemilik['bidang8000'] = $bidang8000;
        $bidang_pemilik['luas8000'] = $luas8000;
        $bidang_pemilik['bidang9000'] = $bidang9000;
        $bidang_pemilik['luas9000'] = $luas9000;
        $bidang_pemilik['bidang10000'] = $bidang10000;
        $bidang_pemilik['luas10000'] = $luas10000;
        $bidang_pemilik['bidang20000'] = $bidang20000;
        $bidang_pemilik['luas20000'] = $luas20000;
        $bidang_pemilik['bidangmore'] = $bidangmore;
        $bidang_pemilik['luasmore'] = $luasmore;

        // $bidang_pemilik1 = $bidang100 + $bidang200 + $bidang300 + $bidang400 + $bidang500 + $bidang600 + $bidang700 + $bidang800 + $bidang900 + $bidang1000;
        // $bidang_pemilik2 = $bduang2 $bidang2000 + $bidang3000 + $bidang4000 + $bidang5000 + $bidang6000 + $bidang7000 + $bidang8000 + $bidang9000 + $bidnag10000 + $bidang20000 + $bidangmore;
        // $bidang_pemilik['total_bidang'] = $bidang_pemilik1 + $bidang_pemilik2;
        //
        // $luas_pemilik1 = $luas100 + $luas200 + $luas300 + $luas400 + $luas500 + $luas600 + $luas700 + $luas800 + $luas900 + $luas1000;
        // $luas_pemilik2 = $bduang2 $luas2000 + $luas3000 + $luas4000 + $luas5000 + $luas6000 + $luas7000 + $luas8000 + $luas9000 + $bidnag10000 + $luas20000 + $luasmore;
        // $bidang_pemilik['total_luas'] = $luas_pemilik1 + $luas_pemilik2;

        return $bidang_pemilik;
    }

    public function data_pertanian($filter)
    {
        $data = $this->report_model->get_data_pertanian($filter);

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

        $bidang_pemilik = array();
        $bidang_pemilik['bidang100'] = $bidang100;
        $bidang_pemilik['luas100'] = $luas100;
        $bidang_pemilik['bidang200'] = $bidang200;
        $bidang_pemilik['luas200'] = $luas200;
        $bidang_pemilik['bidang300'] = $bidang300;
        $bidang_pemilik['luas300'] = $luas300;
        $bidang_pemilik['bidang400'] = $bidang400;
        $bidang_pemilik['luas400'] = $luas400;
        $bidang_pemilik['bidang500'] = $bidang500;
        $bidang_pemilik['luas500'] = $luas500;
        $bidang_pemilik['bidang600'] = $bidang600;
        $bidang_pemilik['luas600'] = $luas600;
        $bidang_pemilik['bidang700'] = $bidang700;
        $bidang_pemilik['luas700'] = $luas700;
        $bidang_pemilik['bidang800'] = $bidang800;
        $bidang_pemilik['luas800'] = $luas800;
        $bidang_pemilik['bidang900'] = $bidang900;
        $bidang_pemilik['luas900'] = $luas900;
        $bidang_pemilik['bidang1000'] = $bidang1000;
        $bidang_pemilik['luas1000'] = $luas1000;
        $bidang_pemilik['bidang2000'] = $bidang2000;
        $bidang_pemilik['luas2000'] = $luas2000;
        $bidang_pemilik['bidang3000'] = $bidang3000;
        $bidang_pemilik['luas3000'] = $luas3000;
        $bidang_pemilik['bidang4000'] = $bidang4000;
        $bidang_pemilik['luas4000'] = $luas4000;
        $bidang_pemilik['bidang5000'] = $bidang5000;
        $bidang_pemilik['luas5000'] = $luas5000;
        $bidang_pemilik['bidang6000'] = $bidang6000;
        $bidang_pemilik['luas6000'] = $luas6000;
        $bidang_pemilik['bidang7000'] = $bidang7000;
        $bidang_pemilik['luas7000'] = $luas7000;
        $bidang_pemilik['bidang8000'] = $bidang8000;
        $bidang_pemilik['luas8000'] = $luas8000;
        $bidang_pemilik['bidang9000'] = $bidang9000;
        $bidang_pemilik['luas9000'] = $luas9000;
        $bidang_pemilik['bidang10000'] = $bidang10000;
        $bidang_pemilik['luas10000'] = $luas10000;
        $bidang_pemilik['bidang20000'] = $bidang20000;
        $bidang_pemilik['luas20000'] = $luas20000;
        $bidang_pemilik['bidangmore'] = $bidangmore;
        $bidang_pemilik['luasmore'] = $luasmore;

        return $bidang_pemilik;
    }

    public function data_ekonomi($filter)
    {
        $data = $this->report_model->get_data_ekonomi($filter);

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

        $bidang_pemilik = array();
        $bidang_pemilik['bidang100'] = $bidang100;
        $bidang_pemilik['luas100'] = $luas100;
        $bidang_pemilik['bidang200'] = $bidang200;
        $bidang_pemilik['luas200'] = $luas200;
        $bidang_pemilik['bidang300'] = $bidang300;
        $bidang_pemilik['luas300'] = $luas300;
        $bidang_pemilik['bidang400'] = $bidang400;
        $bidang_pemilik['luas400'] = $luas400;
        $bidang_pemilik['bidang500'] = $bidang500;
        $bidang_pemilik['luas500'] = $luas500;
        $bidang_pemilik['bidang600'] = $bidang600;
        $bidang_pemilik['luas600'] = $luas600;
        $bidang_pemilik['bidang700'] = $bidang700;
        $bidang_pemilik['luas700'] = $luas700;
        $bidang_pemilik['bidang800'] = $bidang800;
        $bidang_pemilik['luas800'] = $luas800;
        $bidang_pemilik['bidang900'] = $bidang900;
        $bidang_pemilik['luas900'] = $luas900;
        $bidang_pemilik['bidang1000'] = $bidang1000;
        $bidang_pemilik['luas1000'] = $luas1000;
        $bidang_pemilik['bidang2000'] = $bidang2000;
        $bidang_pemilik['luas2000'] = $luas2000;
        $bidang_pemilik['bidang3000'] = $bidang3000;
        $bidang_pemilik['luas3000'] = $luas3000;
        $bidang_pemilik['bidang4000'] = $bidang4000;
        $bidang_pemilik['luas4000'] = $luas4000;
        $bidang_pemilik['bidang5000'] = $bidang5000;
        $bidang_pemilik['luas5000'] = $luas5000;
        $bidang_pemilik['bidang6000'] = $bidang6000;
        $bidang_pemilik['luas6000'] = $luas6000;
        $bidang_pemilik['bidang7000'] = $bidang7000;
        $bidang_pemilik['luas7000'] = $luas7000;
        $bidang_pemilik['bidang8000'] = $bidang8000;
        $bidang_pemilik['luas8000'] = $luas8000;
        $bidang_pemilik['bidang9000'] = $bidang9000;
        $bidang_pemilik['luas9000'] = $luas9000;
        $bidang_pemilik['bidang10000'] = $bidang10000;
        $bidang_pemilik['luas10000'] = $luas10000;
        $bidang_pemilik['bidang20000'] = $bidang20000;
        $bidang_pemilik['luas20000'] = $luas20000;
        $bidang_pemilik['bidangmore'] = $bidangmore;
        $bidang_pemilik['luasmore'] = $luasmore;

        return $bidang_pemilik;
    }

    public function data_jasa($filter)
    {
        $data = $this->report_model->get_data_jasa($filter);

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

        $bidang_pemilik = array();
        $bidang_pemilik['bidang100'] = $bidang100;
        $bidang_pemilik['luas100'] = $luas100;
        $bidang_pemilik['bidang200'] = $bidang200;
        $bidang_pemilik['luas200'] = $luas200;
        $bidang_pemilik['bidang300'] = $bidang300;
        $bidang_pemilik['luas300'] = $luas300;
        $bidang_pemilik['bidang400'] = $bidang400;
        $bidang_pemilik['luas400'] = $luas400;
        $bidang_pemilik['bidang500'] = $bidang500;
        $bidang_pemilik['luas500'] = $luas500;
        $bidang_pemilik['bidang600'] = $bidang600;
        $bidang_pemilik['luas600'] = $luas600;
        $bidang_pemilik['bidang700'] = $bidang700;
        $bidang_pemilik['luas700'] = $luas700;
        $bidang_pemilik['bidang800'] = $bidang800;
        $bidang_pemilik['luas800'] = $luas800;
        $bidang_pemilik['bidang900'] = $bidang900;
        $bidang_pemilik['luas900'] = $luas900;
        $bidang_pemilik['bidang1000'] = $bidang1000;
        $bidang_pemilik['luas1000'] = $luas1000;
        $bidang_pemilik['bidang2000'] = $bidang2000;
        $bidang_pemilik['luas2000'] = $luas2000;
        $bidang_pemilik['bidang3000'] = $bidang3000;
        $bidang_pemilik['luas3000'] = $luas3000;
        $bidang_pemilik['bidang4000'] = $bidang4000;
        $bidang_pemilik['luas4000'] = $luas4000;
        $bidang_pemilik['bidang5000'] = $bidang5000;
        $bidang_pemilik['luas5000'] = $luas5000;
        $bidang_pemilik['bidang6000'] = $bidang6000;
        $bidang_pemilik['luas6000'] = $luas6000;
        $bidang_pemilik['bidang7000'] = $bidang7000;
        $bidang_pemilik['luas7000'] = $luas7000;
        $bidang_pemilik['bidang8000'] = $bidang8000;
        $bidang_pemilik['luas8000'] = $luas8000;
        $bidang_pemilik['bidang9000'] = $bidang9000;
        $bidang_pemilik['luas9000'] = $luas9000;
        $bidang_pemilik['bidang10000'] = $bidang10000;
        $bidang_pemilik['luas10000'] = $luas10000;
        $bidang_pemilik['bidang20000'] = $bidang20000;
        $bidang_pemilik['luas20000'] = $luas20000;
        $bidang_pemilik['bidangmore'] = $bidangmore;
        $bidang_pemilik['luasmore'] = $luasmore;

        return $bidang_pemilik;
    }

    public function data_fasum($filter)
    {
        $data = $this->report_model->get_data_fasum($filter);

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

        $bidang_pemilik = array();
        $bidang_pemilik['bidang100'] = $bidang100;
        $bidang_pemilik['luas100'] = $luas100;
        $bidang_pemilik['bidang200'] = $bidang200;
        $bidang_pemilik['luas200'] = $luas200;
        $bidang_pemilik['bidang300'] = $bidang300;
        $bidang_pemilik['luas300'] = $luas300;
        $bidang_pemilik['bidang400'] = $bidang400;
        $bidang_pemilik['luas400'] = $luas400;
        $bidang_pemilik['bidang500'] = $bidang500;
        $bidang_pemilik['luas500'] = $luas500;
        $bidang_pemilik['bidang600'] = $bidang600;
        $bidang_pemilik['luas600'] = $luas600;
        $bidang_pemilik['bidang700'] = $bidang700;
        $bidang_pemilik['luas700'] = $luas700;
        $bidang_pemilik['bidang800'] = $bidang800;
        $bidang_pemilik['luas800'] = $luas800;
        $bidang_pemilik['bidang900'] = $bidang900;
        $bidang_pemilik['luas900'] = $luas900;
        $bidang_pemilik['bidang1000'] = $bidang1000;
        $bidang_pemilik['luas1000'] = $luas1000;
        $bidang_pemilik['bidang2000'] = $bidang2000;
        $bidang_pemilik['luas2000'] = $luas2000;
        $bidang_pemilik['bidang3000'] = $bidang3000;
        $bidang_pemilik['luas3000'] = $luas3000;
        $bidang_pemilik['bidang4000'] = $bidang4000;
        $bidang_pemilik['luas4000'] = $luas4000;
        $bidang_pemilik['bidang5000'] = $bidang5000;
        $bidang_pemilik['luas5000'] = $luas5000;
        $bidang_pemilik['bidang6000'] = $bidang6000;
        $bidang_pemilik['luas6000'] = $luas6000;
        $bidang_pemilik['bidang7000'] = $bidang7000;
        $bidang_pemilik['luas7000'] = $luas7000;
        $bidang_pemilik['bidang8000'] = $bidang8000;
        $bidang_pemilik['luas8000'] = $luas8000;
        $bidang_pemilik['bidang9000'] = $bidang9000;
        $bidang_pemilik['luas9000'] = $luas9000;
        $bidang_pemilik['bidang10000'] = $bidang10000;
        $bidang_pemilik['luas10000'] = $luas10000;
        $bidang_pemilik['bidang20000'] = $bidang20000;
        $bidang_pemilik['luas20000'] = $luas20000;
        $bidang_pemilik['bidangmore'] = $bidangmore;
        $bidang_pemilik['luasmore'] = $luasmore;

        return $bidang_pemilik;
    }

    public function data_useless($filter)
    {
        $data = $this->report_model->get_data_useless($filter);

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

        $bidang_pemilik = array();
        $bidang_pemilik['bidang100'] = $bidang100;
        $bidang_pemilik['luas100'] = $luas100;
        $bidang_pemilik['bidang200'] = $bidang200;
        $bidang_pemilik['luas200'] = $luas200;
        $bidang_pemilik['bidang300'] = $bidang300;
        $bidang_pemilik['luas300'] = $luas300;
        $bidang_pemilik['bidang400'] = $bidang400;
        $bidang_pemilik['luas400'] = $luas400;
        $bidang_pemilik['bidang500'] = $bidang500;
        $bidang_pemilik['luas500'] = $luas500;
        $bidang_pemilik['bidang600'] = $bidang600;
        $bidang_pemilik['luas600'] = $luas600;
        $bidang_pemilik['bidang700'] = $bidang700;
        $bidang_pemilik['luas700'] = $luas700;
        $bidang_pemilik['bidang800'] = $bidang800;
        $bidang_pemilik['luas800'] = $luas800;
        $bidang_pemilik['bidang900'] = $bidang900;
        $bidang_pemilik['luas900'] = $luas900;
        $bidang_pemilik['bidang1000'] = $bidang1000;
        $bidang_pemilik['luas1000'] = $luas1000;
        $bidang_pemilik['bidang2000'] = $bidang2000;
        $bidang_pemilik['luas2000'] = $luas2000;
        $bidang_pemilik['bidang3000'] = $bidang3000;
        $bidang_pemilik['luas3000'] = $luas3000;
        $bidang_pemilik['bidang4000'] = $bidang4000;
        $bidang_pemilik['luas4000'] = $luas4000;
        $bidang_pemilik['bidang5000'] = $bidang5000;
        $bidang_pemilik['luas5000'] = $luas5000;
        $bidang_pemilik['bidang6000'] = $bidang6000;
        $bidang_pemilik['luas6000'] = $luas6000;
        $bidang_pemilik['bidang7000'] = $bidang7000;
        $bidang_pemilik['luas7000'] = $luas7000;
        $bidang_pemilik['bidang8000'] = $bidang8000;
        $bidang_pemilik['luas8000'] = $luas8000;
        $bidang_pemilik['bidang9000'] = $bidang9000;
        $bidang_pemilik['luas9000'] = $luas9000;
        $bidang_pemilik['bidang10000'] = $bidang10000;
        $bidang_pemilik['luas10000'] = $luas10000;
        $bidang_pemilik['bidang20000'] = $bidang20000;
        $bidang_pemilik['luas20000'] = $luas20000;
        $bidang_pemilik['bidangmore'] = $bidangmore;
        $bidang_pemilik['luasmore'] = $luasmore;

        return $bidang_pemilik;
    }
}
