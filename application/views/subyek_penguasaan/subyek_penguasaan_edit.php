<?php //echo $kelurahan->$kelurahan_nama ?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form <?php echo $sub_title . ' ' . $header_title ?></h5>
            <div class="card-body">
                <form id="form-add-subyek" action="<?php echo base_url() ?>subyek_penguasaan/action_edit" method="post">
                    <input type="hidden" name="id" value="<?php echo $query->subyek_penguasaan_id ?>">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="nama_pemilik" class="form-control" value="<?php echo $query->subyek_penguasaan_nama; ?>" required>
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
                            <input type="text" placeholder="RT" name="rt" class="form-control" value="<?php echo $query->subyek_penguasaan_rt ?>">
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <input type="text" placeholder="RW" name="rw" class="form-control" value="<?php echo $query->subyek_penguasaan_rw ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jalan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="jalan" class="form-control" value="<?php echo $query->subyek_penguasaan_jalan ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nomor KTP</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="nomor_ktp" class="form-control" value="<?php echo $query->subyek_penguasaan_nomor_ktp ?>" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Pekerjaan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="pekerjaan" class="form-control" value="<?php echo $query->subyek_penguasaan_pekerjaan ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Umur</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="umur" class="form-control" value="<?php echo $query->subyek_penguasaan_umur ?>" min="1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Status Perkawinan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="status_perkawinan" class="custom-control-input" value="1" <?php if($query->subyek_penguasaan_status_perkawinan == 1) {echo "checked";}?>><span class="custom-control-label">Belum Menikah</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="status_perkawinan" class="custom-control-input" value="2" <?php if($query->subyek_penguasaan_status_perkawinan == 2) {echo "checked";}?>><span class="custom-control-label">Menikah</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="status_perkawinan" class="custom-control-input" value="3" <?php if($query->subyek_penguasaan_status_perkawinan == 3) {echo "checked";}?>><span class="custom-control-label">Pernah Menikah</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jumlah Anggota Keluarga</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="anggota_keluarga" class="form-control" value="<?php echo $query->subyek_penguasaan_jumlah_anggota_keluarga ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Domisili</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio">
                                <input type="radio" name="domisili" class="custom-control-input" value="1" <?php if($query->subyek_penguasaan_domisili == 1) {echo "checked";}?> onchange="change_domisili()"><span class="custom-control-label">Desa Ini</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="domisili" class="custom-control-input" value="2" <?php if($query->subyek_penguasaan_domisili == 2) {echo "checked";}?> onchange="change_domisili()"><span class="custom-control-label">Desa Lain Berbatasan Langsung</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="domisili" class="custom-control-input" value="3" <?php if($query->subyek_penguasaan_domisili == 3) {echo "checked";}?> onchange="change_domisili()"><span class="custom-control-label">Desa Lain Tidak Berbatasan Langsung</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="domisili" class="custom-control-input" value="4" <?php if($query->subyek_penguasaan_domisili == 4) {echo "checked";}?> onchange="change_domisili()"><span class="custom-control-label">Diluar Kecamatan</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="domisili" class="custom-control-input" value="5" <?php if($query->subyek_penguasaan_domisili == 5) {echo "checked";}?> onchange="change_domisili5()"><span class="custom-control-label">Lainnya</span>
                            </label>
                            <input type="<?php echo $query->subyek_penguasaan_domisili != 5 ? 'hidden' : 'text'; ?>" name="domisili_lainnya" placeholder="Masukkan Domisili Lainnya" id="domisili_lainnya" class="form-control" value="<?php echo $query->subyek_penguasaan_domisili_lainnya ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Memiliki Tanah Sejak Tahun</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="tahun_milik" class="form-control" value="<?php echo $query->subyek_penguasaan_tahun_memiliki_tanah ?>" required>
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Ubah</button>
                            <a href="<?php echo base_url() ?>subyek_penguasaan/detail_data/<?php echo $query->subyek_penguasaan_id ?>"class="btn btn-space btn-secondary">Batal</a>
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
                url: '<?php echo site_url("subyek_penguasaan/get_kabupaten_by_provinsi_id") ?>',
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
                url: '<?php echo site_url("subyek_penguasaan/get_kecamatan_by_kabupaten_id") ?>',
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
                url: '<?php echo site_url("subyek_penguasaan/get_kelurahan_by_kecamatan_id") ?>',
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
        $('#domisili_lainnya').prop('type','text')
    }

    function change_domisili() {
        $('#domisili_lainnya').prop('type','hidden')
    }
</script>
