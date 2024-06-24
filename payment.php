<?php
include "koneksi.php";
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// Cek apakah user sudah login atau belum
if (!isset($_SESSION['username'])) {
    echo '<script language="javascript">
        alert("Anda belum login, login terlebih dahulu?");
        document.location = "form/login.php";
    </script>';
    exit();
}
$id_kelas = $_GET['kelas'];
$id_jadwal = $_GET['jadwal'];
$id_kursi = $_POST['kursi'];
$id_kereta = $_GET['kereta'];

if (!isset($id_kelas)) {
    echo '<script language="javascript">
        alert("Anda belum memilih kursi");
        history.go(-1);
    </script>';
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayar</title>
    <link rel="stylesheet" href="payment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="../home.php">Wheesh</a>
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

    <div class="container-payment">
        <div class="row-red"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
            </svg> Complete Payment</div>
        <div class="row-dataPass">Passanger: <?= $_SESSION['username']; ?>
        </div>
        <div class="row-price">Rp <span>300.000</span></div>

        <div class="container-method">
            <div class="row-va">
                <div class="row-head">Virtual Account</div>
                <p></p>
                <form action="process/buat_tiket.php?jadwal=<?= $id_jadwal ?>&kelas=<?= $id_kelas ?>&kursi=<?= $id_kursi ?>&kereta=<?= $id_kereta ?>" method="POST">
                    <div class="row-bayar ">
                        <input type="radio" id="bri" name="transaksi" value="bri">
                        <label for="bri">Bank BRI</label>
                        <input type="radio" id="bca" name="transaksi" value="bca">
                        <label for="bca">Bank BCA</label>
                        <input type="radio" id="bni" name="transaksi" value="bni">
                        <label for="bni">Bank BNI</label>
                        <input type="radio" id="mandiri" name="transaksi" value="mandiri">
                        <label for="mandiri">Bank Mandiri</label>
                        <input type="radio" id="btn" name="transaksi" value="btn">
                        <label for="btn">Bank BTN</label>
                    </div>
                    <button type="submit" class="pay-button">Pay</button>
                </form>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>