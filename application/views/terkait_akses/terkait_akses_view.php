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
                        <th class="text-center">Inventarisasi Obyek</th>
                        <th class="text-center">Sertifikat Dijaminkan</th>
                        <th class="text-center">Bantuan</th>
                        <th class="text-center">Jenis Bantuan</th>
                        <th class="text-center">Bantuan Dari</th>
                        <th class="text-center">Tanggal Bantuan</th>
                        <th class="text-center">Pependapatan Sebelum Sertifikat</th>
                        <th class="text-center">Pependapatan Sesudah Sertifikat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row):
                        if($row->akses_bantuan_jenis != '' && $row->akses_bantuan_dari != '' && $row->akses_bantuan_tanggal !='') {
                            $bantuan = "Pernah Menerima";
                            $jenis_bantuan = $row->akses_bantuan_jenis;
                            $bantuan_dari = $row->akses_bantuan_dari;
                            $tgl_bantuan = $row->akses_bantuan_tanggal;
                        } else {
                            $bantuan = '-';
                            $jenis_bantuan = '-';
                            $bantuan_dari = '-';
                            $tgl_bantuan = '-';
                        }
                        ?>
                        <tr>
                            <td>
                                <a class="btn btn-xs mybtn btn-info"href="<?php echo base_url() ?>terkait_akses/detail_data/<?php echo $row->akses_obyek_id; ?>" title="Detail"><i class="fa fa-fw fas fa-list"></i></a>
                                <!-- <a class="btn btn-xs mybtn btn-secondary"href="<?php echo base_url() ?>terkait_akses/edit_data/<?php echo $row->akses_id; ?>" title="Ubah"><i class="fa fa-fw fas fa-edit"></i></a> -->
                                <!-- <a class="btn btn-xs mybtn btn-danger"href="<?php echo base_url() ?>terkait_akses/delete_data/<?php echo $row->akses_id; ?>" title="Hapus" onclick="return confirm('Anda yakin menghapus data subyek ?')"><i class="fa fa-fw fas fa-trash"></i></a> -->
                            </td>
                            <td><?php echo $row->akses_inventaris_nomor; ?></td>
                            <td class="text-left"><?php echo $row->akses_sertifikat_dijamin; ?></td>
                            <td class="text-left"><?php echo $bantuan; ?></td>
                            <td><?php echo $jenis_bantuan; ?></td>
                            <td><?php echo $bantuan_dari; ?></td>
                            <td class="text-center"><?php echo $tgl_bantuan; ?></td>
                            <td class="text-right"><?php echo $row->akses_pendapatan_sebelum; ?></td>
                            <td class="text-right"><?php echo $row->akses_pendapatan_sesudah; ?></td>
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
