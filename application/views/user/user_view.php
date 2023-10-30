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
<a class="btn btn-sm btn-primary mybtn" href="<?php echo base_url() ?>/user/add_data">Tambah Data</a>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <table class="table table-sm" width=200% id="zero_config">
                <thead>
                    <tr>
                        <th class="text-center" width=12>Aksi</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Agama</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">No. HP</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Akses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row):
                        if($row->user_akses != 0){
                            if($row->user_jenis_kelamin == 0) {
                                $gender = "Laki-laki";
                            } else {
                                $gender = "Perempuan";
                            }
                            if($row->user_akses == 1){
                                $akses = "Karyawan";
                            } else if($row->user_akses ==2){
                                $akses = "User";
                            }
                            ?>
                            <tr>
                                <td>
                                    <a class="btn btn-xs mybtn btn-info"href="<?php echo base_url() ?>user/detail_data/<?php echo $row->user_id; ?>" title="Detail"><i class="fa fa-fw fas fa-list"></i></a>
                                    <a class="btn btn-xs mybtn btn-secondary"href="<?php echo base_url() ?>user/edit_data/<?php echo $row->user_id; ?>" title="Ubah"><i class="fa fa-fw fas fa-edit"></i></a>
                                    <a class="btn btn-xs mybtn btn-danger"href="<?php echo base_url() ?>user/delete_data/<?php echo $row->user_id; ?>" title="Hapus" onclick="return confirm('Anda yakin menghapus data user?')"><i class="fa fa-fw fas fa-trash"></i></a>
                                </td>
                                <td><?php echo $row->user_nama; ?></td>
                                <td class="text-center"><?php echo $gender; ?></td>
                                <td class="text-center"><?php echo $row->user_agama; ?></td>
                                <td><?php echo $row->user_alamat; ?></td>
                                <td class="text-center"><?php echo $row->user_hp; ?></td>
                                <td class="text-center"><?php echo $row->user_email; ?></td>
                                <td class="text-center"><?php echo $row->user_username; ?></td>
                                <td class="text-center"><?php echo $akses; ?></td>
                            </tr>
                        <?php } ?>
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



    $('#potensi').on('click', function(){
        $('#forModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#id').val('');
        $('#nama').val('');
        $('#nip').val('');
        $('#email').val('');
        $('#jurusan').val('');
    });

    $('#potensi').on('click', function(){
        $('#forModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nip').val(data.nip);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
            }
        });

    });


</script>
