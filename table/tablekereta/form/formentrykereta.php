<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<h2>Tambah Kereta Baru</h2>
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
            <div class="mb-3 mt-3">
                <div class="row">
                    <div class="col">
                        <label for="nama_kereta<?php echo $i; ?>" class="form-label">Nama Kereta</label>
                        <input type="nama_kereta" class="form-control" id="nama_kereta<?php echo $i; ?>" name="nama_kereta[]" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="kapasitas<?php echo $i; ?>" class="form-label">Kapasitas</label>
                        <input type="kapasitas" class="form-control" id="kapasitas<?php echo $i; ?>" name="kapasitas[]" required />
                    </div>
                </div>
            </div>
           


        </div>
    <?php
    }
    ?>

    <button type="submit" name="insert" class="btn btn-danger" value="insert">Insert</button>
</form>