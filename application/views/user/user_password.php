<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Form <?php echo $header_title ?></h5>
            <div class="card-body">
                <form action="<?php echo base_url() ?>user/change_password" method="post">
                    <input type="hidden" name="id" value="<?php echo $query->user_id ?>">
                    <input type="hidden" name="akses" value="<?php echo $query->user_akses ?>">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Password Lama</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="password" name="old_password" class="form-control" placeholder="Masukkan Password Lama" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Password Baru</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password Baru" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Ulangi Password Baru</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Ulangi Password Baru" required>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var password = document.getElementById("password")
, confirm_password = document.getElementById("confirm_password");

function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
