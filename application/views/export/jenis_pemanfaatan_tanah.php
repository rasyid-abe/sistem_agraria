<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Jenis_Pemanfaatan_Tanah.xls");
?>
<h3>Data Jenis Pemanfaatan Tanah</h3>
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
            <th rowspan="2">No</th>
            <th rowspan="2">Kelompok Luas Penguasaan Tanah</th>
            <th colspan="2">Tempat Tinggal</th>
            <th colspan="2">Kegiatan Produksi Pertanian</th>
            <th colspan="2">Kegiatan Ekonomi/Perdagangan</th>
            <th colspan="2">Usaha Jasa</th>
            <th colspan="2">Fasos/Fasum</th>
            <th colspan="2">Tidak Ada Pemanfaatan</th>
        </tr>
        <tr>
            <th>Bidang</th>
            <th>Luas</th>
            <th>Bidang</th>
            <th>Luas</th>
            <th>Bidang</th>
            <th>Luas</th>
            <th>Bidang</th>
            <th>Luas</th>
            <th>Bidang</th>
            <th>Luas</th>
            <th>Bidang</th>
            <th>Luas</th>
        </tr>
        <tr>
            <th colspan="2">Total</th>
            <td><strong><?php echo $total_tempat_tinggal->total_bidang != '' ? $total_tempat_tinggal->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_tempat_tinggal->total_luas != '' ? $total_tempat_tinggal->total_luas : 0;?></strong></td>
            <td><strong><?php echo $total_pertanian->total_bidang != '' ? $total_pertanian->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_pertanian->total_luas != '' ? $total_pertanian->total_luas : 0;?></strong></td>
            <td><strong><?php echo $total_ekonomi->total_bidang != '' ? $total_ekonomi->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_ekonomi->total_luas != '' ? $total_ekonomi->total_luas : 0;?></strong></td>
            <td><strong><?php echo $total_jasa->total_bidang != '' ? $total_jasa->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_jasa->total_luas != '' ? $total_jasa->total_luas : 0;?></strong></td>
            <td><strong><?php echo $total_fasum->total_bidang != '' ? $total_fasum->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_fasum->total_luas != '' ? $total_fasum->total_luas : 0;?></strong></td>
            <td><strong><?php echo $total_useless->total_bidang != '' ? $total_useless->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_useless->total_luas != '' ? $total_useless->total_luas : 0;?></strong></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>1 - 100 m2</td>
            <td><?php echo $tempat_tinggal['bidang100'] ?></td>
            <td><?php echo $tempat_tinggal['luas100'] ?></td>
            <td><?php echo $pertanian['bidang100'] ?></td>
            <td><?php echo $pertanian['luas100'] ?></td>
            <td><?php echo $ekonomi['bidang100'] ?></td>
            <td><?php echo $ekonomi['luas100'] ?></td>
            <td><?php echo $jasa['bidang100'] ?></td>
            <td><?php echo $jasa['luas100'] ?></td>
            <td><?php echo $fasum['bidang100'] ?></td>
            <td><?php echo $fasum['luas100'] ?></td>
            <td><?php echo $useless['bidang100'] ?></td>
            <td><?php echo $useless['luas100'] ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>100 - 200 m2</td>
            <td><?php echo $tempat_tinggal['bidang200'] ?></td>
            <td><?php echo $tempat_tinggal['luas200'] ?></td>
            <td><?php echo $pertanian['bidang200'] ?></td>
            <td><?php echo $pertanian['luas200'] ?></td>
            <td><?php echo $ekonomi['bidang200'] ?></td>
            <td><?php echo $ekonomi['luas200'] ?></td>
            <td><?php echo $jasa['bidang200'] ?></td>
            <td><?php echo $jasa['luas200'] ?></td>
            <td><?php echo $fasum['bidang200'] ?></td>
            <td><?php echo $fasum['luas200'] ?></td>
            <td><?php echo $useless['bidang200'] ?></td>
            <td><?php echo $useless['luas200'] ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>200 - 300 m2</td>
            <td><?php echo $tempat_tinggal['bidang300'] ?></td>
            <td><?php echo $tempat_tinggal['luas300'] ?></td>
            <td><?php echo $pertanian['bidang300'] ?></td>
            <td><?php echo $pertanian['luas300'] ?></td>
            <td><?php echo $ekonomi['bidang300'] ?></td>
            <td><?php echo $ekonomi['luas300'] ?></td>
            <td><?php echo $jasa['bidang300'] ?></td>
            <td><?php echo $jasa['luas300'] ?></td>
            <td><?php echo $fasum['bidang300'] ?></td>
            <td><?php echo $fasum['luas300'] ?></td>
            <td><?php echo $useless['bidang300'] ?></td>
            <td><?php echo $useless['luas300'] ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>300 - 400 m2</td>
            <td><?php echo $tempat_tinggal['bidang400'] ?></td>
            <td><?php echo $tempat_tinggal['luas400'] ?></td>
            <td><?php echo $pertanian['bidang400'] ?></td>
            <td><?php echo $pertanian['luas400'] ?></td>
            <td><?php echo $ekonomi['bidang400'] ?></td>
            <td><?php echo $ekonomi['luas400'] ?></td>
            <td><?php echo $jasa['bidang400'] ?></td>
            <td><?php echo $jasa['luas400'] ?></td>
            <td><?php echo $fasum['bidang400'] ?></td>
            <td><?php echo $fasum['luas400'] ?></td>
            <td><?php echo $useless['bidang400'] ?></td>
            <td><?php echo $useless['luas400'] ?></td>
        </tr>
        <tr>
            <td>5</td>
            <td>400 - 500 m2</td>
            <td><?php echo $tempat_tinggal['bidang500'] ?></td>
            <td><?php echo $tempat_tinggal['luas500'] ?></td>
            <td><?php echo $pertanian['bidang500'] ?></td>
            <td><?php echo $pertanian['luas500'] ?></td>
            <td><?php echo $ekonomi['bidang500'] ?></td>
            <td><?php echo $ekonomi['luas500'] ?></td>
            <td><?php echo $jasa['bidang500'] ?></td>
            <td><?php echo $jasa['luas500'] ?></td>
            <td><?php echo $fasum['bidang500'] ?></td>
            <td><?php echo $fasum['luas500'] ?></td>
            <td><?php echo $useless['bidang500'] ?></td>
            <td><?php echo $useless['luas500'] ?></td>
        </tr>
        <tr>
            <td>6</td>
            <td>500 - 600 m2</td>
            <td><?php echo $tempat_tinggal['bidang600'] ?></td>
            <td><?php echo $tempat_tinggal['luas600'] ?></td>
            <td><?php echo $pertanian['bidang600'] ?></td>
            <td><?php echo $pertanian['luas600'] ?></td>
            <td><?php echo $ekonomi['bidang600'] ?></td>
            <td><?php echo $ekonomi['luas600'] ?></td>
            <td><?php echo $jasa['bidang600'] ?></td>
            <td><?php echo $jasa['luas600'] ?></td>
            <td><?php echo $fasum['bidang600'] ?></td>
            <td><?php echo $fasum['luas600'] ?></td>
            <td><?php echo $useless['bidang600'] ?></td>
            <td><?php echo $useless['luas600'] ?></td>
        </tr>
        <tr>
            <td>7</td>
            <td>600 - 700 m2</td>
            <td><?php echo $tempat_tinggal['bidang700'] ?></td>
            <td><?php echo $tempat_tinggal['luas700'] ?></td>
            <td><?php echo $pertanian['bidang700'] ?></td>
            <td><?php echo $pertanian['luas700'] ?></td>
            <td><?php echo $ekonomi['bidang700'] ?></td>
            <td><?php echo $ekonomi['luas700'] ?></td>
            <td><?php echo $jasa['bidang700'] ?></td>
            <td><?php echo $jasa['luas700'] ?></td>
            <td><?php echo $fasum['bidang700'] ?></td>
            <td><?php echo $fasum['luas700'] ?></td>
            <td><?php echo $useless['bidang700'] ?></td>
            <td><?php echo $useless['luas700'] ?></td>
        </tr>
        <tr>
            <td>8</td>
            <td>700 - 800 m2</td>
            <td><?php echo $tempat_tinggal['bidang800'] ?></td>
            <td><?php echo $tempat_tinggal['luas800'] ?></td>
            <td><?php echo $pertanian['bidang800'] ?></td>
            <td><?php echo $pertanian['luas800'] ?></td>
            <td><?php echo $ekonomi['bidang800'] ?></td>
            <td><?php echo $ekonomi['luas800'] ?></td>
            <td><?php echo $jasa['bidang800'] ?></td>
            <td><?php echo $jasa['luas800'] ?></td>
            <td><?php echo $fasum['bidang800'] ?></td>
            <td><?php echo $fasum['luas800'] ?></td>
            <td><?php echo $useless['bidang800'] ?></td>
            <td><?php echo $useless['luas800'] ?></td>
        </tr>
        <tr>
            <td>9</td>
            <td>800 - 900 m2</td>
            <td><?php echo $tempat_tinggal['bidang900'] ?></td>
            <td><?php echo $tempat_tinggal['luas900'] ?></td>
            <td><?php echo $pertanian['bidang900'] ?></td>
            <td><?php echo $pertanian['luas900'] ?></td>
            <td><?php echo $ekonomi['bidang900'] ?></td>
            <td><?php echo $ekonomi['luas900'] ?></td>
            <td><?php echo $jasa['bidang900'] ?></td>
            <td><?php echo $jasa['luas900'] ?></td>
            <td><?php echo $fasum['bidang900'] ?></td>
            <td><?php echo $fasum['luas900'] ?></td>
            <td><?php echo $useless['bidang900'] ?></td>
            <td><?php echo $useless['luas900'] ?></td>
        </tr>
        <tr>
            <td>10</td>
            <td>900 - 1000 m2</td>
            <td><?php echo $tempat_tinggal['bidang1000'] ?></td>
            <td><?php echo $tempat_tinggal['luas1000'] ?></td>
            <td><?php echo $pertanian['bidang1000'] ?></td>
            <td><?php echo $pertanian['luas1000'] ?></td>
            <td><?php echo $ekonomi['bidang1000'] ?></td>
            <td><?php echo $ekonomi['luas1000'] ?></td>
            <td><?php echo $jasa['bidang1000'] ?></td>
            <td><?php echo $jasa['luas1000'] ?></td>
            <td><?php echo $fasum['bidang1000'] ?></td>
            <td><?php echo $fasum['luas1000'] ?></td>
            <td><?php echo $useless['bidang1000'] ?></td>
            <td><?php echo $useless['luas1000'] ?></td>
        </tr>
        <tr>
            <td>11</td>
            <td>1000 - 2000 m2</td>
            <td><?php echo $tempat_tinggal['bidang2000'] ?></td>
            <td><?php echo $tempat_tinggal['luas2000'] ?></td>
            <td><?php echo $pertanian['bidang2000'] ?></td>
            <td><?php echo $pertanian['luas2000'] ?></td>
            <td><?php echo $ekonomi['bidang2000'] ?></td>
            <td><?php echo $ekonomi['luas2000'] ?></td>
            <td><?php echo $jasa['bidang2000'] ?></td>
            <td><?php echo $jasa['luas2000'] ?></td>
            <td><?php echo $fasum['bidang2000'] ?></td>
            <td><?php echo $fasum['luas2000'] ?></td>
            <td><?php echo $useless['bidang2000'] ?></td>
            <td><?php echo $useless['luas2000'] ?></td>
        </tr>
        <tr>
            <td>12</td>
            <td>2000 - 3000 m2</td>
            <td><?php echo $tempat_tinggal['bidang3000'] ?></td>
            <td><?php echo $tempat_tinggal['luas3000'] ?></td>
            <td><?php echo $pertanian['bidang3000'] ?></td>
            <td><?php echo $pertanian['luas3000'] ?></td>
            <td><?php echo $ekonomi['bidang3000'] ?></td>
            <td><?php echo $ekonomi['luas3000'] ?></td>
            <td><?php echo $jasa['bidang3000'] ?></td>
            <td><?php echo $jasa['luas3000'] ?></td>
            <td><?php echo $fasum['bidang3000'] ?></td>
            <td><?php echo $fasum['luas3000'] ?></td>
            <td><?php echo $useless['bidang3000'] ?></td>
            <td><?php echo $useless['luas3000'] ?></td>
        </tr>
        <tr>
            <td>13</td>
            <td>3000 - 4000 m2</td>
            <td><?php echo $tempat_tinggal['bidang4000'] ?></td>
            <td><?php echo $tempat_tinggal['luas4000'] ?></td>
            <td><?php echo $pertanian['bidang4000'] ?></td>
            <td><?php echo $pertanian['luas4000'] ?></td>
            <td><?php echo $ekonomi['bidang4000'] ?></td>
            <td><?php echo $ekonomi['luas4000'] ?></td>
            <td><?php echo $jasa['bidang4000'] ?></td>
            <td><?php echo $jasa['luas4000'] ?></td>
            <td><?php echo $fasum['bidang4000'] ?></td>
            <td><?php echo $fasum['luas4000'] ?></td>
            <td><?php echo $useless['bidang4000'] ?></td>
            <td><?php echo $useless['luas4000'] ?></td>
        </tr>
        <tr>
            <td>14</td>
            <td>4000 - 5000 m2</td>
            <td><?php echo $tempat_tinggal['bidang5000'] ?></td>
            <td><?php echo $tempat_tinggal['luas5000'] ?></td>
            <td><?php echo $pertanian['bidang5000'] ?></td>
            <td><?php echo $pertanian['luas5000'] ?></td>
            <td><?php echo $ekonomi['bidang5000'] ?></td>
            <td><?php echo $ekonomi['luas5000'] ?></td>
            <td><?php echo $jasa['bidang5000'] ?></td>
            <td><?php echo $jasa['luas5000'] ?></td>
            <td><?php echo $fasum['bidang5000'] ?></td>
            <td><?php echo $fasum['luas5000'] ?></td>
            <td><?php echo $useless['bidang5000'] ?></td>
            <td><?php echo $useless['luas5000'] ?></td>
        </tr>
        <tr>
            <td>15</td>
            <td>5000 - 6000 m2</td>
            <td><?php echo $tempat_tinggal['bidang6000'] ?></td>
            <td><?php echo $tempat_tinggal['luas6000'] ?></td>
            <td><?php echo $pertanian['bidang6000'] ?></td>
            <td><?php echo $pertanian['luas6000'] ?></td>
            <td><?php echo $ekonomi['bidang6000'] ?></td>
            <td><?php echo $ekonomi['luas6000'] ?></td>
            <td><?php echo $jasa['bidang6000'] ?></td>
            <td><?php echo $jasa['luas6000'] ?></td>
            <td><?php echo $fasum['bidang6000'] ?></td>
            <td><?php echo $fasum['luas6000'] ?></td>
            <td><?php echo $useless['bidang6000'] ?></td>
            <td><?php echo $useless['luas6000'] ?></td>
        </tr>
        <tr>
            <td>16</td>
            <td>6000 - 7000 m2</td>
            <td><?php echo $tempat_tinggal['bidang7000'] ?></td>
            <td><?php echo $tempat_tinggal['luas7000'] ?></td>
            <td><?php echo $pertanian['bidang7000'] ?></td>
            <td><?php echo $pertanian['luas7000'] ?></td>
            <td><?php echo $ekonomi['bidang7000'] ?></td>
            <td><?php echo $ekonomi['luas7000'] ?></td>
            <td><?php echo $jasa['bidang7000'] ?></td>
            <td><?php echo $jasa['luas7000'] ?></td>
            <td><?php echo $fasum['bidang7000'] ?></td>
            <td><?php echo $fasum['luas7000'] ?></td>
            <td><?php echo $useless['bidang7000'] ?></td>
            <td><?php echo $useless['luas7000'] ?></td>
        </tr>
        <tr>
            <td>17</td>
            <td>7000 - 8000 m2</td>
            <td><?php echo $tempat_tinggal['bidang8000'] ?></td>
            <td><?php echo $tempat_tinggal['luas8000'] ?></td>
            <td><?php echo $pertanian['bidang8000'] ?></td>
            <td><?php echo $pertanian['luas8000'] ?></td>
            <td><?php echo $ekonomi['bidang8000'] ?></td>
            <td><?php echo $ekonomi['luas8000'] ?></td>
            <td><?php echo $jasa['bidang8000'] ?></td>
            <td><?php echo $jasa['luas8000'] ?></td>
            <td><?php echo $fasum['bidang8000'] ?></td>
            <td><?php echo $fasum['luas8000'] ?></td>
            <td><?php echo $useless['bidang8000'] ?></td>
            <td><?php echo $useless['luas8000'] ?></td>
        </tr>
        <tr>
            <td>18</td>
            <td>8000 - 9000 m2</td>
            <td><?php echo $tempat_tinggal['bidang9000'] ?></td>
            <td><?php echo $tempat_tinggal['luas9000'] ?></td>
            <td><?php echo $pertanian['bidang9000'] ?></td>
            <td><?php echo $pertanian['luas9000'] ?></td>
            <td><?php echo $ekonomi['bidang9000'] ?></td>
            <td><?php echo $ekonomi['luas9000'] ?></td>
            <td><?php echo $jasa['bidang9000'] ?></td>
            <td><?php echo $jasa['luas9000'] ?></td>
            <td><?php echo $fasum['bidang9000'] ?></td>
            <td><?php echo $fasum['luas9000'] ?></td>
            <td><?php echo $useless['bidang9000'] ?></td>
            <td><?php echo $useless['luas9000'] ?></td>
        </tr>
        <tr>
            <td>19</td>
            <td>9000 - 10000 m2</td>
            <td><?php echo $tempat_tinggal['bidang10000'] ?></td>
            <td><?php echo $tempat_tinggal['luas10000'] ?></td>
            <td><?php echo $pertanian['bidang10000'] ?></td>
            <td><?php echo $pertanian['luas10000'] ?></td>
            <td><?php echo $ekonomi['bidang10000'] ?></td>
            <td><?php echo $ekonomi['luas10000'] ?></td>
            <td><?php echo $jasa['bidang10000'] ?></td>
            <td><?php echo $jasa['luas10000'] ?></td>
            <td><?php echo $fasum['bidang10000'] ?></td>
            <td><?php echo $fasum['luas10000'] ?></td>
            <td><?php echo $useless['bidang10000'] ?></td>
            <td><?php echo $useless['luas10000'] ?></td>
        </tr>
        <tr>
            <td>20</td>
            <td>10.000 - 20.000 m2</td>
            <td><?php echo $tempat_tinggal['bidang20000'] ?></td>
            <td><?php echo $tempat_tinggal['luas20000'] ?></td>
            <td><?php echo $pertanian['bidang20000'] ?></td>
            <td><?php echo $pertanian['luas20000'] ?></td>
            <td><?php echo $ekonomi['bidang20000'] ?></td>
            <td><?php echo $ekonomi['luas20000'] ?></td>
            <td><?php echo $jasa['bidang20000'] ?></td>
            <td><?php echo $jasa['luas20000'] ?></td>
            <td><?php echo $fasum['bidang20000'] ?></td>
            <td><?php echo $fasum['luas20000'] ?></td>
            <td><?php echo $useless['bidang20000'] ?></td>
            <td><?php echo $useless['luas20000'] ?></td>
        </tr>
        <tr>
            <td>21</td>
            <td> > 20.000 m2</td>
            <td><?php echo $tempat_tinggal['bidangmore'] ?></td>
            <td><?php echo $tempat_tinggal['luasmore'] ?></td>
            <td><?php echo $pertanian['bidangmore'] ?></td>
            <td><?php echo $pertanian['luasmore'] ?></td>
            <td><?php echo $ekonomi['bidangmore'] ?></td>
            <td><?php echo $ekonomi['luasmore'] ?></td>
            <td><?php echo $jasa['bidangmore'] ?></td>
            <td><?php echo $jasa['luasmore'] ?></td>
            <td><?php echo $fasum['bidangmore'] ?></td>
            <td><?php echo $fasum['luasmore'] ?></td>
            <td><?php echo $useless['bidangmore'] ?></td>
            <td><?php echo $useless['luasmore'] ?></td>
        </tr>
    </tbody>
</table>
