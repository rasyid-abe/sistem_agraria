<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Report_bukan_pemilik_tanah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->model('helper_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->penguasaan_tanah_show();
    }

    public function penguasaan_tanah_show()
    {
        $title = "Report Penguasaan Tanah Gadai/Sewa/Bagi Hasil";

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
            'Data ' . $title => 'report_bukan_pemilik_tanah',
        );

        $filter = '';

        $gadai = $this->penguasaan_tanah_gadai($filter);
        $sewa = $this->penguasaan_tanah_sewa($filter);
        $bagi_hasil = $this->penguasaan_tanah_bagi_hasil($filter);

        $data['gadai'] = $gadai;
        $data['sewa'] =$sewa;
        $data['bagi_hasil'] =$bagi_hasil;

        $data['total_gadai'] = $this->report_model->get_total_gadai($filter);
        $data['total_sewa'] = $this->report_model->get_total_sewa($filter);
        $data['total_bagi_hasil'] = $this->report_model->get_total_bagi_hasil($filter);

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

        $this->template->content("report/penguasaan_tanah_bukan_pemilik_view", $data);
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

            $title = "Report Penguasaan Tanah Gadai/Sewa/Bagi Hasil";

            $data = array();
            $data['header_title'] = $title;
            $data['arr_breadcrumbs'] = array(
                'Report' => '#',
                'Data ' . $title => 'report_bukan_pemilik_tanah',
            );

            $gadai = $this->penguasaan_tanah_gadai($filter);
            $sewa = $this->penguasaan_tanah_sewa($filter);
            $bagi_hasil = $this->penguasaan_tanah_bagi_hasil($filter);

            $data['gadai'] = $gadai;
            $data['sewa'] =$sewa;
            $data['bagi_hasil'] =$bagi_hasil;

            $data['total_gadai'] = $this->report_model->get_total_gadai($filter);
            $data['total_sewa'] = $this->report_model->get_total_sewa($filter);
            $data['total_bagi_hasil'] = $this->report_model->get_total_bagi_hasil($filter);

            $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();
            $data['prov_id'] = '';
            $data['prov_nama'] = '';

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

            $this->template->content("report/penguasaan_tanah_bukan_pemilik_view", $data);
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

            $gadai = $this->penguasaan_tanah_gadai($filter);
            $sewa = $this->penguasaan_tanah_sewa($filter);
            $bagi_hasil = $this->penguasaan_tanah_bagi_hasil($filter);

            $data['gadai'] = $gadai;
            $data['sewa'] =$sewa;
            $data['bagi_hasil'] =$bagi_hasil;

            $data['total_gadai'] = $this->report_model->get_total_gadai($filter);
            $data['total_sewa'] = $this->report_model->get_total_sewa($filter);
            $data['total_bagi_hasil'] = $this->report_model->get_total_bagi_hasil($filter);

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

            $this->load->view('export/bukan_pemilik_tanah', $data);
        }

    }

    public function penguasaan_tanah_gadai($filter)
    {
        $data = $this->report_model->get_data_gadai($filter);

        $bidang100 = 0;
        $luas100 = 0;
        $nilai100 = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah <= 100 ){
                $bidang100++;
                $luas100 = $luas100 + $row->obyek_luas_tanah;
                $nilai100 = $nilai100 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang200 = 0;
        $luas200 = 0;
        $nilai200 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 100 ) && ($row->obyek_luas_tanah <= 200)){
                $bidang200++;
                $luas200 = $luas200 + $row->obyek_luas_tanah;
                $nilai200 = $nilai200 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang300 = 0;
        $luas300 = 0;
        $nilai300 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 200 ) && ($row->obyek_luas_tanah <= 300)){
                $bidang300++;
                $luas300 = $luas300 + $row->obyek_luas_tanah;
                $nilai300 = $nilai300 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang400 = 0;
        $luas400 = 0;
        $nilai400 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 300 ) && ($row->obyek_luas_tanah <= 400)){
                $bidang400++;
                $luas400 = $luas400 + $row->obyek_luas_tanah;
                $nilai400 = $nilai400 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang500 = 0;
        $luas500 = 0;
        $nilai500 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 400 ) && ($row->obyek_luas_tanah <= 500)){
                $bidang500++;
                $luas500 = $luas500 + $row->obyek_luas_tanah;
                $nilai500 = $nilai500 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang600 = 0;
        $luas600 = 0;
        $nilai600 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 500 ) && ($row->obyek_luas_tanah <= 600)){
                $bidang600++;
                $luas600 = $luas600 + $row->obyek_luas_tanah;
                $nilai600 = $nilai600 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang700 = 0;
        $luas700 = 0;
        $nilai700 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 600 ) && ($row->obyek_luas_tanah <= 700)){
                $bidang700++;
                $luas700 = $luas700 + $row->obyek_luas_tanah;
                $nilai700 = $nilai700 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang800 = 0;
        $luas800 = 0;
        $nilai800 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 700 ) && ($row->obyek_luas_tanah <= 800)){
                $bidang800++;
                $luas800 = $luas800 + $row->obyek_luas_tanah;
                $nilai800 = $nilai800 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang900 = 0;
        $luas900 = 0;
        $nilai900 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 800 ) && ($row->obyek_luas_tanah <= 900)){
                $bidang900++;
                $luas900 = $luas900 + $row->obyek_luas_tanah;
                $nilai900 = $nilai900 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang1000 = 0;
        $luas1000 = 0;
        $nilai1000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 900 ) && ($row->obyek_luas_tanah <= 1000)){
                $bidang1000++;
                $luas1000 = $luas1000 + $row->obyek_luas_tanah;
                $nilai1000 = $nilai1000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang2000 = 0;
        $luas2000 = 0;
        $nilai2000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 1000 ) && ($row->obyek_luas_tanah <= 2000)){
                $bidang2000++;
                $luas2000 = $luas2000 + $row->obyek_luas_tanah;
                $nilai2000 = $nilai2000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang3000 = 0;
        $luas3000 = 0;
        $nilai3000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 2000 ) && ($row->obyek_luas_tanah <= 3000)){
                $bidang3000++;
                $luas3000 = $luas3000 + $row->obyek_luas_tanah;
                $nilai3000 = $nilai3000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang4000 = 0;
        $luas4000 = 0;
        $nilai4000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 3000 ) && ($row->obyek_luas_tanah <= 4000)){
                $bidang4000++;
                $luas4000 = $luas4000 + $row->obyek_luas_tanah;
                $nilai4000 = $nilai4000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang5000 = 0;
        $luas5000 = 0;
        $nilai5000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 4000 ) && ($row->obyek_luas_tanah <= 5000)){
                $bidang5000++;
                $luas5000 = $luas5000 + $row->obyek_luas_tanah;
                $nilai5000 = $nilai5000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang6000 = 0;
        $luas6000 = 0;
        $nilai6000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 5000 ) && ($row->obyek_luas_tanah <= 6000)){
                $bidang6000++;
                $luas6000 = $luas6000 + $row->obyek_luas_tanah;
                $nilai6000 = $nilai6000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang7000 = 0;
        $luas7000 = 0;
        $nilai7000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 6000 ) && ($row->obyek_luas_tanah <= 7000)){
                $bidang7000++;
                $luas7000 = $luas7000 + $row->obyek_luas_tanah;
                $nilai7000 = $nilai7000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang8000 = 0;
        $luas8000 = 0;
        $nilai8000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 7000 ) && ($row->obyek_luas_tanah <= 8000)){
                $bidang8000++;
                $luas8000 = $luas8000 + $row->obyek_luas_tanah;
                $nilai8000 = $nilai8000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang9000 = 0;
        $luas9000 = 0;
        $nilai9000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 8000 ) && ($row->obyek_luas_tanah <= 9000)){
                $bidang9000++;
                $luas9000 = $luas9000 + $row->obyek_luas_tanah;
                $nilai9000 = $nilai9000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang10000 = 0;
        $luas10000 = 0;
        $nilai10000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 9000 ) && ($row->obyek_luas_tanah <= 10000)){
                $bidang10000++;
                $luas10000 = $luas10000 + $row->obyek_luas_tanah;
                $nilai10000 = $nilai10000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang20000 = 0;
        $luas20000 = 0;
        $nilai20000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 10000 ) && ($row->obyek_luas_tanah <= 20000)){
                $bidang20000++;
                $luas20000 = $luas20000 + $row->obyek_luas_tanah;
                $nilai20000 = $nilai20000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidangmore = 0;
        $luasmore = 0;
        $nilaimore = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah > 20000 ){
                $bidangmore++;
                $luasmore = $luasmore + $row->obyek_luas_tanah;
                $nilaimore = $nilaimore + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang = array();
        $bidang['bidang100'] = $bidang100;
        $bidang['luas100'] = $luas100;
        $bidang['nilai100'] = $nilai100;
        $bidang['bidang200'] = $bidang200;
        $bidang['luas200'] = $luas200;
        $bidang['nilai200'] = $nilai200;
        $bidang['bidang300'] = $bidang300;
        $bidang['luas300'] = $luas300;
        $bidang['nilai300'] = $nilai300;
        $bidang['bidang400'] = $bidang400;
        $bidang['luas400'] = $luas400;
        $bidang['nilai400'] = $nilai400;
        $bidang['bidang500'] = $bidang500;
        $bidang['luas500'] = $luas500;
        $bidang['nilai500'] = $nilai500;
        $bidang['bidang600'] = $bidang600;
        $bidang['luas600'] = $luas600;
        $bidang['nilai600'] = $nilai600;
        $bidang['bidang700'] = $bidang700;
        $bidang['luas700'] = $luas700;
        $bidang['nilai700'] = $nilai700;
        $bidang['bidang800'] = $bidang800;
        $bidang['luas800'] = $luas800;
        $bidang['nilai800'] = $nilai800;
        $bidang['bidang900'] = $bidang900;
        $bidang['luas900'] = $luas900;
        $bidang['nilai900'] = $nilai900;
        $bidang['bidang1000'] = $bidang1000;
        $bidang['luas1000'] = $luas1000;
        $bidang['nilai1000'] = $nilai1000;
        $bidang['bidang2000'] = $bidang2000;
        $bidang['luas2000'] = $luas2000;
        $bidang['nilai2000'] = $nilai2000;
        $bidang['bidang3000'] = $bidang3000;
        $bidang['luas3000'] = $luas3000;
        $bidang['nilai3000'] = $nilai3000;
        $bidang['bidang4000'] = $bidang4000;
        $bidang['luas4000'] = $luas4000;
        $bidang['nilai4000'] = $nilai4000;
        $bidang['bidang5000'] = $bidang5000;
        $bidang['luas5000'] = $luas5000;
        $bidang['nilai5000'] = $nilai5000;
        $bidang['bidang6000'] = $bidang6000;
        $bidang['luas6000'] = $luas6000;
        $bidang['nilai6000'] = $nilai6000;
        $bidang['bidang7000'] = $bidang7000;
        $bidang['luas7000'] = $luas7000;
        $bidang['nilai7000'] = $nilai7000;
        $bidang['bidang8000'] = $bidang8000;
        $bidang['luas8000'] = $luas8000;
        $bidang['nilai8000'] = $nilai8000;
        $bidang['bidang9000'] = $bidang9000;
        $bidang['luas9000'] = $luas9000;
        $bidang['nilai9000'] = $nilai9000;
        $bidang['bidang10000'] = $bidang10000;
        $bidang['luas10000'] = $luas10000;
        $bidang['nilai10000'] = $nilai10000;
        $bidang['bidang20000'] = $bidang20000;
        $bidang['luas20000'] = $luas20000;
        $bidang['nilai20000'] = $nilai20000;
        $bidang['bidangmore'] = $bidangmore;
        $bidang['luasmore'] = $luasmore;
        $bidang['nilaimore'] = $nilaimore;

        return $bidang;
    }

    public function penguasaan_tanah_sewa($filter)
    {
        $data = $this->report_model->get_data_sewa($filter);

        $bidang100 = 0;
        $luas100 = 0;
        $nilai100 = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah <= 100 ){
                $bidang100++;
                $luas100 = $luas100 + $row->obyek_luas_tanah;
                $nilai100 = $nilai100 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang200 = 0;
        $luas200 = 0;
        $nilai200 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 100 ) && ($row->obyek_luas_tanah <= 200)){
                $bidang200++;
                $luas200 = $luas200 + $row->obyek_luas_tanah;
                $nilai200 = $nilai200 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang300 = 0;
        $luas300 = 0;
        $nilai300 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 200 ) && ($row->obyek_luas_tanah <= 300)){
                $bidang300++;
                $luas300 = $luas300 + $row->obyek_luas_tanah;
                $nilai300 = $nilai300 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang400 = 0;
        $luas400 = 0;
        $nilai400 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 300 ) && ($row->obyek_luas_tanah <= 400)){
                $bidang400++;
                $luas400 = $luas400 + $row->obyek_luas_tanah;
                $nilai400 = $nilai400 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang500 = 0;
        $luas500 = 0;
        $nilai500 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 400 ) && ($row->obyek_luas_tanah <= 500)){
                $bidang500++;
                $luas500 = $luas500 + $row->obyek_luas_tanah;
                $nilai500 = $nilai500 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang600 = 0;
        $luas600 = 0;
        $nilai600 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 500 ) && ($row->obyek_luas_tanah <= 600)){
                $bidang600++;
                $luas600 = $luas600 + $row->obyek_luas_tanah;
                $nilai600 = $nilai600 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang700 = 0;
        $luas700 = 0;
        $nilai700 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 600 ) && ($row->obyek_luas_tanah <= 700)){
                $bidang700++;
                $luas700 = $luas700 + $row->obyek_luas_tanah;
                $nilai700 = $nilai700 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang800 = 0;
        $luas800 = 0;
        $nilai800 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 700 ) && ($row->obyek_luas_tanah <= 800)){
                $bidang800++;
                $luas800 = $luas800 + $row->obyek_luas_tanah;
                $nilai800 = $nilai800 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang900 = 0;
        $luas900 = 0;
        $nilai900 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 800 ) && ($row->obyek_luas_tanah <= 900)){
                $bidang900++;
                $luas900 = $luas900 + $row->obyek_luas_tanah;
                $nilai900 = $nilai900 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang1000 = 0;
        $luas1000 = 0;
        $nilai1000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 900 ) && ($row->obyek_luas_tanah <= 1000)){
                $bidang1000++;
                $luas1000 = $luas1000 + $row->obyek_luas_tanah;
                $nilai1000 = $nilai1000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang2000 = 0;
        $luas2000 = 0;
        $nilai2000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 1000 ) && ($row->obyek_luas_tanah <= 2000)){
                $bidang2000++;
                $luas2000 = $luas2000 + $row->obyek_luas_tanah;
                $nilai2000 = $nilai2000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang3000 = 0;
        $luas3000 = 0;
        $nilai3000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 2000 ) && ($row->obyek_luas_tanah <= 3000)){
                $bidang3000++;
                $luas3000 = $luas3000 + $row->obyek_luas_tanah;
                $nilai3000 = $nilai3000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang4000 = 0;
        $luas4000 = 0;
        $nilai4000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 3000 ) && ($row->obyek_luas_tanah <= 4000)){
                $bidang4000++;
                $luas4000 = $luas4000 + $row->obyek_luas_tanah;
                $nilai4000 = $nilai4000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang5000 = 0;
        $luas5000 = 0;
        $nilai5000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 4000 ) && ($row->obyek_luas_tanah <= 5000)){
                $bidang5000++;
                $luas5000 = $luas5000 + $row->obyek_luas_tanah;
                $nilai5000 = $nilai5000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang6000 = 0;
        $luas6000 = 0;
        $nilai6000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 5000 ) && ($row->obyek_luas_tanah <= 6000)){
                $bidang6000++;
                $luas6000 = $luas6000 + $row->obyek_luas_tanah;
                $nilai6000 = $nilai6000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang7000 = 0;
        $luas7000 = 0;
        $nilai7000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 6000 ) && ($row->obyek_luas_tanah <= 7000)){
                $bidang7000++;
                $luas7000 = $luas7000 + $row->obyek_luas_tanah;
                $nilai7000 = $nilai7000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang8000 = 0;
        $luas8000 = 0;
        $nilai8000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 7000 ) && ($row->obyek_luas_tanah <= 8000)){
                $bidang8000++;
                $luas8000 = $luas8000 + $row->obyek_luas_tanah;
                $nilai8000 = $nilai8000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang9000 = 0;
        $luas9000 = 0;
        $nilai9000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 8000 ) && ($row->obyek_luas_tanah <= 9000)){
                $bidang9000++;
                $luas9000 = $luas9000 + $row->obyek_luas_tanah;
                $nilai9000 = $nilai9000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang10000 = 0;
        $luas10000 = 0;
        $nilai10000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 9000 ) && ($row->obyek_luas_tanah <= 10000)){
                $bidang10000++;
                $luas10000 = $luas10000 + $row->obyek_luas_tanah;
                $nilai10000 = $nilai10000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang20000 = 0;
        $luas20000 = 0;
        $nilai20000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 10000 ) && ($row->obyek_luas_tanah <= 20000)){
                $bidang20000++;
                $luas20000 = $luas20000 + $row->obyek_luas_tanah;
                $nilai20000 = $nilai20000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidangmore = 0;
        $luasmore = 0;
        $nilaimore = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah > 20000 ){
                $bidangmore++;
                $luasmore = $luasmore + $row->obyek_luas_tanah;
                $nilaimore = $nilaimore + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang = array();
        $bidang['bidang100'] = $bidang100;
        $bidang['luas100'] = $luas100;
        $bidang['nilai100'] = $nilai100;
        $bidang['bidang200'] = $bidang200;
        $bidang['luas200'] = $luas200;
        $bidang['nilai200'] = $nilai200;
        $bidang['bidang300'] = $bidang300;
        $bidang['luas300'] = $luas300;
        $bidang['nilai300'] = $nilai300;
        $bidang['bidang400'] = $bidang400;
        $bidang['luas400'] = $luas400;
        $bidang['nilai400'] = $nilai400;
        $bidang['bidang500'] = $bidang500;
        $bidang['luas500'] = $luas500;
        $bidang['nilai500'] = $nilai500;
        $bidang['bidang600'] = $bidang600;
        $bidang['luas600'] = $luas600;
        $bidang['nilai600'] = $nilai600;
        $bidang['bidang700'] = $bidang700;
        $bidang['luas700'] = $luas700;
        $bidang['nilai700'] = $nilai700;
        $bidang['bidang800'] = $bidang800;
        $bidang['luas800'] = $luas800;
        $bidang['nilai800'] = $nilai800;
        $bidang['bidang900'] = $bidang900;
        $bidang['luas900'] = $luas900;
        $bidang['nilai900'] = $nilai900;
        $bidang['bidang1000'] = $bidang1000;
        $bidang['luas1000'] = $luas1000;
        $bidang['nilai1000'] = $nilai1000;
        $bidang['bidang2000'] = $bidang2000;
        $bidang['luas2000'] = $luas2000;
        $bidang['nilai2000'] = $nilai2000;
        $bidang['bidang3000'] = $bidang3000;
        $bidang['luas3000'] = $luas3000;
        $bidang['nilai3000'] = $nilai3000;
        $bidang['bidang4000'] = $bidang4000;
        $bidang['luas4000'] = $luas4000;
        $bidang['nilai4000'] = $nilai4000;
        $bidang['bidang5000'] = $bidang5000;
        $bidang['luas5000'] = $luas5000;
        $bidang['nilai5000'] = $nilai5000;
        $bidang['bidang6000'] = $bidang6000;
        $bidang['luas6000'] = $luas6000;
        $bidang['nilai6000'] = $nilai6000;
        $bidang['bidang7000'] = $bidang7000;
        $bidang['luas7000'] = $luas7000;
        $bidang['nilai7000'] = $nilai7000;
        $bidang['bidang8000'] = $bidang8000;
        $bidang['luas8000'] = $luas8000;
        $bidang['nilai8000'] = $nilai8000;
        $bidang['bidang9000'] = $bidang9000;
        $bidang['luas9000'] = $luas9000;
        $bidang['nilai9000'] = $nilai9000;
        $bidang['bidang10000'] = $bidang10000;
        $bidang['luas10000'] = $luas10000;
        $bidang['nilai10000'] = $nilai10000;
        $bidang['bidang20000'] = $bidang20000;
        $bidang['luas20000'] = $luas20000;
        $bidang['nilai20000'] = $nilai20000;
        $bidang['bidangmore'] = $bidangmore;
        $bidang['luasmore'] = $luasmore;
        $bidang['nilaimore'] = $nilaimore;

        return $bidang;
    }

    public function penguasaan_tanah_bagi_hasil($filter)
    {
        $data = $this->report_model->get_data_bagi_hasil($filter);

        $bidang100 = 0;
        $luas100 = 0;
        $nilai100 = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah <= 100 ){
                $bidang100++;
                $luas100 = $luas100 + $row->obyek_luas_tanah;
                $nilai100 = $nilai100 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang200 = 0;
        $luas200 = 0;
        $nilai200 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 100 ) && ($row->obyek_luas_tanah <= 200)){
                $bidang200++;
                $luas200 = $luas200 + $row->obyek_luas_tanah;
                $nilai200 = $nilai200 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang300 = 0;
        $luas300 = 0;
        $nilai300 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 200 ) && ($row->obyek_luas_tanah <= 300)){
                $bidang300++;
                $luas300 = $luas300 + $row->obyek_luas_tanah;
                $nilai300 = $nilai300 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang400 = 0;
        $luas400 = 0;
        $nilai400 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 300 ) && ($row->obyek_luas_tanah <= 400)){
                $bidang400++;
                $luas400 = $luas400 + $row->obyek_luas_tanah;
                $nilai400 = $nilai400 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang500 = 0;
        $luas500 = 0;
        $nilai500 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 400 ) && ($row->obyek_luas_tanah <= 500)){
                $bidang500++;
                $luas500 = $luas500 + $row->obyek_luas_tanah;
                $nilai500 = $nilai500 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang600 = 0;
        $luas600 = 0;
        $nilai600 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 500 ) && ($row->obyek_luas_tanah <= 600)){
                $bidang600++;
                $luas600 = $luas600 + $row->obyek_luas_tanah;
                $nilai600 = $nilai600 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang700 = 0;
        $luas700 = 0;
        $nilai700 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 600 ) && ($row->obyek_luas_tanah <= 700)){
                $bidang700++;
                $luas700 = $luas700 + $row->obyek_luas_tanah;
                $nilai700 = $nilai700 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang800 = 0;
        $luas800 = 0;
        $nilai800 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 700 ) && ($row->obyek_luas_tanah <= 800)){
                $bidang800++;
                $luas800 = $luas800 + $row->obyek_luas_tanah;
                $nilai800 = $nilai800 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang900 = 0;
        $luas900 = 0;
        $nilai900 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 800 ) && ($row->obyek_luas_tanah <= 900)){
                $bidang900++;
                $luas900 = $luas900 + $row->obyek_luas_tanah;
                $nilai900 = $nilai900 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang1000 = 0;
        $luas1000 = 0;
        $nilai1000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 900 ) && ($row->obyek_luas_tanah <= 1000)){
                $bidang1000++;
                $luas1000 = $luas1000 + $row->obyek_luas_tanah;
                $nilai1000 = $nilai1000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang2000 = 0;
        $luas2000 = 0;
        $nilai2000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 1000 ) && ($row->obyek_luas_tanah <= 2000)){
                $bidang2000++;
                $luas2000 = $luas2000 + $row->obyek_luas_tanah;
                $nilai2000 = $nilai2000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang3000 = 0;
        $luas3000 = 0;
        $nilai3000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 2000 ) && ($row->obyek_luas_tanah <= 3000)){
                $bidang3000++;
                $luas3000 = $luas3000 + $row->obyek_luas_tanah;
                $nilai3000 = $nilai3000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang4000 = 0;
        $luas4000 = 0;
        $nilai4000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 3000 ) && ($row->obyek_luas_tanah <= 4000)){
                $bidang4000++;
                $luas4000 = $luas4000 + $row->obyek_luas_tanah;
                $nilai4000 = $nilai4000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang5000 = 0;
        $luas5000 = 0;
        $nilai5000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 4000 ) && ($row->obyek_luas_tanah <= 5000)){
                $bidang5000++;
                $luas5000 = $luas5000 + $row->obyek_luas_tanah;
                $nilai5000 = $nilai5000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang6000 = 0;
        $luas6000 = 0;
        $nilai6000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 5000 ) && ($row->obyek_luas_tanah <= 6000)){
                $bidang6000++;
                $luas6000 = $luas6000 + $row->obyek_luas_tanah;
                $nilai6000 = $nilai6000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang7000 = 0;
        $luas7000 = 0;
        $nilai7000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 6000 ) && ($row->obyek_luas_tanah <= 7000)){
                $bidang7000++;
                $luas7000 = $luas7000 + $row->obyek_luas_tanah;
                $nilai7000 = $nilai7000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang8000 = 0;
        $luas8000 = 0;
        $nilai8000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 7000 ) && ($row->obyek_luas_tanah <= 8000)){
                $bidang8000++;
                $luas8000 = $luas8000 + $row->obyek_luas_tanah;
                $nilai8000 = $nilai8000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang9000 = 0;
        $luas9000 = 0;
        $nilai9000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 8000 ) && ($row->obyek_luas_tanah <= 9000)){
                $bidang9000++;
                $luas9000 = $luas9000 + $row->obyek_luas_tanah;
                $nilai9000 = $nilai9000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang10000 = 0;
        $luas10000 = 0;
        $nilai10000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 9000 ) && ($row->obyek_luas_tanah <= 10000)){
                $bidang10000++;
                $luas10000 = $luas10000 + $row->obyek_luas_tanah;
                $nilai10000 = $nilai10000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang20000 = 0;
        $luas20000 = 0;
        $nilai20000 = 0;
        foreach ($data as $row) {
            if(($row->obyek_luas_tanah > 10000 ) && ($row->obyek_luas_tanah <= 20000)){
                $bidang20000++;
                $luas20000 = $luas20000 + $row->obyek_luas_tanah;
                $nilai20000 = $nilai20000 + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidangmore = 0;
        $luasmore = 0;
        $nilaimore = 0;
        foreach ($data as $row) {
            if($row->obyek_luas_tanah > 20000 ){
                $bidangmore++;
                $luasmore = $luasmore + $row->obyek_luas_tanah;
                $nilaimore = $nilaimore + $row->obyek_nilai_tanah_m2;
            }
        }

        $bidang = array();
        $bidang['bidang100'] = $bidang100;
        $bidang['luas100'] = $luas100;
        $bidang['nilai100'] = $nilai100;
        $bidang['bidang200'] = $bidang200;
        $bidang['luas200'] = $luas200;
        $bidang['nilai200'] = $nilai200;
        $bidang['bidang300'] = $bidang300;
        $bidang['luas300'] = $luas300;
        $bidang['nilai300'] = $nilai300;
        $bidang['bidang400'] = $bidang400;
        $bidang['luas400'] = $luas400;
        $bidang['nilai400'] = $nilai400;
        $bidang['bidang500'] = $bidang500;
        $bidang['luas500'] = $luas500;
        $bidang['nilai500'] = $nilai500;
        $bidang['bidang600'] = $bidang600;
        $bidang['luas600'] = $luas600;
        $bidang['nilai600'] = $nilai600;
        $bidang['bidang700'] = $bidang700;
        $bidang['luas700'] = $luas700;
        $bidang['nilai700'] = $nilai700;
        $bidang['bidang800'] = $bidang800;
        $bidang['luas800'] = $luas800;
        $bidang['nilai800'] = $nilai800;
        $bidang['bidang900'] = $bidang900;
        $bidang['luas900'] = $luas900;
        $bidang['nilai900'] = $nilai900;
        $bidang['bidang1000'] = $bidang1000;
        $bidang['luas1000'] = $luas1000;
        $bidang['nilai1000'] = $nilai1000;
        $bidang['bidang2000'] = $bidang2000;
        $bidang['luas2000'] = $luas2000;
        $bidang['nilai2000'] = $nilai2000;
        $bidang['bidang3000'] = $bidang3000;
        $bidang['luas3000'] = $luas3000;
        $bidang['nilai3000'] = $nilai3000;
        $bidang['bidang4000'] = $bidang4000;
        $bidang['luas4000'] = $luas4000;
        $bidang['nilai4000'] = $nilai4000;
        $bidang['bidang5000'] = $bidang5000;
        $bidang['luas5000'] = $luas5000;
        $bidang['nilai5000'] = $nilai5000;
        $bidang['bidang6000'] = $bidang6000;
        $bidang['luas6000'] = $luas6000;
        $bidang['nilai6000'] = $nilai6000;
        $bidang['bidang7000'] = $bidang7000;
        $bidang['luas7000'] = $luas7000;
        $bidang['nilai7000'] = $nilai7000;
        $bidang['bidang8000'] = $bidang8000;
        $bidang['luas8000'] = $luas8000;
        $bidang['nilai8000'] = $nilai8000;
        $bidang['bidang9000'] = $bidang9000;
        $bidang['luas9000'] = $luas9000;
        $bidang['nilai9000'] = $nilai9000;
        $bidang['bidang10000'] = $bidang10000;
        $bidang['luas10000'] = $luas10000;
        $bidang['nilai10000'] = $nilai10000;
        $bidang['bidang20000'] = $bidang20000;
        $bidang['luas20000'] = $luas20000;
        $bidang['nilai20000'] = $nilai20000;
        $bidang['bidangmore'] = $bidangmore;
        $bidang['luasmore'] = $luasmore;
        $bidang['nilaimore'] = $nilaimore;

        return $bidang;
    }
}
