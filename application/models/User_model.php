<?php

/**
*
*/
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_user()
    {
        $sql = "
            SELECT * FROM tbl_user ORDER BY user_id DESC
        ";

        return $this->db->query($sql);
    }

    public function get_data_user_detail($id)
    {
        $sql = "
            SELECT * FROM tbl_user WHERE user_id = $id
        ";

        return $this->db->query($sql);
    }

    public function delete_data_user($id)
    {
        $this->db->delete('tbl_user', ['user_id' => $id]);
    }
}
