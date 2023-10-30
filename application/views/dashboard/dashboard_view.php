
<div class="row">
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Total Subyek</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary"><?php
                        $nilai_subyek = $subyek != '' ? $subyek : 0;
                        echo number_format($nilai_subyek, 0, '.', '.')
                    ?></h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success">
                </div>
            </div>
            <div id="sparkline-1"></div>
        </div>
    </div>
    <!-- /. metric -->
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Total Obyek</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary"><?php
                    $nilai_obyek = $obyek->total_obyek != '' ? $obyek->total_obyek : 0 ;
                    echo number_format($nilai_obyek, 0, '.', '.')
                    ?></h1>
                </div>
                <div class="metric-label d-inline-block float-right text-danger">
                </div>
            </div>
            <div id="sparkline-2"></div>
        </div>
    </div>
    <!-- /. metric -->
    <!-- metric -->
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Total Luas Bidang</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary"><?php
                    $nilai_luas = $obyek->luas_obyek != ''  ? $obyek->luas_obyek : 0;
                    echo number_format($nilai_luas, 0, '.', '.')
                    ?></h1>
                </div>
                <div class="metric-label d-inline-block float-right text-danger">
                </div>
            </div>
            <div id="sparkline-3">
            </div>
        </div>
    </div>
    <!-- /. metric -->
