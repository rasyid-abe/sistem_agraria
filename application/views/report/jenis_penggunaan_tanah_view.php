<form class="" action="<?php echo base_url() ?>report_jenis_penggunaan_tanah/show_filter" method="post">
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
            <table class="table table-sm table table-striped" width=200% id="zero_config">
                <thead>
                    <tr class="bg-light text-dark">
                        <td class="text-center"rowspan="2">No</td>
                        <td class="text-center"rowspan="2">Kelompok Luas Penguasaan Tanah</td>
                        <td class="text-center"colspan="2">Pemukiman, Perkampungan</td>
                        <td class="text-center"colspan="2">Sawah Irigasi</td>
                        <td class="text-center"colspan="2">Sawah Non Irigasi</td>
                        <td class="text-center"colspan="2">Telaga, Ladang</td>
                        <td class="text-center"colspan="2">Kebun Campuran</td>
                        <td class="text-center"colspan="2">Perairan Datar, Tambak</td>
                        <td class="text-center"colspan="2">Tanah Terbuka, Tanah Kosong</td>
                        <td class="text-center"colspan="2">Fasum, Fasos</td>
                        <td class="text-center"colspan="2">Industri</td>
                        <td class="text-center"colspan="2">Peternakan</td>
                        <td class="text-center"colspan="2">Lainnya</td>
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
                        <td class="text-center"><?php echo $total_pemukiman->total_bidang != '' ? $total_pemukiman->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_pemukiman->total_luas != '' ? $total_pemukiman->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_sawah_irigasi->total_bidang != '' ? $total_sawah_irigasi->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_sawah_irigasi->total_luas != '' ? $total_sawah_irigasi->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_sawah_nonirigasi->total_bidang != '' ? $total_sawah_nonirigasi->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_sawah_nonirigasi->total_luas != '' ? $total_sawah_nonirigasi->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_telaga->total_bidang != '' ? $total_telaga->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_telaga->total_luas != '' ? $total_telaga->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_kebun->total_bidang != '' ? $total_kebun->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_kebun->total_luas != '' ? $total_kebun->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_tambak->total_bidang != '' ? $total_tambak->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_tambak->total_luas != '' ? $total_tambak->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_tanah_kosong->total_bidang != '' ? $total_tanah_kosong->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_tanah_kosong->total_luas != '' ? $total_tanah_kosong->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_fasos->total_bidang != '' ? $total_fasos->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_fasos->total_luas != '' ? $total_fasos->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_industri->total_bidang != '' ? $total_industri->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_industri->total_luas != '' ? $total_industri->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_peternakan->total_bidang != '' ? $total_peternakan->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_peternakan->total_luas != '' ? $total_peternakan->total_luas : 0;?></td>
                        <td class="text-center"><?php echo $total_lainnya->total_bidang != '' ? $total_lainnya->total_bidang : 0;?></td>
                        <td class="text-center"><?php echo $total_lainnya->total_luas != '' ? $total_lainnya->total_luas : 0;?></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">1 - 100 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang100'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas100'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang100'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas100'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang100'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas100'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang100'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas100'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang100'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas100'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang100'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas100'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang100'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas100'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang100'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas100'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang100'] ?></td>
                        <td class="text-center"><?php echo $industri['luas100'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang100'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas100'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang100'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas100'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">100 - 200 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang200'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas200'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang200'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas200'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang200'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas200'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang200'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas200'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang200'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas200'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang200'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas200'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang200'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas200'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang200'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas200'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang200'] ?></td>
                        <td class="text-center"><?php echo $industri['luas200'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang200'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas200'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang200'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas200'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">200 - 300 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang300'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas300'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang300'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas300'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang300'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas300'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang300'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas300'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang300'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas300'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang300'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas300'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang300'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas300'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang300'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas300'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang300'] ?></td>
                        <td class="text-center"><?php echo $industri['luas300'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang300'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas300'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang300'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas300'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">300 - 400 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang400'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas400'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang400'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas400'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang400'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas400'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang400'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas400'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang400'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas400'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang400'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas400'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang400'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas400'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang400'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas400'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang400'] ?></td>
                        <td class="text-center"><?php echo $industri['luas400'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang400'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas400'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang400'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas400'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-center">400 - 500 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang500'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas500'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang500'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas500'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang500'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas500'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang500'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas500'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang500'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas500'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang500'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas500'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang500'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas500'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang500'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas500'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang500'] ?></td>
                        <td class="text-center"><?php echo $industri['luas500'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang500'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas500'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang500'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas500'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-center">500 - 600 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang600'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas600'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang600'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas600'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang600'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas600'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang600'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas600'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang600'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas600'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang600'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas600'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang600'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas600'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang600'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas600'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang600'] ?></td>
                        <td class="text-center"><?php echo $industri['luas600'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang600'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas600'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang600'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas600'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">7</td>
                        <td class="text-center">600 - 700 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang700'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas700'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang700'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas700'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang700'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas700'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang700'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas700'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang700'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas700'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang700'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas700'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang700'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas700'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang700'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas700'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang700'] ?></td>
                        <td class="text-center"><?php echo $industri['luas700'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang700'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas700'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang700'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas700'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td class="text-center">700 - 800 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang800'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas800'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang800'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas800'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang800'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas800'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang800'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas800'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang800'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas800'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang800'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas800'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang800'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas800'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang800'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas800'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang800'] ?></td>
                        <td class="text-center"><?php echo $industri['luas800'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang800'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas800'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang800'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas800'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">9</td>
                        <td class="text-center">800 - 900 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang900'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas900'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang900'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas900'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang900'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas900'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang900'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas900'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang900'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas900'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang900'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas900'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang900'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas900'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang900'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas900'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang900'] ?></td>
                        <td class="text-center"><?php echo $industri['luas900'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang900'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas900'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang900'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas900'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">10</td>
                        <td class="text-center">900 - 1000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas1000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas1000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas1000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas1000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas1000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas1000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas1000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas1000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas1000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas1000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang1000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas1000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">11</td>
                        <td class="text-center">1000 - 2000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas2000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas2000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas2000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas2000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas2000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas2000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas2000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas2000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas2000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas2000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang2000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas2000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">12</td>
                        <td class="text-center">2000 - 3000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas3000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas3000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas3000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas3000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas3000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas3000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas3000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas3000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas3000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas3000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang3000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas3000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">13</td>
                        <td class="text-center">3000 - 4000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas4000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas4000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas4000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas4000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas4000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas4000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas4000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas4000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas4000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas4000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang4000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas4000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">14</td>
                        <td class="text-center">4000 - 5000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas5000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas5000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas5000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas5000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas5000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas5000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas5000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas5000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas5000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas5000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang5000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas5000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">15</td>
                        <td class="text-center">5000 - 6000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas6000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas6000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas6000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas6000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas6000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas6000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas6000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas6000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas6000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas6000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang6000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas6000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">16</td>
                        <td class="text-center">6000 - 7000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas7000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas7000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas7000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas7000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas7000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas7000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas7000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas7000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas7000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas7000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang7000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas7000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">17</td>
                        <td class="text-center">7000 - 8000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas8000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas8000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas8000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas8000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas8000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas8000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas8000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas8000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas8000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas8000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang8000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas8000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">18</td>
                        <td class="text-center">8000 - 9000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas9000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas9000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas9000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas9000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas9000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas9000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas9000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas9000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas9000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas9000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang9000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas9000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">19</td>
                        <td class="text-center">9000 - 10000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas10000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas10000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas10000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas10000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas10000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas10000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas10000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas10000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas10000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas10000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang10000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas10000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">20</td>
                        <td class="text-center">10.000 - 20.000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luas20000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luas20000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luas20000'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $telaga['luas20000'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $kebun['luas20000'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $tambak['luas20000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luas20000'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $fasos['luas20000'] ?></td>
                        <td class="text-center"><?php echo $industri['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $industri['luas20000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luas20000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidang20000'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luas20000'] ?></td>
                    </tr>
                    <tr>
                        <td class="text-center">21</td>
                        <td class="text-center"> > 20.000 m2</td>
                        <td class="text-center"><?php echo $pemukiman['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $pemukiman['luasmore'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $sawah_irigasi['luasmore'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $sawah_nonirigasi['luasmore'] ?></td>
                        <td class="text-center"><?php echo $telaga['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $telaga['luasmore'] ?></td>
                        <td class="text-center"><?php echo $kebun['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $kebun['luasmore'] ?></td>
                        <td class="text-center"><?php echo $tambak['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $tambak['luasmore'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $tanah_kosong['luasmore'] ?></td>
                        <td class="text-center"><?php echo $fasos['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $fasos['luasmore'] ?></td>
                        <td class="text-center"><?php echo $industri['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $industri['luasmore'] ?></td>
                        <td class="text-center"><?php echo $peternakan['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $peternakan['luasmore'] ?></td>
                        <td class="text-center"><?php echo $lainnya['bidangmore'] ?></td>
                        <td class="text-center"><?php echo $lainnya['luasmore'] ?></td>
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
