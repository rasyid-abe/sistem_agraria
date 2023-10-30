<?php if($this->session->flashdata('flash')): ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-sm-12 text-left">
        <a href="<?php echo base_url() ?>terkait_akses/edit_data/<?php echo  $query->akses_obyek_id ?>" class="btn btn-sm btn-secondary mybtn">Ubah Data Akses</a>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 co-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle"> Detail Akses  </h5>
            <div class="dd">
                <ol class="dd-list">
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Inventarisasi (NIS) Obyek</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->akses_inventaris_nomor ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Sertifikat Pernah Dijaminkan</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->akses_sertifikat_dijamin  ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="12">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div> Kegiatan Produk Pertanian </div>
                        </div>
                        <?php if($query->akses_potensi != ""){?>
                        <?php $cek = json_decode($query->akses_potensi); ?>
                        <?php foreach ($cek as $key => $value): ?>
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                        <div class="ml-2"></div>
                            <b class="pr-3">  <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $value;?> </b>
                        </div>
                        <?php endforeach; ?>

                    </li>
                    <?php if (in_array("Lainnya", $cek)){ ?>
                        <li class="dd-item" data-id="12">
                            <div class="dd-handle"> <span class="drag-indicator"></span>
                                <div class="ml-3"></div>
                                <b> <i class="fa fa-fw fas fa-angle-right"></i> <?php echo $query->akses_potensi_lainnya ?></b>
                            </div>
                        </li>
                    <?php } ?>
                    <?php } ?>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div>Bantuan Pernah Diterima</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->akses_bantuan_dari ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div>Bantuan Dari</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo $query->akses_bantuan_dari ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div>Tanggal Bantuan</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo date('d F Y', strtotime($query->akses_bantuan_tanggal)) ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div>Pendapatan Sebelum Sertifikat</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo number_format($query->akses_pendapatan_sebelum, 0, '.', '.') ?></b>
                            </div>
                        </div>
                    </li>
                    <li class="dd-item" data-id="13">
                        <div class="dd-handle"> <span class="drag-indicator"></span>
                            <div>Pendapatan Sesudah Sertifikat</div>
                            <div class="dd-nodrag btn-group ml-auto">
                                <b class="pr-3"><?php echo number_format($query->akses_pendapatan_sesudah, 0, '.', '.') ?></b>
                            </div>
                        </div>
                    </li>
                </ol>
            </div>
        </section>
    </div>
</div>
