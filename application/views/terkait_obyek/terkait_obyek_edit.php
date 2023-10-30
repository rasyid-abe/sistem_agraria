<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="row element_hide" id="alert_ktp">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Subyek <strong>Tidak Ditemukan.</strong> Mohon isi data subyek terlebih dahulu.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Form <?php echo $sub_title . ' ' . $header_title ?></h5>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-12 col-sm-3">KTP Subyek : <b><?php echo $ktp_subyek ?></b></label>
                </div>
                <div class="form-group row">
                    <label class="col-12 col-sm-3">Nama : <b><?php echo $nama_subyek; ?></b></label>
                </div>
                <form action="<?php echo base_url() ?>terkait_obyek/action_edit" method="post">
                    <input type="hidden" name="id_obyek" id="id_obyek" value="<?php echo $query->obyek_id ?>">
                    <input type="hidden" name="id_suyek" id="id_subyek" value="<?php echo $query->obyek_subyek_id ?>">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nomor Inventarisasi (NIS)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="nis" class="form-control" value="<?php echo $query->obyek_nomor_inventaris ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nomor Idenfikasi Bidang</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="nib" class="form-control" value="<?php echo $query->obyek_nib ?>" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nomor Pajak Bumi & Bangunan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="pbb" class="form-control" value="<?php echo $query->obyek_pbb ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Provinsi</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="provinsi" id="provinsi" onchange="change_provinsi()" required>
                                <option value="<?php echo $prov_id ?>"><?php echo $prov_nama; ?></option>
                                <?php foreach ($provinsi as $row) { ?>
                                    <option value="<?php echo $row->provinsi_id; ?>"><?php echo $row->provinsi_nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Kabupaten / Kota</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="kabupaten" id="kabupaten" onchange="change_kabupaten()" required>
                                <option value="<?php echo $kab->kabupaten_id ?>"><?php echo $kab->kabupaten_nama; ?></option>
                                <?php foreach ($kabupaten as $row) { ?>
                                    <option value="<?php echo $row->kabupaten_id; ?>"><?php echo $row->kabupaten_nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Kecamatan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="kecamatan" id="kecamatan" onchange="change_kecamatan()"  required>
                                <option value="<?php echo $kec->kecamatan_id ?>"><?php echo $kec->kecamatan_nama ?></option>
                                <?php foreach ($kecamatan as $row) { ?>
                                    <option value="<?php echo $row->kecamatan_id; ?>"><?php echo $row->kecamatan_nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Desa / Kelurahan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="kelurahan" id="kelurahan" required>
                                <option value="<?php echo $kel->kelurahan_id ?>"><?php echo $kel->kelurahan_nama ?></option>
                                <?php foreach ($kelurahan as $row) { ?>
                                    <option value="<?php echo $row->kelurahan_id; ?>"><?php echo $row->kelurahan_nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">RT/RW</label>
                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                            <input type="text" value="<?php echo $query->obyek_rt ?>" name="rt" class="form-control" required>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <input type="text" value="<?php echo $query->obyek_rw ?>" name="rw" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jalan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="jalan" class="form-control" value="<?php echo $query->obyek_jalan ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Koordinat Peta</label>
                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                            <input type="text" value="<?php echo $query->obyek_koordinat_x ?>" name="koordinat_x" class="form-control" required>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <input type="text" value="<?php echo $query->obyek_koordinat_y ?>" name="koordinat_y" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Luas Tanah (m2)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="luas_tanah" class="form-control" value="<?php echo $query->obyek_luas_tanah ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nilai Tanah per m2</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="nilai_tanah" class="form-control" value="<?php echo $query->obyek_nilai_tanah_m2 ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Penguasaan Tanah</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="penguasaan" id="penguasaan" required>
                                <option value="<?php echo $query->obyek_penguasaan_tanah ?>"><?php echo $query->obyek_penguasaan_tanah ?></option>
                                <option value="Pemilik">Pemilik</option>
                                <option value="Bukan Pemilik">Bukan Pemilik</option>
                                <option value="Bersama / Ulayat">Bersama / Ulayat</option>
                                <option value="Badan Hukum">Badan Hukum</option>
                                <option value="Pemerintah">Pemerintah</option>
                                <option value="Tidak Ada Penguasaan Tanah">Tidak Ada Penguasaan Tanah</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row <?php echo $query->obyek_penguasaan_tanah == 'Bukan Pemilik' ? '' : 'element_hide'; ?>" id="radio_penguasaan">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right"></label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="not_owner" class="custom-control-input" value="Gadai"  onchange="hide_text_lainnya()"<?php if($query->obyek_penguasaan_tanah_bukan_pemilik == "Gadai") {echo "checked";}?>><span class="custom-control-label">Gadai</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="not_owner" class="custom-control-input" value="Sewa"  onchange="hide_text_lainnya()"<?php if($query->obyek_penguasaan_tanah_bukan_pemilik == "Sewa") {echo "checked";}?>><span class="custom-control-label">Sewa</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="not_owner" class="custom-control-input" value="Pinjam Pakai"  onchange="hide_text_lainnya()"<?php if($query->obyek_penguasaan_tanah_bukan_pemilik == "Pinjam Pakai") {echo "checked";}?>><span class="custom-control-label">Pinjam Pakai</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="not_owner" class="custom-control-input" value="Penggarap"  onchange="hide_text_lainnya()"<?php if($query->obyek_penguasaan_tanah_bukan_pemilik == "Penggarap") {echo "checked";}?>><span class="custom-control-label">Penggarap</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="not_owner" class="custom-control-input" value="Lainnya"  onchange="show_text_lainnya()"<?php if($query->obyek_penguasaan_tanah_bukan_pemilik == "Lainnya") {echo "checked";}?>><span class="custom-control-label">Lainnya</span>
                            </label>
                            <input type="<?php echo $query->obyek_penguasaan_tanah_bukan_pemilik != "Lainnya" ? 'hidden' : 'text'; ?>" name="not_owner_lainnya" id="not_owner_lainnya" class="form-control" value="<?php echo $query->obyek_penguasaan_tahan_bukan_pemilik_lainnya ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Perolehan Tanah</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="perolehan_tanah" value="Warisan" class="custom-control-input" onchange="hide_perolehan_lainnya()" <?php if($query->obyek_perolehan_tanah == "Warisan") {echo "checked";}?>><span class="custom-control-label">Warisan</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="perolehan_tanah" value="Jual-Beli" class="custom-control-input" onchange="hide_perolehan_lainnya()" <?php if($query->obyek_perolehan_tanah == "Jual-Beli") {echo "checked";}?>><span class="custom-control-label">Jual-Beli</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="perolehan_tanah" value="Tukar Menukar" class="custom-control-input" onchange="hide_perolehan_lainnya()" <?php if($query->obyek_perolehan_tanah == "Tukar Menukar") {echo "checked";}?>><span class="custom-control-label">Tukar Menukar</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="perolehan_tanah" name="perolehan_tanah" value="Lainnya" class="custom-control-input" onchange="show_perolehan_lainnya()" <?php if($query->obyek_perolehan_tanah == "Lainnya") {echo "checked";}?>><span class="custom-control-label">Lainnya</span>
                            </label>
                            <input type="<?php echo $query->obyek_perolehan_tanah != "Lainnya" ? 'hidden' : 'text'; ?>" name="perolehan_lainnya" id="perolehan_lainnya" class="form-control" value="<?php echo $query->obyek_perolehan_tanah_lainnya ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Pemilikan Tanah</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pemilikan_tanah1" name="pemilikan_tanah" value="Terdaftar" class="custom-control-input" onchange="no_sertifikat()" <?php if($query->obyek_pemilikan_tanah == "Terdaftar") {echo "checked";}?>><span class="custom-control-label">Terdaftar</span>
                            </label>
                            <input type="<?php echo $query->obyek_pemilikan_tanah != "Terdaftar" ? 'hidden' : 'text'; ?>" name="pemilikan_sertifikat_no" id="pemilikan_sertifikat_no" class="form-control" value="<?php echo $query->obyek_pemilikan_tanah_sertifikat_no ?>" placeholder="Masukkan Nomor Sertifikat">
                            <label class="custom-control custom-radio custom-control">
                                <input type="radio" id="pemilikan_tanah2" name="pemilikan_tanah" value="Belum Terdaftar" class="custom-control-input" onchange="no_surat()" <?php if($query->obyek_pemilikan_tanah == "Belum Terdaftar") {echo "checked";}?>><span class="custom-control-label">Belum Terdaftar</span>
                            </label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <div class="form-group row <?php echo $query->obyek_pemilikan_tanah == 'Belum Terdaftar' ? '' : 'element_hide'; ?>" id="radio_belum_terdaftar">
                                    <label></label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="belum_terdaftar" class="custom-control-input" value="Tanah Adat"  onchange="show_no_surat()"<?php if($query->obyek_pemilikan_tanah_belum_terdaftar == "Tanah Adat") {echo "checked";}?>><span class="custom-control-label">Tanah Adat</span>
                                    </label>
                                    <input type="<?php echo $query->obyek_pemilikan_tanah_belum_terdaftar != "Tanah Adat" ? 'hidden' : 'text'; ?>" name="surat_no" id="surat_no" class="form-control" value="<?php echo $query->obyek_pemilikan_tanah_sertifikat_no ?>" placeholder="Masukkan Surat Nomor">
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="belum_terdaftar" class="custom-control-input" value="Tanah Ulayat"  onchange="hide_no_surat()"<?php if($query->obyek_pemilikan_tanah_belum_terdaftar == "Tanah Ulayat") {echo "checked";}?>><span class="custom-control-label">Tanah Ulayat</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="belum_terdaftar" class="custom-control-input" value="Tanah Negara"  onchange="hide_no_surat()"<?php if($query->obyek_pemilikan_tanah_belum_terdaftar == "Tanah Negara") {echo "checked";}?>><span class="custom-control-label">Tanah Negara</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Penggunaan Bidang Tanah</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Pemukiman, Perkampungan" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Pemukiman, Perkampungan") {echo "checked";}?>><span class="custom-control-label">Pemukiman, Perkampungan</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Sawah Irigasi" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Sawah Irigasi") {echo "checked";}?>><span class="custom-control-label">Sawah Irigasi</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Sawah Non Irigasi" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Sawah Non Irigasi") {echo "checked";}?>><span class="custom-control-label">Sawah Non Irigasi</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Tegalan, Ladang" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Tegalan, Ladang") {echo "checked";}?>><span class="custom-control-label">Tegalan, Ladang</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Kebun Campuran" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Kebun Campuran") {echo "checked";}?>><span class="custom-control-label">Kebun Campuran</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Perairan Datar, Tambak" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Perairan Datar, Tambak") {echo "checked";}?>><span class="custom-control-label">Perairan Datar, Tambak</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Tanah Terbuka, Tanah Kosong" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Tanah Terbuka, Tanah Kosong") {echo "checked";}?>><span class="custom-control-label">Tanah Terbuka, Tanah Kosong</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Fasum, Fasos" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Fasum, Fasos") {echo "checked";}?>><span class="custom-control-label">Fasum, Fasos</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Industri" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Industri") {echo "checked";}?>><span class="custom-control-label">Industri</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pengunaan_bidang_tanah" value="Peternakan" class="custom-control-input"onchange="hide_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Peternakan") {echo "checked";}?>><span class="custom-control-label">Peternakan</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pengunaan_bidang_tanah" name="pengunaan_bidang_tanah" value="Lainnya" class="custom-control-input" onchange="show_pengunaan_bidang_lainnya()" <?php if($query->obyek_penggunaan_bidang_tanah == "Lainnya") {echo "checked";}?>><span class="custom-control-label">Lainnya</span>
                            </label>
                            <input type="<?php echo $query->obyek_penggunaan_bidang_tanah != "Lainnya" ? 'hidden' : 'text'; ?>" name="pengunaan_bidang_lainnya" id="pengunaan_bidang_lainnya" class="form-control" value="<?php echo $query->obyek_penggunaan_bidang_tanah_lainnya ?>" placeholder="Masukkan Lainnya">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Pemanfaatan Bidang Tanah</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-checkbox custom-control">
                                <input type="checkbox" name="rumah_tinggal" value="Rumah Tinggal" class="custom-control-input" <?php if($query->obyek_jenis_pemanfaatan_tempat_tinggal == "Rumah Tinggal") {echo "checked";}?>><span class="custom-control-label">Tempat Tinggal (Rumah)</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control">
                                <input type="checkbox" id="kegiatan_pertanian" name="produksi_pertanian" value="Kegiatan Produksi Pertanian"  class="custom-control-input" onclick="show_kegiatan_pertanian()" <?php if($query->obyek_jenis_pemanfaatan_pertanian != '') {echo "checked";}?>><span class="custom-control-label">Kegiatan Produksi Pertanian</span>
                            </label>
                            <div class="<?php echo $query->obyek_jenis_pemanfaatan_pertanian != '' ? '' : 'element_hide'; ?>" id="produksi_pertanian">
                                <p>Pilih Kegiatan :</p>
                                <?php
                                if($query->obyek_jenis_pemanfaatan_pertanian != '') {
                                    $cek = json_decode($query->obyek_jenis_pemanfaatan_pertanian);
                                    $check = array("Tanaman Musiman", "Tanaman Keras", "Lainnya");
                                    if (in_array($check[0], $cek)){
                                        $checked1 ="checked";
                                    } else {
                                        $checked1 ="";
                                    }

                                    if (in_array($check[1], $cek)){
                                        $checked2 ="checked";
                                    } else {
                                        $checked2 ="";
                                    }

                                    if (in_array($check[2], $cek)){
                                        $checked3 ="checked";
                                    } else {
                                        $checked3 ="";
                                    }
                                } else {
                                    $checked1 ="";
                                    $checked2 ="";
                                    $checked3 ="";
                                }
                                ?>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="produksi_pertanian[]" value="Tanaman Musiman" class="custom-control-input" <?php echo $checked1;?>><span class="custom-control-label">Tanaman Musiman</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="produksi_pertanian[]" value="Tanaman Keras" class="custom-control-input" <?php echo $checked2;?>><span class="custom-control-label">Tanaman Keras</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="produksi_pertanian[]" onclick="show_produksi_pertanian_lainnya()" id="produksi_tanaman_lainnya" value="Lainnya" class="custom-control-input" <?php echo $checked3;?>><span class="custom-control-label">Lainnya</span>
                                </label>
                                <input type="<?php echo $checked3 == 'checked' ? 'text' : 'hidden'; ?>" name="produksi_pertanian_lainnya" id="produksi_pertanian_lainnya" class="form-control"  placeholder="Masukkan Lainnya" value="<?php echo $query->obyek_jenis_pemanfaatan_pertanian_lainnya ?>">
                                <hr>
                            </div>
                            <label class="custom-control custom-checkbox custom-control">
                                <input type="checkbox" id="kegiatan_ekonomi" name="ekonomi" value="Kegiatan Ekonomi/Perdagangan" class="custom-control-input" onclick="show_kegiatan_ekonomi()" <?php if($query->obyek_jenis_pemanaatan_ekonomi_perdaganan != '') {echo "checked";}?> ><span class="custom-control-label">Kegiatan Ekonomi/Perdagangan</span>
                            </label>
                            <div class="<?php echo $query->obyek_jenis_pemanaatan_ekonomi_perdaganan != '' ? '' : 'element_hide'; ?>" id="ekonomi">
                                <p>Pilih Kegiatan :</p>
                                <?php
                                if($query->obyek_jenis_pemanaatan_ekonomi_perdaganan != ''){
                                    $cek = json_decode($query->obyek_jenis_pemanaatan_ekonomi_perdaganan);
                                    $check = array("Kontrakan", "Toko", "Kantor", "Gudang", "Pabrik/Industri", "Lainnya");
                                    if (in_array($check[0], $cek)){
                                        $checked1 ="checked";
                                    } else {
                                        $checked1 ="";
                                    }

                                    if (in_array($check[1], $cek)){
                                        $checked2 ="checked";
                                    } else {
                                        $checked2 ="";
                                    }

                                    if (in_array($check[2], $cek)){
                                        $checked3 ="checked";
                                    } else {
                                        $checked3 ="";
                                    }

                                    if (in_array($check[3], $cek)){
                                        $checked4 ="checked";
                                    } else {
                                        $checked4 ="";
                                    }

                                    if (in_array($check[4], $cek)){
                                        $checked5 ="checked";
                                    } else {
                                        $checked5 ="";
                                    }

                                    if (in_array($check[5], $cek)){
                                        $checked6 ="checked";
                                    } else {
                                        $checked6 ="";
                                    }
                                } else {
                                    $checked1 ="";
                                    $checked2 ="";
                                    $checked3 ="";
                                    $checked4 ="";
                                    $checked5 ="";
                                    $checked6 ="";
                                }
                                ?>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="ekonomi[]" value="Kontrakan" class="custom-control-input" <?php echo $checked1 ?>><span class="custom-control-label">Kontrakan</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="ekonomi[]" value="Toko" class="custom-control-input" <?php echo $checked2 ?>><span class="custom-control-label">Toko</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="ekonomi[]" value="Kantor" class="custom-control-input" <?php echo $checked3 ?>><span class="custom-control-label">Kantor</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="ekonomi[]" value="Gudang" class="custom-control-input" <?php echo $checked4 ?>><span class="custom-control-label">Gudang</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="ekonomi[]" value="Pabrik/Industri" class="custom-control-input" <?php echo $checked5 ?>><span class="custom-control-label">Pabrik/Industri</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="ekonomi[]" onclick="show_kegiatan_ekonomi_lainnya()" id="kegiatan_ekonomi_lainnya" value="Lainnya" class="custom-control-input" <?php echo $checked6 ?>><span class="custom-control-label">Lainnya</span>
                                </label>
                                <input type="<?php echo $checked6 == 'checked' ? 'text' : 'hidden'; ?>" name="ekonomi_lainnya" id="ekonomi_lainnya" class="form-control" placeholder="Masukkan Lainnya" value="<?php echo $query->obyek_jenis_pemanaatan_ekonomi_perdaganan_lainnya ?>">
                                <hr>
                            </div>
                            <label class="custom-control custom-checkbox custom-control">
                                <input type="checkbox" id="jasa" name="jasa" value="Usaha Jasa" class="custom-control-input" onclick="show_jasa()" <?php if($query->obyek_jenis_pemanfaatan_usaha_jasa != '') {echo "checked";}?> ><span class="custom-control-label">Usaha Jasa</span>
                            </label>
                            <div class="<?php echo $query->obyek_jenis_pemanfaatan_usaha_jasa != '' ? '' : 'element_hide'; ?>" id="usaha_jasa">
                                <p>Pilih Usaha Jasa :</p>
                                <?php
                                if($query->obyek_jenis_pemanfaatan_usaha_jasa != ''){
                                    $cek = json_decode($query->obyek_jenis_pemanfaatan_usaha_jasa);
                                    $check = array("Telekomunikasi", "Transportasi", "Lainnya");
                                    if (in_array($check[0], $cek)){
                                        $checked1 ="checked";
                                    } else {
                                        $checked1 ="";
                                    }

                                    if (in_array($check[1], $cek)){
                                        $checked2 ="checked";
                                    } else {
                                        $checked2 ="";
                                    }

                                    if (in_array($check[2], $cek)){
                                        $checked3 ="checked";
                                    } else {
                                        $checked3 ="";
                                    }
                                } else{
                                    $checked1 ="";
                                    $checked2 ="";
                                    $checked3 ="";
                                }

                                ?>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="usaha_jasa[]" value="Telekomunikasi" class="custom-control-input" <?php echo $checked1 ?>><span class="custom-control-label">Telekomunikasi</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="usaha_jasa[]" value="Transportasi" class="custom-control-input" <?php echo $checked2 ?>><span class="custom-control-label">Transportasi</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="usaha_jasa[]" onclick="show_jasa_lainnya()" id="jasa_lainnya" value="Lainnya" class="custom-control-input" <?php echo $checked3 ?>><span class="custom-control-label">Lainnya</span>
                                </label>
                                <input type="<?php echo $checked3 == 'checked' ? 'text' : 'hidden'; ?>" name="usaha_jasa_lainnya" id="usaha_jasa_lainnya" class="form-control" placeholder="Masukkan Lainnya" value="<?php echo $query->obyek_jenis_pemanfaatan_usaha_jasa_lainnya ?>">
                                <hr>
                            </div>
                            <label class="custom-control custom-checkbox custom-control">
                                <input type="checkbox" id= "fasos" name="fasos" value="Fasos/Fasum" class="custom-control-input" onclick="show_fasos()" <?php if($query->obyek_jenis_pemanfaatan_fasos_fasum != '') {echo "checked";}?> ><span class="custom-control-label">Fasos/Fasum</span>
                            </label>
                            <div class="<?php echo $query->obyek_jenis_pemanfaatan_fasos_fasum != '' ? '' : 'element_hide'; ?>" id="fasos_fasum">
                                <p>Pilih Fasos/Fasum :</p>
                                <?php
                                if($query->obyek_jenis_pemanfaatan_fasos_fasum != ''){
                                    $cek = json_decode($query->obyek_jenis_pemanfaatan_fasos_fasum);
                                    $check = array("Sekolah", "Mesjid", "Kantor Desa", "Lapangan", "Taman", "Puskesmas", "Lainnya");
                                    if (in_array($check[0], $cek)){
                                        $checked1 ="checked";
                                    } else {
                                        $checked1 ="";
                                    }

                                    if (in_array($check[1], $cek)){
                                        $checked2 ="checked";
                                    } else {
                                        $checked2 ="";
                                    }

                                    if (in_array($check[2], $cek)){
                                        $checked3 ="checked";
                                    } else {
                                        $checked3 ="";
                                    }

                                    if (in_array($check[3], $cek)){
                                        $checked4 ="checked";
                                    } else {
                                        $checked4 ="";
                                    }

                                    if (in_array($check[4], $cek)){
                                        $checked5 ="checked";
                                    } else {
                                        $checked5 ="";
                                    }

                                    if (in_array($check[5], $cek)){
                                        $checked6 ="checked";
                                    } else {
                                        $checked6 ="";
                                    }

                                    if (in_array($check[6], $cek)){
                                        $checked7 ="checked";
                                    } else {
                                        $checked7 ="";
                                    }
                                } else {
                                    $checked1 ="";
                                    $checked2 ="";
                                    $checked3 ="";
                                    $checked4 ="";
                                    $checked5 ="";
                                    $checked6 ="";
                                    $checked7 ="";
                                }
                                ?>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="fasos_fasum[]" value="Sekolah" class="custom-control-input" <?php echo $checked1 ?>><span class="custom-control-label">Sekolah</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="fasos_fasum[]" value="Mesjid" class="custom-control-input" <?php echo $checked2 ?>><span class="custom-control-label">Mesjid</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="fasos_fasum[]" value="Kantor Desa" class="custom-control-input" <?php echo $checked3 ?>><span class="custom-control-label">Kantor Desa</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="fasos_fasum[]" value="Lapangan" class="custom-control-input" <?php echo $checked4 ?>><span class="custom-control-label">Lapangan</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="fasos_fasum[]" value="Taman" class="custom-control-input" <?php echo $checked5 ?>><span class="custom-control-label">Taman</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="fasos_fasum[]" value="Puskesmas" class="custom-control-input" <?php echo $checked6 ?>><span class="custom-control-label">Puskesmas</span>
                                </label>
                                <label class="custom-control custom-checkbox custom-control-inline">
                                    <input type="checkbox" name="fasos_fasum[]" onclick="show_fasos_lainnya()" id="fasos_lainnya" value="Lainnya" class="custom-control-input" <?php echo $checked7 ?>><span class="custom-control-label">Lainnya</span>
                                </label>
                                <input type="<?php echo $checked7 == 'checked' ? 'text' : 'hidden'; ?>" name="fasos_fasum_lainnya" id="fasos_fasum_lainnya" class="form-control" placeholder="Masukkan Lainnya" value="<?php echo $query->obyek_jenis_pemanfaatan_fasos_fasum_lainnya ?>">
                                <hr>
                            </div>
                            <label class="custom-control custom-checkbox custom-control">
                                <input type="checkbox" id="perolehan_tanah" name="no_manfaat" value="Tidak Ada Pemanfaatan" class="custom-control-input" <?php if($query->obyek_jenis_pemanfaatan_tidak_ada_manfaat == "Tidak Ada Pemanfaatan") {echo "checked";}?>><span class="custom-control-label">Tidak Ada Pemanfaatan</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Sengketa, Konflik & Perkara</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="skp" value="Sengketa" class="custom-control-input" <?php if($query->obyek_sengketa_konflik_perkara == "Sengketa") {echo "checked";}?>><span class="custom-control-label">Sengketa</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="skp" value="Konflik" class="custom-control-input" <?php if($query->obyek_sengketa_konflik_perkara == "Konflik") {echo "checked";}?>><span class="custom-control-label">Konflik</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="skp" value="Perkara di Pengadilan" class="custom-control-input" <?php if($query->obyek_sengketa_konflik_perkara == "Perkara di Pengadilan") {echo "checked";}?>><span class="custom-control-label">Perkara di Pengadilan</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="skp" value="Tidak SKP" class="custom-control-input" <?php if($query->obyek_sengketa_konflik_perkara == "Tidak SKP") {echo "checked";}?>><span class="custom-control-label">Tidak SKP</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Potensi Landreform</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="landeform" value="Tanah Absentee" class="custom-control-input" onchange="hide_landeform_lainnya()" <?php if($query->obyek_potensi_landreform == "Tanah Absentee") {echo "checked";}?>><span class="custom-control-label">Tanah Absentee</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="landeform" value="Tanah Kelebihan" class="custom-control-input" onchange="hide_landeform_lainnya()" <?php if($query->obyek_potensi_landreform == "Tanah Kelebihan") {echo "checked";}?>><span class="custom-control-label">Tanah Kelebihan Maksimum</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="landeform" value="Tanah Bekas Swapraja" class="custom-control-input" onchange="hide_landeform_lainnya()" <?php if($query->obyek_potensi_landreform == "Tanah Bekas Swapraja") {echo "checked";}?>><span class="custom-control-label">Tanah Bekas Swapraja</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="landeform" value="Tanah Negara Lainnya" class="custom-control-input" onchange="show_landeform_lainnya()" <?php if($query->obyek_potensi_landreform == "Tanah Negara Lainnya") {echo "checked";}?>><span class="custom-control-label">Tanah Negara Lainnya</span>
                            </label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <div class="form-group row <?php echo $query->obyek_potensi_landreform == 'Tanah Negara Lainnya' ? '' : 'element_hide'; ?>" id="landeform_lainnya">
                                    <label></label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="tanah_negara" class="custom-control-input" onchange="show_hgu()" value="HGU Habis"<?php if($query->obyek_potensi_landreform_option == "HGU Habis") {echo "checked";}?>><span class="custom-control-label">HGU Habis</span>
                                    </label>
                                    <input type="<?php echo $query->obyek_potensi_landreform_option != "HGU Habis" ? 'hidden' : 'text'; ?>" name="hgu_habis" id="hgu_habis" class="form-control" value="<?php echo $query->obyek_potensi_landreform_option_lainnya ?>" placeholder="Masukkan Nomor HGU">
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="tanah_negara" class="custom-control-input" onchange="show_pelepasan_hgu()" value="Pelepasan HGU" <?php if($query->obyek_potensi_landreform_option == "Pelepasan HGU") {echo "checked";}?>><span class="custom-control-label">Pelepasan HGU No. </span>
                                    </label>
                                    <input type="<?php echo $query->obyek_potensi_landreform_option != "Pelepasan HGU" ? 'hidden' : 'text'; ?>" name="pelepasan_hgu" id="pelepasan_hgu" class="form-control" value="<?php echo $query->obyek_potensi_landreform_option_lainnya ?>" placeholder="Masukkan Nomor Pelepasan HGU">
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="tanah_negara" class="custom-control-input" onchange="hide_all_hgu()"value="Tanah Terlantar" <?php if($query->obyek_potensi_landreform_option == "Tanah Terlantar") {echo "checked";}?>><span class="custom-control-label">Tanah Terlantar</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="tanah_negara" class="custom-control-input" onchange="hide_all_hgu()"value="Tanah Penyelesaian"<?php if($query->obyek_potensi_landreform_option == "Tanah Penyelesaian") {echo "checked";}?>><span class="custom-control-label">Tanah Penyelesaian SPK</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="tanah_negara" class="custom-control-input" onchange="hide_all_hgu()"value="Tanah Dari Pelepasan Kawasan Hutan"<?php if($query->obyek_potensi_landreform_option == "Tanah Dari Pelepasan Kawasan Hutan") {echo "checked";}?>><span class="custom-control-label">Tanah Dari Pelepasan Kawasan Hutan</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="tanah_negara" class="custom-control-input" onchange="hide_all_hgu()"value="Tanah Timbul"<?php if($query->obyek_potensi_landreform_option == "Tanah Timbul") {echo "checked";}?>><span class="custom-control-label">Tanah Timbul</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="tanah_negara" class="custom-control-input" onchange="hide_all_hgu()"value="Tanah Bekas Tambang Yang Telah Direkemasi"<?php if($query->obyek_potensi_landreform_option == "Tanah Bekas Tambang Yang Telah Direkemasi") {echo "checked";}?>><span class="custom-control-label">Tanah Bekas Tambang Yang Telah Direkemasi</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="tanah_negara" class="custom-control-input" onchange="hide_all_hgu()"value="Tanah Negara Dalam Penguasaan Masyarakat"<?php if($query->obyek_potensi_landreform_option == "Tanah Negara Dalam Penguasaan Masyarakat") {echo "checked";}?>><span class="custom-control-label">Tanah Negara Dalam Penguasaan Masyarakat</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Ubah</button>
                            <?php if($this->session->userdata('user_akses') == 2){ ?>
                                <a href="<?php echo base_url() ?>terkait_obyek/view_obyek_user/<?php echo $this->session->userdata('user_id') ?>" class="btn btn-space btn-secondary">Batal</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url() ?>terkait_obyek" class="btn btn-space btn-secondary">Batal</a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function show_fasos_lainnya() {
    if($('#fasos_lainnya').is(":checked")){
        $('#fasos_fasum_lainnya').prop('type', 'text');
    } else{
        $('#fasos_fasum_lainnya').prop('type', 'hidden');
    }
}

