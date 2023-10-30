<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Penguasaan_Tanah.xls");
?>
<h3>Data Penguasaan Tanah</h3>
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
            <th colspan="2">Sendiri</th>
            <th colspan="2">Orang Lain</th>
            <th colspan="2">Bersama</th>
        </tr>
        <tr>
            <th>Bidang</th>
            <th>Luas</th>
            <th>Bidang</th>
            <th>Luas</th>
            <th>Bidang</th>
            <th>Luas</th>
        </tr>
        <tr>
            <th colspan="2">Total</th>
            <td><strong><?php echo $total_sendiri->total_bidang != '' ? $total_sendiri->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_sendiri->total_luas != '' ? $total_sendiri->total_luas : 0;?></strong></td>
            <td><strong><?php echo $total_orang_lain->total_bidang != '' ? $total_orang_lain->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_orang_lain->total_luas != '' ? $total_orang_lain->total_luas : 0;?></strong></td>
            <td><strong><?php echo $total_bersama->total_bidang != '' ? $total_bersama->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_bersama->total_luas != '' ? $total_bersama->total_luas : 0;?></strong></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>1 - 100 m2</td>
            <td><?php echo $sendiri['bidang100'] ?></td>
            <td><?php echo $sendiri['luas100'] ?></td>
            <td><?php echo $orang_lain['bidang100'] ?></td>
            <td><?php echo $orang_lain['luas100'] ?></td>
            <td><?php echo $bersama['bidang100'] ?></td>
            <td><?php echo $bersama['luas100'] ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>100 - 200 m2</td>
            <td><?php echo $sendiri['bidang200'] ?></td>
            <td><?php echo $sendiri['luas200'] ?></td>
            <td><?php echo $orang_lain['bidang200'] ?></td>
            <td><?php echo $orang_lain['luas200'] ?></td>
            <td><?php echo $bersama['bidang200'] ?></td>
            <td><?php echo $bersama['luas200'] ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>200 - 300 m2</td>
            <td><?php echo $sendiri['bidang300'] ?></td>
            <td><?php echo $sendiri['luas300'] ?></td>
            <td><?php echo $orang_lain['bidang300'] ?></td>
            <td><?php echo $orang_lain['luas300'] ?></td>
            <td><?php echo $bersama['bidang300'] ?></td>
            <td><?php echo $bersama['luas300'] ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>300 - 400 m2</td>
            <td><?php echo $sendiri['bidang400'] ?></td>
            <td><?php echo $sendiri['luas400'] ?></td>
            <td><?php echo $orang_lain['bidang400'] ?></td>
            <td><?php echo $orang_lain['luas400'] ?></td>
            <td><?php echo $bersama['bidang400'] ?></td>
            <td><?php echo $bersama['luas400'] ?></td>
        </tr>
        <tr>
            <td>5</td>
            <td>400 - 500 m2</td>
            <td><?php echo $sendiri['bidang500'] ?></td>
            <td><?php echo $sendiri['luas500'] ?></td>
            <td><?php echo $orang_lain['bidang500'] ?></td>
            <td><?php echo $orang_lain['luas500'] ?></td>
            <td><?php echo $bersama['bidang500'] ?></td>
            <td><?php echo $bersama['luas500'] ?></td>
        </tr>
        <tr>
            <td>6</td>
            <td>500 - 600 m2</td>
            <td><?php echo $sendiri['bidang600'] ?></td>
            <td><?php echo $sendiri['luas600'] ?></td>
            <td><?php echo $orang_lain['bidang600'] ?></td>
            <td><?php echo $orang_lain['luas600'] ?></td>
            <td><?php echo $bersama['bidang600'] ?></td>
            <td><?php echo $bersama['luas600'] ?></td>
        </tr>
        <tr>
            <td>7</td>
            <td>600 - 700 m2</td>
            <td><?php echo $sendiri['bidang700'] ?></td>
            <td><?php echo $sendiri['luas700'] ?></td>
            <td><?php echo $orang_lain['bidang700'] ?></td>
            <td><?php echo $orang_lain['luas700'] ?></td>
            <td><?php echo $bersama['bidang700'] ?></td>
            <td><?php echo $bersama['luas700'] ?></td>
        </tr>
        <tr>
            <td>8</td>
            <td>700 - 800 m2</td>
            <td><?php echo $sendiri['bidang800'] ?></td>
            <td><?php echo $sendiri['luas800'] ?></td>
            <td><?php echo $orang_lain['bidang800'] ?></td>
            <td><?php echo $orang_lain['luas800'] ?></td>
            <td><?php echo $bersama['bidang800'] ?></td>
            <td><?php echo $bersama['luas800'] ?></td>
        </tr>
        <tr>
            <td>9</td>
            <td>800 - 900 m2</td>
            <td><?php echo $sendiri['bidang900'] ?></td>
            <td><?php echo $sendiri['luas900'] ?></td>
            <td><?php echo $orang_lain['bidang900'] ?></td>
            <td><?php echo $orang_lain['luas900'] ?></td>
            <td><?php echo $bersama['bidang900'] ?></td>
            <td><?php echo $bersama['luas900'] ?></td>
        </tr>
        <tr>
            <td>10</td>
            <td>900 - 1000 m2</td>
            <td><?php echo $sendiri['bidang1000'] ?></td>
            <td><?php echo $sendiri['luas1000'] ?></td>
            <td><?php echo $orang_lain['bidang1000'] ?></td>
            <td><?php echo $orang_lain['luas1000'] ?></td>
            <td><?php echo $bersama['bidang1000'] ?></td>
            <td><?php echo $bersama['luas1000'] ?></td>
        </tr>
        <tr>
            <td>11</td>
            <td>1000 - 2000 m2</td>
            <td><?php echo $sendiri['bidang2000'] ?></td>
            <td><?php echo $sendiri['luas2000'] ?></td>
            <td><?php echo $orang_lain['bidang2000'] ?></td>
            <td><?php echo $orang_lain['luas2000'] ?></td>
            <td><?php echo $bersama['bidang2000'] ?></td>
            <td><?php echo $bersama['luas2000'] ?></td>
        </tr>
        <tr>
            <td>12</td>
            <td>2000 - 3000 m2</td>
            <td><?php echo $sendiri['bidang3000'] ?></td>
            <td><?php echo $sendiri['luas3000'] ?></td>
            <td><?php echo $orang_lain['bidang3000'] ?></td>
            <td><?php echo $orang_lain['luas3000'] ?></td>
            <td><?php echo $bersama['bidang3000'] ?></td>
            <td><?php echo $bersama['luas3000'] ?></td>
        </tr>
        <tr>
            <td>13</td>
            <td>3000 - 4000 m2</td>
            <td><?php echo $sendiri['bidang4000'] ?></td>
            <td><?php echo $sendiri['luas4000'] ?></td>
            <td><?php echo $orang_lain['bidang4000'] ?></td>
            <td><?php echo $orang_lain['luas4000'] ?></td>
            <td><?php echo $bersama['bidang4000'] ?></td>
            <td><?php echo $bersama['luas4000'] ?></td>
        </tr>
        <tr>
            <td>14</td>
            <td>4000 - 5000 m2</td>
            <td><?php echo $sendiri['bidang5000'] ?></td>
            <td><?php echo $sendiri['luas5000'] ?></td>
            <td><?php echo $orang_lain['bidang5000'] ?></td>
            <td><?php echo $orang_lain['luas5000'] ?></td>
            <td><?php echo $bersama['bidang5000'] ?></td>
            <td><?php echo $bersama['luas5000'] ?></td>
        </tr>
        <tr>
            <td>15</td>
            <td>5000 - 6000 m2</td>
            <td><?php echo $sendiri['bidang6000'] ?></td>
            <td><?php echo $sendiri['luas6000'] ?></td>
            <td><?php echo $orang_lain['bidang6000'] ?></td>
            <td><?php echo $orang_lain['luas6000'] ?></td>
            <td><?php echo $bersama['bidang6000'] ?></td>
            <td><?php echo $bersama['luas6000'] ?></td>
        </tr>
        <tr>
            <td>16</td>
            <td>6000 - 7000 m2</td>
            <td><?php echo $sendiri['bidang7000'] ?></td>
            <td><?php echo $sendiri['luas7000'] ?></td>
            <td><?php echo $orang_lain['bidang7000'] ?></td>
            <td><?php echo $orang_lain['luas7000'] ?></td>
            <td><?php echo $bersama['bidang7000'] ?></td>
            <td><?php echo $bersama['luas7000'] ?></td>
        </tr>
        <tr>
            <td>17</td>
            <td>7000 - 8000 m2</td>
            <td><?php echo $sendiri['bidang8000'] ?></td>
            <td><?php echo $sendiri['luas8000'] ?></td>
            <td><?php echo $orang_lain['bidang8000'] ?></td>
            <td><?php echo $orang_lain['luas8000'] ?></td>
            <td><?php echo $bersama['bidang8000'] ?></td>
            <td><?php echo $bersama['luas8000'] ?></td>
        </tr>
        <tr>
            <td>18</td>
            <td>8000 - 9000 m2</td>
            <td><?php echo $sendiri['bidang9000'] ?></td>
            <td><?php echo $sendiri['luas9000'] ?></td>
            <td><?php echo $orang_lain['bidang9000'] ?></td>
            <td><?php echo $orang_lain['luas9000'] ?></td>
            <td><?php echo $bersama['bidang9000'] ?></td>
            <td><?php echo $bersama['luas9000'] ?></td>
        </tr>
        <tr>
            <td>19</td>
            <td>9000 - 10000 m2</td>
            <td><?php echo $sendiri['bidang10000'] ?></td>
            <td><?php echo $sendiri['luas10000'] ?></td>
            <td><?php echo $orang_lain['bidang10000'] ?></td>
            <td><?php echo $orang_lain['luas10000'] ?></td>
            <td><?php echo $bersama['bidang10000'] ?></td>
            <td><?php echo $bersama['luas10000'] ?></td>
        </tr>
        <tr>
            <td>20</td>
            <td>10.000 - 20.000 m2</td>
            <td><?php echo $sendiri['bidang20000'] ?></td>
            <td><?php echo $sendiri['luas20000'] ?></td>
            <td><?php echo $orang_lain['bidang20000'] ?></td>
            <td><?php echo $orang_lain['luas20000'] ?></td>
            <td><?php echo $bersama['bidang20000'] ?></td>
            <td><?php echo $bersama['luas20000'] ?></td>
        </tr>
        <tr>
            <td>21</td>
            <td> > 20.000 m2</td>
            <td><?php echo $sendiri['bidangmore'] ?></td>
            <td><?php echo $sendiri['luasmore'] ?></td>
            <td><?php echo $orang_lain['bidangmore'] ?></td>
            <td><?php echo $orang_lain['luasmore'] ?></td>
            <td><?php echo $bersama['bidangmore'] ?></td>
            <td><?php echo $bersama['luasmore'] ?></td>
        </tr>
    </tbody>
</table>
