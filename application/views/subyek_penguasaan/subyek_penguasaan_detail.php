<?php if($this->session->flashdata('flash')): ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="alert alert-<?php echo $this->session->flashdata('class'); ?> alert-dismissible fade show" role="alert">
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
        <div class="col-sm-12 text-left">
            <a href="<?php echo base_url() ?>subyek_penguasaan/edit_data/<?php echo  $query->subyek_penguasaan_id ?>" class="btn btn-sm btn-secondary mybtn">Ubah Data Penguasaan</a>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 co-12">
            <section class="card card-fluid">
                <h5 class="card-header drag-handle"> Data Diri Subyek Penguasaan </h5>
                <ul class="sortable-lists list-group list-group-flush list-group-bordered" id="items">
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_penguasaan_nama; ?> </b>
                        <div class="btn-group ml-auto">Nama</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_penguasaan_nomor_ktp; ?> </b>
                        <div class="btn-group ml-auto">Nomor KTP</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_penguasaan_pekerjaan; ?> </b>
                        <div class="btn-group ml-auto">Pekerjaan</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_penguasaan_umur; ?> </b>
                        <div class="btn-group ml-auto">Umur</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $status; ?> </b>
                        <div class="btn-group ml-auto">Status Perkawinan</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_penguasaan_jumlah_anggota_keluarga; ?> </b>
                        <div class="btn-group ml-auto">Anggota Keluarga</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $domisili; ?> </b>
                        <div class="btn-group ml-auto">Domisili</div>
                    </li>
                </ul>
            </section>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 co-12">
            <section class="card card-fluid">
                <h5 class="card-header drag-handle">Data Daerah Subyek Penguasaan </h5>
                <ul class="sortable-lists list-group list-group-flush list-group-bordered" id="item-2">
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_penguasaan_jalan; ?> </b>
                        <div class="btn-group ml-auto">Jalan</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_penguasaan_rt.' / '.$query->subyek_penguasaan_rw; ?> </b>
                        <div class="btn-group ml-auto">RT/RW</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $kel->kelurahan_nama; ?> </b>
                        <div class="btn-group ml-auto">Desa Kelurahan</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $kec->kecamatan_nama; ?> </b>
                        <div class="btn-group ml-auto">Kecamatan</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $kab->kabupaten_nama; ?> </b>
                        <div class="btn-group ml-auto">Kabupaten Kota</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $prov_nama; ?> </b>
                        <div class="btn-group ml-auto">Provinsi</div>
                    </li>
                </ul>
            </section>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- end shortable list  -->
    <!-- ============================================================== -->
</div>
