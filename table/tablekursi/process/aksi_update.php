<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_kursi = $_POST['id'];
$kereta = $_POST['kereta'];
$kelas = $_POST['kelas'];
$no_kursi = $_POST['no_kursi'];
$ketersediaan = $_POST['kondisi'];


$query = "UPDATE kursi SET id_kereta='$kereta', id_kelas='$kelas', no_kursi='$no_kursi', is_available='$ketersediaan' WHERE id_kursi= '$id_kursi'";
$a = $koneksi->query($query);

if ($a === true) {
    header('location:../tablekursi.php');
} else {
    echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
}
?>
