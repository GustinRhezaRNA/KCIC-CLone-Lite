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


    <?php

    $sqluser = "SELECT * FROM user WHERE username = '" . $_SESSION['username'] . "'";
    $dt_queryuser = $koneksi->query($sqluser);
    $dt_user = $dt_queryuser->fetch_array();
    // echo $dt_user['id_user'];


    $sql = " SELECT * FROM tiket where id_user = '" . $dt_user['id_user'] . "'";
    $dt_query = $koneksi->query($sql);


    while ($dt_tiket = $dt_query->fetch_array()) {
    ?>
        <div class="container-tiket">
            <div class="head">Ticket</div>
            <div class="head2">No. Ticket: <?= $dt_tiket['id_tiket'] ?></div>
            <a href="cekTiket.php?id_tiket=<?= $dt_tiket['id_tiket'] ?>">Click</a>
        </div>
    <?php
    }

    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>