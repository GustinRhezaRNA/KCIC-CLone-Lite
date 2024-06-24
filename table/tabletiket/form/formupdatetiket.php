<?php
include "../../../koneksi.php";

// Pastikan ada parameter id yang dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data user berdasarkan id
    $query = "SELECT * FROM  tiket WHERE id_tiket = $id";
    $result = mysqli_query($koneksi, $query);

    // Pastikan hasil query tidak kosong
    if (mysqli_num_rows($result) > 0) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <title>Tiket Kereta Api</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
            <link rel="stylesheet" href="../style.css" />
            <style>
                .fill-style {
                    width: 70%;
                    margin: auto;
                    margin-top: 50px;
                    margin-bottom: 50px;
                    box-shadow: 0px 1px 5px 2px #b0adad;
                    padding: 20px;
                    border-radius: 10px;
                }

                .to-register {
                    text-decoration: none;
                    color: crimson;
                }
            </style>
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
            <form action="../process/aksi_update.php?id=<?= $id ?>" method="POST" class="fill-style" enctype="multipart/form-data">
                <h4>Update jadwal</h4>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="user" class="form-label">ID User</label>
                            <select name="user" id="user" class="form-control">
                                <option value="" disabled>From</option>
                                <?php
                                $query = "SELECT * FROM user";
                                $dt_query = $koneksi->query($query);
                                while ($dt_user = $dt_query->fetch_array()) {
                                    $selected = ($dt_user['id_user'] == $selected_asal) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $dt_user['id_user']; ?>" <?php echo $selected; ?>>
                                        <?php echo $dt_user['nama']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="jadwal" class="form-label">ID Jadwal</label>
                            <select name="jadwal" id="jadwal" class="form-control">
                                <option value="" disabled>To</option>
                                <?php
                                $query = "SELECT * FROM jadwal";
                                $dt_query = $koneksi->query($query);
                                while ($dt_jadwal = $dt_query->fetch_array()) {
                                    $selected = ($dt_jadwal['id_jadwal'] == $selected_tujuan) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $dt_jadwal['id_jadwal']; ?>" <?php echo $selected; ?>>
                                        <?php echo $dt_jadwal['id_jadwal']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <div class="row">
                                <div class="col">
                                    <label for="kursi" class="form-label">ID Kursi</label>
                                    <select name="kursi" id="kursi" class="form-control">
                                        <?php
                                        $query = "SELECT * FROM kursi";
                                        $dt_query = $koneksi->query($query);
                                        while ($dt_kursi = $dt_query->fetch_array()) {
                                            $selected = ($dt_kursi['id_kursi'] == $selected_kursi) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $dt_kursi['id_kursi']; ?>" <?php echo $selected; ?>>
                                                <?php echo $dt_kursi['id_kursi']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger btn-SignUp" value="edit">
                            Simpan
                        </button>
                    </div>
            </form>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script src="../js/script.js"></script>
        </body>

        </html>


<?php
    } else {
        echo "Data not found";
    }
} else {
    echo "ID not provided";
}
?>