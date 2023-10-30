<?php

/**
*
*/
class Report_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->id = $this->session->userdata('user_id');
        $this->akses = $this->session->userdata('user_akses');
    }

    public function get_data_sendiri($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Pemilik' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Pemilik' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_orang_lain($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_bersama($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
                WHERE obyek_penguasaan_tanah = 'Bersama / Ulayat'
                OR obyek_penguasaan_tanah = 'Badan Hukum' OR obyek_penguasaan_tanah = 'Pemerintah'
                $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penguasaan_tanah = 'Bersama / Ulayat'
            OR obyek_penguasaan_tanah = 'Badan Hukum' OR obyek_penguasaan_tanah = 'Pemerintah'
            $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_total_penguasaan_sendiri($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Pemilik' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
            FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Pemilik' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_orang_lain($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
            FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_bersama($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Bersama / Ulayat'
                OR obyek_penguasaan_tanah = 'Badan Hukum' OR obyek_penguasaan_tanah = 'Pemerintah'
                $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
            FROM tbl_obyek WHERE obyek_penguasaan_tanah = 'Bersama / Ulayat'
            OR obyek_penguasaan_tanah = 'Badan Hukum' OR obyek_penguasaan_tanah = 'Pemerintah'
            $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }


    // Gadai / Sewa / Bagi Hasil ####################################################################################################################
    function get_data_gadai($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
                WHERE obyek_penguasaan_tanah = 'Bukan Pemilik'
                AND obyek_penguasaan_tanah_bukan_pemilik = 'Gadai' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penguasaan_tanah = 'Bukan Pemilik'
            AND obyek_penguasaan_tanah_bukan_pemilik = 'Gadai' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_sewa($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
                WHERE obyek_penguasaan_tanah = 'Bukan Pemilik'
                AND obyek_penguasaan_tanah_bukan_pemilik = 'Sewa' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penguasaan_tanah = 'Bukan Pemilik'
            AND obyek_penguasaan_tanah_bukan_pemilik = 'Sewa' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_bagi_hasil($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
                WHERE obyek_penguasaan_tanah = 'Bukan Pemilik'
                AND obyek_penguasaan_tanah_bukan_pemilik = 'Pinjam Pakai' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penguasaan_tanah = 'Bukan Pemilik'
            AND obyek_penguasaan_tanah_bukan_pemilik = 'Pinjam Pakai' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_total_gadai($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT
                count(obyek_luas_tanah) total_bidang,
                sum(obyek_luas_tanah) total_luas,
                sum(obyek_nilai_tanah_m2) nilai_tahan
                FROM tbl_obyek
                WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
                AND obyek_penguasaan_tanah_bukan_pemilik = 'Gadai'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT
            count(obyek_luas_tanah) total_bidang,
            sum(obyek_luas_tanah) total_luas,
            sum(obyek_nilai_tanah_m2) nilai_tahan
            FROM tbl_obyek
            WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
            AND obyek_penguasaan_tanah_bukan_pemilik = 'Gadai'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_sewa($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT
                count(obyek_luas_tanah) total_bidang,
                sum(obyek_luas_tanah) total_luas,
                sum(obyek_nilai_tanah_m2) nilai_tahan
                FROM tbl_obyek
                WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
                AND obyek_penguasaan_tanah_bukan_pemilik = 'sewa'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT
            count(obyek_luas_tanah) total_bidang,
            sum(obyek_luas_tanah) total_luas,
            sum(obyek_nilai_tanah_m2) nilai_tahan
            FROM tbl_obyek
            WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
            AND obyek_penguasaan_tanah_bukan_pemilik = 'sewa'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_bagi_hasil($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT
            count(obyek_luas_tanah) total_bidang,
            sum(obyek_luas_tanah) total_luas,
            sum(obyek_nilai_tanah_m2) nilai_tahan
            FROM tbl_obyek
            WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
            AND obyek_penguasaan_tanah_bukan_pemilik = 'Pinjam Pakai'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT
            count(obyek_luas_tanah) total_bidang,
            sum(obyek_luas_tanah) total_luas,
            sum(obyek_nilai_tanah_m2) nilai_tahan
            FROM tbl_obyek
            WHERE obyek_penguasaan_tanah = 'Bukan Pemilik' $where
            AND obyek_penguasaan_tanah_bukan_pemilik = 'Pinjam Pakai'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }


    // Jenis PemilikanTanah##### ####################################################################################################################
    function get_data_tanah_terdaftar($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_nib <> '' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_nib <> '' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_tanah_tidak_terdaftar($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_nib = '' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_nib = '' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_total_terdaftar($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT
                count(obyek_luas_tanah) total_bidang,
                sum(obyek_luas_tanah) total_luas,
                sum(obyek_nilai_tanah_m2) nilai_tahan
                FROM tbl_obyek
                WHERE obyek_nib <> '' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT
            count(obyek_luas_tanah) total_bidang,
            sum(obyek_luas_tanah) total_luas,
            sum(obyek_nilai_tanah_m2) nilai_tahan
            FROM tbl_obyek
            WHERE obyek_nib <> '' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_tidak_terdaftar($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT
                count(obyek_luas_tanah) total_bidang,
                sum(obyek_luas_tanah) total_luas,
                sum(obyek_nilai_tanah_m2) nilai_tahan
                FROM tbl_obyek
                WHERE obyek_nib = '' OR obyek_nib IS NULL $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT
            count(obyek_luas_tanah) total_bidang,
            sum(obyek_luas_tanah) total_luas,
            sum(obyek_nilai_tanah_m2) nilai_tahan
            FROM tbl_obyek
            WHERE obyek_nib = '' OR obyek_nib IS NULL $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }


    // Jenis Penggunaan Tanah #### ####################################################################################################################
    function get_data_pemukiman($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Pemukiman, Perkampungan' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Pemukiman, Perkampungan' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_sawah_irigasi($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Sawah Irigasi' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Sawah Irigasi' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_sawah_nonirigasi($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Sawah Non Irigasi' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Sawah Non Irigasi' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_telaga($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Tegalan, Ladang' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Tegalan, Ladang' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_kebun($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Kebun Campuran' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Kebun Campuran' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_tambak($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Perairan Datar, Tambak' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Perairan Datar, Tambak' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_tanak_kosong($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Tanah Terbuka, Tanah Kosong' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Tanah Terbuka, Tanah Kosong' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_fasos($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Fasum, Fasos' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Fasum, Fasos' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_industri($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Industri' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Industri' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_peternakan($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Peternakan' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Peternakan' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_lainnya($filter= '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Lainnya' $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_penggunaan_bidang_tanah = 'Lainnya' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_total_penguasaan_pemukiman($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Pemukiman, Perkampungan' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Pemukiman, Perkampungan' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_sawah_irigasi($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Sawah Irigasi' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Sawah Irigasi' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_sawah_nonirigasi($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Sawah Non Irigasi' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Sawah Non Irigasi' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_telaga($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Tegalan, Ladang' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Tegalan, Ladang' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_kebun($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Kebun Campuran' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Kebun Campuran' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_tambak($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Perairan Datar, Tambak' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Perairan Datar, Tambak' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_tanah_kosong($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Tanah Terbuka, Tanah Kosong' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Tanah Terbuka, Tanah Kosong' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_fasos($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Fasum, Fasos' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Fasum, Fasos' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_industri($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Industri' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Industri' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_peternakan($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Peternakan' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Peternakan' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_lainnya($filter= '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Lainnya' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_penggunaan_bidang_tanah = 'Lainnya' $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    // Jenis Pemanfaatan Tanah #### ####################################################################################################################
    function get_data_tempat_tinggal($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_tempat_tinggal <> ''
            $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_tempat_tinggal <> ''
            $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_pertanian($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_pertanian <> ''
            $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_pertanian <> ''
            $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_ekonomi($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanaatan_ekonomi_perdaganan <> ''
            $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanaatan_ekonomi_perdaganan <> ''
            $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_jasa($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_usaha_jasa <> ''
            $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_usaha_jasa <> ''
            $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_fasum($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_fasos_fasum <> ''
            $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_fasos_fasum <> ''
            $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_data_useless($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_tidak_ada_manfaat <> ''
            $where
            ";

            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT obyek_luas_tanah, obyek_nilai_tanah_m2 FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_tidak_ada_manfaat <> ''
            $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->result();
        }
    }

    function get_total_penguasaan_tempat_tinggal($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanfaatan_tempat_tinggal <> ''
                $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
            FROM tbl_obyek
            WHERE obyek_jenis_pemanfaatan_tempat_tinggal <> ''
            $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_pertanian($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanfaatan_pertanian <> ''
                $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanfaatan_pertanian <> ''
                $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_ekonomi($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanaatan_ekonomi_perdaganan <> ''
                $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanaatan_ekonomi_perdaganan <> ''
                $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_jasa($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanfaatan_usaha_jasa <> ''
                $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanfaatan_usaha_jasa <> ''
                $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_fasum($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanfaatan_fasos_fasum <> ''
                $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanfaatan_fasos_fasum <> ''
                $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_total_penguasaan_useless($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanfaatan_tidak_ada_manfaat <> ''
                $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
                SELECT count(obyek_luas_tanah) total_bidang, sum(obyek_luas_tanah) total_luas
                FROM tbl_obyek
                WHERE obyek_jenis_pemanfaatan_tidak_ada_manfaat <> ''
                $where
                AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    // Sengketa, Konflik, Perkara #### ####################################################################################################################
    function get_data_sengketa($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_sengketa_konflik_perkara = 'Sengketa' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_sengketa_konflik_perkara = 'Sengketa' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_konflik($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_sengketa_konflik_perkara = 'Konflik' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_sengketa_konflik_perkara = 'Konflik' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_perkara($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_sengketa_konflik_perkara = 'Perkara di Pengadilan' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_sengketa_konflik_perkara = 'Perkara di Pengadilan' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_noskp($filter = '')
    {
        if($filter != ''){
            if($filter['provinsi'] != ''){
                if($filter['kabupaten_kota'] != ''){
                    if($filter['kecamatan'] != ''){
                        if($filter['desa_kelurahan'] != ''){
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                        } else {
                            $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                        }
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']}";
                }
            } else {
                $where = '';
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_sengketa_konflik_perkara = 'Tidak SKP' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_sengketa_konflik_perkara = 'Tidak SKP' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    // Landreform #### ####################################################################################################################
    function get_data_maksimum($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Kelebihan' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Kelebihan' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_absente($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Absentee' $where
            ";

            return $this->db->query($sql)->row();
        } else{
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Absentee' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_swarpraja($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Bekas Swapraja' $where
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Bekas Swapraja' $where
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_eks_hgu($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'HGU Habis'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'HGU Habis'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_pelepasan_hgu($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Pelepasan HGU'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Pelepasan HGU'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_tanah_terlantar($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Terlantar'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Terlantar'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_penyelesaian_skp($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Penyelesaian'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Penyelesaian'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_kawawan_hutan($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Dari Pelepasan Kawasan Hutan'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Dari Pelepasan Kawasan Hutan'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_tanah_timbul($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Timbul'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Timbul'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_bekas_tambang($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Bekas Tambang Yang Telah Direkemasi'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Bekas Tambang Yang Telah Direkemasi'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }

    function get_data_negara_penggunaan_masyarakat($filter = '')
    {
        if(!empty($filter['provinsi'])){
            if(!empty($filter['kabupaten_kota'])){
                if(!empty($filter['kecamatan'])){
                    if(!empty($filter['desa_kelurahan'])){
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']} AND obyek_desa_kelurahan = {$filter['desa_kelurahan']}";
                    } else {
                        $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']} AND obyek_kecamatan = {$filter['kecamatan']}";
                    }
                } else {
                    $where = "AND obyek_provinsi = {$filter['provinsi']} AND obyek_kabupaten_kota = {$filter['kabupaten_kota']}";
                }
            } else {
                $where = "AND obyek_provinsi = {$filter['provinsi']}";
            }
        } else {
            $where = '';
        }

        if($this->akses == 0){
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Negara Dalam Penguasaan Masyarakat'
            ";

            return $this->db->query($sql)->row();
        } else {
            $sql = "
            SELECT count(obyek_luas_tanah) total_bidang , sum(obyek_luas_tanah) luas_bidang
            FROM tbl_obyek WHERE obyek_potensi_landreform = 'Tanah Negara Lainnya'
            $where AND obyek_potensi_landreform_option = 'Tanah Negara Dalam Penguasaan Masyarakat'
            AND obyek_input_user_id = {$this->id}
            ";

            return $this->db->query($sql)->row();
        }
    }
}
