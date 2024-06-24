<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {

        
        $nama_stasiun = $_POST['nama_stasiun'][$i];
        $kota = $_POST['kota'][$i];

        $query = "INSERT INTO stasiun (nama_stasiun, kota) VALUES ('$nama_stasiun','$kota')";
        $a = $koneksi->query($query);

        if ($a === true) {
            header('location:../tablestasiun.php');
        } else {
            echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
        }
    }
}
