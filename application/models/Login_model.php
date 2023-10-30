<?php

/**
*
*/
class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_valid_akun($username)
    {
        $sql = "
            SELECT * FROM tbl_user where user_username = '$username';
        ";

        return $this->db->query($sql);
    }
}
