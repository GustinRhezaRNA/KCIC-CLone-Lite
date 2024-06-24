<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {

        $user = $_POST['user'][$i];
        $jadwal = $_POST['jadwal'][$i];
        $kursi = $_POST['kursi'][$i];
        


        $query = "INSERT INTO tiket (id_user, id_jadwal, id_kursi) VALUES ('$user','$jadwal', '$kursi')";
        $a = $koneksi->query($query);

        if ($a === true) {
            header('location:../tabletiket.php');
        } else {
            echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
        }
    }
}
