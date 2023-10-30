<?php

/**
*
*/
class Terkait_obyek_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_obyek()
    {
        $sql = "
            SELECT * FROM tbl_obyek ORDER BY obyek_id DESC
        ";

        return $this->db->query($sql);
    }

    public function get_data_obyek_detail($id)
    {
        $sql = "
            SELECT * FROM tbl_obyek WHERE obyek_id = $id
        ";

        return $this->db->query($sql);
    }

    public function get_all_obyek_user($id)
    {
        $sql = "
            SELECT * FROM tbl_obyek WHERE obyek_input_user_id = $id
        ";

        return $this->db->query($sql);
    }

    public function delete_data_obyek($id)
    {
        $this->db->delete('tbl_obyek', ['obyek_id' => $id]);
        $this->db->delete('tbl_akses', ['akses_obyek_id' => $id]);
        $this->db->delete('tbl_subyek_penguasaan', ['subyek_penguasaan_obyek_id' => $id]);
    }
}
