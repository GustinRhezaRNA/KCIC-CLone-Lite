<?php
include "../koneksi.php";
$asal = $_POST['asal'];
$tujuan = $_POST['tujuan'];
$tanggal = $_POST['tanggal'];

$sql = "SELECT * FROM jadwal WHERE id_stasiunasal = '$asal' AND id_stasiuntujuan = '$tujuan' AND tanggal ='$tanggal'";
$query = $koneksi->query($sql);
if (mysqli_num_rows($query) == 1) {
    $data = $query->fetch_array();
    header("location:../jadwal.php?asal");
} else {
    echo "Tidak ada jadwal seperti itu";           
}
?>