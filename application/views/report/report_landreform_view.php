<form class="" action="<?php echo base_url() ?>report_landreform/show_filter" method="post">
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
                        <td class="text-center">No</td>
                        <td class="text-left">Asal Tanah</td>
                        <td class="text-center">Bidang</td>
                        <td class="text-center">Luas (Ha)</td>
                    </tr>
                    <tr class="report_tr text-dark">
                        <td class="text-center" colspan="2">Total</td>
                        <td class="text-center"><?php echo $total_bidang ?></td>
                        <td class="text-center"><?php echo $luas_bidang ?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-left">Kelebihan Maksimum</td>
                        <td class="text-center"><?php echo $maksimum->total_bidang ?></td>
                        <td class="text-center"><?php echo $maksimum->luas_bidang != '' ? $maksimum->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-left">Absente</td>
                        <td class="text-center"><?php echo $absente->total_bidang ?></td>
                        <td class="text-center"><?php echo $absente->luas_bidang != '' ? $absente->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-left">Swapraja</td>
                        <td class="text-center"><?php echo $swarpraja->total_bidang ?></td>
                        <td class="text-center"><?php echo $swarpraja->luas_bidang != '' ? $swarpraja->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-left">Negara Lainnya :</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">A. Eks HGU</td>
                        <td class="text-center"><?php echo $eks_hgu->total_bidang ?></td>
                        <td class="text-center"><?php echo $eks_hgu->luas_bidang != '' ? $eks_hgu->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">B. Pelepasan HGU</td>
                        <td class="text-center"><?php echo $pelepasan_hgu->total_bidang ?></td>
                        <td class="text-center"><?php echo $pelepasan_hgu->luas_bidang != '' ? $pelepasan_hgu->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">C. Tanah Terlantar</td>
                        <td class="text-center"><?php echo $tanah_terlantar->total_bidang ?></td>
                        <td class="text-center"><?php echo $tanah_terlantar->luas_bidang != '' ? $tanah_terlantar->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">D. Tanah Penyelesaian SKP</td>
                        <td class="text-center"><?php echo $penyelesaian_skp->total_bidang ?></td>
                        <td class="text-center"><?php echo $penyelesaian_skp->luas_bidang != '' ? $penyelesaian_skp->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">E. Tanah Dari Pelepasan Kawasan Hutan</td>
                        <td class="text-center"><?php echo $kawawan_hutan->total_bidang ?></td>
                        <td class="text-center"><?php echo $kawawan_hutan->luas_bidang != '' ? $kawawan_hutan->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">F. Tanah Timbul</td>
                        <td class="text-center"><?php echo $tanah_timbul->total_bidang ?></td>
                        <td class="text-center"><?php echo $tanah_timbul->luas_bidang != '' ? $tanah_timbul->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">G. Tanah Bekas Tambang Yang Telah Dikremasi</td>
                        <td class="text-center"><?php echo $bekas_tambang->total_bidang ?></td>
                        <td class="text-center"><?php echo $bekas_tambang->luas_bidang != '' ? $bekas_tambang->luas_bidang : 0; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center"></td>
                        <td class="text-left">H. Tanah Negara Dalam Penguasaan Masyarakat</td>
                        <td class="text-center"><?php echo $negara_penggunaan_masyarakat->total_bidang ?></td>
                        <td class="text-center"><?php echo $negara_penggunaan_masyarakat->luas_bidang != '' ? $negara_penggunaan_masyarakat->luas_bidang : 0; ?></td>
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
        "pageLength": 50,
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
