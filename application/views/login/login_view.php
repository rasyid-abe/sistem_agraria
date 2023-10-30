<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="splash-container">
    <?php
    if ($this->session->flashdata('confirmation')) {
        echo '<div class="alert alert-danger ">' . $this->session->flashdata('confirmation') . '</div>';
    }
    ?>
    <div class="card ">
        <div class="card-header text-center rounded"><a href=""><img class="logo-img" src="<?php echo base_url() ?>assets/images/logo.jpg" width=200></a></div>
        <div class="card-body">
            <!-- <h3 class="text-center">LOGIN DISINI</h3> -->
            <form method="post" action="<?php echo base_url() ?>login/verifikasi">
                <input type="hidden" name="redirect_url" value="<?php echo $redirect_url; ?>" />
                <div class="form-group">
                    <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0  text-center">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="<?php echo base_url() ?>registrasi" class="footer-link">Registrasi</a></div>
                <!-- <div class="card-footer-item card-footer-item-bordered">
                <a href="#" class="footer-link">Lupa</a>
            </div> -->
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