function show_fasos() {
    if($('#fasos').is(":checked")){
        $('#fasos_fasum').removeClass('element_hide');
    } else{
        $('#fasos_fasum').addClass('element_hide');
    }
}

function show_jasa_lainnya() {
    if($('#jasa_lainnya').is(":checked")){
        $('#usaha_jasa_lainnya').prop('type', 'text');
    } else{
        $('#usaha_jasa_lainnya').prop('type', 'hidden');
    }
}

function show_jasa() {
    if($('#jasa').is(":checked")){
        $('#usaha_jasa').removeClass('element_hide');
    } else{
        $('#usaha_jasa').addClass('element_hide');
    }
}

function show_kegiatan_ekonomi_lainnya() {
    if($('#kegiatan_ekonomi_lainnya').is(":checked")){
        $('#ekonomi_lainnya').prop('type', 'text');
    } else{
        $('#ekonomi_lainnya').prop('type', 'hidden');
    }
}

function show_kegiatan_ekonomi() {
    if($('#kegiatan_ekonomi').is(":checked")){
        $('#ekonomi').removeClass('element_hide');
    } else{
        $('#ekonomi').addClass('element_hide');
    }
}

function show_produksi_pertanian_lainnya() {
    if($('#produksi_tanaman_lainnya').is(":checked")){
        $('#produksi_pertanian_lainnya').prop('type', 'text');
    } else{
        $('#produksi_pertanian_lainnya').prop('type', 'hidden');
    }
}

