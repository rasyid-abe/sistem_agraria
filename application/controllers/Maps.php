<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Maps extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->show();
    }

    public function show($id)
    {
        $title = 'Peta';
        $subtitle = 'Bidang';

        $data = array();
        $data['header_title'] = $subtitle. ' ' .$title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $subtitle .' '. $title => '#',
        );

        $sql = "
            SELECT subyek_nama, subyek_nomor_ktp, obyek_nib, obyek_koordinat_x, obyek_koordinat_y
            FROM tbl_obyek
            LEFT JOIN tbl_subyek ON obyek_subyek_id = subyek_id
            WHERE obyek_id = {$id}
        ";
        $row = $this->db->query($sql)->row();

        $data['koor_x'] = $row->obyek_koordinat_x;
        $data['koor_y'] = $row->obyek_koordinat_y;
        $data['nib'] = $row->obyek_nib;
        $data['nama'] = $row->subyek_nama;
        $data['ktp'] = $row->subyek_nomor_ktp;

        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Melihat Peta Obyek Bidang Dengan Nama Subyek ' . $data['nama'],
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $this->template->content("maps/view_maps", $data);
        $this->template->show('template');
    }
}
