<?php
include "../../koneksi.php";

session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="javascript">
        alert("Anda belum login, login terlebih dahulu?");
        document.location = "form/login_admin.php";
    </script>
<?php

}

$user = $_SESSION['username'];
$sql = "SELECT * from admin where username='$user'";
$query = $koneksi->query($sql);
$data = $query->fetch_array();

if (isset($_POST["delete"]) && isset($_POST["deleteId"])) {
    foreach ($_POST["deleteId"] as $deleteId) {
        $sql = "DELETE from tiket where id_tiket=$deleteId";
        $query = $koneksi->query($sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Table</title>
    <link rel="stylesheet" href="../table.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php">Wheesh</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Red Line -->
    <div class="line" style="height: 5px; background-color: crimson;"></div>

    <div class="container mt-5">
        <header class="mb-4">
            <?php
            if ($data['role'] == 'admin') {
                echo '<a href="form/forminserttiket.php">Insert New Data</a>';
            }
            ?>
        </header>
        <main>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <form action="" method="post">
                        <thead class="table-dark">
                            <tr>
                                <?php
                                if ($data['role'] == 'admin') {
                                    echo "<th><button type='submit' class='btn btn-warning btn-sm' name='delete'>Delete</button></td></th>";
                                }
                                ?>
                                <th>ID Tiket</th>
                                <th>ID User</th>
                                <th>ID Jadwal</th>
                                <th>ID Kursi</th>
                                <?php
                                if ($data['role'] == 'admin') {
                                    echo "<th>Actions</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tiket"; // Ganti dengan nama tabel yang sesuai
                            $result = mysqli_query($koneksi, $query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    if ($data['role'] == 'admin') {
                                        echo "<td><input type='checkbox' name='deleteId[]' value='" . $row['id_tiket'] . "'></td>";
                                    }
                                    echo "<td>" . $row['id_tiket'] . "</td>";
                                    echo "<td>" . $row['id_user'] . "</td>";
                                    echo "<td>" . $row['id_jadwal'] . "</td>";
                                    echo "<td>" . $row['id_kursi'] . "</td>";
                                    if ($data['role'] == 'admin') {
                                        echo "<td><a href='form/formupdatetiket.php?id=" . $row['id_tiket'] . "' class='btn btn-warning btn-sm'>Edit</a> ";
                                    }
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>

                    </form>
                </table>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>