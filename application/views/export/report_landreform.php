<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Potensi_Tanah_Landreform.xls");
?>
<h3>Data Potensi Tanah Landreform</h3>
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
            <th>Asal Tanah</th>
            <th>Bidang</th>
            <th>Luas (Ha)</th>
        </tr>
        <tr>
            <th colspan="2">Total</th>
            <td><setrong><?php echo $total_bidang ?></strong></td>
            <td><setrong><?php echo $luas_bidang ?></strong></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Kelebihan Maksimum</td>
            <td><?php echo $maksimum->total_bidang ?></td>
            <td><?php echo $maksimum->luas_bidang != '' ? $maksimum->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Absente</td>
            <td><?php echo $absente->total_bidang ?></td>
            <td><?php echo $absente->luas_bidang != '' ? $absente->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Swapraja</td>
            <td><?php echo $swarpraja->total_bidang ?></td>
            <td><?php echo $swarpraja->luas_bidang != '' ? $swarpraja->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Negara Lainnya :</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>A. Eks HGU</td>
            <td><?php echo $eks_hgu->total_bidang ?></td>
            <td><?php echo $eks_hgu->luas_bidang != '' ? $eks_hgu->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>B. Pelepasan HGU</td>
            <td><?php echo $pelepasan_hgu->total_bidang ?></td>
            <td><?php echo $pelepasan_hgu->luas_bidang != '' ? $pelepasan_hgu->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>C. Tanah Terlantar</td>
            <td><?php echo $tanah_terlantar->total_bidang ?></td>
            <td><?php echo $tanah_terlantar->luas_bidang != '' ? $tanah_terlantar->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>D. Tanah Penyelesaian SKP</td>
            <td><?php echo $penyelesaian_skp->total_bidang ?></td>
            <td><?php echo $penyelesaian_skp->luas_bidang != '' ? $penyelesaian_skp->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>E. Tanah Dari Pelepasan Kawasan Hutan</td>
            <td><?php echo $kawawan_hutan->total_bidang ?></td>
            <td><?php echo $kawawan_hutan->luas_bidang != '' ? $kawawan_hutan->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>F. Tanah Timbul</td>
            <td><?php echo $tanah_timbul->total_bidang ?></td>
            <td><?php echo $tanah_timbul->luas_bidang != '' ? $tanah_timbul->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>G. Tanah Bekas Tambang Yang Telah Dikremasi</td>
            <td><?php echo $bekas_tambang->total_bidang ?></td>
            <td><?php echo $bekas_tambang->luas_bidang != '' ? $bekas_tambang->luas_bidang : 0; ?></td>
        </tr>
        <tr>
            <td></td>
            <td>H. Tanah Negara Dalam Penguasaan Masyarakat</td>
            <td><?php echo $negara_penggunaan_masyarakat->total_bidang ?></td>
            <td><?php echo $negara_penggunaan_masyarakat->luas_bidang != '' ? $negara_penggunaan_masyarakat->luas_bidang : 0; ?></td>
        </tr>
    </tbody>
</table>
