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

$asal = $_POST['asal'];
$tujuan = $_POST['tujuan'];
$tanggal = $_POST['tanggal'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tiket Kereta Api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="home.php">Wheesh</a>
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


    <!-- Search -->
    <form class="main-function d-flex" style="margin: auto; 
      width: 85%; 
      margin-top: 10px;
      padding: 10px;
      box-shadow: 0px 1px 5px 2px #888888;
      border-radius: 10px;
      box-sizing: border-box;
      " action="jadwal.php" method="POST">

        <select name="asal" style="height: 100px;
        width: 30%;">
            <option value="" disabled selected>From</option>
            <?php
            $query = "SELECT * FROM stasiun";
            $dt_query = $koneksi->query($query);
            while ($dt_stasiun = $dt_query->fetch_array()) {
            ?>
                <option value="<?php echo $dt_stasiun['id_stasiun']; ?>">
                    <?php echo $dt_stasiun['nama_stasiun']; ?>
                </option>
            <?php
            }
            ?>
        </select>

        <select name="tujuan" style="height: 100px;
        width: 30%;">
            <option value="" disabled selected>To</option>
            <?php
            $dt_query->data_seek(0);
            while ($dt_stasiun = $dt_query->fetch_array()) {
            ?>
                <option value="<?php echo $dt_stasiun['id_stasiun']; ?>">
                    <?php echo $dt_stasiun['nama_stasiun']; ?>
                </option>
            <?php
            }
            ?>
        </select>



        <input type="date" aria-label="date" style="height: 100px;
        width: 30%;
        " name="tanggal" placeholder="Date" />

        <button type="button btn-lg submit" class="btn btn-danger" style="width: 20%; margin-left: 5px;" value="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
        </button>
    </form>

    <!-- Jadwal -->
    <section class="jadwal">
        <?php
        $sql = "SELECT * FROM jadwal JOIN kereta ON jadwal.id_kereta = kereta.id_kereta JOIN stasiun ON jadwal.id_stasiunasal = stasiun.id_stasiun WHERE id_stasiunasal = '$asal' AND id_stasiuntujuan = '$tujuan' AND tanggal ='$tanggal'";
        $query = $koneksi->query($sql);
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
        ?>
                <div class='list-tiket' style='width: 85%;
                margin: auto; padding:10px; box-sizing: border-box;'>
                    <div class='tiket'>
                        <form action="kelas.php?jadwal=<?= $row['id_jadwal']; ?>&kereta=<?= $row['id_kereta']; ?>" method="POST">
                            <input type='hidden' name='jam_berangkat' value='$row["jam_berangkat"];'>
                            <input type='hidden' name='jam_berangkat' value='$row["jam_sampai"]'>
                            <input type='hidden' name='tanggal' value='$tanggal'>
                            <div class='row d-flex' style='height:5rem; flex-wrap: wrap;'>
                                <div class='col-lg-3'>
                                    <div class='jadwal-num'><?= "G" . $row['id_jadwal']; ?></div>
                                </div>
                                <div class='col d-flex' style="justify-content: center;">
                                    <div class='time-numf'><?= $row['jam_berangkat']; ?></div>
                                    <span class='time-zone'>WIB</span>
                                </div>
                                <div class='col-sm-2' style="text-align: center; display: block; margin: auto">
                                    <h1><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                        </svg></h1>
                                </div>
                                <div class='col d-flex' style="justify-content: center;">
                                    <div class='time-num'><?= $row['jam_sampai']; ?></div>
                                    <span class='time-zone'>WIB</span>
                                </div>
                                <div class='col-lg-3 d-flex justify-content-end' style='height:2.5rem'>
                                    <button type='submit' class='btn btn-danger' value='submit'>Reservation</button>
                                </div>
                            </div>
                        </form>


                        <div class='row d-flex' style='height:.5rem; border-top: 1px solid #e0e0e0; padding: 8px 0px;; margin: 18px; box-sizing: border-box;'>

                            <?php
                            $sql2 = "SELECT kelas.id_kelas, kelas.tipekelas AS tipekelas, kelas.harga as harga
                        FROM kursi
                        JOIN kelas ON kursi.id_kelas = kelas.id_kelas
                        GROUP BY kelas.id_kelas, kelas.harga";

                            $query2 = $koneksi->query($sql2);
                            if ($query2->num_rows > 0) {
                                while ($row2 = $query2->fetch_assoc()) {
                            ?>
                                    <div class='col keterangan'><?= $row2['tipekelas'] ?> Class : <span class="harga">Rp.<?= $row2['harga'] ?></span></div>
                            <?php
                                };
                            }
                            ?>


                        </div>
                    </div>
                </div>
        <?php
            };
        } else {
            echo "Tidak ada jadwal yang ditemukan.";
        }




        ?>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>