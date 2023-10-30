<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form <?php echo $sub_title . ' ' . $header_title ?></h5>
            <div class="card-body">
                <form action="<?php echo base_url() ?>user/action_add" method="post">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nama</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Jenis Kelamin</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gender" value="0" class="custom-control-input"><span class="custom-control-label">Laki-laki</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="gender" value="1" class="custom-control-input"><span class="custom-control-label">Perempuan</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Agama</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <select class="form-control" name="agama" required>
                                <option value="">--Pilih Agama--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Alamat</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" rows="3"required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nomor Handphone</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="number" name="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Alamat Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Hak Akses</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="akses" value="1"class="custom-control-input"><span class="custom-control-label">Karyawan</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="akses" value="2"class="custom-control-input"><span class="custom-control-label">User</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Simpan</button>
                            <a href="<?php echo base_url() ?>user" class="btn btn-space btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('form').on('focus', 'input[type=number]', function (e) {
    $(this).on('mousewheel.disableScroll', function (e) {
        e.preventDefault();
    });
});
$('form').on('blur', 'input[type=number]', function (e) {
    $(this).off('mousewheel.disableScroll');
});
</script>