function show_kegiatan_pertanian() {
    if($('#kegiatan_pertanian').is(":checked")){
        $('#produksi_pertanian').removeClass('element_hide');
    } else{
        $('#produksi_pertanian').addClass('element_hide');
    }
}

function change_provinsi() {
    let provinsi_id = $('#provinsi').val();
    if(provinsi_id){
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("terkait_obyek/get_kabupaten_by_provinsi_id") ?>',
            data: 'provinsi_id='+provinsi_id,
            dataType: 'json',
            success: function(response) {
                option_kabupaten = '<option value="">--Pilih Kabupaten/Kota--</option>';
                $.each(response, function(key, val){
                    option_kabupaten += '<option value="'+val.kabupaten_id+'">'+val.kabupaten_nama+'</option>';
                });
                $('#kabupaten').html(option_kabupaten).removeAttr( 'disabled' );
                let kecamatan = '<option value="">--Pilih Kecamatan--</option>';
                $('#kecamatan').html(kecamatan).attr( 'disabled', 'true' );
                let kelurahan = '<option value="">--Pilih Kelurahan/Desa--</option>';
                $('#kelurahan').html(kelurahan).attr( 'disabled', 'true' );
            }
        });
    }
}

function change_kabupaten() {
    let kabupaten_id = $('#kabupaten').val();
    if(kabupaten_id){
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("terkait_obyek/get_kecamatan_by_kabupaten_id") ?>',
            data: 'kabupaten_id='+kabupaten_id,
            dataType: 'json',
            success: function(response) {
                option_kecamatan = '<option value="">--Pilih Kecamatan--</option>';
                $.each(response, function(key, val){
                    option_kecamatan += '<option value="'+val.kecamatan_id+'">'+val.kecamatan_nama+'</option>';
                });
                $('#kecamatan').html(option_kecamatan).removeAttr('disabled');
                let kelurahan = '<option value="">--Pilih Kelurahan/Desa--</option>';
                $('#kelurahan').html(kelurahan).attr( 'disabled', 'true' );
            }
        });
    }
}

