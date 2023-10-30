<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Report_landreform extends CI_Controller
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
        $title = "Report Potensi Tanah Landreform";

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
            'Data ' . $title => 'report_landreform',
        );

        $filter = '';

        $maksimum = $this->report_model->get_data_maksimum($filter);
        $absente = $this->report_model->get_data_absente($filter);
        $swarpraja = $this->report_model->get_data_swarpraja($filter);
        $eks_hgu = $this->report_model->get_data_eks_hgu($filter);
        $pelepasan_hgu = $this->report_model->get_data_pelepasan_hgu($filter);
        $tanah_terlantar = $this->report_model->get_data_tanah_terlantar($filter);
        $penyelesaian_skp = $this->report_model->get_data_penyelesaian_skp($filter);
        $kawawan_hutan = $this->report_model->get_data_kawawan_hutan($filter);
        $tanah_timbul = $this->report_model->get_data_tanah_timbul($filter);
        $bekas_tambang = $this->report_model->get_data_bekas_tambang($filter);
        $negara_penggunaan_masyarakat = $this->report_model->get_data_negara_penggunaan_masyarakat($filter);

        $data['maksimum'] = $maksimum;
        $data['absente'] =$absente;
        $data['swarpraja'] =$swarpraja;
        $data['eks_hgu'] =$eks_hgu;
        $data['pelepasan_hgu'] =$pelepasan_hgu;
        $data['tanah_terlantar'] =$tanah_terlantar;
        $data['penyelesaian_skp'] =$penyelesaian_skp;
        $data['kawawan_hutan'] =$kawawan_hutan;
        $data['tanah_timbul'] =$tanah_timbul;
        $data['bekas_tambang'] =$bekas_tambang;
        $data['negara_penggunaan_masyarakat'] =$negara_penggunaan_masyarakat;

        $data['total_bidang'] = $maksimum->total_bidang + $absente->total_bidang + $swarpraja->total_bidang + $eks_hgu->total_bidang + $pelepasan_hgu->total_bidang + $tanah_terlantar->total_bidang + $penyelesaian_skp->total_bidang + $kawawan_hutan->total_bidang + $tanah_timbul->total_bidang + $bekas_tambang->total_bidang + $negara_penggunaan_masyarakat->total_bidang;

        $data['luas_bidang'] = $maksimum->luas_bidang + $absente->luas_bidang + $swarpraja->luas_bidang + $eks_hgu->luas_bidang + $pelepasan_hgu->luas_bidang + $tanah_terlantar->luas_bidang + $penyelesaian_skp->luas_bidang + $kawawan_hutan->luas_bidang + $tanah_timbul->luas_bidang + $bekas_tambang->luas_bidang + $negara_penggunaan_masyarakat->luas_bidang;

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

        $this->template->content("report/report_landreform_view.php", $data);
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

            $title = "Report Potensi Tanah Landreform";

            $data = array();
            $data['header_title'] = $title;
            $data['arr_breadcrumbs'] = array(
                'Report' => '#',
                'Data ' . $title => 'report_landreform',
            );

            $maksimum = $this->report_model->get_data_maksimum($filter);
            $absente = $this->report_model->get_data_absente($filter);
            $swarpraja = $this->report_model->get_data_swarpraja($filter);
            $eks_hgu = $this->report_model->get_data_eks_hgu($filter);
            $pelepasan_hgu = $this->report_model->get_data_pelepasan_hgu($filter);
            $tanah_terlantar = $this->report_model->get_data_tanah_terlantar($filter);
            $penyelesaian_skp = $this->report_model->get_data_penyelesaian_skp($filter);
            $kawawan_hutan = $this->report_model->get_data_kawawan_hutan($filter);
            $tanah_timbul = $this->report_model->get_data_tanah_timbul($filter);
            $bekas_tambang = $this->report_model->get_data_bekas_tambang($filter);
            $negara_penggunaan_masyarakat = $this->report_model->get_data_negara_penggunaan_masyarakat($filter);

            $data['maksimum'] = $maksimum;
            $data['absente'] =$absente;
            $data['swarpraja'] =$swarpraja;
            $data['eks_hgu'] =$eks_hgu;
            $data['pelepasan_hgu'] =$pelepasan_hgu;
            $data['tanah_terlantar'] =$tanah_terlantar;
            $data['penyelesaian_skp'] =$penyelesaian_skp;
            $data['kawawan_hutan'] =$kawawan_hutan;
            $data['tanah_timbul'] =$tanah_timbul;
            $data['bekas_tambang'] =$bekas_tambang;
            $data['negara_penggunaan_masyarakat'] =$negara_penggunaan_masyarakat;

            $data['total_bidang'] = $maksimum->total_bidang + $absente->total_bidang + $swarpraja->total_bidang + $eks_hgu->total_bidang + $pelepasan_hgu->total_bidang + $tanah_terlantar->total_bidang + $penyelesaian_skp->total_bidang + $kawawan_hutan->total_bidang + $tanah_timbul->total_bidang + $bekas_tambang->total_bidang + $negara_penggunaan_masyarakat->total_bidang;

            $data['luas_bidang'] = $maksimum->luas_bidang + $absente->luas_bidang + $swarpraja->luas_bidang + $eks_hgu->luas_bidang + $pelepasan_hgu->luas_bidang + $tanah_terlantar->luas_bidang + $penyelesaian_skp->luas_bidang + $kawawan_hutan->luas_bidang + $tanah_timbul->luas_bidang + $bekas_tambang->luas_bidang + $negara_penggunaan_masyarakat->luas_bidang;

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

            $this->template->content("report/report_landreform_view.php", $data);
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

            $maksimum = $this->report_model->get_data_maksimum($filter);
            $absente = $this->report_model->get_data_absente($filter);
            $swarpraja = $this->report_model->get_data_swarpraja($filter);
            $eks_hgu = $this->report_model->get_data_eks_hgu($filter);
            $pelepasan_hgu = $this->report_model->get_data_pelepasan_hgu($filter);
            $tanah_terlantar = $this->report_model->get_data_tanah_terlantar($filter);
            $penyelesaian_skp = $this->report_model->get_data_penyelesaian_skp($filter);
            $kawawan_hutan = $this->report_model->get_data_kawawan_hutan($filter);
            $tanah_timbul = $this->report_model->get_data_tanah_timbul($filter);
            $bekas_tambang = $this->report_model->get_data_bekas_tambang($filter);
            $negara_penggunaan_masyarakat = $this->report_model->get_data_negara_penggunaan_masyarakat($filter);

            $data['maksimum'] = $maksimum;
            $data['absente'] =$absente;
            $data['swarpraja'] =$swarpraja;
            $data['eks_hgu'] =$eks_hgu;
            $data['pelepasan_hgu'] =$pelepasan_hgu;
            $data['tanah_terlantar'] =$tanah_terlantar;
            $data['penyelesaian_skp'] =$penyelesaian_skp;
            $data['kawawan_hutan'] =$kawawan_hutan;
            $data['tanah_timbul'] =$tanah_timbul;
            $data['bekas_tambang'] =$bekas_tambang;
            $data['negara_penggunaan_masyarakat'] =$negara_penggunaan_masyarakat;

            $data['total_bidang'] = $maksimum->total_bidang + $absente->total_bidang + $swarpraja->total_bidang + $eks_hgu->total_bidang + $pelepasan_hgu->total_bidang + $tanah_terlantar->total_bidang + $penyelesaian_skp->total_bidang + $kawawan_hutan->total_bidang + $tanah_timbul->total_bidang + $bekas_tambang->total_bidang + $negara_penggunaan_masyarakat->total_bidang;

            $data['luas_bidang'] = $maksimum->luas_bidang + $absente->luas_bidang + $swarpraja->luas_bidang + $eks_hgu->luas_bidang + $pelepasan_hgu->luas_bidang + $tanah_terlantar->luas_bidang + $penyelesaian_skp->luas_bidang + $kawawan_hutan->luas_bidang + $tanah_timbul->luas_bidang + $bekas_tambang->luas_bidang + $negara_penggunaan_masyarakat->luas_bidang;

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

            $this->load->view('export/report_landreform', $data);

        }

    }
}
