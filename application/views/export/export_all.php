<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Seluruh_Data.xls");
?>
<h3>Laporan Seluruh Data</h3>
<p>Tanggal Export : <?php echo $date; ?></p>

<?php
    if(isset($prov_nama)) {
        if(isset($kab)){
            if(isset($kec)){
                if(isset($kel)){
                    echo 'Filter => Kelurahan/Desa : <b> ' . $kel->kelurahan_nama . ' </b>| Kecamatan : <b> ' . $kec->kecamatan_nama . ' </b>| Kabupaten/Kota : <b> ' . $kab->kabupaten_nama . '</b>| Provinsi : <b>' . $prov_nama . '</b>';
                } else {
                    echo 'Filter => Kecamatan : <b> ' . $kec->kecamatan_nama . ' </b>| Kabupaten/Kota : <b> ' . $kab->kabupaten_nama . ' </b>| Provinsi : <b>' . $prov_nama . '</b>';
                }
            } else {
                echo 'Filter => Kabupaten/Kota : <b> ' . $kab->kabupaten_nama . ' </b>| Provinsi : <b>' . $prov_nama . '</b>';
            }
        } else {
            echo 'Filter => Provinsi : <b>' . $prov_nama . '</b>';
        }
    }
?>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Nomor Inventaris</th>
            <th>Nama Pemilik</th>
            <th>Data Pemilikan Jalan</th>
            <th>Data Pemilikan RT/RW</th>
            <th>Data Pemilikan Desa Kelurahan</th>
            <th>Data Pemilikan Kecamatan</th>
            <th>Data Pemilikan Kabupaten Kota</th>
            <th>Data Pemilikan No KTP</th>
            <th>Data Pemilikan Pekerjaan</th>
            <th>Data Pemilikan Umur</th>
            <th>Data Pemilikan Status Perkawinan</th>
            <th>Data Pemilikan Jumlah Anggota Keluarga</th>
            <th>Data Pemilikan Domisili Saat Ini</th>
            <th>Memiliki Tanah Sejak Tahun</th>
            <th>Nama Yang Menguasai</th>
            <th>Data Penguasaan Jalan</th>
            <th>Data Penguasaan RT/TW</th>
            <th>Data Penguasaan Desa Kelurahan</th>
            <th>Data Penguasaan Kecamatan</th>
            <th>Data Penguasaan Kabupaten Kota</th>
            <th>Data Penguasaan No. KTP</th>
            <th>Data Penguasaan Pekerjaan</th>
            <th>Data Penguasaan Umur</th>
            <th>Data Penguasaan Status Perkawinan</th>
            <th>Data Penguasaan Jumlah Anggota Keluarga</th>
            <th>Data Penguasaan Domisili Saat Ini</th>
            <th>Data Penguasaan Memiliki Tanah Sejak Tahun</th>
            <th>NIB</th>
            <th>NJOP_PBB</th>
            <th>Data Obyek Jalan</th>
            <th>Data Obyek RT/RT</th>
            <th>Data Obyek Desa Kelurahan</th>
            <th>Data Obyek Kecamatan</th>
            <th>Data Obyek Kabupaten Kota</th>
            <th>Luas Tanah (m2)</th>
            <th>Nilai Tanah per (m2)</th>
            <th>Penguasaan Tanah</th>
            <th>Perolehan Tanah</th>
            <th>Pemilikan Tanah</th>
            <th>Penggunaan Bidang Tanah Saat Ini</th>
            <th>Jenis Pemanfaatan Bidang Tanah Saat Ini</th>
            <th>Sengketa, Konflik dan Perkara Pertanahan</th>
            <th>Potensi Tanah Obyek Landreform</th>
            <th>Inventaris Akses</th>
            <th>Sertifikat Pernah Dijaminkan</th>
            <th>Potensi Akses</th>
            <th>Jenis Bantuan</th>
            <th>Dari</th>
            <th>Tanggal</th>
            <th>Pendapatan Sebelum Sertifikat</th>
            <th>Pendapatan Setelah Sertifikat</th>
            <th>Koordinat X</th>
            <th>Koordinat Y</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
        <?php
            $subyek_kab = $this->helper_model->get_kabupaten_name($row->subyek_provinsi, $row->subyek_kabupaten_kota)->row();
            $subyek_kec = $this->helper_model->get_kecamatan_name($row->subyek_kabupaten_kota, $row->subyek_kecamatan)->row();
            $subyek_kel = $this->helper_model->get_kelurahan_name($row->subyek_kecamatan ,$row->subyek_desa_kelurahan)->row();

            if(($row->subyek_penguasaan_provinsi != null) && ($row->subyek_penguasaan_kabupaten_kota != null)){
                $penguasaan_kab = $this->helper_model->get_kabupaten_name($row->subyek_penguasaan_provinsi, $row->subyek_penguasaan_kabupaten_kota)->row('kabupaten_nama');
            } else {
                $penguasaan_kab = '';
            }

            if(($row->subyek_penguasaan_kabupaten_kota != '') && ($row->subyek_penguasaan_kecamatan != '')){
                $penguasaan_kec = $this->helper_model->get_kecamatan_name($row->subyek_penguasaan_kabupaten_kota, $row->subyek_penguasaan_kecamatan)->row('kecamatan_nama');
            } else {
                $penguasaan_kec = '';
            }

            if(($row->subyek_penguasaan_kecamatan != '') && ($row->subyek_penguasaan_desa_kelurahan != '')){
                $penguasaan_kel = $this->helper_model->get_kelurahan_name($row->subyek_penguasaan_kecamatan ,$row->subyek_penguasaan_desa_kelurahan)->row('kelurahan_nama');
            } else {
                $penguasaan_kel = '';
            }

            if($row->subyek_penguasaan_nama != ''){
                if($row->subyek_status_perkawinan == 1){
                    $penguasaan_status = "Belum Menikah";
                } elseif($row->subyek_status_perkawinan == 2) {
                    $penguasaan_status = "Menikah";
                } else {
                    $penguasaan_status = "Pernah Menikah";
                }
                $status_penguasaan = $penguasaan_status;
                $umur_penguasaan = $row->subyek_penguasaan_umur;
                $keluarga_penguasaan = $row->subyek_penguasaan_jumlah_anggota_keluarga;
                $tahun_penguasaan_tanah = $row->subyek_penguasaan_tahun_memiliki_tanah;
                $rtrw_penguasaan = $row->subyek_penguasaan_rt.'/'.$row->subyek_penguasaan_rw;
            } else {
                $umur_penguasaan = '';
                $status_penguasaan = '';
                $keluarga_penguasaan = '';
                $tahun_penguasaan_tanah = '';
                $rtrw_penguasaan = '';
            }

            if(($row->obyek_provinsi != '') && ($row->obyek_kabupaten_kota != '')){
                $obyek_kab = $this->helper_model->get_kabupaten_name($row->obyek_provinsi, $row->obyek_kabupaten_kota)->row();
            } else {
                $obyek_kab = '';
            }

            if(($row->obyek_kabupaten_kota != '') && ($row->obyek_kecamatan != '')){
                $obyek_kec = $this->helper_model->get_kecamatan_name($row->obyek_kabupaten_kota, $row->obyek_kecamatan)->row();
            } else {
                $obyek_kec = '';
            }

            if(($row->obyek_kecamatan != '') && ($row->obyek_desa_kelurahan != '')){
                $obyek_kel = $this->helper_model->get_kelurahan_name($row->obyek_kecamatan ,$row->obyek_desa_kelurahan)->row();
            } else {
                $obyek_kel = '';
            }

            if($row->subyek_status_perkawinan == 1){
                $subyek_status = "Belum Menikah";
            } elseif($row->subyek_status_perkawinan == 2) {
                $subyek_status = "Menikah";
            } else {
                $subyek_status = "Pernah Menikah";
            }

            $subyek_status = $subyek_status;

            $dom = $row->subyek_domisili;
            if($dom == 1) {
                $domisili_subyek = "Desa Ini";
            } elseif ($dom == 2) {
                $domisili_subyek = "Desa Lain Berbatasan Langsung";
            } elseif ($dom == 3) {
                $domisili_subyek = "Desa Lain Tidak Berbatasan Langsung";
            } elseif ($dom == 4) {
                $domisili_subyek = "Diluar Kecamatan";
            } else{
                $domisili_subyek = $row->subyek_domisili_lainnya;
            }

            $dom_penguasaan = $row->subyek_penguasaan_domisili;
            if($dom_penguasaan == 1) {
                $domisili_Penguasaan = "Desa Ini";
            } elseif ($dom_penguasaan == 2) {
                $domisili_Penguasaan = "Desa Lain Berbatasan Langsung";
            } elseif ($dom_penguasaan == 3) {
                $domisili_Penguasaan = "Desa Lain Tidak Berbatasan Langsung";
            } elseif ($dom_penguasaan == 4) {
                $domisili_Penguasaan = "Diluar Kecamatan";
            } else{
                $domisili_Penguasaan = $row->subyek_penguasaan_domisili_lainnya;
            }

            $subyek_domisili = $domisili_subyek;
            $penguasaan_domisili = $domisili_Penguasaan;

            if($row->obyek_penguasaan_tanah == "Bukan Pemilik"){
                if($row->obyek_penguasaan_tanah_bukan_pemilik == "Lainnya"){
                    $penguasaan = $row->obyek_penguasaan_tahan_bukan_pemilik_lainnya;
                } else {
                    $penguasaan = $row->obyek_penguasaan_tanah_bukan_pemilik;
                }
            } else {
                $penguasaan = $row->obyek_penguasaan_tanah;
            }

            if($row->obyek_perolehan_tanah == "Lainnya"){
                $perolehan = $row->obyek_perolehan_tanah_lainnya;
            } else {
                $perolehan = $row->obyek_perolehan_tanah;
            }

            if($row->obyek_pemilikan_tanah == "Terdaftar"){
                $pemilikan = "Terdaftar," . $row->obyek_pemilikan_tanah_sertifikat_no;
            } else {
                if($row->obyek_pemilikan_tanah_belum_terdaftar == "Tanah Adat"){
                    $pemilikan = "Tanah Adat," . $row->obyek_pemilikan_tanah_sertifikat_no;
                } else {
                    $pemilikan = $row->obyek_pemilikan_tanah_belum_terdaftar;
                }
            }

            $pemilikan = $pemilikan;

            if($row->obyek_penggunaan_bidang_tanah == "Lainnya"){
                $penggunaan = $row->obyek_penggunaan_bidang_tanah_lainnya;
            } else {
                $penggunaan = $row->obyek_penggunaan_bidang_tanah;
            }

            if($row->obyek_jenis_pemanfaatan_tidak_ada_manfaat == ''){
                $tempat_tinggal = $row->obyek_jenis_pemanfaatan_tempat_tinggal;

                if($row->obyek_jenis_pemanfaatan_pertanian != '') {
                    $pertanian = json_decode($row->obyek_jenis_pemanfaatan_pertanian);

                    if(in_array("Lainnya", $pertanian)){
                        unset($pertanian[count($pertanian) -1]);
                        if(count($pertanian) == 0){
                            $res_pertanian = '-Kegiatan Produksi Pertanian(' . implode(', ', $pertanian) . $row->obyek_jenis_pemanfaatan_pertanian_lainnya . ")";
                        } else {
                            $res_pertanian = '-Kegiatan Produksi Pertanian(' . implode(', ', $pertanian) . ', ' . $row->obyek_jenis_pemanfaatan_pertanian_lainnya . ")";
                        }
                    } else {
                        $res_pertanian = '-Kegiatan Produksi Pertanian(' . implode(', ', $pertanian) . ')';
                    }
                } else {
                    $res_pertanian = '';
                }

                if($row->obyek_jenis_pemanaatan_ekonomi_perdaganan != '') {
                    $ekonomi = json_decode($row->obyek_jenis_pemanaatan_ekonomi_perdaganan);

                    if(in_array("Lainnya", $ekonomi)){
                        unset($ekonomi[count($ekonomi) -1]);
                        if(count($ekonomi) == 0){
                            $res_ekonomi = '-Kegiatan Ekonomi/Perdagangan(' . implode(', ', $ekonomi) . $row->obyek_jenis_pemanaatan_ekonomi_perdaganan_lainnya . ")";
                        } else {
                            $res_ekonomi = '-Kegiatan Ekonomi/Perdagangan(' . implode(', ', $ekonomi) . ', ' . $row->obyek_jenis_pemanaatan_ekonomi_perdaganan_lainnya . ")";
                        }
                    } else {
                        $res_ekonomi = '-Kegiatan Ekonomi/Perdagangan(' . implode(', ', $ekonomi) . ')';
                    }
                } else {
                    $res_ekonomi = '';
                }

                if($row->obyek_jenis_pemanfaatan_usaha_jasa != '') {
                    $usaha = json_decode($row->obyek_jenis_pemanfaatan_usaha_jasa);

                    if(in_array("Lainnya", $usaha)){
                        unset($usaha[count($usaha) -1]);
                        if(count($usaha) == 0){
                            $res_usaha = '-Usaha Jasa(' . implode(', ', $usaha) . $row->obyek_jenis_pemanfaatan_usaha_jasa_lainnya . ")";
                        } else {
                            $res_usaha = '-Usaha Jasa(' . implode(', ', $usaha) . ', ' . $row->obyek_jenis_pemanfaatan_usaha_jasa_lainnya . ")";
                        }
                    } else {
                        $res_usaha = '-Usaha Jasa(' . implode(', ', $usaha) . ')';
                    }
                } else {
                    $res_usaha = '';
                }

                if($row->obyek_jenis_pemanfaatan_fasos_fasum != '') {
                    $fasos = json_decode($row->obyek_jenis_pemanfaatan_fasos_fasum);

                    if(in_array("Lainnya", $fasos)){
                        unset($fasos[count($fasos) -1]);
                        if(count($fasos) == 0){
                            $res_fasos = '-Fasos/Fasum(' . implode(', ', $fasos) . $row->obyek_jenis_pemanfaatan_fasos_fasum_lainnya . ")";
                        } else {
                            $res_fasos = '-Fasos/Fasum(' . implode(', ', $fasos) . ', ' . $row->obyek_jenis_pemanfaatan_fasos_fasum_lainnya . ")";
                        }
                    } else {
                        $res_fasos = '-Fasos/Fasum(' . implode(', ', $fasos) . ')';
                    }
                } else {
                    $res_fasos = '';
                }

                $pemanfaatan = $tempat_tinggal . $res_pertanian . $res_ekonomi . $res_usaha . $res_fasos;
            } else {
                $pemanfaatan = "Tidak Ada Pemanfaatan";
            }

            if($row->obyek_potensi_landreform == "Tanah Negara Lainnya"){
                if($row->obyek_potensi_landreform_option == "HGU Habis"){
                    $landreform = "HGU Habis(" . $row->obyek_potensi_landreform_option_lainnya . ")";
                } else if($row->obyek_potensi_landreform_option == "Pelepasan HGU"){
                    $landreform = "Pelepasan HGU(" . $row->obyek_potensi_landreform_option_lainnya . ")";
                } else {
                    $landreform = $row->obyek_potensi_landreform_option;
                }
            } else {
                $landreform = $row->obyek_potensi_landreform;
            }

            if($row->akses_inventaris_nomor != ''){

                if($row->akses_potensi != '') {
                    $potensi = json_decode($row->akses_potensi);

                    if(in_array("Lainnya", $potensi)){
                        unset($potensi[count($potensi) -1]);
                        if(count($potensi) == 0){
                            $res_potensi = implode(',', $potensi) . $row->akses_potensi_lainnya;
                        } else {
                            $res_potensi = implode(',', $potensi) . ', ' . $row->akses_potensi_lainnya;
                        }
                    } else {
                        $res_potensi = implode(',', $potensi);
                    }
                } else {
                    $res_potensi = '';
                }

                $potensi = $res_potensi;
                $tanggal_akses = $row->akses_bantuan_tanggal;
                $pendapatan_sebelum = $row->akses_pendapatan_sebelum;
                $pendapatan_sesudah = $row->akses_pendapatan_sesudah;
             } else {
                $potensi = '';
                $tanggal_akses = '';
                $pendapatan_sebelum = '';
                $pendapatan_sesudah = '';
            }
        ?>
            <tr>
                <td><?php echo $row->obyek_nomor_inventaris; ?></td>
                <td><?php echo $row->subyek_nama; ?></td>
                <td><?php echo $row->subyek_jalan; ?></td>
                <td><?php echo $row->subyek_rt.'/'.$row->subyek_rw; ?></td>
                <td><?php echo $subyek_kel->kelurahan_nama; ?></td>
                <td><?php echo $subyek_kec->kecamatan_nama; ?></td>
                <td><?php echo $subyek_kab->kabupaten_nama; ?></td>
                <td><?php echo $row->subyek_nomor_ktp; ?></td>
                <td><?php echo $row->subyek_pekerjaan; ?></td>
                <td><?php echo $row->subyek_umur; ?></td>
                <td><?php echo $subyek_status; ?></td>
                <td><?php echo $row->subyek_jumlah_anggota_keluarga; ?></td>
                <td><?php echo $subyek_domisili; ?></td>
                <td><?php echo $row->subyek_tahun_memiliki_tanah; ?></td>
                <td><?php echo $row->subyek_penguasaan_nama; ?></td>
                <td><?php echo $row->subyek_penguasaan_jalan; ?></td>
                <td><?php echo $rtrw_penguasaan; ?></td>
                <td><?php echo $penguasaan_kel != '' ? $penguasaan_kel : ''; ?></td>
                <td><?php echo $penguasaan_kec != '' ? $penguasaan_kec : ''; ?></td>
                <td><?php echo $penguasaan_kab != '' ? $penguasaan_kab : ''; ?></td>
                <td><?php echo $row->subyek_penguasaan_nomor_ktp; ?></td>
                <td><?php echo $row->subyek_penguasaan_pekerjaan; ?></td>
                <td><?php echo $umur_penguasaan; ?></td>
                <td><?php echo $status_penguasaan; ?></td>
                <td><?php echo $keluarga_penguasaan; ?></td>
                <td><?php echo $penguasaan_domisili; ?></td>
                <td><?php echo $tahun_penguasaan_tanah; ?></td>
                <td><?php echo $row->obyek_nib; ?></td>
                <td><?php echo $row->obyek_pbb; ?></td>
                <td><?php echo $row->obyek_jalan; ?></td>
                <td><?php echo $row->obyek_rt.'/'.$row->obyek_rt; ?></td>
                <td><?php echo $obyek_kel->kelurahan_nama; ?></td>
                <td><?php echo $obyek_kec->kecamatan_nama; ?></td>
                <td><?php echo $obyek_kab->kabupaten_nama; ?></td>
                <td><?php echo $row->obyek_luas_tanah; ?></td>
                <td><?php echo $row->obyek_nilai_tanah_m2; ?></td>
                <td><?php echo $penguasaan; ?></td>
                <td><?php echo $perolehan; ?></td>
                <td><?php echo $pemilikan; ?></td>
                <td><?php echo $penggunaan; ?></td>
                <td><?php echo $pemanfaatan; ?></td>
                <td><?php echo $row->obyek_sengketa_konflik_perkara; ?></td>
                <td><?php echo $landreform; ?></td>
                <td><?php echo $row->akses_inventaris_nomor; ?></td>
                <td><?php echo $row->akses_sertifikat_dijamin; ?></td>
                <td><?php echo $potensi; ?></td>
                <td><?php echo $row->akses_bantuan_jenis; ?></td>
                <td><?php echo $row->akses_bantuan_dari; ?></td>
                <td><?php echo $tanggal_akses; ?></td>
                <td><?php echo $pendapatan_sebelum; ?></td>
                <td><?php echo $pendapatan_sesudah; ?></td>
                <td><?php echo $row->obyek_koordinat_x; ?></td>
                <td><?php echo $row->obyek_koordinat_y; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
