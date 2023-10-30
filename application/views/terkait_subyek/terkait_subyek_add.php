<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form <?php echo $sub_title . ' ' . $header_title ?></h5>
            <div class="card-body">
                <form id="form-add-subyek" action="<?php echo base_url() ?>terkait_subyek/action_add" method="post">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="nama_pemilik" class="form-control" placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Provinsi</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="provinsi" id="provinsi" onchange="change_provinsi()" required>
                                <option value="">--Pilih Provinsi--</option>
                                <?php foreach ($provinsi as $row) { ?>
                                    <option value="<?php echo $row->provinsi_id; ?>"><?php echo $row->provinsi_nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Kabupaten / Kota</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="kabupaten" id="kabupaten" onchange="change_kabupaten()" disabled required>
                                <option value="">--Pilih Kabupaten/Kota--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Kecamatan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="kecamatan" id="kecamatan" onchange="change_kecamatan()" disabled required>
                                <option value="">--Pilih Kecamatan--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Desa / Kelurahan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="kelurahan" id="kelurahan" disabled required>
                                <option value="">--Pilih Kelurahan/Desa--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">RT/RW</label>
                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                            <input type="text" placeholder="RT" name="rt" class="form-control" required>
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <input type="text" placeholder="RW" name="rw" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jalan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="jalan" class="form-control" placeholder="Masukkan Jalan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nomor KTP</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="nomor_ktp" class="form-control" placeholder="Masukkan Nomor KTP" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Pekerjaan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Umur</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="umur" class="form-control" placeholder="Masukkan Umur" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Status Perkawinan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="status_perkawinan" class="custom-control-input" value="1"><span class="custom-control-label">Belum Menikah</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="status_perkawinan" class="custom-control-input" value="2"><span class="custom-control-label">Menikah</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="status_perkawinan" class="custom-control-input" value="3"><span class="custom-control-label">Pernah Menikah</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jumlah Anggota Keluarga</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="anggota_keluarga" class="form-control" placeholder="Masukkan Jumlah Anggota Keluarga" min="0" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Domisili</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio">
                                <input type="radio" name="domisili" class="custom-control-input" value="1" onchange="change_domisili()"><span class="custom-control-label">Desa Ini</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="domisili" class="custom-control-input" value="2" onchange="change_domisili()"><span class="custom-control-label">Desa Lain Berbatasan Langsung</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="domisili" class="custom-control-input" value="3" onchange="change_domisili()"><span class="custom-control-label">Desa Lain Tidak Berbatasan Langsung</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="domisili" class="custom-control-input" value="4" onchange="change_domisili()"><span class="custom-control-label">Diluar Kecamatan</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="domisili" class="custom-control-input" value="5" onchange="change_domisili5()"><span class="custom-control-label">Lainnya</span>
                            </label>
                            <input type="hidden" name="domisili_lainnya" id="domisili_lainnya" class="form-control" placeholder="Masukkan Domisili">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Memiliki Tanah Sejak Tahun</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="tahun_milik" class="form-control" placeholder="Masukkan Tahun" min="1000" required>
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                            <?php if($this->session->userdata('user_akses') == 2){ ?>
                                <a href="<?php echo base_url() ?>terkait_subyek/view_data_user/<?php echo $this->session->userdata('user_id') ?>" class="btn btn-space btn-secondary">Batal</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url() ?>terkait_subyek" class="btn btn-space btn-secondary">Batal</a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

function change_provinsi() {
    let provinsi_id = $('#provinsi').val();
    if(provinsi_id){
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("terkait_subyek/get_kabupaten_by_provinsi_id") ?>',
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
            url: '<?php echo site_url("terkait_subyek/get_kecamatan_by_kabupaten_id") ?>',
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
            url: '<?php echo site_url("terkait_subyek/get_kelurahan_by_kecamatan_id") ?>',
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

function change_domisili5() {
    $('#domisili_lainnya').prop('type','text');
}

function change_domisili() {
    $('#domisili_lainnya').prop('type','hidden');
}

$('form').on('focus', 'input[type=number]', function (e) {
    $(this).on('mousewheel.disableScroll', function (e) {
        e.preventDefault();
    });
});
$('form').on('blur', 'input[type=number]', function (e) {
    $(this).off('mousewheel.disableScroll');
});

</script>
