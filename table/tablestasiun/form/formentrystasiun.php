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
                    <label for="nama_stasiun<?php echo $i; ?>" class="form-label">Nama Stasiun</label>
                    <input type="text" name="nama_stasiun[]" class="form-control" id="nama_stasiun<?php echo $i; ?>" required />
                </div>
                <div class="col">
                    <label for="kota<?php echo $i; ?>" class="form-label">Kota</label>
                    <input type="text" class="form-control" id="kota<?php echo $i; ?>" name="kota[]" required />
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <button type="submit" name="insert" class="btn btn-danger" value="insert">Insert</button>
</form>