function change_kecamatan() {
    let kecamatan_id = $('#kecamatan').val();
    if(kecamatan_id){
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("terkait_obyek/get_kelurahan_by_kecamatan_id") ?>',
            data: 'kecamatan_id='+kecamatan_id,
            dataType: 'json',
            success: function(response) {
                option_kelurahan = '<option value="">--Pilih Kelurahan/Desa--</option>';
                $.each(response, function(key, val){
                    option_kelurahan += '<option value="'+val.kelurahan_id+'">'+val.kelurahan_nama+'</option>';
                });
                $('#kelurahan').html(option_kelurahan).removeAttr('disabled');
            }
        });
    }
}

function show_hgu() {
    $('#hgu_habis').prop('type','text');
    $('#pelepasan_hgu').prop('type','hidden');
}

function show_pelepasan_hgu() {
    $('#hgu_habis').prop('type','hidden');
    $('#pelepasan_hgu').prop('type','text');
}

function hide_all_hgu() {
    $('#hgu_habis').prop('type','hidden');
    $('#pelepasan_hgu').prop('type','hidden');
}

function show_landeform_lainnya() {
    $('#landeform_lainnya').removeClass('element_hide');
}

function hide_landeform_lainnya() {
    $('#landeform_lainnya').addClass('element_hide');
}

