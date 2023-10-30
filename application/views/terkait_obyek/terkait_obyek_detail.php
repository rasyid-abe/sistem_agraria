<div class="row">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 co-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle"> Detail Obyek </h5>
            <div class="dd" id="nestable">
                <ol class="dd-list">
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Nama Subyek</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $nama_subyek ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> KTP Subyek</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $ktp_subyek ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Nomor Inventarisasi (NIS)</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_nomor_inventaris ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Nomor Idenfikasi Bidang</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_nib ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div>Nomor Pajak Bumi & Bangunan</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_pbb ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div>Luas Tanah (m2)</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_luas_tanah ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div>Nilai Tanah per m2</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_nilai_tanah_m2 ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div>Penguasaan Tanah</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_penguasaan_tanah ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" id="<?php echo $query->obyek_penguasaan_tanah == 'Bukan Pemilik' ? '' : 'element_hide'; ?>" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div class="ml-3"> <i class="fa fa-fw fas fa-angle-right"></i> Ket</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php
                                if($query->obyek_penguasaan_tanah_bukan_pemilik == 'Lainnya'){
                                    echo $query->obyek_penguasaan_tahan_bukan_pemilik_lainnya;
                                } else {
                                    echo $query->obyek_penguasaan_tanah_bukan_pemilik;
                                }
                                ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="11">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Perolehan Tanah </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_perolehan_tanah ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" id="<?php echo $query->obyek_perolehan_tanah == 'Lainnya' ? '' : 'element_hide'; ?>" data-id="11">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div class="ml-3"> <i class="fa fa-fw fas fa-angle-right"></i> Ket</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_perolehan_tanah_lainnya ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="12">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Pemilikan Tanah </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_pemilikan_tanah ?></b>
                            </div>
                        </div>
                    </li>
                    <?php if($query->obyek_pemilikan_tanah == 'Terdaftar') {?>
                        <li class="dd-item" data-id="12">
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                                <div class="ml-3"> <i class="fa fa-fw fas fa-angle-right"></i> No Sertifikat</div>
                                <div class="dd-nodrag btn-group ml-auto">
                                    <b class="pr-3"><?php echo $query->obyek_pemilikan_tanah_sertifikat_no ?></b>
                                </div>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="dd-item" data-id="12">
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                                <div class="ml-3"> <i class="fa fa-fw fas fa-angle-right"></i> No Surat </div>
                                <div class="dd-nodrag btn-group ml-auto">
                                    <b class="pr-3"><?php echo $query->obyek_pemilikan_tanah_belum_terdaftar.' ('.$query->obyek_pemilikan_tanah_sertifikat_no.')   ' ?></b>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <li class="dd-item" data-id="12">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Penggunaan Bidang Tanah </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_penggunaan_bidang_tanah ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" id="<?php echo $query->obyek_perolehan_tanah == 'Lainnya' ? '' : 'element_hide'; ?>" data-id="12">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div class="ml-3"> <i class="fa fa-fw fas fa-angle-right"></i> Ket </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_penggunaan_bidang_tanah_lainnya ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="12">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Pemanfaatan Bidang Tanah </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <?php if($query->obyek_jenis_pemanfaatan_tidak_ada_manfaat != '') { ?>
                                    <b class="pr-3"><?php echo $query->obyek_jenis_pemanfaatan_tidak_ada_manfaat ?></b>
                                <?php } else {?>
                                    <b class="pr-3">Ada Pemanfaatan</b>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <?php if($query->obyek_jenis_pemanfaatan_tempat_tinggal != ""){?>
                        <li class="dd-item" id="<?php echo $query->obyek_jenis_pemanfaatan_tidak_ada_manfaat != '' ? 'element_hide' : '' ?>" data-id="12">
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                                <div class="ml-2"> <i class="fa fa-fw fas fa-angle-right"></i> Tempat Tinggal</div>
                                <div class="dd-nodrag btn-group ml-auto">
                                    <b class="pr-3"><?php echo $query->obyek_jenis_pemanfaatan_tempat_tinggal ?></b>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if($query->obyek_jenis_pemanfaatan_pertanian != ""){?>
                        <li class="dd-item" id="<?php echo $query->obyek_jenis_pemanfaatan_tidak_ada_manfaat != '' ? 'element_hide' : '' ?>" data-id="12">
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                                <div class="ml-2"> <i class="fa fa-fw fas fa-angle-right"></i> Kegiatn Produk Pertanian </div>
                            </div>
                            <?php $cek_pertanian = json_decode($query->obyek_jenis_pemanfaatan_pertanian); ?>
                            <?php foreach ($cek_pertanian as $key => $value): ?>
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div class="ml-4"></div>
                                <b class="pr-3">  <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $value;?> </b>
                            </div>
                            <?php endforeach; ?>
                        </li>
                        <?php if (in_array("Lainnya", $cek_pertanian)){ ?>
                            <li class="dd-item" data-id="12">
                                <div class="dd-handle"> <span class="drag-indicator"></span>
                                    <div class="ml-5"></div>
                                    <b> <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $query->obyek_jenis_pemanfaatan_pertanian_lainnya ?></b>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if($query->obyek_jenis_pemanaatan_ekonomi_perdaganan != ""){?>
                        <li class="dd-item" id="<?php echo $query->obyek_jenis_pemanfaatan_tidak_ada_manfaat != '' ? 'element_hide' : '' ?>" data-id="12">
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                                <div class="ml-2"> <i class="fa fa-fw fas fa-angle-right"></i> Kegiatan Ekonomi/Perdaganan</div>
                            </div>
                            <?php $cek_ekonomi = json_decode($query->obyek_jenis_pemanaatan_ekonomi_perdaganan); ?>
                            <?php foreach ($cek_ekonomi as $key => $value): ?>
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div class="ml-4"></div>
                                <b class="pr-3">  <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $value;?> </b>
                            </div>
                            <?php endforeach; ?>
                        </li>
                        <?php if (in_array("Lainnya", $cek_ekonomi)){ ?>
                            <li class="dd-item" data-id="12">
                                <div class="dd-handle"> <span class="drag-indicator"></span>
                                    <div class="ml-5"></div>
                                    <b> <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $query->obyek_jenis_pemanaatan_ekonomi_perdaganan_lainnya ?></b>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if($query->obyek_jenis_pemanfaatan_usaha_jasa != ""){?>
                        <li class="dd-item" id="<?php echo $query->obyek_jenis_pemanfaatan_tidak_ada_manfaat != '' ? 'element_hide' : '' ?>" data-id="12">
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                                <div class="ml-2"> <i class="fa fa-fw fas fa-angle-right"></i> Usaha Jasa</div>
                            </div>
                            <?php $cek_jasa = json_decode($query->obyek_jenis_pemanfaatan_usaha_jasa); ?>
                            <?php foreach ($cek_jasa as $key => $value): ?>
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div class="ml-4"></div>
                                <b class="pr-3">  <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $value;?> </b>
                            </div>
                            <?php endforeach; ?>
                        </li>
                        <?php if (in_array("Lainnya", $cek_jasa)){ ?>
                            <li class="dd-item" data-id="12">
                                <div class="dd-handle"> <span class="drag-indicator"></span>
                                    <div class="ml-5"></div>
                                    <b> <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $query->obyek_jenis_pemanfaatan_usaha_jasa_lainnya ?></b>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if($query->obyek_jenis_pemanfaatan_usaha_jasa != ""){?>
                            <li class="dd-item" id="<?php echo $query->obyek_jenis_pemanfaatan_tidak_ada_manfaat != '' ? 'element_hide' : '' ?>" data-id="12">
                                <div class="dd-handle"> <span class="drag-indicator"></span>
                                    <div class="ml-2"> <i class="fa fa-fw fas fa-angle-right"></i> Fasos/Fasum</div>
                                </div>
                                <?php $cek_fasos = json_decode($query->obyek_jenis_pemanfaatan_fasos_fasum); ?>
                                <?php foreach ($cek_fasos as $key => $value): ?>
                                <div class="dd-handle"> <span class="drag-indicator"></span>
                                <div class="ml-4"></div>
                                    <b class="pr-3">  <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $value;?> </b>
                                </div>
                                <?php endforeach; ?>
                            </li>
                            <?php if (in_array("Lainnya", $cek_fasos)){ ?>
                                <li class="dd-item" data-id="12">
                                    <div class="dd-handle"> <span class="drag-indicator"></span>
                                        <div class="ml-5"></div>
                                        <b> <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $query->obyek_jenis_pemanfaatan_fasos_fasum_lainnya ?></b>
                                    </div>
                                </li>
                            <?php } ?>
                    <?php } ?>
                    <li class="dd-item" data-id="12">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Sengketa, Konflik & Perkara </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_sengketa_konflik_perkara ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="12">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Potensi Landreform </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_potensi_landreform ?></b>
                            </div>
                        </div>
                    </li>
                    <?php if($query->obyek_potensi_landreform == 'Tanah Negara Lainnya'){ ?>
                        <li class="dd-item" data-id="12">
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                                <div class="ml-3"> <i class="fa fa-fw fas fa-angle-right"></i> Ket</div>
                                <div class="dd-nodrag btn-group ml-auto">
                                    <b class="pr-3"><?php echo $query->obyek_potensi_landreform_option ?></b>
                                </div>
                            </div>
                        </li>
                        <?php if($query->obyek_potensi_landreform_option == 'HGU Habis') {?>
                            <li class="dd-item" data-id="12">
                                <div class="dd-handle"> <span class="drag-indicator"></span>
                                    <div class="ml-3"> <i class="fa fa-fw fas fa-angle-right"></i> Nomor HGU</div>
                                    <div class="dd-nodrag btn-group ml-auto">
                                        <b class="pr-3"><?php echo $query->obyek_potensi_landreform_option_lainnya ?></b>
                                    </div>
                                </div>
                            </li>
                        <?php } else { ?>
                            <li class="dd-item" data-id="12">
                                <div class="dd-handle"> <span class="drag-indicator"></span>
                                    <div class="ml-3"> <i class="fa fa-fw fas fa-angle-right"></i> Nomor Pelepasan HGU</div>
                                    <div class="dd-nodrag btn-group ml-auto">
                                        <b class="pr-3"><?php echo $query->obyek_potensi_landreform_option_lainnya ?></b>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ol>
            </div>
        </section>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 co-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle"> Detail Wilayah Obyek </h5>
            <div class="dd" id="nestable2">
                <ol class="dd-list">
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Jalan </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_jalan ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="14">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> RT/RW </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->obyek_rt. ' / ' .$query->obyek_rw ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="14">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Desa / Kelurahan </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $kel->kelurahan_nama ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="14">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Kecamatan </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $kec->kecamatan_nama ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="14">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Kabupaten / Kota </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $kab->kabupaten_nama ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="14">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Provinsi </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $prov_nama ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="14">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Koordinat Peta </div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo 'x :' .$query->obyek_koordinat_x. ', '.'y :'.$query->obyek_koordinat_y ?></b>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </section>
    </div>
</div>
