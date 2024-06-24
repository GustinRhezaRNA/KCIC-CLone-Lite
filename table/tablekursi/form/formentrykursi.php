<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<h2>Tambah Data Produk</h2>
<link rel="stylesheet" href="../../form.css">
<form method="POST" action="../process/aksi_insert.php">
    <?php
    $jum = $_POST['jum'];
    ?>

    <input type="hidden" name="jum" value="<?php echo $jum; ?>">

    <?php
    for ($i = 1; $i <= $jum; $i++) {
    ?>
        <h4>Create Account <?php echo $i; ?></h4>

        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="kereta<?php echo $i; ?>" class="form-label"> Kereta </label>
                    <select name="kereta[]" id="kereta<?php echo $i; ?>" style="height: 100px; width: 30%;">
                        <option value="" disabled selected>From</option>
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
                    <label for="kelas<?php echo $i; ?>" class="form-label">Kelas</label>
                    <select name="kelas[]" id="kelas<?php echo $i; ?>" style="height: 100px; width: 30%;">
                        <option value="" disabled selected>From</option>
                        <?php
                        $query = "SELECT * FROM kelas";
                        $dt_query = $koneksi->query($query);
                        while ($dt_kelas = $dt_query->fetch_array()) {
                        ?>
                            <option value="<?php echo $dt_kelas['id_kelas']; ?>">
                                <?php echo $dt_kelas['tipekelas']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="no_kursi<?php echo $i; ?>" class="form-label">No Kursi</label>
                    <input type="number" min="0" max="10" name="no_kursi[]" class="form-control" id="no_kursi<?php echo $i; ?>" required />
                </div>
                <div class="col">
                    <label for="kondisi<?php echo $i; ?>" class="form-label">Ketersediaan</label>
                    <input type="number" min="0" max="1" name="kondisi[]" class="form-control" id="kondisi<?php echo $i; ?>" required />
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <button type="submit" name="insert" class="btn btn-danger" value="insert">Insert</button>
</form>