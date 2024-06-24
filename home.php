<?php
include "koneksi.php";

session_start();
if (!isset($_SESSION['username'])) {
?>
  <script language="javascript">
    alert("Anda belum login, login terlebih dahulu?");
    document.location = "form/login.php";
  </script>
<?php
}

$query = "SELECT * FROM stasiun";
$dt_query = $koneksi->query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tiket Kereta Api</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css">
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
            <a class="nav-link" href="form/register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled " aria-disabled="true"><?php echo $_SESSION['username']; ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="line d-flex justify-content-end" style="background-color: crimson">
    <ul><a href='otwTiket.php'>Cek Tiket Anda</a></ul>
  </div>

  <!-- Carousel -->
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/img1.jpg" class="d-block w-100" alt="img1" />
      </div>
      <div class="carousel-item">
        <img src="img/img2.jpg" class="d-block w-100" alt="img1" />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden ">Next</span>
    </button>
  </div>

  <!-- Input -->
  <form class="main-function d-flex" style="margin: auto; 
      width: 70%; 
      margin-top: 10px;
      padding: 10px;
      box-shadow: 0px 1px 5px 2px #888888;
      " action="jadwal.php" method="POST">

    <select name="asal" style="height: 100px;
        width: 30%;">
      <option value="" disabled selected>From</option>
      <?php
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

    <button type="submit" class="btn btn-danger" style="width: 20%; margin-left: 5px;" value="Search">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
      </svg>
    </button>
  </form>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>