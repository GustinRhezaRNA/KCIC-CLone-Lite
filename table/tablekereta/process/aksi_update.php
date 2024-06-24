<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_kereta = $_GET['id'];
$nama_kereta = $_POST['nama_kereta'];
$kapasitas = $_POST['kapasitas'];




$query = "UPDATE kereta SET nama_kereta='$nama_kereta', kapasitas='$kapasitas'WHERE id_kereta=$id_kereta";
$a = $koneksi->query($query);

if ($a === true) {
    header('location:../tablekereta.php');
} else {
    echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
}
?>
