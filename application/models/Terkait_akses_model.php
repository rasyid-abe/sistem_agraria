<?php

/**
*
*/
class Terkait_akses_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_akses()
    {
        $sql = "
            SELECT * FROM tbl_akses ORDER BY akses_id DESC
        ";

        return $this->db->query($sql);
    }

    public function get_data_akses_detail($id)
    {
        $sql = "
            SELECT * FROM tbl_akses WHERE akses_obyek_id = $id
        ";

        return $this->db->query($sql);
    }

    public function delete_data_akses($id)
    {
        $this->db->delete('tbl_akses', ['akses_obyek_id' => $id]);
    }
}
