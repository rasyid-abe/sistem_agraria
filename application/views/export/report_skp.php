<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Tanah_Sengketa_Konflik_Perkara.xls");
?>
<h3>Data Tanah Sengketa, Konflik, Perkara</h3>
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
            <th>No</th>
            <th>Indikasi</th>
            <th>Jumlah Bidang</th>
            <th>Luas (Ha)</th>
        </tr>
        <tr>
            <th colspan="2">Total Luas (Ha)</th>
            <td><strong><?php echo $total_bidang != '' ? $total_bidang : 0;?></strong></td>
            <td><strong><?php echo $total_luas != '' ? $total_luas : 0;?></strong></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Sengketa</td>
            <td><?php echo $sengketa->total_bidang ?></td>
            <td><?php echo $sengketa->luas_bidang != '' ? $sengketa->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Konflik</td>
            <td><?php echo $konflik->total_bidang ?></td>
            <td><?php echo $konflik->luas_bidang != '' ? $konflik->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Perkara</td>
            <td><?php echo $perkara->total_bidang ?></td>
            <td><?php echo $perkara->luas_bidang != '' ? $perkara->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Tidak Sengketa Konflik Prekara</td>
            <td><?php echo $noskp->total_bidang ?></td>
            <td><?php echo $noskp->luas_bidang != '' ? $noskp->luas_bidang : 0; ?></td>
        </tr>
    </tbody>
</table>
