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

$id_kelas = $_POST['kelas'];
$id_jadwal = $_GET['jadwal'];
$id_kereta = $_GET['kereta'];
if (!isset($id_kelas)) {
    echo '<script language="javascript">
        alert("Anda belum memilih kelas");
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
    <title>But winner don't quit</title>
    <link rel="stylesheet" href="kursi.css">
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



    <?php
    $sql2 = "SELECT * FROM user WHERE username = '" . $_SESSION['username'] . "'";

    $dt_query2 = $koneksi->query($sql2);
    $dt_user = $dt_query2->fetch_array();

    $sql3 = "SELECT tipekelas FROM kelas WHERE id_kelas = $id_kelas";

    $dt_query3 = $koneksi->query($sql3);
    $dt_kelas = $dt_query3->fetch_array();

    $sql4 = "SELECT harga FROM kelas WHERE id_kelas = $id_kelas";

    $dt_query4 = $koneksi->query($sql4);
    $dt_harga = $dt_query4->fetch_array();
    ?>


    <div class="container-kursi">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Passenger Name</th>
                        <th>Seat Type</th>
                        <th>Email</th>
                        <th>Selected Seats</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $dt_user['username']; ?></td>
                        <td><?= $dt_kelas['tipekelas']; ?> Class</td>
                        <td><?= $dt_user['email']; ?></td>
                        <td id="selected-kursi"></td>
                        <td><?= $dt_harga['harga']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="container-form">
            <form action="payment.php?jadwal=<?= $id_jadwal ?>&kelas=<?= $id_kelas ?>&kereta=<?= $id_kereta ?>" method="POST">
                <label for="kursi">Choose Your Seat</label>
                <select name="kursi" style="height: 50px; width: 10%;">
                    <?php
                    $sql = "SELECT * FROM kursi JOIN kelas ON kursi.id_kelas = kelas.id_kelas WHERE kursi.id_kelas = $id_kelas AND is_available = 1 AND id_kereta = $id_kereta";
                    $dt_query = $koneksi->query($sql);
                    if ($dt_query->num_rows > 0) {
                        while ($rowkursi = $dt_query->fetch_assoc()) {
                    ?>
                            <option value="<?php echo $rowkursi['id_kursi']; ?>">
                                <?php echo $rowkursi['no_kursi']; ?>
                            </option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <button class="btn btn-danger">Pay</button>
            </form>
        </div>
    </div>



    <!-- <div class="container-img">
        <img src="img/Kursi KAI (1).jpg" alt="" srcset="">
    </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/kursi.js"></script>
</body>

</html>