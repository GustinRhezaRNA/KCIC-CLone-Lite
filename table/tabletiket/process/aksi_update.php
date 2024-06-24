<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_tiket = $_GET['id'];
$user = $_POST['user'];
$jadwal = $_POST['jadwal'];
$kursi = $_POST['kursi'];


$query = "UPDATE tiket SET id_user = '$user', id_jadwal = '$jadwal', id_kursi = '$kursi' WHERE id_tiket=$id_tiket";
$a = $koneksi->query($query);

if ($a === true) {
    header('location:../tabletiket.php');
} else {
    echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
}
?>
