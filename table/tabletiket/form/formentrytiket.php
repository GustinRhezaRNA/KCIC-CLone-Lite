<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<h2>Tambah Data Produk</h2>
<link rel="stylesheet" href="../../form.css">
<form method="POST" enctype="multipart/form-data" action="../process/aksi_insert.php">
    <?php
    $jum = $_POST['jum'];
    ?>

    <input type="hidden" name="jum" value="<?php echo $jum; ?>">

    <?php
    for ($i = 1; $i <= $jum; $i++) {
    ?>
        <h4>Create Account <?php echo $i; ?></h4>

        <div class="mb-3">
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="user<?php echo $i; ?>" class="form-label">ID User</label>
                        <select name="user[]" id="user<?php echo $i; ?>" style="height: 100px; width: 30%;">
                            <option value="" disabled selected>From</option>
                            <?php
                            $query = "SELECT * FROM user";
                            $dt_query = $koneksi->query($query);
                            while ($dt_user = $dt_query->fetch_array()) {
                            ?>
                                <option value="<?php echo $dt_user['id_user']; ?>">
                                    <?php echo $dt_user['nama']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="jadwal<?php echo $i; ?>" class="form-label">ID Jadwal</label>
                        <select name="jadwal[]" id="jadwal<?php echo $i; ?>" style="height: 100px; width: 30%;">
                            <option value="" disabled selected>To</option>
                            <?php
                            $query = "SELECT * FROM jadwal";
                            $dt_query = $koneksi->query($query);
                            while ($dt_jadwal = $dt_query->fetch_array()) {
                            ?>
                                <option value="<?php echo $dt_jadwal['id_jadwal']; ?>">
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
                                <label for="kursi<?php echo $i; ?>" class="form-label">ID Kursi</label>
                                <select name="kursi[]" id="kursi<?php echo $i; ?>" style="height: 100px; width: 30%;">
                                    <?php
                                    $query = "SELECT * FROM kursi";
                                    $dt_query = $koneksi->query($query);
                                    while ($dt_kursi = $dt_query->fetch_array()) {
                                    ?>
                                        <option value="<?php echo $dt_kursi['id_kursi']; ?>">
                                            <?php echo $dt_kursi['no_kursi']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    <?php
    }
    ?>

    <button type="submit" name="insert" class="btn btn-danger" value="insert">Insert</button>
</form>