function show_pengunaan_bidang_lainnya() {
    $('#pengunaan_bidang_lainnya').prop('type','text');
}

function hide_pengunaan_bidang_lainnya() {
    $('#pengunaan_bidang_lainnya').prop('type','hidden');
}

function show_no_surat() {
    $('#surat_no').prop('type','text');
}

function hide_no_surat() {
    $('#surat_no').prop('type','hidden');
}

function no_surat() {
    $('#radio_belum_terdaftar').removeClass('element_hide');
    $('#pemilikan_sertifikat_no').prop('type','hidden');
}

function no_sertifikat() {
    $('#pemilikan_sertifikat_no').prop('type','text');
    $('#radio_belum_terdaftar').addClass('element_hide');

}

function show_perolehan_lainnya() {
    $('#perolehan_lainnya').prop('type','text');
}

function hide_perolehan_lainnya() {
    $('#perolehan_lainnya').prop('type','hidden');
}

function hide_text_lainnya() {
    $('#not_owner_lainnya').prop('type','hidden');
}

function show_text_lainnya() {
    $('#not_owner_lainnya').prop('type','text');
}

$('#penguasaan').on('change', function() {
    let id_penguasaan = $('#penguasaan').val();
    if(id_penguasaan != 'Bukan Pemilik'){
        $('#radio_penguasaan').addClass('element_hide');
    } else {
        $('#radio_penguasaan').removeClass('element_hide');
    }
});

$('form').on('focus', 'input[type=number]', function (e) {
    $(this).on('mousewheel.disableScroll', function (e) {
        e.preventDefault();
    });
});
$('form').on('blur', 'input[type=number]', function (e) {
    $(this).off('mousewheel.disableScroll');
});

</script>
