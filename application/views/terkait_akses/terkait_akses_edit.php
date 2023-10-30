<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form <?php echo $sub_title . ' ' . $header_title ?></h5>
            <div class="card-body">
                <form action="<?php echo base_url() ?>terkait_akses/action_edit" method="post">
                    <input type="hidden" name="id_obyek" value="<?php echo $id_obyek ?>">
                    <input type="hidden" name="invent_obyek" value="<?php echo $invent ?>">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Sertifikat Pernah Dijaminkan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pernah_dijaminkan" value="Pernah" <?php if($query->akses_sertifikat_dijamin == "Pernah") {echo "checked";}?> class="custom-control-input"><span class="custom-control-label">Ya</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pernah_dijaminkan" value="Tidak Pernah" <?php if($query->akses_sertifikat_dijamin == "Tidak Pernah") {echo "checked";}?> class="custom-control-input"><span class="custom-control-label">Tidak</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Potensi Akses</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <?php
                            if($query->akses_potensi != ''){
                                $cek = json_decode($query->akses_potensi);
                                $check = array("Pertanian", "Perternakan", "Perkebunan", "Perikanan", "Industri Kecil", "Lainnya");
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
                                <input type="checkbox" name="potensi_akses[]" value="Pertanian" <?php echo $checked1 ?> class="custom-control-input"><span class="custom-control-label">Pertanian</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="potensi_akses[]" value="Perternakan" <?php echo $checked2 ?> class="custom-control-input"><span class="custom-control-label">Perternakan</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="potensi_akses[]" value="Perkebunan" <?php echo $checked3 ?> class="custom-control-input"><span class="custom-control-label">Perkebunan</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="potensi_akses[]" value="Perikanan" <?php echo $checked4 ?> class="custom-control-input"><span class="custom-control-label">Perikanan</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="potensi_akses[]" value="Industri Kecil" <?php echo $checked5 ?> class="custom-control-input"><span class="custom-control-label">Industri Kecil</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="potensi_akses" name="potensi_akses[]" value="Lainnya" <?php echo $checked6 ?> class="custom-control-input" onchange="show_potensi_aksess()"><span class="custom-control-label">Lainnya</span>
                            </label>
                            <input type="<?php echo $checked6 == 'checked' ? 'text' : 'hidden'; ?>" name="potensi_akses_lainnya" id="potensi_akses_lainnya" class="form-control" value="<?php echo $query->akses_potensi_lainnya ?>"placeholder="Masukkan Potensi Lainnya">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Bantuan Yang Pernah Diterima</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="jenis_bantuan" class="form-control" value="<?php echo $query->akses_bantuan_jenis ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Bantuan Diterima Dari</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="bantuan_dari" class="form-control" value="<?php echo $query->akses_bantuan_dari ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tanggal Menrima Bantuan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="date" name="tanggal_bantuan" class="form-control" value="<?php echo $query->akses_bantuan_tanggal ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Sebelum Menerima Sertifikat</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="pendapatan_sebelum_sertifikat" class="form-control" min="0" value="<?php echo $query->akses_pendapatan_sebelum ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Sesudah Menerima Sertifikat</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="pendapatan_sesudah_sertifikat" class="form-control" min="0" value="<?php echo $query->akses_pendapatan_sesudah ?>">
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
function show_potensi_aksess() {
    if($('#potensi_akses').is(":checked")){
        $('#potensi_akses_lainnya').prop('type','text');
    } else{
        $('#potensi_akses_lainnya').prop('type','hidden');
    }
}

$('form').on('focus', 'input[type=number]', function (e) {
    $(this).on('mousewheel.disableScroll', function (e) {
        e.preventDefault();
    });
});
$('form').on('blur', 'input[type=number]', function (e) {
    $(this).off('mousewheel.disableScroll');
});

$('form').on('focus', 'input[type=date]', function (e) {
    $(this).on('mousewheel.disableScroll', function (e) {
        e.preventDefault();
    });
});
$('form').on('blur', 'input[type=date]', function (e) {
    $(this).off('mousewheel.disableScroll');
});
</script>
