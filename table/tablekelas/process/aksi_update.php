<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_kelas = $_GET['id'];
$tipekelas = $_POST['tipekelas'];
$harga = $_POST['harga'];


$query = "UPDATE kelas SET tipekelas='$tipekelas', harga='$harga'WHERE id_kelas=$id_kelas";
$a = $koneksi->query($query);

if ($a === true) {
    header('location:../tablekelas.php');
} else {
    echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
}
?>
