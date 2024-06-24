<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {

      
        $tipekelas = $_POST['tipekelas'][$i];
        $harga = $_POST['harga'][$i];

        $query = "INSERT INTO kelas (tipekelas, harga) VALUES ('$tipekelas','$harga')";
        $a = $koneksi->query($query);

        if ($a === true) {
            header('location:../tablekelas.php');
        } else {
            echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
        }
    }
}
