<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Penguasaan_Tanah_Gadai/Sewa/Bagi_Hasil.xls");
?>
<h3>Data Penguasaan Tanah Gadai/Sewa/Bagi Hasil</h3>
<p>Tanggal Export : <?php echo $date; ?></p>

<?php
    if(isset($prov_nama)) {
        if(isset($kab)){
            if(isset($kec)){
                if(isset($kel)){
                    echo 'Filter => Kelurahan/Desa : <b> ' . $kel->kelurahan_nama . ' </b>| Kecamatan : <b> ' . $kec->kecamatan_nama . ' </b>| Kabupaten/Kota : <b> ' . $kab->kabupaten_nama . '</b>| Provinsi : <b>' . $prov_nama . '</b>';
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

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th rowspan="2" width="10">No</th>
            <th rowspan="2">Kelompok Luas Penguasaan Tanah</th>
            <th colspan="3">Gadai</th>
            <th colspan="3">Sewa</th>
            <th colspan="3">Bagi Hasil</th>
        </tr>
        <tr>
            <th >Bidang</th>
            <th >Luas</th>
            <th >Nilai Tanah</th>
            <th >Bidang</th>
            <th >Luas</th>
            <th >Nilai Tanah</th>
            <th >Bidang</th>
            <th >Luas</th>
            <th >Nilai Tanah</th>
        </tr>
        <tr>
            <th  colspan="2">Total</th>
            <td><strong><?php echo $total_gadai->total_bidang != '' ? $total_gadai->total_bidang : 0; ?></strong></td>
            <td><strong><?php echo $total_gadai->total_luas != '' ? $total_gadai->total_luas : 0; ?></strong></td>
            <td><strong><?php echo $total_gadai->nilai_tahan != '' ? $total_gadai->nilai_tahan : 0; ?></strong></td>
            <td><strong><?php echo $total_sewa->total_bidang != '' ? $total_sewa->total_bidang : 0; ?></strong></td>
            <td><strong><?php echo $total_sewa->total_luas != '' ? $total_sewa->total_luas : 0; ?></strong></td>
            <td><strong><?php echo $total_sewa->nilai_tahan != '' ? $total_sewa->nilai_tahan : 0; ?></strong></td>
            <td><strong><?php echo $total_bagi_hasil->total_bidang != '' ? $total_bagi_hasil->total_bidang : 0; ?></strong></td>
            <td><strong><?php echo $total_bagi_hasil->total_luas != '' ? $total_bagi_hasil->total_luas : 0; ?></strong></td>
            <td><strong><?php echo $total_bagi_hasil->nilai_tahan != '' ? $total_bagi_hasil->nilai_tahan : 0; ?></strong></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td >1</td>
            <td >1 - 100 m2</td>
            <td ><?php echo $gadai['bidang100'] ?></td>
            <td ><?php echo $gadai['luas100'] ?></td>
            <td ><?php echo $gadai['nilai100'] ?></td>
            <td ><?php echo $sewa['bidang100'] ?></td>
            <td ><?php echo $sewa['luas100'] ?></td>
            <td ><?php echo $sewa['nilai100'] ?></td>
            <td ><?php echo $bagi_hasil['bidang100'] ?></td>
            <td ><?php echo $bagi_hasil['luas100'] ?></td>
            <td ><?php echo $bagi_hasil['nilai100'] ?></td>
        </tr>
        <tr>
            <td >2</td>
            <td >100 - 200 m2</td>
            <td ><?php echo $gadai['bidang200'] ?></td>
            <td ><?php echo $gadai['luas200'] ?></td>
            <td ><?php echo $gadai['nilai200'] ?></td>
            <td ><?php echo $sewa['bidang200'] ?></td>
            <td ><?php echo $sewa['luas200'] ?></td>
            <td ><?php echo $sewa['nilai200'] ?></td>
            <td ><?php echo $bagi_hasil['bidang200'] ?></td>
            <td ><?php echo $bagi_hasil['luas200'] ?></td>
            <td ><?php echo $bagi_hasil['nilai200'] ?></td>
        </tr>
        <tr>
            <td >3</td>
            <td >200 - 300 m2</td>
            <td ><?php echo $gadai['bidang300'] ?></td>
            <td ><?php echo $gadai['luas300'] ?></td>
            <td ><?php echo $gadai['nilai300'] ?></td>
            <td ><?php echo $sewa['bidang300'] ?></td>
            <td ><?php echo $sewa['luas300'] ?></td>
            <td ><?php echo $sewa['nilai300'] ?></td>
            <td ><?php echo $bagi_hasil['bidang300'] ?></td>
            <td ><?php echo $bagi_hasil['luas300'] ?></td>
            <td ><?php echo $bagi_hasil['nilai300'] ?></td>
        </tr>
        <tr>
            <td >4</td>
            <td >300 - 400 m2</td>
            <td ><?php echo $gadai['bidang400'] ?></td>
            <td ><?php echo $gadai['luas400'] ?></td>
            <td ><?php echo $gadai['nilai400'] ?></td>
            <td ><?php echo $sewa['bidang400'] ?></td>
            <td ><?php echo $sewa['luas400'] ?></td>
            <td ><?php echo $sewa['nilai400'] ?></td>
            <td ><?php echo $bagi_hasil['bidang400'] ?></td>
            <td ><?php echo $bagi_hasil['luas400'] ?></td>
            <td ><?php echo $bagi_hasil['nilai400'] ?></td>
        </tr>
        <tr>
            <td >5</td>
            <td >400 - 500 m2</td>
            <td ><?php echo $gadai['bidang500'] ?></td>
            <td ><?php echo $gadai['luas500'] ?></td>
            <td ><?php echo $gadai['nilai500'] ?></td>
            <td ><?php echo $sewa['bidang500'] ?></td>
            <td ><?php echo $sewa['luas500'] ?></td>
            <td ><?php echo $sewa['nilai500'] ?></td>
            <td ><?php echo $bagi_hasil['bidang500'] ?></td>
            <td ><?php echo $bagi_hasil['luas500'] ?></td>
            <td ><?php echo $bagi_hasil['nilai500'] ?></td>
        </tr>
        <tr>
            <td >6</td>
            <td >500 - 600 m2</td>
            <td ><?php echo $gadai['bidang600'] ?></td>
            <td ><?php echo $gadai['luas600'] ?></td>
            <td ><?php echo $gadai['nilai600'] ?></td>
            <td ><?php echo $sewa['bidang600'] ?></td>
            <td ><?php echo $sewa['luas600'] ?></td>
            <td ><?php echo $sewa['nilai600'] ?></td>
            <td ><?php echo $bagi_hasil['bidang600'] ?></td>
            <td ><?php echo $bagi_hasil['luas600'] ?></td>
            <td ><?php echo $bagi_hasil['nilai600'] ?></td>
        </tr>
        <tr>
            <td >7</td>
            <td >600 - 700 m2</td>
            <td ><?php echo $gadai['bidang700'] ?></td>
            <td ><?php echo $gadai['luas700'] ?></td>
            <td ><?php echo $gadai['nilai700'] ?></td>
            <td ><?php echo $sewa['bidang700'] ?></td>
            <td ><?php echo $sewa['luas700'] ?></td>
            <td ><?php echo $sewa['nilai700'] ?></td>
            <td ><?php echo $bagi_hasil['bidang700'] ?></td>
            <td ><?php echo $bagi_hasil['luas700'] ?></td>
            <td ><?php echo $bagi_hasil['nilai700'] ?></td>
        </tr>
        <tr>
            <td >8</td>
            <td >700 - 800 m2</td>
            <td ><?php echo $gadai['bidang800'] ?></td>
            <td ><?php echo $gadai['luas800'] ?></td>
            <td ><?php echo $gadai['nilai800'] ?></td>
            <td ><?php echo $sewa['bidang800'] ?></td>
            <td ><?php echo $sewa['luas800'] ?></td>
            <td ><?php echo $sewa['nilai800'] ?></td>
            <td ><?php echo $bagi_hasil['bidang800'] ?></td>
            <td ><?php echo $bagi_hasil['luas800'] ?></td>
            <td ><?php echo $bagi_hasil['nilai800'] ?></td>
        </tr>
        <tr>
            <td >9</td>
            <td >800 - 900 m2</td>
            <td ><?php echo $gadai['bidang900'] ?></td>
            <td ><?php echo $gadai['luas900'] ?></td>
            <td ><?php echo $gadai['nilai900'] ?></td>
            <td ><?php echo $sewa['bidang900'] ?></td>
            <td ><?php echo $sewa['luas900'] ?></td>
            <td ><?php echo $sewa['nilai900'] ?></td>
            <td ><?php echo $bagi_hasil['bidang900'] ?></td>
            <td ><?php echo $bagi_hasil['luas900'] ?></td>
            <td ><?php echo $bagi_hasil['nilai900'] ?></td>
        </tr>
        <tr>
            <td >10</td>
            <td >900 - 1000 m2</td>
            <td ><?php echo $gadai['bidang1000'] ?></td>
            <td ><?php echo $gadai['luas1000'] ?></td>
            <td ><?php echo $gadai['nilai1000'] ?></td>
            <td ><?php echo $sewa['bidang1000'] ?></td>
            <td ><?php echo $sewa['luas1000'] ?></td>
            <td ><?php echo $sewa['nilai1000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang1000'] ?></td>
            <td ><?php echo $bagi_hasil['luas1000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai1000'] ?></td>
        </tr>
        <tr>
            <td >11</td>
            <td >1000 - 2000 m2</td>
            <td ><?php echo $gadai['bidang2000'] ?></td>
            <td ><?php echo $gadai['luas2000'] ?></td>
            <td ><?php echo $gadai['nilai2000'] ?></td>
            <td ><?php echo $sewa['bidang2000'] ?></td>
            <td ><?php echo $sewa['luas2000'] ?></td>
            <td ><?php echo $sewa['nilai2000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang2000'] ?></td>
            <td ><?php echo $bagi_hasil['luas2000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai2000'] ?></td>
        </tr>
        <tr>
            <td >12</td>
            <td >2000 - 3000 m2</td>
            <td ><?php echo $gadai['bidang3000'] ?></td>
            <td ><?php echo $gadai['luas3000'] ?></td>
            <td ><?php echo $gadai['nilai3000'] ?></td>
            <td ><?php echo $sewa['bidang3000'] ?></td>
            <td ><?php echo $sewa['luas3000'] ?></td>
            <td ><?php echo $sewa['nilai3000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang3000'] ?></td>
            <td ><?php echo $bagi_hasil['luas3000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai3000'] ?></td>
        </tr>
        <tr>
            <td >13</td>
            <td >3000 - 4000 m2</td>
            <td ><?php echo $gadai['bidang4000'] ?></td>
            <td ><?php echo $gadai['luas4000'] ?></td>
            <td ><?php echo $gadai['nilai4000'] ?></td>
            <td ><?php echo $sewa['bidang4000'] ?></td>
            <td ><?php echo $sewa['luas4000'] ?></td>
            <td ><?php echo $sewa['nilai4000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang4000'] ?></td>
            <td ><?php echo $bagi_hasil['luas4000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai4000'] ?></td>
        </tr>
        <tr>
            <td >14</td>
            <td >4000 - 5000 m2</td>
            <td ><?php echo $gadai['bidang5000'] ?></td>
            <td ><?php echo $gadai['luas5000'] ?></td>
            <td ><?php echo $gadai['nilai5000'] ?></td>
            <td ><?php echo $sewa['bidang5000'] ?></td>
            <td ><?php echo $sewa['luas5000'] ?></td>
            <td ><?php echo $sewa['nilai5000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang5000'] ?></td>
            <td ><?php echo $bagi_hasil['luas5000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai5000'] ?></td>
        </tr>
        <tr>
            <td >15</td>
            <td >5000 - 6000 m2</td>
            <td ><?php echo $gadai['bidang6000'] ?></td>
            <td ><?php echo $gadai['luas6000'] ?></td>
            <td ><?php echo $gadai['nilai6000'] ?></td>
            <td ><?php echo $sewa['bidang6000'] ?></td>
            <td ><?php echo $sewa['luas6000'] ?></td>
            <td ><?php echo $sewa['nilai6000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang6000'] ?></td>
            <td ><?php echo $bagi_hasil['luas6000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai6000'] ?></td>
        </tr>
        <tr>
            <td >16</td>
            <td >6000 - 7000 m2</td>
            <td ><?php echo $gadai['bidang7000'] ?></td>
            <td ><?php echo $gadai['luas7000'] ?></td>
            <td ><?php echo $gadai['nilai7000'] ?></td>
            <td ><?php echo $sewa['bidang7000'] ?></td>
            <td ><?php echo $sewa['luas7000'] ?></td>
            <td ><?php echo $sewa['nilai7000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang7000'] ?></td>
            <td ><?php echo $bagi_hasil['luas7000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai7000'] ?></td>
        </tr>
        <tr>
            <td >17</td>
            <td >7000 - 8000 m2</td>
            <td ><?php echo $gadai['bidang8000'] ?></td>
            <td ><?php echo $gadai['luas8000'] ?></td>
            <td ><?php echo $gadai['nilai8000'] ?></td>
            <td ><?php echo $sewa['bidang8000'] ?></td>
            <td ><?php echo $sewa['luas8000'] ?></td>
            <td ><?php echo $sewa['nilai8000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang8000'] ?></td>
            <td ><?php echo $bagi_hasil['luas8000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai8000'] ?></td>
        </tr>
        <tr>
            <td >18</td>
            <td >8000 - 9000 m2</td>
            <td ><?php echo $gadai['bidang9000'] ?></td>
            <td ><?php echo $gadai['luas9000'] ?></td>
            <td ><?php echo $gadai['nilai9000'] ?></td>
            <td ><?php echo $sewa['bidang9000'] ?></td>
            <td ><?php echo $sewa['luas9000'] ?></td>
            <td ><?php echo $sewa['nilai9000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang9000'] ?></td>
            <td ><?php echo $bagi_hasil['luas9000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai9000'] ?></td>
        </tr>
        <tr>
            <td >19</td>
            <td >9000 - 10000 m2</td>
            <td ><?php echo $gadai['bidang10000'] ?></td>
            <td ><?php echo $gadai['luas10000'] ?></td>
            <td ><?php echo $gadai['nilai10000'] ?></td>
            <td ><?php echo $sewa['bidang10000'] ?></td>
            <td ><?php echo $sewa['luas10000'] ?></td>
            <td ><?php echo $sewa['nilai10000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang10000'] ?></td>
            <td ><?php echo $bagi_hasil['luas10000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai10000'] ?></td>
        </tr>
        <tr>
            <td >20</td>
            <td >10.000 - 20.000 m2</td>
            <td ><?php echo $gadai['bidang20000'] ?></td>
            <td ><?php echo $gadai['luas20000'] ?></td>
            <td ><?php echo $gadai['nilai20000'] ?></td>
            <td ><?php echo $sewa['bidang20000'] ?></td>
            <td ><?php echo $sewa['luas20000'] ?></td>
            <td ><?php echo $sewa['nilai20000'] ?></td>
            <td ><?php echo $bagi_hasil['bidang20000'] ?></td>
            <td ><?php echo $bagi_hasil['luas20000'] ?></td>
            <td ><?php echo $bagi_hasil['nilai20000'] ?></td>
        </tr>
        <tr>
            <td >21</td>
            <td > > 20.000 m2</td>
            <td ><?php echo $gadai['bidangmore'] ?></td>
            <td ><?php echo $gadai['luasmore'] ?></td>
            <td ><?php echo $gadai['nilaimore'] ?></td>
            <td ><?php echo $sewa['bidangmore'] ?></td>
            <td ><?php echo $sewa['luasmore'] ?></td>
            <td ><?php echo $sewa['nilaimore'] ?></td>
            <td ><?php echo $bagi_hasil['bidangmore'] ?></td>
            <td ><?php echo $bagi_hasil['luasmore'] ?></td>
            <td ><?php echo $bagi_hasil['nilaimore'] ?></td>
        </tr>
    </tbody>
</table>
