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
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <table class="table table-sm" width=200% id="zero_config">
                <thead>
                    <tr>
                        <th class="text-center" width=12>Aksi</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Nomor KTP</th>
                        <th class="text-center">Pekerjaan</th>
                        <th class="text-center">Umur</th>
                        <th class="text-center">Domisili</th>
                        <th class="text-center">Jalan</th>
                        <th class="text-center">RT/RW</th>
                        <th class="text-center">Tahun Memiliki Tanah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row):
                        $dom = $row->subyek_penguasaan_domisili;
                        if($dom == 1) {
                            $domisili = "Desa Ini";
                        } elseif ($dom == 2) {
                            $domisili = "Desa Lain Berbatasan Langsung";
                        } elseif ($dom == 3) {
                            $domisili = "Desa Lain Tidak Berbatasan Langsung";
                        } elseif ($dom == 4) {
                            $domisili = "Diluar Kecamatan";
                        } else{
                            $domisili = $row->subyek_penguasaan_domisili_lainnya;
                        }
                        ?>
                        <tr>
                            <td>
                                <a class="btn btn-xs mybtn btn-info text-center" href="<?php echo base_url() ?>subyek_penguasaan/detail_data/<?php echo $row->subyek_penguasaan_id; ?>" title="Detail"><i class="fa fa-fw fas fa-list"></i></a>
                                <!-- <a class="btn btn-xs mybtn btn-secondary"href="<?php echo base_url() ?>subyek_penguasaan/edit_data/<?php echo $row->subyek_penguasaan_id; ?>" title="Ubah"><i class="fa fa-fw fas fa-edit"></i></a> -->
                                <!-- <a class="btn btn-xs mybtn btn-danger"href="<?php echo base_url() ?>subyek_penguasaan/delete_data/<?php echo $row->subyek_penguasaan_id; ?>" title="Hapus" onclick="return confirm('Anda yakin menghapus data subyek ?')"><i class="fa fa-fw fas fa-trash"></i></a> -->
                            </td>
                            <td><?php echo $row->subyek_penguasaan_nama; ?></td>
                            <td class="text-center"><?php echo $row->subyek_penguasaan_nomor_ktp; ?></td>
                            <td><?php echo $row->subyek_penguasaan_pekerjaan; ?></td>
                            <td class="text-right"><?php echo $row->subyek_penguasaan_umur; ?> Tahun</td>
                            <td><?php echo $domisili; ?></td>
                            <td><?php echo $row->subyek_penguasaan_jalan; ?></td>
                            <td class="text-center"><?php echo $row->subyek_penguasaan_rt.'/'.$row->subyek_penguasaan_rw; ?></td>
                            <td class="text-center"><?php echo $row->subyek_penguasaan_tahun_memiliki_tanah; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#zero_config').DataTable({
        "language":{
            "url":"<?php echo base_url(); ?>assets/vendor/dataTables/Indonesian.json",
            "sEmptyTable":"Tidads"
        },
        // "ordering": false,
        "columnDefs": [{
            "targets": [1,-1],
            "orderable": false
        }],
        "scrollY":        true,
        "scrollX":        true,
        "scrollCollapse": true,
        "fixedHeader":    true,
        "bInfo" :         true,
        scrollResize:     true,
        lengthChange:     true,
        searching:        true,
        paging:           true,
        fixedColumns: {
            leftColumns: 1,
            rightColumns: 1
        },
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            selector: 'td:first-child'
        },
        order: [[ 0, 'asc' ]]
    });

    var table = $('#zero_config').DataTable();

    $('#zero_config tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );

    $('#button').click( function () {
        alert( table.rows('.selected').data().length +' row(s) selected' );
    } );

});
</script>
