<?php

/**
*
*/
class Subyek_penguasaan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_subyek()
    {
        $sql = "
            SELECT * FROM tbl_subyek_penguasaan ORDER BY subyek_penguasaan_id DESC
        ";

        return $this->db->query($sql);
    }

    public function get_data_subyek_detail($id)
    {
        $sql = "
            SELECT * FROM tbl_subyek_penguasaan WHERE subyek_penguasaan_obyek_id = $id
        ";

        return $this->db->query($sql);
    }
}
