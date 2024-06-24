<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_stasiun = $_GET['id'];
$nama_stasiun = $_POST['nama_stasiun'];
$kota = $_POST['kota'];

echo $id_stasiun;
echo $nama_stasiun;
echo $kota;



$query = "UPDATE stasiun SET nama_stasiun = '$nama_stasiun', kota = '$kota' WHERE id_stasiun = $id_stasiun";
$a = $koneksi->query($query);

if ($a === true) {
    header('location:../tablestasiun.php');
} else {
    echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
}
