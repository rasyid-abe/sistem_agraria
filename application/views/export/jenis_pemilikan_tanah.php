<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Jenis_Pemilikan_Tanah.xls");
?>
<h3>Data Jenis Pemilikan Tanah</h3>
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
            <th colspan="2">Terdaftar</th>
            <th colspan="2">Tidak Terdaftar</th>
        </tr>
        <tr>
            <th>Bidang</th>
            <th>Luas</th>
            <th>Bidang</th>
            <th>Luas</th>
        </tr>
        <tr>
            <th colspan="2">Total</th>
            <td><strong><?php echo $total_terdaftar->total_bidang != '' ? $total_terdaftar->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_terdaftar->total_luas != '' ? $total_terdaftar->total_luas : 0;?></strong></td>
            <td><strong><?php echo $total_tidak_terdaftar->total_bidang != '' ? $total_tidak_terdaftar->total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_tidak_terdaftar->total_luas != '' ? $total_tidak_terdaftar->total_luas : 0;?></strong></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>1 - 100 m2</td>
            <td><?php echo $terdaftar['bidang100'] ?></td>
            <td><?php echo $terdaftar['luas100'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang100'] ?></td>
            <td><?php echo $tidak_terdaftar['luas100'] ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>100 - 200 m2</td>
            <td><?php echo $terdaftar['bidang200'] ?></td>
            <td><?php echo $terdaftar['luas200'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang200'] ?></td>
            <td><?php echo $tidak_terdaftar['luas200'] ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>200 - 300 m2</td>
            <td><?php echo $terdaftar['bidang300'] ?></td>
            <td><?php echo $terdaftar['luas300'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang300'] ?></td>
            <td><?php echo $tidak_terdaftar['luas300'] ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>300 - 400 m2</td>
            <td><?php echo $terdaftar['bidang400'] ?></td>
            <td><?php echo $terdaftar['luas400'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang400'] ?></td>
            <td><?php echo $tidak_terdaftar['luas400'] ?></td>
        </tr>
        <tr>
            <td>5</td>
            <td>400 - 500 m2</td>
            <td><?php echo $terdaftar['bidang500'] ?></td>
            <td><?php echo $terdaftar['luas500'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang500'] ?></td>
            <td><?php echo $tidak_terdaftar['luas500'] ?></td>
        </tr>
        <tr>
            <td>6</td>
            <td>500 - 600 m2</td>
            <td><?php echo $terdaftar['bidang600'] ?></td>
            <td><?php echo $terdaftar['luas600'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang600'] ?></td>
            <td><?php echo $tidak_terdaftar['luas600'] ?></td>
        </tr>
        <tr>
            <td>7</td>
            <td>600 - 700 m2</td>
            <td><?php echo $terdaftar['bidang700'] ?></td>
            <td><?php echo $terdaftar['luas700'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang700'] ?></td>
            <td><?php echo $tidak_terdaftar['luas700'] ?></td>
        </tr>
        <tr>
            <td>8</td>
            <td>700 - 800 m2</td>
            <td><?php echo $terdaftar['bidang800'] ?></td>
            <td><?php echo $terdaftar['luas800'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang800'] ?></td>
            <td><?php echo $tidak_terdaftar['luas800'] ?></td>
        </tr>
        <tr>
            <td>9</td>
            <td>800 - 900 m2</td>
            <td><?php echo $terdaftar['bidang900'] ?></td>
            <td><?php echo $terdaftar['luas900'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang900'] ?></td>
            <td><?php echo $tidak_terdaftar['luas900'] ?></td>
        </tr>
        <tr>
            <td>10</td>
            <td>900 - 1000 m2</td>
            <td><?php echo $terdaftar['bidang1000'] ?></td>
            <td><?php echo $terdaftar['luas1000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang1000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas1000'] ?></td>
        </tr>
        <tr>
            <td>11</td>
            <td>1000 - 2000 m2</td>
            <td><?php echo $terdaftar['bidang2000'] ?></td>
            <td><?php echo $terdaftar['luas2000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang2000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas2000'] ?></td>
        </tr>
        <tr>
            <td>12</td>
            <td>2000 - 3000 m2</td>
            <td><?php echo $terdaftar['bidang3000'] ?></td>
            <td><?php echo $terdaftar['luas3000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang3000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas3000'] ?></td>
        </tr>
        <tr>
            <td>13</td>
            <td>3000 - 4000 m2</td>
            <td><?php echo $terdaftar['bidang4000'] ?></td>
            <td><?php echo $terdaftar['luas4000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang4000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas4000'] ?></td>
        </tr>
        <tr>
            <td>14</td>
            <td>4000 - 5000 m2</td>
            <td><?php echo $terdaftar['bidang5000'] ?></td>
            <td><?php echo $terdaftar['luas5000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang5000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas5000'] ?></td>
        </tr>
        <tr>
            <td>15</td>
            <td>5000 - 6000 m2</td>
            <td><?php echo $terdaftar['bidang6000'] ?></td>
            <td><?php echo $terdaftar['luas6000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang6000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas6000'] ?></td>
        </tr>
        <tr>
            <td>16</td>
            <td>6000 - 7000 m2</td>
            <td><?php echo $terdaftar['bidang7000'] ?></td>
            <td><?php echo $terdaftar['luas7000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang7000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas7000'] ?></td>
        </tr>
        <tr>
            <td>17</td>
            <td>7000 - 8000 m2</td>
            <td><?php echo $terdaftar['bidang8000'] ?></td>
            <td><?php echo $terdaftar['luas8000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang8000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas8000'] ?></td>
        </tr>
        <tr>
            <td>18</td>
            <td>8000 - 9000 m2</td>
            <td><?php echo $terdaftar['bidang9000'] ?></td>
            <td><?php echo $terdaftar['luas9000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang9000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas9000'] ?></td>
        </tr>
        <tr>
            <td>19</td>
            <td>9000 - 10000 m2</td>
            <td><?php echo $terdaftar['bidang10000'] ?></td>
            <td><?php echo $terdaftar['luas10000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang10000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas10000'] ?></td>
        </tr>
        <tr>
            <td>20</td>
            <td>10.000 - 20.000 m2</td>
            <td><?php echo $terdaftar['bidang20000'] ?></td>
            <td><?php echo $terdaftar['luas20000'] ?></td>
            <td><?php echo $tidak_terdaftar['bidang20000'] ?></td>
            <td><?php echo $tidak_terdaftar['luas20000'] ?></td>
        </tr>
        <tr>
            <td>21</td>
            <td> > 20.000 m2</td>
            <td><?php echo $terdaftar['bidangmore'] ?></td>
            <td><?php echo $terdaftar['luasmore'] ?></td>
            <td><?php echo $tidak_terdaftar['bidangmore'] ?></td>
            <td><?php echo $tidak_terdaftar['luasmore'] ?></td>
        </tr>
    </tbody>
</table>
