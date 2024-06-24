<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {

        $id_user = $_GET['id'][$i];
        $nama_kereta = $_POST['nama_kereta'][$i];
        $kapasitas = $_POST['kapasitas'][$i];

        $query = "INSERT INTO kereta (nama_kereta, kapasitas ) VALUES ('$nama_kereta','$kapasitas')";
        $a = $koneksi->query($query);

        if ($a === true) {
            header('location:../tablekereta.php');
        } else {
            echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
        }
    }
}