</div>
<div class="row">
    <div class="col-xl-1 col-lg-12 col-md-8 col-sm-12 col-12" style="display: none;">
        <div class="card">
            <h5 class="card-header">Revenue</h5>
            <div class="card-body">
                <canvas id="revenue" width="400" height="150"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12" id="penggunaan-ch">
        <div class="card">
            <h5 class="card-header">Jenis Penggunaan Tanah <a href="<?php echo base_url() ?>report_jenis_penggunaan_tanah" class="btn btn-sm btn-primary float-right" style="margin-top: -10px;">Detail</a> </h5>
            <div class="card-body">
                <canvas id="penggunaan-chart" width="220" height="155"></canvas>
                <div class="chart-widget-list">
                    <p>
                        <span></span><span class="legend-text">Jenis Penggunaan</span>
                        <span class="float-right">Luas</span>
                    </p>
                    <p>
                        <span class="fa-xs text-success mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text">Pemukiman</span>
                        <span class="float-right"><?php
                        $pemukiman = $total_pemukiman->total_luas != '' ? $total_pemukiman->total_luas : 0;
                        echo number_format($pemukiman, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-secondary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Sawah Irigasi</span>
                        <span class="float-right"><?php
                        $irigasi = $total_sawah_irigasi->total_luas != '' ? $total_sawah_irigasi->total_luas : 0;
                        echo number_format($irigasi, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-primary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Sawah Nonirigasi</span>
                        <span class="float-right"><?php
                        $nonirigasi = $total_sawah_nonirigasi->total_luas != '' ? $total_sawah_nonirigasi->total_luas : 0;
                        echo number_format($nonirigasi, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-warning mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Telaga, Ladang</span>
                        <span class="float-right"><?php
                        $telaga = $total_telaga->total_luas != '' ? $total_telaga->total_luas : 0;
                        echo number_format($telaga, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-danger mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Kebun Campuran</span>
                        <span class="float-right"><?php
                        $kebun = $total_kebun->total_luas != '' ? $total_kebun->total_luas : 0;
                        echo number_format($kebun, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-dark mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Tambak</span>
                        <span class="float-right"><?php
                        $tambak = $total_tambak->total_luas != '' ? $total_tambak->total_luas : 0;
                        echo number_format($tambak, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-info mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Tanah Kosong</span>
                        <span class="float-right"><?php
                        $kosong = $total_tanah_kosong->total_luas != '' ? $total_tanah_kosong->total_luas : 0;
                        echo number_format($kosong, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-muted mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Fasos, Fasum</span>
                        <span class="float-right"><?php
                        $fasos = $total_fasos->total_luas != '' ? $total_fasos->total_luas : 0;
                        echo number_format($fasos, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-brand mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Industri</span>
                        <span class="float-right"><?php
                        $industri = $total_industri->total_luas != '' ? $total_industri->total_luas : 0;
                        echo number_format($industri, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs mr-1 legend-title" style="color:purple;"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Peternakan</span>
                        <span class="float-right"><?php
                        $peternakan = $total_peternakan->total_luas != '' ? $total_peternakan->total_luas : 0;
                        echo number_format($peternakan, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs mr-1 legend-title" style="color:darkblue;"><i class="fa fa-fw fa-square-full"></i></span> <span class="legend-text">Lainnya</span>
                        <span class="float-right"><?php
                        $lainnya = $total_lainnya->total_luas != '' ? $total_lainnya->total_luas : 0;
                        echo number_format($lainnya, 0, '.', '.');
                        ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12" id="pemanfaatan-ch">
        <div class="card">
            <h5 class="card-header">Jenis Pemanfaatan Tanah <a href="<?php echo base_url() ?>report_jenis_pemanfaatan_tanah" class="btn btn-sm btn-primary float-right" style="margin-top: -10px;">Detail</a> </h5>
            <div class="card-body">
                <canvas id="pemanfaatan-chart" width="220" height="155"></canvas>
                <div class="chart-widget-list">
                    <p>
                        <span></span><span class="legend-text">Jenis Pemanfaatan</span>
                        <span class="float-right">Luas</span>
                    </p>
                    <p>
                        <span class="fa-xs text-success mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text">Tempat Tinggal</span>
                        <span class="float-right"><?php
                        $tempat_tinggal = $total_tempat_tinggal->total_luas != '' ? $total_tempat_tinggal->total_luas : 0;
                        echo number_format($tempat_tinggal, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-secondary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Kegiatan Produksi</span>
                        <span class="float-right"><?php
                        $pertanian = $total_pertanian->total_luas != '' ? $total_pertanian->total_luas : 0;
                        echo number_format($pertanian, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-primary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Kegiatan Perdagangan</span>
                        <span class="float-right"><?php
                        $ekonomi = $total_ekonomi->total_luas != '' ? $total_ekonomi->total_luas : 0;
                        echo number_format($ekonomi, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-warning mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Usaha Jasa</span>
                        <span class="float-right"><?php
                        $usaha = $total_jasa->total_luas != '' ? $total_jasa->total_luas : 0;
                        echo number_format($usaha, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-danger mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Fasos/Fasum</span>
                        <span class="float-right"><?php
                        $fasum = $total_fasum->total_luas != '' ? $total_fasum->total_luas : 0;
                        echo number_format($fasum, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-dark mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Tidak Ada Pemanfaatan</span>
                        <span class="float-right"><?php
                        $useless = $total_useless->total_luas != '' ? $total_useless->total_luas : 0;
                        echo number_format($useless, 0, '.', '.');
                        ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12" id="pemilikan-ch">
        <div class="card">
            <h5 class="card-header">Jenis Pemilikan Tanah <a href="<?php echo base_url() ?>report_jenis_pemanfaatan_tanah" class="btn btn-sm btn-primary float-right" style="margin-top: -10px;">Detail</a> </h5>
            <div class="card-body">
                <canvas id="pemilikan-chart" width="220" height="155"></canvas>
                <div class="chart-widget-list">
                    <p>
                        <span></span><span class="legend-text">Jenis Pemmilikan</span>
                        <span class="float-right">Luas</span>
                    </p>
                    <p>
                        <span class="fa-xs text-info mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span><span class="legend-text">Terdaftar</span>
                        <span class="float-right"><?php
                        $terdaftar = $total_terdaftar->total_luas != '' ? $total_terdaftar->total_luas : 0;
                        echo number_format($terdaftar, 0, '.', '.');
                        ?></span>
                    </p>
                    <p>
                        <span class="fa-xs text-muted mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                        <span class="legend-text">Tidak Terdaftar</span>
                        <span class="float-right"><?php
                        $tidak_terdaftar =  $total_tidak_terdaftar->total_luas != '' ? $total_tidak_terdaftar->total_luas : 0;
                        echo number_format($tidak_terdaftar, 0, '.', '.');
                        ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h3 class="text-center">Aktivitas User</h3>
            <table class="table table-sm" width=100% id="zero_config">
                <thead>
                    <tr>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">User</th>
                        <th class="text-left">Aktivitas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($query as $row):?>
                        <tr>
                            <td class="text-center"><?php echo date('d F Y H:i:s', strtotime($row->log_activity_datetime)); ?></td>
                            <td class="text-center"><?php echo $row->log_activity_user; ?></td>
                            <td class="text-left"><?php echo $row->log_activity_desc; ?></td>
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
        order: [[ 0, 'desc' ]]
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
<script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>
<script type="text/javascript">

$(document).ready(function() {
    get_data_penggunaan_chart();
    get_data_pemanfaatan_chart();
    get_data_pemilikan_chart();
});

var pemukiman = '';
var irigasi = '';
var nonirigasi = '';
var telaga = '';
var kebun = '';
var tambak = '';
var tanahkosong = '';
var fasos = '';
var industri = '';
var peternakan = '';
var lainnya = '';

function get_data_penggunaan_chart() {

    $.ajax({
        type: 'GET',
        url: '<?php echo site_url('dashboard/get_data_penggunaan_chart')?>',
        dataType: 'json',
        async: false,
        success: function (res) {
            pemukiman = res.total_pemukiman.total_bidang != null ? res.total_pemukiman.total_bidang : 0;
            irigasi = res.total_sawah_irigasi.total_bidang != null ? res.total_sawah_irigasi.total_bidang : 0;
            nonirigasi = res.total_sawah_nonirigasi.total_bidang != null ? res.total_sawah_nonirigasi.total_bidang : 0;
            telaga = res.total_telaga.total_bidang != null ? res.total_telaga.total_bidang : 0;
            kebun = res.total_kebun.total_bidang != null ? res.total_kebun.total_bidang : 0;
            tambak = res.total_tambak.total_bidang != null ? res.total_tambak.total_bidang : 0;
            tanahkosong = res.total_tanah_kosong.total_bidang != null ? res.total_tanah_kosong.total_bidang : 0;
            fasos = res.total_fasos.total_bidang != null ? res.total_fasos.total_bidang : 0;
            industri = res.total_industri.total_bidang != null ? res.total_industri.total_bidang : 0;
            peternakan = res.total_peternakan.total_bidang != null ? res.total_peternakan.total_bidang : 0;
            lainnya = res.total_lainnya.total_bidang != null ? res.total_lainnya.total_bidang : 0;

            cek = pemukiman + irigasi + nonirigasi + telaga + kebun + tambak + tanahkosong + fasos + industri + peternakan + lainnya;
            if(cek < 1) {
                $('#penggunaan-ch').attr("style", "display:none");
            }
        }
    });

    $(function() {
        "use strict";
        var ctx = document.getElementById("penggunaan-chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',

            data: {
                labels: ["Pemukiman", "Sawah Irigasi", "Sawah Nonirigasi", "Telaga, Ladang","Kebun Campuran", "Tambak", "Tanah Kosong", "Fasos, Fasum", "Industri", "Peternakan", "Lainnya"],
                datasets: [{
                    backgroundColor: [
                        "#2ec551",
                        "#ff407b",
                        "#5969ff",
                        "#ffc107",
                        "#ef172c",
                        "#3d405c",
                        "#25d5f2",
                        "#7171a6",
                        "#ffc750",
                        "#800080",
                        "#00008b"
                    ],
                    data: [pemukiman, irigasi, nonirigasi, telaga, kebun, tambak, tanahkosong, fasos, industri, peternakan, lainnya]
                }]
            },
            options: {
                legend: {
                    display: false

                }
            }

        });

    });
}

var tempat_tinggal = '';
var kegiatan_produksi = '';
var kegiatan_perdagangan = '';
var usaha_jasa = '';
var fasum = '';
var useless = '';

function get_data_pemanfaatan_chart() {

    $.ajax({
        type: 'GET',
        url: '<?php echo site_url('dashboard/get_data_pemanfaatan_chart')?>',
        dataType: 'json',
        async: false,
        success: function (res) {
            tempat_tinggal = res.total_tempat_tinggal.total_bidang != null ? res.total_tempat_tinggal.total_bidang : 0;
            kegiatan_produksi = res.total_pertanian.total_bidang != null ? res.total_pertanian.total_bidang : 0;
            kegiatan_perdagangan = res.total_ekonomi.total_bidang != null ? res.total_ekonomi.total_bidang : 0;
            usaha_jasa = res.total_jasa.total_bidang != null ? res.total_jasa.total_bidang : 0;
            fasum = res.total_fasum.total_bidang != null ? res.total_fasum.total_bidang : 0;
            useless = res.total_useless.total_bidang != null ? res.total_useless.total_bidang : 0;

            cek = tempat_tinggal + kegiatan_produksi + kegiatan_perdagangan + usaha_jasa + fasum + useless;
            if(cek < 1){
                $('#pemanfaatan-ch').attr('style','display:none');
            }
        }
    });

    $(function() {
        "use strict";
        var ctx = document.getElementById("pemanfaatan-chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',

            data: {
                labels: ["Tempat Tinggal", "Kegiatan Produksi", "Kegiatan Perdagangan", "Usaha Jasa", "Fasos/Fasum", "Tidak Ada Pemanfaatan"],
                datasets: [{
                    backgroundColor: [
                        "#2ec551",
                        "#ff407b",
                        "#5969ff",
                        "#ffc107",
                        "#ef172c",
                        "#3d405c"
                    ],
                    data: [tempat_tinggal, kegiatan_produksi, kegiatan_perdagangan, usaha_jasa, fasum, useless]
                }]
            },
            options: {
                legend: {
                    display: false

                }
            }

        });

    });
}

var terdaftar = '';
var tidak_terdaftar = '';

function get_data_pemilikan_chart() {

    $.ajax({
        type: 'GET',
        url: '<?php echo site_url('dashboard/get_data_pemilikan_chart')?>',
        dataType: 'json',
        async: false,
        success: function (res) {
            terdaftar = res.total_terdaftar.total_bidang != null ? res.total_terdaftar.total_bidang : 0;
            tidak_terdaftar = res.total_tidak_terdaftar.total_bidang != null ? res.total_tidak_terdaftar.total_bidang : 0;

            cek = terdaftar + tidak_terdaftar;
            if(cek < 1){
                $('#pemilikan-ch').attr('style','display:none');
            }
        }
    });

    $(function() {
        "use strict";
        var ctx = document.getElementById("pemilikan-chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',

            data: {
                labels: ["Terdaftar", "Tidak Terdaftar"],
                datasets: [{
                    backgroundColor: [
                        "#25d5f2",
                        "#7171a6",
                    ],
                    data: [terdaftar, tidak_terdaftar]
                }]
            },
            options: {
                legend: {
                    display: false

                }
            }

        });

    });
}


</script>
