<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_transaksi = $_GET['id'];
$id_tiket = $_POST['tiket'];
$va = $_POST['va'];


$query = "UPDATE pembayaran SET id_tiket = '$id_tiket', virtual_account = '$va' WHERE id_transaksi = $id_transaksi";
$a = $koneksi->query($query);

if ($a === true) {
    header('location:../tablepembayaran.php');
} else {
    echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
}
?>
