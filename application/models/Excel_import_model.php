<?php

/**
*
*/
class Excel_import_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

	public function get_kelurahan_code($kel, $kec_id)
    {
        $sql = "
            SELECT kelurahan_id FROM ref_kelurahan
            WHERE kelurahan_nama = '{$kel}' AND kelurahan_kecamatan_id = {$kec_id}
        ";

        return $this->db->query($sql)->row('kelurahan_id');
    }

    public function get_kecamatan_code($kec, $kab_id)
    {
        $sql = "
            SELECT kecamatan_id FROM ref_kecamatan
            WHERE kecamatan_nama = '{$kec}' AND kecamatan_kabupaten_id = {$kab_id}
        ";

        return $this->db->query($sql)->row('kecamatan_id');
    }

    public function get_kabupaten_code($kab)
    {
        $sql = "
            SELECT * FROM ref_kabupaten WHERE kabupaten_nama = '{$kab}'
        ";

        return $this->db->query($sql)->row();
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

    public function check_ktp_subyek($ktp_pemilik)
    {
        $sql = "
            SELECT subyek_nomor_ktp FROM tbl_subyek WHERE subyek_nomor_ktp = {$ktp_pemilik}
        ";

        return $this->db->query($sql);
    }

    public function check_invent($invent)
    {
        $sql = "
            SELECT obyek_nomor_inventaris FROM tbl_obyek WHERE obyek_nomor_inventaris = '$invent'
        ";

        return $this->db->query($sql);
    }
}
