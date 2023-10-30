<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('report_model');
    }

    public function index()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Dashboard',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Dashboard";
        $data = array();
        $data['header_title'] = $title;

        $data['subyek'] = $this->dashboard_model->get_total_subyek();
        $data['obyek'] = $this->dashboard_model->get_total_obyek();

        $data['total_pemukiman'] = $this->report_model->get_total_penguasaan_pemukiman();
        $data['total_sawah_irigasi'] = $this->report_model->get_total_penguasaan_sawah_irigasi();
        $data['total_sawah_nonirigasi'] = $this->report_model->get_total_penguasaan_sawah_nonirigasi();
        $data['total_telaga'] = $this->report_model->get_total_penguasaan_telaga();
        $data['total_kebun'] = $this->report_model->get_total_penguasaan_kebun();
        $data['total_tambak'] = $this->report_model->get_total_penguasaan_tambak();
        $data['total_tanah_kosong'] = $this->report_model->get_total_penguasaan_tanah_kosong();
        $data['total_fasos'] = $this->report_model->get_total_penguasaan_fasos();
        $data['total_industri'] = $this->report_model->get_total_penguasaan_industri();
        $data['total_peternakan'] = $this->report_model->get_total_penguasaan_peternakan();
        $data['total_lainnya'] = $this->report_model->get_total_penguasaan_lainnya();

        $data['total_tempat_tinggal'] = $this->report_model->get_total_penguasaan_tempat_tinggal();
        $data['total_pertanian'] = $this->report_model->get_total_penguasaan_pertanian();
        $data['total_ekonomi'] = $this->report_model->get_total_penguasaan_ekonomi();
        $data['total_jasa'] = $this->report_model->get_total_penguasaan_jasa();
        $data['total_fasum'] = $this->report_model->get_total_penguasaan_fasum();
        $data['total_useless'] = $this->report_model->get_total_penguasaan_useless();

        $data['total_terdaftar'] = $this->report_model->get_total_terdaftar();
        $data['total_tidak_terdaftar'] = $this->report_model->get_total_tidak_terdaftar();

        $data['query'] = $this->get_data_log();

        $this->template->content("dashboard/dashboard_view", $data);
        $this->template->show('template');
    }

    public function get_data_log()
    {
        $data = $this->dashboard_model->get_data_log()->result();
        return $data;
    }

    public function get_data_penggunaan_chart()
    {
        $data['total_pemukiman'] = $this->report_model->get_total_penguasaan_pemukiman();
        $data['total_sawah_irigasi'] = $this->report_model->get_total_penguasaan_sawah_irigasi();
        $data['total_sawah_nonirigasi'] = $this->report_model->get_total_penguasaan_sawah_nonirigasi();
        $data['total_telaga'] = $this->report_model->get_total_penguasaan_telaga();
        $data['total_kebun'] = $this->report_model->get_total_penguasaan_kebun();
        $data['total_tambak'] = $this->report_model->get_total_penguasaan_tambak();
        $data['total_tanah_kosong'] = $this->report_model->get_total_penguasaan_tanah_kosong();
        $data['total_fasos'] = $this->report_model->get_total_penguasaan_fasos();
        $data['total_industri'] = $this->report_model->get_total_penguasaan_industri();
        $data['total_peternakan'] = $this->report_model->get_total_penguasaan_peternakan();
        $data['total_lainnya'] = $this->report_model->get_total_penguasaan_lainnya();

        echo json_encode($data);
    }

    public function get_data_pemanfaatan_chart()
    {
        $data['total_tempat_tinggal'] = $this->report_model->get_total_penguasaan_tempat_tinggal();
        $data['total_pertanian'] = $this->report_model->get_total_penguasaan_pertanian();
        $data['total_ekonomi'] = $this->report_model->get_total_penguasaan_ekonomi();
        $data['total_jasa'] = $this->report_model->get_total_penguasaan_jasa();
        $data['total_fasum'] = $this->report_model->get_total_penguasaan_fasum();
        $data['total_useless'] = $this->report_model->get_total_penguasaan_useless();

        echo json_encode($data);
    }

    public function get_data_pemilikan_chart()
    {
        $data['total_terdaftar'] = $this->report_model->get_total_terdaftar();
        $data['total_tidak_terdaftar'] = $this->report_model->get_total_tidak_terdaftar();

        echo json_encode($data);
    }

    function currency($angka){

    	$hasil_rupiah = number_format($angka,2,',','.');
    	return $hasil_rupiah;

    }
}
