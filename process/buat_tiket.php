<?php
include "../koneksi.php";

session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="javascript">
        alert("Anda belum login, login terlebih dahulu?");
        document.location = "form/login.php";
    </script>
<?php
}


$user = $_SESSION['username'];
$id_jadwal  = $_GET['jadwal'];
$id_kereta = $_GET['kereta'];
$id_kursi  = $_GET['kursi'];
$id_kelas = $_GET['kelas'];
$metode_transaksi = $_POST['transaksi'];


echo $user;
echo $id_jadwal."jadwal <br>";
echo $id_kereta."kereta <br>";
echo $id_kursi."kursi <br>";
echo $id_kelas."kelas <br>";


//Cari id user
$sql1 = "SELECT * from user where username='$user'";
$query = $koneksi->query($sql1);
$dt_user = $query->fetch_array();
$id_user = $dt_user['id_user'];


// Buat Tiket
$sql2 = "INSERT INTO tiket (id_user,id_jadwal,id_kursi) VALUES ('" . $id_user . "','" . $id_jadwal . "','" . $id_kursi . "')";
$a = $koneksi->query($sql2);


if ($a === true) {
    $id_tiket = mysqli_insert_id($koneksi);
    header("Location: aksi_payment.php?kelas=" . $id_kelas . "&kursi=" . $id_kursi . "&kereta=" . $id_kereta . "&jadwal=" . $id_jadwal. "&tiket=" . $id_tiket. "&mb=" . $metode_transaksi);
} else {
    echo "<script>alert('Tiket Gagal Dimuat');history.go(-1);</script>";
}

?>