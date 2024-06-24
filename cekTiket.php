<?php
include "koneksi.php";
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



// $id_tiket = $_GET['tiket'];
// $id_kelas = $_GET['kelas'];
// $id_kursi = $_GET['kursi'];
// $id_kereta = $_GET['kereta'];
// $id_transaksi = $_GET['transaksi'];

// if (!isset($id_transaksi)) {
//     echo '<script language="javascript">
//         alert("Bayar dulu njir");
//         history.go(-1);
//     </script>';
//     exit();
// }
$id_tiket = $_GET['id_tiket'];


$sqluser = "SELECT * FROM user WHERE username = '" . $_SESSION['username'] . "'";
$dt_queryuser = $koneksi->query($sqluser);
$dt_user = $dt_queryuser->fetch_array();
// echo $dt_user['id_user'];

$sql = " SELECT * FROM tiket where id_tiket = $id_tiket";
$dt_query = $koneksi->query($sql);
$dt_tiket = $dt_query->fetch_array();
// echo $dt_tiket['id_tiket'];

$sqlJadwal = "SELECT * from jadwal WHERE id_jadwal = '" . $dt_tiket['id_jadwal'] . "'";
$dt_query3 = $koneksi->query($sqlJadwal);
$dt_jadwal = $dt_query3->fetch_array();
// echo $dt_jadwal['id_jadwal'];

$sqlKursi = "SELECT * from kursi WHERE id_kursi = '" . $dt_tiket['id_kursi'] . "'";
$dt_query4 = $koneksi->query($sqlKursi);
$dt_kursi = $dt_query4->fetch_array();
// echo $dt_kursi['id_kursi'];

$sqlStasiunAsal = "SELECT * from stasiun WHERE id_stasiun = '" . $dt_jadwal['id_stasiunasal'] . "'";
$dt_query6 = $koneksi->query($sqlStasiunAsal);
$dt_stasiunAsal = $dt_query6->fetch_array();


$id_stasiuntujuan = $dt_jadwal['id_stasiuntujuan'];
$sqlStasiunTujuan = "SELECT * from stasiun WHERE id_stasiun =  '" . $dt_jadwal['id_stasiuntujuan'] . "'";
$dt_query7 = $koneksi->query($sqlStasiunTujuan);
$dt_stasiunTujuan = $dt_query7->fetch_array();


$sqlKereta = "SELECT * from kereta WHERE id_kereta = '" . $dt_jadwal['id_kereta'] . "'";
$dt_query8 = $koneksi->query($sqlKereta);
$dt_kereta = $dt_query8->fetch_array();


$sqlKelas = "SELECT * from kelas WHERE id_kelas ='" . $dt_kursi['id_kelas'] . "'";
$dt_query9 = $koneksi->query($sqlKelas);
$dt_kelas = $dt_query9->fetch_array();

// $sqlKursi = "SELECT * from kursi WHERE id_kursi = $id_kursi";
// $dt_query10 = $koneksi->query($sqlKursi);
// $dt_kursi = $dt_query10->fetch_array();

$sqlPembayaran = "SELECT * from pembayaran WHERE '" . $dt_tiket['id_tiket'] . "'";
$dt_query11 = $koneksi->query($sqlPembayaran);
$dt_pembayaran = $dt_query11->fetch_array();
// var_dump($dt_pembayaran);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="tiket.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="home.php"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<a class='nav-link' href='logout.php'>Logout</a>";
                        } else {
                            echo "<a class='nav-link' href='form/login.php'>Login</a>";
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled " aria-disabled="true"><?php echo $_SESSION['username']; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Red Line -->
    <div class="line d-flex justify-content-start" style="background-color: crimson">
        <ul></ul>
    </div>

    <div class="container-tiket">
        <div class="head">Ticket</div>
        <div class="head2">No. Ticket: <?= $dt_tiket['id_tiket'] ?></div>
        <div class="data1">
            <div class="col">
                <div class="row"><?= $dt_stasiunAsal['nama_stasiun'] ?></div>
                <div class="row"><?= $dt_jadwal['jam_berangkat'] ?></div>
                <div class="row"><?= $dt_jadwal['tanggal'] ?></div>
            </div>
            <div class="col jadwal">
                <div class="row">G<?= $dt_tiket['id_jadwal'] ?></div>
                <div class="row"><?= $dt_kelas['id_kelas'] ?>-<?= $dt_kursi['no_kursi'] ?></div>
                <div class="row"><?= $dt_kelas['tipekelas'] ?></div>
            </div>
            <div class="col">
                <div class="row"><?= $dt_stasiunTujuan['nama_stasiun'] ?></div>
                <div class="row"><?= $dt_jadwal['jam_sampai'] ?></div>
                <div class="row"><?= $dt_jadwal['tanggal'] ?></div>
            </div>
        </div>
        <div class="data2">
            <div class="row">Passanger: <?= $dt_user['nama'] ?></div>
            <div class="row">Train: <?= $dt_kereta['nama_kereta'] ?></div>
            <div class="row">Booking Code: <?= $dt_pembayaran['id_transaksi'] ?></div>
            <div class="row">Purchase Date: <?= $dt_pembayaran['tanggal_pembelian'] ?></div>
        </div>
    </div>

    <div class="feedback">
        Enjoy our website? <a href="feedback.php">Give us feedback</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>