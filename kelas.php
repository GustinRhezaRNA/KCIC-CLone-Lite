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
$id_jadwal = $_GET['jadwal'];
$id_kereta = $_GET['kereta'];

$sqlKereta = "SELECT * 
FROM kereta 
JOIN jadwal ON kereta.id_kereta = jadwal.id_kereta 
WHERE kereta.id_kereta = $id_kereta";

$dt_queryKereta = $koneksi->query($sqlKereta);
$dt_Kereta = $dt_queryKereta->fetch_array();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tiket Kereta Api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />


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

    <div class="container-info d-flex">
        <form method="post" action="kursi.php?jadwal=<?= $id_jadwal ?>&kereta=<?= $dt_Kereta['id_kereta'] ?>" method="post" class="d-flex" style="margin: auto; width: 80vw;">
            <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">
            <div class="col left">
                <div class="row head1">Train Information</div>
                <div class="row mtop20">
                    <?php
                    $sql = "SELECT * FROM jadwal JOIN stasiun ON jadwal.id_stasiunasal = stasiun.id_stasiun WHERE jadwal.id_jadwal = $id_jadwal ";
                    $dt_query = $koneksi->query($sql);
                    $dt_jadwal = $dt_query->fetch_array();

                    $sql2 = "SELECT * FROM jadwal JOIN stasiun ON jadwal.id_stasiuntujuan = stasiun.id_stasiun WHERE jadwal.id_jadwal = $id_jadwal ";
                    $dt_query2 = $koneksi->query($sql2);
                    $dt_jadwal2 = $dt_query2->fetch_array();
                    ?>

                    <div class='col-lg-3 pad10'>
                        <div class="row d-flex">
                            <div class='jadwal-num'><?= "G" . $id_jadwal ?></div>
                        </div>
                        <div class='nama-stasiun'><?= $dt_jadwal["tanggal"]; ?></div>

                    </div>
                    <div class='col  pad10' style="justify-content: center;">
                        <div class="row d-flex">
                            <div class='time-numf'><?= $dt_jadwal["jam_berangkat"]; ?></div>
                            <span class='time-zone'>WIB</span>
                        </div>

                        <div class='nama-stasiun'><?= $dt_jadwal["nama_stasiun"]; ?></div>
                    </div>
                    <div class='col-sm-2 pad10' style="text-align: start; margin: auto">
                        <h1><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg></h1>
                    </div>
                    <div class='col  pad10' style="justify-content: center;">
                        <div class="row d-flex">
                            <div class='time-numf'><?= $dt_jadwal["jam_sampai"]; ?></div>
                            <span class='time-zone'>WIB</span>
                        </div>

                        <div class='nama-stasiun'><?= $dt_jadwal2["nama_stasiun"]; ?></div>
                    </div>


                </div>


                <!-- Choose Kelas -->
                <div class='row d-flex ' style='height:.5rem; border-top: 1px dashed #000; padding-top: 20px; margin: 18px; box-sizing: border-box; '>

                    <?php
                    $sql2 = "SELECT kelas.id_kelas, kelas.tipekelas as tipekelas, kelas.harga as harga
                FROM kursi
                JOIN kelas ON kursi.id_kelas = kelas.id_kelas
                GROUP BY kelas.id_kelas, kelas.harga";

                    $query2 = $koneksi->query($sql2);
                    if ($query2->num_rows > 0) {
                        while ($row2 = $query2->fetch_assoc()) {
                    ?>
                            <div class='col kelas'>
                                <?= $row2['tipekelas'] ?> Class : <span class="harga">Rp.<?= $row2['harga'] ?></span>
                                <input type="radio" name="kelas" value="<?= $row2['id_kelas'] ?>" class="form-check-input">
                                <p id="result"></p>
                            </div>
                    <?php
                        };
                    }
                    ?>


                </div>
            </div>


            <div class="col-sm-3 right">
                <div class="row head2">Cost Detail</div>
                <div class="row pad10" style="display: block;">Ticket Price : <span id="ticket-price">
                    </span>
                </div>
                <div class="row d-flex pad10">
                    <div class="col btn prev">Prev Step</div>
                    <button class="col btn btn-danger next" type="submit" value="submit">Next Step</button>
                </div>
            </div>
        </form>

    </div>

    <!-- Cost Detail (the right one) -->
    <div class="cost-detail"></div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/kelas.js"></script>

</body>

</html>