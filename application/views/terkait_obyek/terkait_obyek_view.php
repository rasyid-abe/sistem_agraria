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

<a class="btn btn-sm btn-primary mybtn" href="<?php echo base_url() ?>/terkait_obyek/add_data">Tambah Data</a>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <table class="table table-sm" width=200% id="zero_config">
                <thead>
                    <tr>
                        <th class="text-center" width=12>Aksi</th>
                        <th class="text-center">Titik Koordinat</th>
                        <th class="text-center">Nomor Inventarisasi</th>
                        <th class="text-center">NIB</th>
                        <th class="text-center">PBB</th>
                        <th class="text-center">Penguasaan Tanah</th>
                        <th class="text-center">Perolehan Tanah</th>
                        <th class="text-center">Pemilikan Tanah</th>
                        <th class="text-center">Sengketa, Konflik & Perkara</th>
                        <th class="text-center">Potensi Landreform</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row):
                        ?>
                        <tr>
                            <td>
                                <a class="btn btn-xs mybtn btn-success"href="<?php echo base_url() ?>subyek_penguasaan/detail_data/<?php echo $row->obyek_id; ?>" title="Penguasaan"><i class="fa fa-fw fas fa-plus"></i></a>
                                <a class="btn btn-xs mybtn btn-dark"href="<?php echo base_url() ?>terkait_akses/detail_data/<?php echo $row->obyek_id; ?>" title="Akses"><i class="fa fa-fw fas fa-calendar-plus"></i></a>
                                <a class="btn btn-xs mybtn btn-info"href="<?php echo base_url() ?>terkait_obyek/detail_data/<?php echo $row->obyek_id; ?>" title="Detail"><i class="fa fa-fw fas fa-list"></i></a>
                                <a class="btn btn-xs mybtn btn-secondary"href="<?php echo base_url() ?>terkait_obyek/edit_data/<?php echo $row->obyek_id; ?>" title="Ubah"><i class="fa fa-fw fas fa-edit"></i></a>
                                <a class="btn btn-xs mybtn btn-danger"href="<?php echo base_url() ?>terkait_obyek/delete_data/<?php echo $row->obyek_id; ?>" title="Hapus" onclick="return confirm('Anda yakin menghapus data subyek ?')"><i class="fa fa-fw fas fa-trash"></i></a>
                            </td>
                            <td class="text-center"> <a href="<?php echo base_url() ?>maps/show/<?php echo $row->obyek_id ?>"><?php echo $row->obyek_koordinat_x . ',' . $row->obyek_koordinat_y ?></a> </td>
                            <td class="text-center"><?php echo $row->obyek_nomor_inventaris; ?></td>
                            <td class="text-center"><?php echo $row->obyek_nib; ?></td>
                            <td class="text-center"><?php echo $row->obyek_pbb; ?></td>
                            <td class="text-center"><?php echo $row->obyek_penguasaan_tanah; ?></td>
                            <td class="text-center"><?php echo $row->obyek_perolehan_tanah; ?></td>
                            <td class="text-center"><?php echo $row->obyek_pemilikan_tanah; ?></td>
                            <td class="text-center"><?php echo $row->obyek_sengketa_konflik_perkara; ?></td>
                            <td class="text-center"><?php echo $row->obyek_potensi_landreform; ?></td>
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
