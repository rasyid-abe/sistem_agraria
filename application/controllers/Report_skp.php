<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Report_skp extends CI_Controller
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
        $title = "Report Tanah Sengketa, Konflik, Perkara";

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
            'Data ' . $title => 'report_skp',
        );

        $filter  = '';

        $sengketa = $this->report_model->get_data_sengketa($filter);
        $konflik = $this->report_model->get_data_konflik($filter);
        $perkara = $this->report_model->get_data_perkara($filter);
        $noskp = $this->report_model->get_data_noskp($filter);

        $data['sengketa'] = $sengketa;
        $data['konflik'] =$konflik;
        $data['perkara'] =$perkara;
        $data['noskp'] =$noskp;

        $data['total_bidang'] = $sengketa->total_bidang + $konflik->total_bidang + $perkara->total_bidang + $noskp->total_bidang;
        $data['total_luas'] = $sengketa->luas_bidang + $konflik->luas_bidang + $perkara->luas_bidang + $noskp->luas_bidang;

        $data['provinsi'] = $this->helper_model->get_data_provinsi()->result();

        $this->template->content("report/report_skp_view.php", $data);
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

            $title = "Report Tanah Sengketa, Konflik, Perkara";

            $data = array();
            $data['header_title'] = $title;
            $data['arr_breadcrumbs'] = array(
                'Report' => '#',
                'Data ' . $title => 'report_skp',
            );

            $sengketa = $this->report_model->get_data_sengketa($filter);
            $konflik = $this->report_model->get_data_konflik($filter);
            $perkara = $this->report_model->get_data_perkara($filter);
            $noskp = $this->report_model->get_data_noskp($filter);

            $data['sengketa'] = $sengketa;
            $data['konflik'] =$konflik;
            $data['perkara'] =$perkara;
            $data['noskp'] =$noskp;

            $data['total_bidang'] = $sengketa->total_bidang + $konflik->total_bidang + $perkara->total_bidang + $noskp->total_bidang;
            $data['total_luas'] = $sengketa->luas_bidang + $konflik->luas_bidang + $perkara->luas_bidang + $noskp->luas_bidang;

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

            $this->template->content("report/report_skp_view.php", $data);
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

            $sengketa = $this->report_model->get_data_sengketa($filter);
            $konflik = $this->report_model->get_data_konflik($filter);
            $perkara = $this->report_model->get_data_perkara($filter);
            $noskp = $this->report_model->get_data_noskp($filter);

            $data['sengketa'] = $sengketa;
            $data['konflik'] =$konflik;
            $data['perkara'] =$perkara;
            $data['noskp'] =$noskp;

            $data['total_bidang'] = $sengketa->total_bidang + $konflik->total_bidang + $perkara->total_bidang + $noskp->total_bidang;
            $data['total_luas'] = $sengketa->luas_bidang + $konflik->luas_bidang + $perkara->luas_bidang + $noskp->luas_bidang;

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

            $this->load->view('export/report_skp', $data);
        }

    }
}
