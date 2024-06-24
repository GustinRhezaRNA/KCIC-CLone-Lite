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
                        <label for="asal<?php echo $i; ?>" class="form-label">ID Stasiun Asal</label>
                        <select name="asal[]" id="asal<?php echo $i; ?>" style="height: 100px; width: 30%;">
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
                    </div>
                    <div class="col">
                        <label for="tujuan<?php echo $i; ?>" class="form-label">ID Stasiun Tujuan</label>
                        <select name="tujuan[]" id="tujuan<?php echo $i; ?>" style="height: 100px; width: 30%;">
                            <option value="" disabled selected>To</option>
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
                    </div>

                    <div class="mb-3 mt-3">
                        <div class="row">
                            <div class="col">
                                <label for="kereta<?php echo $i; ?>" class="form-label">ID Kereta</label>
                                <select name="kereta[]" id="kereta<?php echo $i; ?>" style="height: 100px; width: 30%;">
                                    <?php
                                    $query = "SELECT * FROM kereta";
                                    $dt_query = $koneksi->query($query);
                                    while ($dt_kereta = $dt_query->fetch_array()) {
                                    ?>
                                        <option value="<?php echo $dt_kereta['id_kereta']; ?>">
                                            <?php echo $dt_kereta['nama_kereta']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="jam_berangkat<?php echo $i; ?>" class="form-label">Jam Berangkat</label>
                                <input type="time" class="form-control" id="jam_berangkat<?php echo $i; ?>" name="jam_berangkat[]" required />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <div class="row">
                            <div class="col">
                                <label for="jam_sampai<?php echo $i; ?>" class="form-label">Jam Sampai</label>
                                <input type="time" class="form-control" id="jam_sampai<?php echo $i; ?>" name="jam_sampai[]" required />
                            </div>
                            <div class="col">
                                <label for="tanggal<?php echo $i; ?>" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal<?php echo $i; ?>" name="tanggal[]" required />
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