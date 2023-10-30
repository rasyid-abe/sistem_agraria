<?php if($this->session->flashdata()): ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="alert alert-<?php echo $this->session->flashdata('class');?> alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>
<div class="dashboard-short-list">
    <div class="row">
        <!-- ============================================================== -->
        <!-- shortable list  -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 co-12">
            <a href="<?php echo base_url() ?>user/edit_password/<?php echo $query->user_id ?>" class="btn btn-sm btn-dark mybtn">Ubah Password</a>
            <section class="card card-fluid">
                <h5 class="card-header drag-handle"> Detail Data User </h5>
                <ul class="sortable-lists list-group list-group-flush list-group-bordered" id="items">
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->user_nama; ?> </b>
                        <div class="btn-group ml-auto">Nama</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $gender; ?> </b>
                        <div class="btn-group ml-auto">Jenis Kelamin</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->user_agama; ?> </b>
                        <div class="btn-group ml-auto">Agama</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->user_alamat; ?> </b>
                        <div class="btn-group ml-auto">Alamat</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->user_hp; ?> </b>
                        <div class="btn-group ml-auto">No. HP</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->user_email; ?> </b>
                        <div class="btn-group ml-auto">Email</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->user_username; ?> </b>
                        <div class="btn-group ml-auto">Username</div>
                    </li>
                </ul>
            </section>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end shortable list  -->
    <!-- ============================================================== -->
</div>
