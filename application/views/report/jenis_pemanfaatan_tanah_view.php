<form class="" action="<?php echo base_url() ?>report_jenis_pemanfaatan_tanah/show_filter" method="post">
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
                        <td class="text-center"colspan="2">Tempat Tinggal</td>
                        <td class="text-center"colspan="2">Kegiatan Produksi Pertanian</td>
                        <td class="text-center"colspan="2">Kegiatan Ekonomi/Perdagangan</td>
                        <td class="text-center"colspan="2">Usaha Jasa</td>
                        <td class="text-center"colspan="2">Fasos/Fasum</td>
                        <td class="text-center"colspan="2">Tidak Ada Pemanfaatan</td>
                    </tr>
                    <tr class="bg-light text-dark">
                        <td class="text-center">Bidang</td>
                        <td class="text-center">Luas</td>
                        <td class="text-center">Bidang</td>
                        <td class="text-center">Luas</td>
                        <td class="text-center">Bidang</td>
                        <td class="text-center">Luas</td>
                        <td class="text-center">Bidang</td>
                        <td class="text-center">Luas</td>
                        <td class="text-center">Bidang</td>
                        <td class="text-center">Luas</td>
                        <td class="text-center">Bidang</td>
                        <td class="text-center">Luas</td>
                    </tr>
                    <tr class="report_tr text-dark">
                        <td class="text-center" colspan="2">Total</td>
                        <td class="text-center"><?php echo $total_tempat_tinggal->total_bidang != '' ? $total_tempat_tinggal->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_tempat_tinggal->total_luas != '' ? $total_tempat_tinggal->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_pertanian->total_bidang != '' ? $total_pertanian->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_pertanian->total_luas != '' ? $total_pertanian->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_ekonomi->total_bidang != '' ? $total_ekonomi->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_ekonomi->total_luas != '' ? $total_ekonomi->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_jasa->total_bidang != '' ? $total_jasa->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_jasa->total_luas != '' ? $total_jasa->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_fasum->total_bidang != '' ? $total_fasum->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_fasum->total_luas != '' ? $total_fasum->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_useless->total_bidang != '' ? $total_useless->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_useless->total_luas != '' ? $total_useless->total_luas : 0;?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">1 - 100 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang100'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas100'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang100'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas100'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang100'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas100'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang100'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas100'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang100'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas100'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang100'] ?></td>
                        <td class="text-center"><?php echo $useless['luas100'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">100 - 200 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang200'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas200'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang200'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas200'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang200'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas200'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang200'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas200'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang200'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas200'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang200'] ?></td>
                        <td class="text-center"><?php echo $useless['luas200'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">200 - 300 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang300'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas300'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang300'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas300'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang300'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas300'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang300'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas300'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang300'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas300'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang300'] ?></td>
                        <td class="text-center"><?php echo $useless['luas300'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">300 - 400 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang400'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas400'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang400'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas400'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang400'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas400'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang400'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas400'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang400'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas400'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang400'] ?></td>
                        <td class="text-center"><?php echo $useless['luas400'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-center">400 - 500 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang500'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas500'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang500'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas500'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang500'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas500'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang500'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas500'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang500'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas500'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang500'] ?></td>
                        <td class="text-center"><?php echo $useless['luas500'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-center">500 - 600 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang600'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas600'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang600'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas600'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang600'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas600'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang600'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas600'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang600'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas600'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang600'] ?></td>
                        <td class="text-center"><?php echo $useless['luas600'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">7</td>
                        <td class="text-center">600 - 700 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang700'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas700'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang700'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas700'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang700'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas700'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang700'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas700'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang700'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas700'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang700'] ?></td>
                        <td class="text-center"><?php echo $useless['luas700'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td class="text-center">700 - 800 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang800'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas800'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang800'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas800'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang800'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas800'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang800'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas800'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang800'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas800'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang800'] ?></td>
                        <td class="text-center"><?php echo $useless['luas800'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">9</td>
                        <td class="text-center">800 - 900 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang900'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas900'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang900'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas900'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang900'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas900'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang900'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas900'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang900'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas900'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang900'] ?></td>
                        <td class="text-center"><?php echo $useless['luas900'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">10</td>
                        <td class="text-center">900 - 1000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas1000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas1000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas1000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas1000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas1000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas1000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">11</td>
                        <td class="text-center">1000 - 2000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas2000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas2000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas2000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas2000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas2000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas2000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">12</td>
                        <td class="text-center">2000 - 3000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas3000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas3000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas3000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas3000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas3000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas3000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">13</td>
                        <td class="text-center">3000 - 4000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas4000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas4000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas4000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas4000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas4000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas4000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">14</td>
                        <td class="text-center">4000 - 5000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas5000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas5000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas5000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas5000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas5000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas5000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">15</td>
                        <td class="text-center">5000 - 6000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas6000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas6000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas6000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas6000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas6000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas6000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">16</td>
                        <td class="text-center">6000 - 7000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas7000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas7000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas7000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas7000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas7000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas7000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">17</td>
                        <td class="text-center">7000 - 8000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas8000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas8000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas8000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas8000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas8000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas8000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">18</td>
                        <td class="text-center">8000 - 9000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas9000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas9000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas9000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas9000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas9000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas9000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">19</td>
                        <td class="text-center">9000 - 10000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas10000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas10000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas10000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas10000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas10000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas10000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">20</td>
                        <td class="text-center">10.000 - 20.000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luas20000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luas20000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luas20000'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $jasa['luas20000'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $fasum['luas20000'] ?></td>
                        <td class="text-center"><?php echo $useless['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $useless['luas20000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">21</td>
                        <td class="text-center"> > 20.000 m2</td>
                        <td class="text-center"><?php echo $tempat_tinggal['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $tempat_tinggal['luasmore'] ?></td>
                        <td class="text-center"><?php echo $pertanian['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $pertanian['luasmore'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $ekonomi['luasmore'] ?></td>
                        <td class="text-center"><?php echo $jasa['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $jasa['luasmore'] ?></td>
                        <td class="text-center"><?php echo $fasum['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $fasum['luasmore'] ?></td>
                        <td class="text-center"><?php echo $useless['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $useless['luasmore'] ?></td>
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
