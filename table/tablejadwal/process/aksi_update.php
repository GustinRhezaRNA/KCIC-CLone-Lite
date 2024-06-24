<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_jadwal = $_GET['id'];
$asal = $_POST['asal'];
echo $asal.'test';
$tujuan = $_POST['tujuan'];
echo $tujuan.'test';
$kereta = $_POST['kereta'];
$jam_berangkat = $_POST['jam_berangkat'];
$jam_sampai = $_POST['jam_sampai'];
$tanggal = $_POST['tanggal'];





$query = "UPDATE jadwal SET id_stasiunasal = '$asal', id_stasiuntujuan = '$tujuan', id_kereta = '$kereta',jam_berangkat = '$jam_berangkat',jam_sampai  = '$jam_sampai',tanggal = '$tanggal' WHERE id_jadwal=$id_jadwal";
$a = $koneksi->query($query);

if ($a === true) {
    header('location:../tablejadwal.php');
} else {
    echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
}
?>
