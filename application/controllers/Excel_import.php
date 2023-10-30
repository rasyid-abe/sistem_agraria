<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Excel_import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('excel_import_model');
        $this->load->library('excel');
    }

    public function index()
    {
        $this->show();
    }

    public function show()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengakses Halaman Import Data',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        $title = "Import";

        $data = array();
        $data['header_title'] = $title;
        $data['arr_breadcrumbs'] = array(
            $title => '#',
            $title . ' Data' => 'terkait_akses/show',
        );


        $this->template->content("import/excel_import_view", $data);
        $this->template->show('template');
    }

    function import()
    {
        // start log
        $log = [
            'log_activity_datetime' => date('Y-m-d H:i:s'),
            'log_activity_user' => $this->session->userdata('user_nama'),
            'log_activity_access' => $this->session->userdata('user_akses'),
            'log_activity_desc' => 'Mengimport Data Excel',
        ];

        $this->db->insert('tbl_log_activity', $log);
        // end log

        if(isset($_FILES["file"]["name"]))
        {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $inventaris = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama_pemilik = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $jalan_pemilik = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $rt_rw_pemilik = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $kelurahan_pemilik = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $kecamatan_pemilik = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $kabupaten_pemilik = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $ktp_pemilik = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $pekerjaan_pemilik = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $umur_pemilik = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $status_perkawinan_pemilik = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $anggota_keluarga_pemilik = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $domisili_pemilik = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $tahun_tahan_pemilik = $worksheet->getCellByColumnAndRow(13, $row)->getValue();

                    $nama_penguasaan = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $jalan_penguasaan = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $rt_rw_penguasaan = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $kelurahan_penguasaan = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    $kecamatan_penguasaan = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                    $kabupaten_penguasaan = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                    $ktp_penguasaan = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                    $pekerjaan_penguasaan = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                    $umur_penguasaan = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                    $status_perkawinan_penguasaan = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                    $anggota_keluarga_penguasaan = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                    $domisili_penguasaan = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                    $tahun_tahan_penguasaan = $worksheet->getCellByColumnAndRow(26, $row)->getValue();

                    $nib = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
                    $pbb = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
                    $jalan_obyek = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
                    $rt_rw_obyek = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
                    $kelurahan_obyek = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
                    $kecamatan_obyek = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
                    $kabupaten_obyek = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
                    $luas_tanah = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
                    $nilai_tanah = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
                    $penguasaan_tanah = $worksheet->getCellByColumnAndRow(36, $row)->getValue();
                    $perolehan_tanah = $worksheet->getCellByColumnAndRow(37, $row)->getValue();
                    $pemilikan_tanah = $worksheet->getCellByColumnAndRow(38, $row)->getValue();
                    $penggunaan_tanah = $worksheet->getCellByColumnAndRow(39, $row)->getValue();
                    $pemanfaatan_tanah = $worksheet->getCellByColumnAndRow(40, $row)->getValue();
                    $skp_tanah = $worksheet->getCellByColumnAndRow(41, $row)->getValue();
                    $landreform_tanah = $worksheet->getCellByColumnAndRow(42, $row)->getValue();

                    $invent_aks = $worksheet->getCellByColumnAndRow(43, $row)->getValue();
                    $sertifikat_dijaminkan = $worksheet->getCellByColumnAndRow(44, $row)->getValue();
                    $potensi_akses = $worksheet->getCellByColumnAndRow(45, $row)->getValue();
                    $jenis_bantuan = $worksheet->getCellByColumnAndRow(46, $row)->getValue();
                    $bantuan_dari = $worksheet->getCellByColumnAndRow(47, $row)->getValue();
                    $bantuan_tanggal = $worksheet->getCellByColumnAndRow(48, $row)->getValue();
                    $pendapatan_sebelum = $worksheet->getCellByColumnAndRow(49, $row)->getValue();
                    $pendapatan_sesudah = $worksheet->getCellByColumnAndRow(50, $row)->getValue();
                    $koordinat_x = $worksheet->getCellByColumnAndRow(51, $row)->getValue();
                    $koordinat_y = $worksheet->getCellByColumnAndRow(52, $row)->getValue();

                    // konfigurasi subyek
                    if(!empty($rt_rw_pemilik)){
                        $rtrw_pemilik = explode('/', $rt_rw_pemilik);
                        $rt_pemilik = $rtrw_pemilik[0];
                        $rw_pemilik = $rtrw_pemilik[1];
                    } else {
                        $rt_pemilik = '';
                        $rw_pemilik = '';
                    }

                    if(!empty($kabupaten_pemilik)){
                        $kab_pemilik = $this->excel_import_model->get_kabupaten_code($kabupaten_pemilik);
                        $kabupaten_pemilik = $kab_pemilik->kabupaten_id;
                        $provinsi_pemilik = $kab_pemilik->kabupaten_provinsi_id;
                        if(!empty($kecamatan_pemilik)){
                            $kec_pemilik = $this->excel_import_model->get_kecamatan_code($kecamatan_pemilik, $kabupaten_pemilik);
                            if(!empty($kelurahan_pemilik)){
                                $kel_pemilik = $this->excel_import_model->get_kelurahan_code($kelurahan_pemilik, $kec_pemilik);
                            } else {
                                $kel_pemilik = '';
                            }
                        } else {
                            $kec_pemilik = '';
                        }
                    } else {
                        $kec_pemilik = '';
                        $kel_pemilik = '';
                        $kabupaten_pemilik = '';
                        $provinsi_pemilik = '';
                    }

                    $dom_pemilik = '';
                    $dom_pemilik_lainnya = '';
                    if(!empty($domisili_pemilik)) {
                        if($domisili_pemilik == "Desa Ini") {
                            $dom_pemilik = 1;
                        } else if ($domisili_pemilik == "Desa Lain Berbatasan Langsung") {
                            $dom_pemilik = 2;
                        } else if ($domisili_pemilik == "Desa Lain Tidak Berbatasan Langsung") {
                            $dom_pemilik = 3;
                        } else if ($domisili_pemilik == "Diluar Kecamatan") {
                            $dom_pemilik = 4;
                        } else {
                            $dom_pemilik = 5;
                            $dom_pemilik_lainnya = $domisili_pemilik;
                        }
                    }
                    if($status_perkawinan_pemilik == '') {
                        $stat_pemilik = '';
                    } else {
                        if($status_perkawinan_pemilik == "Belum Menikah") {
                            $stat_pemilik = 1;
                        } else if ($status_perkawinan_pemilik == "Menikah") {
                            $stat_pemilik = 2;
                        } else if ($status_perkawinan_pemilik == "Pernah Menikah"){
                            $stat_pemilik = 3;
                        } else {
                            $stat_pemilik = 0;
                        }
                    }

                    $ktp = $this->excel_import_model->check_ktp_subyek($ktp_pemilik)->num_rows();
                    if ($ktp > 0) {
                    } else {
                        $data_subyek = array(
                            'subyek_nama' => $nama_pemilik,
                            'subyek_jalan' => $jalan_pemilik,
                            'subyek_rt' => $rt_pemilik,
                            'subyek_rw' => $rw_pemilik,
                            'subyek_desa_kelurahan' => $kel_pemilik,
                            'subyek_kecamatan' => $kec_pemilik,
                            'subyek_kabupaten_kota' => $kabupaten_pemilik,
                            'subyek_provinsi' => $provinsi_pemilik,
                            'subyek_nomor_ktp' => $ktp_pemilik,
                            'subyek_pekerjaan' => $pekerjaan_pemilik,
                            'subyek_umur' => $umur_pemilik,
                            'subyek_status_perkawinan' => $stat_pemilik,
                            'subyek_jumlah_anggota_keluarga' => $anggota_keluarga_pemilik,
                            'subyek_domisili' => $dom_pemilik,
                            'subyek_domisili_lainnya' => $dom_pemilik_lainnya,
                            'subyek_tahun_memiliki_tanah' => $tahun_tahan_pemilik,
                            'subyek_input_user_id' => $this->session->userdata('user_id'),
                            'subyek_input_datetime' => date('Y-m-d H:i:s')
                        );

                        $this->db->insert('tbl_subyek', $data_subyek);
                    }


                    // konfigurasi obyek
                    if(!empty($rt_rw_obyek)){
                        $rtrw_obyek = explode('/', $rt_rw_obyek);
                        $rt_obyek = $rtrw_obyek[0];
                        $rw_obyek = $rtrw_obyek[1];
                    } else {
                        $rt_obyek = '';
                        $rw_obyek = '';
                    }

                    if(!empty($kabupaten_obyek)){
                        $kab_obyek = $this->excel_import_model->get_kabupaten_code($kabupaten_obyek);
                        $kabupaten_obyek = $kab_obyek->kabupaten_id;
                        $provinsi_obyek = $kab_obyek->kabupaten_provinsi_id;
                        if(!empty($kecamatan_obyek)){
                            $kec_obyek = $this->excel_import_model->get_kecamatan_code($kecamatan_obyek, $kabupaten_obyek);
                            if(!empty($kelurahan_obyek)){
                                $kel_obyek = $this->excel_import_model->get_kelurahan_code($kelurahan_obyek, $kec_obyek);
                            } else {
                                $kel_obyek = '';
                            }
                        } else {
                            $kec_obyek = '';
                        }
                    } else {
                        $kec_obyek = '';
                        $kel_obyek = '';
                        $kabupaten_obyek = '';
                        $provinsi_obyek = '';
                    }

                    if (empty($landreform_tanah)) {
                        $obj_landreform = '';
                        $obj_landreform_option = '';
                        $obj_landreform_option_lainnya = '';
                    } else if (($landreform_tanah == 'Tanah Absentee') || ($landreform_tanah == 'Tanah Kelebihan') || ($landreform_tanah == 'Tanah Bekas Swapraja')) {
                        $obj_landreform = $landreform_tanah;
                        $obj_landreform_option = '';
                        $obj_landreform_option_lainnya = '';
                    } else {
                        $land = explode('(', $landreform_tanah);
                        if ((strpos($land[0], 'HGU Habis') !== false) || (strpos($land[0], 'Pelepasan HGU') !== false)) {
                            $obj_landreform = 'Tanah Negara Lainnya';
                            $obj_landreform_option = $land[0];
                            $obj_landreform_option_lainnya = trim($land[1], ')');
                        } else {
                            $obj_landreform = 'Tanah Negara Lainnya';
                            $obj_landreform_option = $landreform_tanah;
                            $obj_landreform_option_lainnya = '';
                        }
                    }

                    if (empty($penguasaan_tanah)) {
                        $obj_penguasaan = '';
                        $obj_penguasaan_bukan_pemilik = '';
                        $obj_penguasaan_bukan_pemilik_lainnya = '';
                    } else if ($penguasaan_tanah == "Pemilik" || $penguasaan_tanah == "Bersama / Ulayat" || $penguasaan_tanah == "Badan Hukum" || $penguasaan_tanah == "Pemerintah" || $penguasaan_tanah == "Tidak Ada Penguasaan Tanah") {
                        $obj_penguasaan = $penguasaan_tanah;
                        $obj_penguasaan_bukan_pemilik = '';
                        $obj_penguasaan_bukan_pemilik_lainnya = '';
                    } else if ($penguasaan_tanah == "Gadai" || $penguasaan_tanah == "Sewa" || $penguasaan_tanah == "Pinjam Pakai" || $penguasaan_tanah == "Penggarap") {
                        $obj_penguasaan = "Bukan Pemilik";
                        $obj_penguasaan_bukan_pemilik = $penguasaan_tanah;
                        $obj_penguasaan_bukan_pemilik_lainnya = '';
                    } else {
                        $obj_penguasaan = "Bukan Pemilik";
                        $obj_penguasaan_bukan_pemilik = "Lainnya";
                        $obj_penguasaan_bukan_pemilik_lainnya = $penguasaan_tanah;
                    }


                    if (empty($perolehan_tanah)) {
                        $obj_perolehan = "";
                        $obj_perolehan_lainnya = "";
                    } else if ($perolehan_tanah == "Warisan" || $perolehan_tanah == "Jual-Beli" || $perolehan_tanah == "Tukar Menukar" ) {
                        $obj_perolehan = $perolehan_tanah;
                        $obj_perolehan_lainnya = "";
                    } else {
                        $obj_perolehan = "Lainnya";
                        $obj_perolehan_lainnya = $perolehan_tanah;
                    }


                    if (empty($pemilikan_tanah)) {
                        $obj_pemilikan = '';
                        $obj_pemilikan_belum = '';
                        $obj_pemilikan_sertifikat = '';
                    } else if (strpos($pemilikan_tanah, 'Terdaftar') !== false) {
                        $own = explode(',', $pemilikan_tanah);
                        $obj_pemilikan = $own[0];
                        $obj_pemilikan_belum = '';
                        $obj_pemilikan_sertifikat = $own[1];
                    } else {
                        if ((strpos($pemilikan_tanah, 'Tanah Ulayat') !== false) || (strpos($pemilikan_tanah, 'Tanah Ulayat') !== false)) {
                            $obj_pemilikan = 'Belum Terdaftar';
                            $obj_pemilikan_belum =$pemilikan_tanah;
                            $obj_pemilikan_sertifikat = '';
                        } else {
                            $own = explode(',', $pemilikan_tanah);
                            $obj_pemilikan = 'Belum Terdaftar';
                            $obj_pemilikan_belum = $own[0];
                            $obj_pemilikan_sertifikat = $own[1];
                        }
                        // $obj_pemilikan_sertifikat = $own[1];
                    }

                    if (empty($penggunaan_tanah)) {
                        $obj_penggunaan = '';
                        $obj_penggunaan_lainnya = '';
                    } else if (
                        ($penggunaan_tanah == "Pemukiman, Perkampungan") ||
                        ($penggunaan_tanah == "Sawah Irigasi") ||
                        ($penggunaan_tanah == "Sawah Non Irigasi") ||
                        ($penggunaan_tanah == "Tegalan, Ladang") ||
                        ($penggunaan_tanah == "Kebun Campuran") ||
                        ($penggunaan_tanah == "Perairan Datar, Tambak") ||
                        ($penggunaan_tanah == "Tanah Terbuka, Tanah Kosong") ||
                        ($penggunaan_tanah == "Fasum, Fasos") ||
                        ($penggunaan_tanah == "Industri") ||
                        ($penggunaan_tanah == "Peternakan")) {

                            $obj_penggunaan = $penggunaan_tanah;
                            $obj_penggunaan_lainnya = '';
                        } else {
                            $obj_penggunaan = 'Lainnya';
                            $obj_penggunaan_lainnya = $penggunaan_tanah;
                        }


                        if (empty($pemanfaatan_tanah)) {
                            $man_tempat_tinggal = '';
                            $man_pertanian = '';
                            $man_pertanian_lainnya = '';
                            $man_ekonomi = '';
                            $man_ekonomi_lainnya = '';
                            $man_jasa = '';
                            $man_jasa_lainnya = '';
                            $man_fasum = '';
                            $man_fasum_lainnya = '';
                            $man_tidak = '';
                        } else {
                            if ($pemanfaatan_tanah == "Tidak Ada Pemanfaatan") {
                                $man_tempat_tinggal = '';
                                $man_pertanian = '';
                                $man_pertanian_lainnya = '';
                                $man_ekonomi = '';
                                $man_ekonomi_lainnya = '';
                                $man_jasa = '';
                                $man_jasa_lainnya = '';
                                $man_fasum = '';
                                $man_fasum_lainnya = '';
                                $man_tidak = 'Tidak Ada Pemanfaatan';
                            } else {
                                $man_tempat_tinggal = '';
                                $man_pertanian = '';
                                $man_pertanian_lainnya = '';
                                $man_ekonomi = '';
                                $man_ekonomi_lainnya = '';
                                $man_jasa = '';
                                $man_jasa_lainnya = '';
                                $man_fasum = '';
                                $man_fasum_lainnya = '';
                                $man_tidak = '';

                                $manfaat = explode('-', $pemanfaatan_tanah);
                                $tot_manfaat = count($manfaat);
                                for ($i=0; $i < $tot_manfaat; $i++) {
                                    if($manfaat[$i] == "Rumah Tinggal") {
                                        $man_tempat_tinggal = $manfaat[$i];
                                    } else if (strpos($manfaat[$i], "Kegiatan Produksi Pertanian") !== false) {
                                        $chtani1 = str_replace("Kegiatan Produksi Pertanian","",$manfaat[$i]);
                                        $chtani2 = trim(trim($chtani1, '('), ')');
                                        $pertanian = str_replace(', ',',',$chtani2);
                                        $ex_pert = explode(',', $pertanian);
                                        $tot_pert = count($ex_pert);
                                        for ($j=0; $j < $tot_pert; $j++) {
                                            if (($ex_pert[$j] != 'Tanaman Musiman') && ($ex_pert[$j] != 'Tanaman Keras')) {
                                                $ch_p1 =  str_replace("$ex_pert[$j]","Lainnya",$pertanian);
                                                $ch_p2 =  str_replace(',','","',$ch_p1);
                                                $man_pertanian = '["'.$ch_p2.'"]';
                                                $man_pertanian_lainnya = $ex_pert[$j];
                                            } else {
                                                $ch_p3 =  str_replace(',','","',$pertanian);
                                                $man_pertanian = '["'.$ch_p3.'"]';
                                                $man_pertanian_lainnya = '';
                                            }
                                        }
                                    } else if (strpos($manfaat[$i], "Kegiatan Ekonomi/Perdagangan") !== false) {
                                        $cheko1 = str_replace("Kegiatan Ekonomi/Perdagangan","",$manfaat[$i]);
                                        $cheko2 = trim(trim($cheko1, '('), ')');
                                        $ekonomi = str_replace(', ',',',$cheko2);
                                        $ex_eko = explode(',', $ekonomi);
                                        $tot_eko = count($ex_eko);
                                        $pab = '';
                                        for ($j=0; $j < $tot_eko; $j++) {
                                            if (($ex_eko[$j] != 'Kontrakan') && ($ex_eko[$j] != 'Toko') && ($ex_eko[$j] != 'Kantor') && ($ex_eko[$j] != 'Gudang') && ($ex_eko[$j] != 'Pabrik/Industri')) {
                                                $ch_e1 =  str_replace("$ex_eko[$j]","Lainnya",$ekonomi);
                                                $ch_e2 =  str_replace(',','","',$ch_e1);
                                                $man_ekonomi = '["'.$ch_e2.'"]';
                                                $man_ekonomi_lainnya = $ex_eko[$j];
                                            } else {
                                                $ch_e3 =  str_replace(',','","',$ekonomi);
                                                $man_ekonomi = '["'.$ch_e3.'"]';
                                                $man_ekonomi_lainnya = '';
                                            }
                                        }
                                    } else if (strpos($manfaat[$i], "Usaha Jasa") !== false) {
                                        $chjas1 = str_replace("Usaha Jasa","",$manfaat[$i]);
                                        $chjas2 = trim(trim($chjas1, '('), ')');
                                        $jasa = str_replace(', ',',',$chjas2);
                                        $ex_jas = explode(',', $jasa);
                                        $tot_jas = count($ex_jas);
                                        for ($j=0; $j < $tot_jas; $j++) {
                                            if (($ex_jas[$j] != 'Telekomunikasi') && ($ex_jas[$j] != 'Transportasi')) {
                                                $ch_j1 =  str_replace("$ex_jas[$j]","Lainnya",$jasa);
                                                $ch_j2 =  str_replace(',','","',$ch_j1);
                                                $man_jasa = '["'.$ch_j2.'"]';
                                                $man_jasa_lainnya = $ex_jas[$j];
                                            } else {
                                                $ch_j3 =  str_replace(',','","',$jasa);
                                                $man_jasa = '["'.$ch_j3.'"]';
                                                $man_jasa_lainnya = '';
                                            }
                                        }
                                    } else if (strpos($manfaat[$i], "Fasos/Fasum") !== false) {
                                        $chfas1 = str_replace("Fasos/Fasum","",$manfaat[$i]);
                                        $chfas2 = trim(trim($chfas1, '('), ')');
                                        $fasum = str_replace(', ',',',$chfas2);
                                        $ex_fas = explode(',', $fasum);
                                        $tot_fas = count($ex_fas);
                                        for ($j=0; $j < $tot_fas; $j++) {
                                            if (($ex_fas[$j] != 'Sekolah') && ($ex_fas[$j] != 'Mesjid') && ($ex_fas[$j] != 'Kantor Desa') && ($ex_fas[$j] != 'Taman') && ($ex_fas[$j] != 'Puskesmas')) {
                                                $ch_f1 =  str_replace("$ex_fas[$j]","Lainnya",$fasum);
                                                $ch_f2 =  str_replace(',','","',$ch_f1);
                                                $man_fasum = '["'.$ch_f2.'"]';
                                                $man_fasum_lainnya = $ex_fas[$j];
                                            } else {
                                                $ch_f3 =  str_replace(',','","',$fasum);
                                                $man_fasum = '["'.$ch_f3.'"]';
                                                $man_fasum_lainnya = '';
                                            }
                                        }
                                    }
                                }
                            }
                        }

                        $check_invent = $this->excel_import_model->check_invent($inventaris);
                        // print_r($check_invent->num_rows());
                        // die;
                        if ($check_invent->num_rows() > 0) {
                        } else {
                            $data_obyek = array(
                                'obyek_subyek_id' => $this->excel_import_model->get_last_id_subyek(),
                                'obyek_nomor_inventaris' => $inventaris,
                                'obyek_nib' => $nib,
                                'obyek_pbb' => $pbb,
                                'obyek_jalan' => $jalan_obyek,
                                'obyek_rt' => $rt_obyek,
                                'obyek_rw' => $rw_obyek,
                                'obyek_desa_kelurahan' => $kel_obyek,
                                'obyek_kecamatan' => $kec_obyek,
                                'obyek_kabupaten_kota' => $kabupaten_obyek,
                                'obyek_provinsi' => $provinsi_obyek,
                                'obyek_luas_tanah' => $luas_tanah,
                                'obyek_nilai_tanah_m2' => $nilai_tanah,
                                'obyek_penguasaan_tanah' => $obj_penguasaan,
                                'obyek_penguasaan_tanah_bukan_pemilik' => $obj_penguasaan_bukan_pemilik,
                                'obyek_penguasaan_tahan_bukan_pemilik_lainnya' => $obj_penguasaan_bukan_pemilik_lainnya,
                                'obyek_perolehan_tanah' => $obj_perolehan,
                                'obyek_perolehan_tanah_lainnya' => $obj_perolehan_lainnya,
                                'obyek_pemilikan_tanah' => $obj_pemilikan,
                                'obyek_pemilikan_tanah_belum_terdaftar' => $obj_pemilikan_belum,
                                'obyek_pemilikan_tanah_sertifikat_no' => $obj_pemilikan_sertifikat,
                                'obyek_penggunaan_bidang_tanah' => $obj_penggunaan,
                                'obyek_penggunaan_bidang_tanah_lainnya' => $obj_penggunaan_lainnya,
                                'obyek_jenis_pemanfaatan_tempat_tinggal' => $man_tempat_tinggal,
                                'obyek_jenis_pemanfaatan_pertanian' => $man_pertanian,
                                'obyek_jenis_pemanfaatan_pertanian_lainnya' => $man_pertanian_lainnya,
                                'obyek_jenis_pemanaatan_ekonomi_perdaganan' => $man_ekonomi,
                                'obyek_jenis_pemanaatan_ekonomi_perdaganan_lainnya' => $man_ekonomi_lainnya,
                                'obyek_jenis_pemanfaatan_usaha_jasa' => $man_jasa,
                                'obyek_jenis_pemanfaatan_usaha_jasa_lainnya' => $man_jasa_lainnya,
                                'obyek_jenis_pemanfaatan_fasos_fasum' => $man_fasum,
                                'obyek_jenis_pemanfaatan_fasos_fasum_lainnya' => $man_fasum_lainnya,
                                'obyek_jenis_pemanfaatan_tidak_ada_manfaat' => $man_tidak,
                                'obyek_sengketa_konflik_perkara' => $skp_tanah,
                                'obyek_potensi_landreform' => $obj_landreform,
                                'obyek_potensi_landreform_option' => $obj_landreform_option,
                                'obyek_potensi_landreform_option_lainnya' => $obj_landreform_option_lainnya,
                                'obyek_koordinat_x' => $koordinat_x,
                                'obyek_koordinat_y' => $koordinat_y,
                                'obyek_input_user_id' => $this->session->userdata('user_id'),
                                'obyek_input_datetime' => date('Y-m-d H:i:s')
                            );

                            $this->db->insert('tbl_obyek', $data_obyek);

                            // konfigurasi penuasaan
                            if(!empty($rt_rw_penguasaan)){
                                $rtrw_penguasaan = explode('/', $rt_rw_penguasaan);
                                $rt_penguasaan = $rtrw_penguasaan[0];
                                $rw_penguasaan = $rtrw_penguasaan[1];
                            } else {
                                $rt_penguasaan = '';
                                $rw_penguasaan = '';
                            }

                            if($kabupaten_penguasaan != ''){
                                $kab_penguasaan = $this->excel_import_model->get_kabupaten_code($kabupaten_penguasaan);
                                $kabupaten_penguasaan = $kab_penguasaan->kabupaten_id;
                                $provinsi_penguasaan = $kab_penguasaan->kabupaten_provinsi_id;
                                if($kecamatan_penguasaan != ''){
                                    $kec_penguasaan = $this->excel_import_model->get_kecamatan_code($kecamatan_penguasaan, $kabupaten_penguasaan);
                                    if($kelurahan_penguasaan != ''){
                                        $kel_penguasaan = $this->excel_import_model->get_kelurahan_code($kelurahan_penguasaan, $kec_penguasaan);
                                    } else {
                                        $kel_penguasaan = '';
                                    }
                                } else {
                                    $kec_penguasaan = '';
                                }
                            } else {
                                $kec_penguasaan = '';
                                $kel_penguasaan = '';
                                $kabupaten_penguasaan = '';
                                $provinsi_penguasaan = '';
                            }

                            if($domisili_penguasaan != '') {
                                if($domisili_penguasaan == "Desa Ini") {
                                    $dom_penguasaan = 1;
                                    $dom_penguasaan_lainnya = '';
                                } else if ($domisili_penguasaan == "Desa Lain Berbatasan Langsung") {
                                    $dom_penguasaan = 2;
                                    $dom_penguasaan_lainnya = '';
                                } else if ($domisili_penguasaan == "Desa Lain Tidak Berbatasan Langsung") {
                                    $dom_penguasaan = 3;
                                    $dom_penguasaan_lainnya = '';
                                } else if ($domisili_penguasaan == "Diluar Kecamatan") {
                                    $dom_penguasaan = 4;
                                    $dom_penguasaan_lainnya = '';
                                } else {
                                    $dom_penguasaan = 5;
                                    $dom_penguasaan_lainnya = $domisili_penguasaan;
                                }
                            } else {
                                $dom_penguasaan = '';
                                $dom_penguasaan_lainnya = '';
                            }

                            if($status_perkawinan_penguasaan == "Belum Menikah") {
                                $stat_penguasaan = 1;
                            } else if ($status_perkawinan_penguasaan == "Menikah") {
                                $stat_penguasaan = 2;
                            } else if ($status_perkawinan_penguasaan == "Pernah Menikah"){
                                $stat_penguasaan = 3;
                            } else {
                                $stat_penguasaan = '';
                            }


                            $data_penguasaan = array(
                            'subyek_penguasaan_obyek_id' => $this->excel_import_model->get_last_id_obyek(),
                            'subyek_penguasaan_nama' => $nama_penguasaan,
                            'subyek_penguasaan_jalan' => $jalan_penguasaan,
                            'subyek_penguasaan_rt' => $rt_penguasaan,
                            'subyek_penguasaan_rw' => $rw_penguasaan,
                            'subyek_penguasaan_desa_kelurahan' => $kel_penguasaan,
                            'subyek_penguasaan_kecamatan' => $kec_penguasaan,
                            'subyek_penguasaan_kabupaten_kota' => $kabupaten_penguasaan,
                            'subyek_penguasaan_provinsi' => $provinsi_penguasaan,
                            'subyek_penguasaan_nomor_ktp' => $ktp_penguasaan,
                            'subyek_penguasaan_pekerjaan' => $pekerjaan_penguasaan,
                            'subyek_penguasaan_umur' => $umur_penguasaan,
                            'subyek_penguasaan_status_perkawinan' => $stat_penguasaan,
                            'subyek_penguasaan_jumlah_anggota_keluarga' => $anggota_keluarga_penguasaan,
                            'subyek_penguasaan_domisili' => $dom_penguasaan,
                            'subyek_penguasaan_domisili_lainnya' => $dom_penguasaan_lainnya,
                            'subyek_penguasaan_tahun_memiliki_tanah' => $tahun_tahan_penguasaan,
                            'subyek_penguasaan_input_user_id' => $this->session->userdata('user_id'),
                            'subyek_penguasaan_input_datetime' => date('Y-m-d H:i:s')
                            );

                            $this->db->insert('tbl_subyek_penguasaan', $data_penguasaan);

                            // konfigurasi akses
                            if (empty($potensi_akses)) {
                                $aks_potensi = "";
                                $aks_potensi_lainnya = "";
                            } else {
                                $pot = explode(',', $potensi_akses);
                                $tot_pot = count($pot);
                                for ($i=0; $i < $tot_pot; $i++) {
                                    if(
                                    ($pot[$i] != 'Pertanian') ||
                                    ($pot[$i] != 'Perternakan') ||
                                    ($pot[$i] != 'Perkebunan') ||
                                    ($pot[$i] != 'Perikanan') ||
                                    ($pot[$i] != 'Industri Kecil')
                                    ) {
                                        $ch1 = str_replace("$pot[$i]","Lainnya",$potensi_akses);
                                        $ch2 = str_replace(', ',',',$ch1);
                                        $ch3 = str_replace(',','","',$ch2);
                                        $aks_potensi = '["'.$ch3.'"]';
                                        $aks_potensi_lainnya = $pot[$i];
                                    } else {
                                        $aks_potensi = $potensi_akses;
                                        $aks_potensi_lainnya = "";
                                    }
                                }
                            }

                            $data_akses = array(
                            'akses_obyek_id' => $this->excel_import_model->get_last_id_obyek(),
                            'akses_inventaris_nomor' => $invent_aks,
                            'akses_sertifikat_dijamin' => $sertifikat_dijaminkan,
                            'akses_potensi' => $aks_potensi,
                            'akses_potensi_lainnya' => $aks_potensi_lainnya,
                            'akses_bantuan_jenis' => $jenis_bantuan,
                            'akses_bantuan_dari' => $bantuan_dari,
                            'akses_bantuan_tanggal' => $bantuan_tanggal,
                            'akses_pendapatan_sebelum' => $pendapatan_sebelum,
                            'akses_pendapatan_sesudah' => $pendapatan_sesudah,
                            'akses_input_user_id' => $this->session->userdata('user_id'),
                            'akses_input_datetime' => date('Y-m-d H:i:s')
                            );

                            $this->db->insert('tbl_akses', $data_akses);

                        }
                    }
                }
            }
            $this->session->set_flashdata('flash', 'Data Excel <b>Berhasil</b> Diimport');
            redirect('excel_import');
        }

        public function format_import()
        {
            $this->load->view('export/format_import');
        }
    }
