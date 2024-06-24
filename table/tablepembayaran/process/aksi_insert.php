<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {

        $tiket = $_POST['tiket'][$i];
        $va = $_POST['va'][$i];

        $query = "INSERT INTO pembayaran (id_tiket, virtual_account) VALUES ('$tiket','$va' )";
        $a = $koneksi->query($query);

        if ($a === true) {
            header('location:../tablepembayaran.php');
        } else {
            echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
        }
    }
}
