<form class="" action="<?php echo base_url() ?>report_jenis_pemilikan_tanah/show_filter" method="post">
    <div class="form-group row">
        <div class="col-sm-3">
            <select class="form-control" name="provinsi" id="provinsi" onchange="change_provinsi()">
                <option value="">--Pilih Provinsi--</option>
                <?php foreach ($provinsi as $row) { ?>
                    <option value="<?php echo $row->provinsi_id; ?>"><?php echo $row->provinsi_nama; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-3">
            <select class="form-control" name="kabupaten" id="kabupaten" onchange="change_kabupaten()" disabled>
                <option value="">--Pilih Kabupaten/Kota--</option>
            </select>
        </div>
        <div class="col-sm-3">
            <select class="form-control" name="kecamatan" id="kecamatan" onchange="change_kecamatan()" disabled>
                <option value="">--Pilih Kecamatan--</option>
            </select>
        </div>
        <div class="col-sm-3">
            <select class="form-control" name="kelurahan" id="kelurahan" disabled>
                <option value="">--Pilih Kelurahan/Desa--</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <input class="btn btn-sm btn-secondary mybtn pull-right" type="submit" name="filter" value="Filter">
            <input class="btn btn-sm btn-dark mybtn pull-right" type="reset" name="reset" value="Reset">
            <input class="btn btn-sm btn-primary mybtn pull-right" type="submit" name"export" id="export" value="Export Data">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <?php
                if(isset($prov_nama)) {
                    if(isset($kab)){
                        if(isset($kec)){
                            if(isset($kel)){
                                echo 'Filter => Kelurahan/Desa : <b> ' . $kel->kelurahan_nama . ' </b>| Kecamatan : <b> ' . $kec->kecamatan_nama . ' </b>| Kabupaten/Kota : <b> ' . $kab->kabupaten_nama . ' </b>| Provinsi : <b>' . $prov_nama . '</b>';
                            } else {
                                echo 'Filter => Kecamatan : <b> ' . $kec->kecamatan_nama . ' </b>| Kabupaten/Kota : <b> ' . $kab->kabupaten_nama . ' </b>| Provinsi : <b>' . $prov_nama . '</b>';
                            }
                        } else {
                            echo 'Filter => Kabupaten/Kota : <b> ' . $kab->kabupaten_nama . ' </b>| Provinsi : <b>' . $prov_nama . '</b>';
                        }
                    } else {
                        echo 'Filter => Provinsi : <b>' . $prov_nama . '</b>';
                    }
                }
            ?>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card report_view">
            <table class="table table-sm table table-striped" width=100% id="zero_config">
                <thead>
                    <tr class="bg-light text-dark">
                        <td class="text-center"rowspan="2">No</td>
                        <td class="text-center"rowspan="2">Kelompok Luas Penguasaan Tanah</td>
                        <td class="text-center"colspan="2">Terdaftar</td>
                        <td class="text-center"colspan="2">Tidak Terdaftar</td>
                    </tr>
                    <tr class="bg-light text-dark">
                        <td class="text-center">Bidang</td>
                        <td class="text-center">Luas</td>
                        <td class="text-center">Bidang</td>
                        <td class="text-center">Luas</td>
                    </tr>
                    <tr class="report_tr text-dark">
                        <td class="text-center" colspan="2">Total</td>
                        <td class="text-center"><?php echo $total_terdaftar->total_bidang != '' ? $total_terdaftar->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_terdaftar->total_luas != '' ? $total_terdaftar->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_tidak_terdaftar->total_bidang != '' ? $total_tidak_terdaftar->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_tidak_terdaftar->total_luas != '' ? $total_tidak_terdaftar->total_luas : 0;?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">1 - 100 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang100'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas100'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang100'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas100'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">100 - 200 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang200'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas200'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang200'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas200'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">200 - 300 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang300'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas300'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang300'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas300'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">300 - 400 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang400'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas400'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang400'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas400'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-center">400 - 500 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang500'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas500'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang500'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas500'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-center">500 - 600 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang600'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas600'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang600'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas600'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">7</td>
                        <td class="text-center">600 - 700 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang700'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas700'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang700'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas700'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td class="text-center">700 - 800 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang800'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas800'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang800'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas800'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">9</td>
                        <td class="text-center">800 - 900 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang900'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas900'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang900'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas900'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">10</td>
                        <td class="text-center">900 - 1000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas1000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas1000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">11</td>
                        <td class="text-center">1000 - 2000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas2000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas2000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">12</td>
                        <td class="text-center">2000 - 3000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas3000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas3000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">13</td>
                        <td class="text-center">3000 - 4000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas4000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas4000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">14</td>
                        <td class="text-center">4000 - 5000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas5000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas5000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">15</td>
                        <td class="text-center">5000 - 6000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas6000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas6000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">16</td>
                        <td class="text-center">6000 - 7000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas7000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas7000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">17</td>
                        <td class="text-center">7000 - 8000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas8000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas8000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">18</td>
                        <td class="text-center">8000 - 9000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas9000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas9000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">19</td>
                        <td class="text-center">9000 - 10000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas10000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas10000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">20</td>
                        <td class="text-center">10.000 - 20.000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luas20000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luas20000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">21</td>
                        <td class="text-center"> > 20.000 m2</td>
                        <td class="text-center"><?php echo $terdaftar['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $terdaftar['luasmore'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $tidak_terdaftar['luasmore'] ?></td>
                    </tr>
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
        "ordering": false,
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


function change_provinsi() {
    let provinsi_id = $('#provinsi').val();
    if(provinsi_id){
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("terkait_obyek/get_kabupaten_by_provinsi_id") ?>',
            data: 'provinsi_id='+provinsi_id,
            dataType: 'json',
            success: function(response) {
                option_kabupaten = '<option value="">--Pilih Kabupaten/Kota--</option>';
                $.each(response, function(key, val){
                    option_kabupaten += '<option value="'+val.kabupaten_id+'">'+val.kabupaten_nama+'</option>';
                });
                $('#kabupaten').html(option_kabupaten).removeAttr( 'disabled' );
                let kecamatan = '<option value="">--Pilih Kecamatan--</option>';
                $('#kecamatan').html(kecamatan).attr( 'disabled', 'true' );
                let kelurahan = '<option value="">--Pilih Kelurahan/Desa--</option>';
                $('#kelurahan').html(kelurahan).attr( 'disabled', 'true' );
            }
        });
    }
}

