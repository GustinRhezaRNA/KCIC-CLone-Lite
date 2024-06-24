<?php
include "../koneksi.php";
// Cek apakah user sudah login atau belum
session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="javascript">
        alert("Anda belum login, login terlebih dahulu?");
        document.location = "form/login.php";
    </script>
<?php
}


$id_kereta = $_GET['kereta'];
$id_kursi  = $_GET['kursi'];
$id_kelas = $_GET['kelas'];
$id_jadwal  = $_GET['jadwal'];
$id_tiket  = $_GET['tiket'];



$metodeBayar = $_GET['mb'];
$sql = "INSERT INTO pembayaran (id_tiket,virtual_account) VALUES ('" . $id_tiket . "','" . $metodeBayar . "')";
$a = $koneksi->query($sql);
$id_transaksi = mysqli_insert_id($koneksi);

if ($a === true) {

    echo "<script>alert('Payment Berhasil')";
    header("Location: ../tiket.php?jadwal=" . $id_jadwal . "&kelas=" . $id_kelas . "&kereta=" . $id_kereta . "&transaksi=" . $id_transaksi . "&kursi=" . $id_kursi . "&tiket=" . $id_tiket);
} else {
    echo "<script>alert('Payment');history.go(-1);</script>";
}

?>