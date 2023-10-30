<?php

/**
*
*/
class Helper_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_provinsi()
    {
        $sql = "
        SELECT * FROM ref_provinsi
        ";

        return $this->db->query($sql);
    }

    public function get_data_provinsi_id($id)
    {
        $sql = "
        SELECT * FROM ref_provinsi WHERE provinsi_id = $id
        ";

        return $this->db->query($sql);
    }

    public function get_kabupaten($id)
    {
        $sql = "
            SELECT * FROM ref_kabupaten WHERE kabupaten_provinsi_id = $id
        ";

        return $this->db->query($sql)->result();
    }

    public function get_kecamatan($id)
    {
        $sql = "
            SELECT * FROM ref_kecamatan WHERE kecamatan_kabupaten_id = $id
        ";

        return $this->db->query($sql)->result();
    }

    public function get_kelurahan($id)
    {
        $sql = "
            SELECT * FROM ref_kelurahan WHERE kelurahan_kecamatan_id = $id
        ";

        return $this->db->query($sql)->result();
        }

    public function get_kabupaten_name($provinsi_id, $kabupaten_id)
    {
        $sql = "
        SELECT * FROM ref_kabupaten WHERE kabupaten_provinsi_id = $provinsi_id AND kabupaten_id = $kabupaten_id;
        ";

        return $this->db->query($sql);
    }

    public function get_kecamatan_name($kabupaten_id, $kecamatan_id)
    {
        $sql = "
        SELECT * FROM ref_kecamatan WHERE kecamatan_kabupaten_id = $kabupaten_id AND kecamatan_id = $kecamatan_id;
        ";

        return $this->db->query($sql);
    }

    public function get_kelurahan_name($kecamatan_id, $kelurahan_id)
    {
        $sql = "
        SELECT * FROM ref_kelurahan WHERE kelurahan_kecamatan_id = $kecamatan_id AND kelurahan_id  = $kelurahan_id;
        ";

        return $this->db->query($sql);
    }

    public function get_last_id_subyek()
    {
        $sql = "
        SELECT subyek_id FROM tbl_subyek ORDER BY subyek_id DESC LIMIT 1
        ";

        return $this->db->query($sql)->row('subyek_id');
    }

    public function get_last_id_obyek()
    {
        $sql = "
        SELECT obyek_id FROM tbl_obyek ORDER BY obyek_id DESC LIMIT 1
        ";

        return $this->db->query($sql)->row('obyek_id');
    }

    public function check_ktp_subyek($ktp)
    {
        $user_id = $this->session->userdata('user_id');
        $sql = "
            SELECT * FROM tbl_subyek
            WHERE subyek_nomor_ktp = $ktp
            AND subyek_input_user_id = $user_id
            LIMIT 1
        ";

        return $this->db->query($sql)->row();
    }

    public function get_name_ktp_subyek($id)
    {
        $sql = "
            SELECT subyek_nama, subyek_nomor_ktp
            FROM tbl_subyek WHERE subyek_id = $id
        ";

        return $this->db->query($sql)->row();
    }

    public function get_name_ktp_subyek_user($id, $user)
    {
        $sql = "
            SELECT subyek_nama, subyek_nomor_ktp
            FROM tbl_subyek WHERE subyek_id = $id AND subyek_input_user_id = $user
        ";

        return $this->db->query($sql)->row();
    }

    public function get_inventaris_number($id)
    {
        $sql = "
            SELECT obyek_nomor_inventaris
            FROM tbl_obyek
            WHERE obyek_id = $id
        ";

        return $this->db->query($sql)->row('obyek_nomor_inventaris');
    }


}
