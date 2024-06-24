<?php
include "koneksi.php";

session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="javascript">
        alert("Anda belum login, login terlebih dahulu?");
        document.location = "form/login_admin.php";
    </script>
<?php
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="home_admin.css">
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
    <div class="line d-flex justify-content-end" style="background-color: crimson">
    <ul><a href='logout.php'>Logout</a></ul>
  </div>

    <div class="container mt-5">
        <header class="mb-4">
            <h1>Admin Dashboard</h1>
        </header>
        <main>
            <div class="button-container d-flex flex-wrap justify-content-center gap-3">
                <button class="btn btn-primary" onclick="location.href='table/tableuser/tableuser.php'">Table User</button>
                <button class="btn btn-primary" onclick="location.href='table/tableadmin/tableadmin.php'">Table Admin</button>
                <button class="btn btn-primary" onclick="location.href='table/tablekereta/tablekereta.php'">Table Kereta</button>
                <button class="btn btn-primary" onclick="location.href='table/tablejadwal/tablejadwal.php'">Table Jadwal</button>
                <button class="btn btn-primary" onclick="location.href='table/tablekelas/tablekelas.php'">Table Kelas</button>
                <button class="btn btn-primary" onclick="location.href='table/tablekursi/tablekursi.php'">Table Kursi</button>
                <button class="btn btn-primary" onclick="location.href='table/tabletiket/tabletiket.php'">Table Tiket </button>
                <button class="btn btn-primary" onclick="location.href='table/tablepembayaran/tablepembayaran.php'">Table Pembayaran</button>
                <button class="btn btn-primary" onclick="location.href='table/tablefeedback/tablefeedback.php'">Table Feedback</button>
                <button class="btn btn-primary" onclick="location.href='table/tablestasiun/tablestasiun.php'">Table Stasiun</button>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>