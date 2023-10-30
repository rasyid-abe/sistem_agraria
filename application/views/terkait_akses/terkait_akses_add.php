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
                                <input type="radio" name="pernah_dijaminkan" value="Pernah" class="custom-control-input"><span class="custom-control-label">Ya</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="pernah_dijaminkan" value="Tidak Pernah" class="custom-control-input"><span class="custom-control-label">Tidak</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Potensi Akses</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="potensi_akses[]" value="Pertanian" class="custom-control-input"><span class="custom-control-label">Pertanian</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="potensi_akses[]" value="Perternakan" class="custom-control-input"><span class="custom-control-label">Perternakan</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="potensi_akses[]" value="Perkebunan" class="custom-control-input"><span class="custom-control-label">Perkebunan</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="potensi_akses[]" value="Perikanan" class="custom-control-input"><span class="custom-control-label">Perikanan</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="potensi_akses[]" value="Industri Kecil" class="custom-control-input"><span class="custom-control-label">Industri Kecil</span>
                            </label>
                            <label class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="potensi_akses" name="potensi_akses[]" value="Lainnya" class="custom-control-input" onchange="show_potensi_aksess()"><span class="custom-control-label">Lainnya</span>
                            </label>
                            <input type="hidden" name="potensi_akses_lainnya" id="potensi_akses_lainnya" class="form-control" placeholder="Masukkan Potensi Lainnya">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Bantuan Yang Pernah Diterima</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="jenis_bantuan" class="form-control" placeholder="Masukkan Jenis Bantuan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Bantuan Diterima Dari</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="bantuan_dari" class="form-control" placeholder="Masukkan Asal Bantuan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Tanggal Menrima Bantuan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="date" name="tanggal_bantuan" class="form-control" placeholder="Masukkan Tanggal Bantuan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Sebelum Menerima Sertifikat</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="pendapatan_sebelum_sertifikat" class="form-control" min="0" placeholder="Masukkan Pendapatan Rp. (Tanpa titik dan koma)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Sesudah Menerima Sertifikat</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="pendapatan_sesudah_sertifikat" class="form-control" min="0" placeholder="Masukkan Pendapatan Rp. (Tanpa titik dan koma)">
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Simpan</button>
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
