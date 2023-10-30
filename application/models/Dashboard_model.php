<?php

/**
*
*/
class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->id = $this->session->userdata('user_id');
        $this->akses = $this->session->userdata('user_akses');
    }

    public function get_total_subyek()
    {
        if($this->akses == 0){
            $sql = "
            SELECT COUNT(subyek_id) total_subyek FROM tbl_subyek
            ";

            return $this->db->query($sql)->row('total_subyek');
        } else {
            $sql = "
            SELECT COUNT(subyek_id) total_subyek FROM tbl_subyek
            WHERE subyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row('total_subyek');
        }
    }

    public function get_total_obyek()
    {
        if($this->akses == 0){
            $sql = "
                SELECT COUNT(obyek_id) total_obyek, SUM(obyek_luas_tanah) luas_obyek FROM tbl_obyek
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT COUNT(obyek_id) total_obyek, SUM(obyek_luas_tanah) luas_obyek FROM tbl_obyek
                WHERE obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    public function get_data_log()
    {
        $sql = "
            SELECT * FROM tbl_log_activity
        ";

        return $this->db->query($sql);
    }
}