function change_kabupaten() {
    let kabupaten_id = $('#kabupaten').val();
    if(kabupaten_id){
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("terkait_obyek/get_kecamatan_by_kabupaten_id") ?>',
            data: 'kabupaten_id='+kabupaten_id,
            dataType: 'json',
            success: function(response) {
                option_kecamatan = '<option value="">--Pilih Kecamatan--</option>';
                $.each(response, function(key, val){
                    option_kecamatan += '<option value="'+val.kecamatan_id+'">'+val.kecamatan_nama+'</option>';
                });
                $('#kecamatan').html(option_kecamatan).removeAttr('disabled');
                let kelurahan = '<option value="">--Pilih Kelurahan/Desa--</option>';
                $('#kelurahan').html(kelurahan).attr( 'disabled', 'true' );
            }
        });
    }
}

function change_kecamatan() {
    let kecamatan_id = $('#kecamatan').val();
    if(kecamatan_id){
        $.ajax({
            type: 'GET',
            url: '<?php echo site_url("terkait_obyek/get_kelurahan_by_kecamatan_id") ?>',
            data: 'kecamatan_id='+kecamatan_id,
            dataType: 'json',
            success: function(response) {
                option_kelurahan = '<option value="">--Pilih Kelurahan/Desa--</option>';
                $.each(response, function(key, val){
                    option_kelurahan += '<option value="'+val.kelurahan_id+'">'+val.kelurahan_nama+'</option>';
                });
                $('#kelurahan').html(option_kelurahan).removeAttr('disabled');
            }
        });
    }
}

</script>
