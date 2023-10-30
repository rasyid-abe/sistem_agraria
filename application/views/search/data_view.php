<div class="dashboard-short-list">
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 co-12">
            <section class="card card-fluid">
                <h5 class="card-header drag-handle"> Data Subyek </h5>
                <ul class="sortable-lists list-group list-group-flush list-group-bordered" id="items">
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_nama; ?> </b>
                        <div class="btn-group ml-auto">Nama</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_nomor_ktp; ?> </b>
                        <div class="btn-group ml-auto">Nomor KTP</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_pekerjaan; ?> </b>
                        <div class="btn-group ml-auto">Pekerjaan</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $domisili; ?> </b>
                        <div class="btn-group ml-auto">Domisili</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_jalan; ?> </b>
                        <div class="btn-group ml-auto">Jalan</div>
                    </li>
                    <li class="list-group-item align-items-center drag-handle">
                        <span class="drag-indicator"></span>
                        <b id="mybold"> <?php echo $query->subyek_rt.' / '.$query->subyek_rw; ?> </b>
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
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 co-12">
            <section class="card card-fluid">
                <h5 class="card-header drag-handle">Data Obyek </h5>
                <ul class="sortable-lists list-group list-group-flush list-group-bordered" id="item-2">
                    <table class="table table-sm" width=100% id="zero_config">
                        <thead>
                            <tr>
                                <th class="text-center">Nomor Inventarisasi</th>
                                <th class="text-center">PBB</th>
                                <th class="text-center">Luas Bidang</th>
                                <!-- <th class="text-center">Perolehan Tanah</th> -->
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obyek as $row): ?>
                                <tr>
                                    <td class="text-center"><?php echo $row->obyek_nomor_inventaris ?></td>
                                    <td class="text-center"><?php echo $row->obyek_pbb ?></td>
                                    <td class="text-center"><?php echo $row->obyek_luas_tanah ?></td>
                                    <!-- <td><?php echo $row->obyek_luas_tanah ?></td> -->
                                    <td class="text-center"><a class="btn btn-xs mybtn btn-info"href="<?php echo base_url() ?>terkait_obyek/detail_data/<?php echo $row->obyek_id; ?>" title="Detail"><i class="fa fa-fw fas fa-list"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </ul>
            </section>
        </div>
    </div>
</div>
