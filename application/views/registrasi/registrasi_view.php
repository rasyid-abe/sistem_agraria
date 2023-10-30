
<form class="splash-container" method="post" action="<?php echo base_url() ?>registrasi/action_register">
    <?php if($this->session->flashdata('flash')): ?>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('flash'); ?>.
                </div>
            </div>
        </div>
    <?php endif ?>
    <div class="card">
        <div class="card-header">
            <h3 class="mb-1">Form Registrasi</h3>
        </div>
        <div class="card-body">
            <input type="hidden" name="akses" value="2">
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="nama" required="" placeholder="Nama" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" id="password" name="password" minlength=6 type="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" id="confirm_password" type="password" placeholder="Ulangi Password">
            </div>
            <div class="form-group pt-2">
                <button class="btn btn-block btn-primary" type="submit">Registrasi</button>
            </div>
        </div>
        <div class="card-footer bg-white">
            <p>Sudah Punya Akun? <a href="<?php echo base_url() ?>login" class="text-secondary">Login Disini.</a></p>
        </div>
    </div>
</form>

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
