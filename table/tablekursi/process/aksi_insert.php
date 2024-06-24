<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {

      
        $kereta = $_POST['kereta'][$i];
        $kelas = $_POST['kelas'][$i];
        $no_kursi = $_POST['no_kursi'][$i];
        $ketersediaan = $_POST['kondisi'][$i];
        

        $query = "INSERT INTO kursi (id_kereta,id_kelas,no_kursi,is_available) VALUES ('$kereta','$kelas','$no_kursi','$ketersediaan')";
        $a = $koneksi->query($query);

        if ($a === true) {
            header('location:../tablekursi.php');
        } else {
            echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
        }
    }
}
