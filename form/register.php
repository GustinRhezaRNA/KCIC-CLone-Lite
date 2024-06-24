<?php
include "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tiket Kereta Api</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../style.css" />
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
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="line d-flex justify-content-start" style="background-color: crimson">
    <ul></ul>
  </div>


  <!-- Form -->
  <form action="../process/aksi_register.php" method="POST" class="fill-style" enctype="multipart/form-data">
    <h4>Create Account</h4>

    <div class="mb-3">
      <div class="row">
        <div class="col">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" id="username" aria-describedby="username" required />
        </div>

        <div class="mb-3 mt-3">
          <div class="row">
            <div class="col">
              <label for="password1" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <div class="col">
              <label for="confirm-password" class="form-label">Verifikasi Password</label>
              <input type="password" class="form-control" id="confirm-password" required />
            </div>

          </div>
        </div>

        <div class="col">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" required />
        </div>

        <div class="col">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="email" aria-describedby="email" required />
        </div>

        <div class="row">
          <div class="col">
            <label for="ktp" class="form-label">Foto KTP</label>
            <input type="file" name="uproposal" class="form-control" id="ktp" aria-describedby="ktp" required />
          </div>
        </div>

      </div>
    </div>




    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1" />
      <label class="form-check-label" for="exampleCheck1">By clicking Sign up you are agree with
        <a href="terms.html" target="_blank">Terms and Conditions</a>
      </label>
    </div>

    <button type="submit" class="btn btn-danger btn-SignUp" value="Register">
      Sign Up
    </button>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="../js/script.js"></script>
</body>

</html>