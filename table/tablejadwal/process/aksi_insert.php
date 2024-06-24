<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {

        $asal = $_POST['asal'][$i];
        $tujuan = $_POST['tujuan'][$i];
        $kereta = $_POST['kereta'][$i];
        $jam_berangkat = $_POST['jam_berangkat'][$i];
        $jam_sampai = $_POST['jam_sampai'][$i];
        $tanggal = $_POST['tanggal'][$i];


        $query = "INSERT INTO jadwal (id_stasiunasal, id_stasiuntujuan, id_kereta,jam_berangkat,jam_sampai,tanggal) VALUES ('$asal','$tujuan', '$kereta','$jam_berangkat','$jam_sampai','$tanggal')";
        $a = $koneksi->query($query);

        if ($a === true) {
            header('location:../tablejadwal.php');
        } else {
            echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
        }
    }
}
