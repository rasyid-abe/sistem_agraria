<?php

/**
*
*/
class Terkait_subyek_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_subyek()
    {
        $sql = "
            SELECT * FROM tbl_subyek ORDER BY subyek_id DESC
        ";

        return $this->db->query($sql);
    }

    public function get_data_subyek_detail($id)
    {
        $sql = "
            SELECT * FROM tbl_subyek WHERE subyek_id = $id
        ";

        return $this->db->query($sql);
    }

    public function get_all_subyek_user($id)
    {
        $sql = "
            SELECT * FROM tbl_subyek WHERE subyek_input_user_id = $id
        ";

        return $this->db->query($sql);
    }

    public function delete_data_subyek($id)
    {
        $this->db->delete('tbl_subyek', ['subyek_id' => $id]);
    }

    public function get_subyek_obyek_id($sub_id)
    {
        $sql = "
            SELECT obyek_subyek_id FROM tbl_obyek WHERE obyek_subyek_id = {$sub_id}
        ";
    
        return $this->db->query($sql);
    }
}
