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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="feedback.css">
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
                    <!-- Ubah href untuk Logout -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Red Line -->
    <div class="line d-flex justify-content-start" style="background-color: crimson">
        <ul></ul>
    </div>

    <div class="container-feedback">
        <h1>Feedback</h1>
        <form action="process/aksi_feedback.php" method="POST">
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <div class="rating">
                    <input type="radio" name="rating" id="star1" value="5"><label for="star1"></label>
                    <input type="radio" name="rating" id="star2" value="4"><label for="star2"></label>
                    <input type="radio" name="rating" id="star3" value="3"><label for="star3"></label>
                    <input type="radio" name="rating" id="star4" value="2"><label for="star4"></label>
                    <input type="radio" name="rating" id="star5" value="1"><label for="star5"></label>
                </div>
            </div>

            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>