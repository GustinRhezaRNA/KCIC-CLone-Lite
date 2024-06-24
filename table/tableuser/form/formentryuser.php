<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<h2>Tambah Akun User Baru</h2>
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
            <div class="row">
                <div class="col">
                    <label for="username<?php echo $i; ?>" class="form-label">Username</label>
                    <input type="text" name="username[]" class="form-control" id="username<?php echo $i; ?>" required />
                </div>
            </div>

            <div class="mb-3 mt-3">
                <div class="row">
                    <div class="col">
                        <label for="password<?php echo $i; ?>" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password<?php echo $i; ?>" name="password[]" required />
                    </div>
                    <div class="col">
                        <label for="confirm-password<?php echo $i; ?>" class="form-label">Verifikasi Password</label>
                        <input type="password" class="form-control" id="confirm-password<?php echo $i; ?>" required />
                    </div>
                </div>
            </div>

            <div class="col">
                <label for="nama<?php echo $i; ?>" class="form-label">Nama</label>
                <input type="text" name="nama[]" class="form-control" id="nama<?php echo $i; ?>" required />
            </div>

            <div class="col">
                <label for="email<?php echo $i; ?>" class="form-label">Email</label>
                <input type="text" name="email[]" class="form-control" id="email<?php echo $i; ?>" required />
            </div>

            <div class="row">
                <div class="col">
                    <label for="ktp<?php echo $i; ?>" class="form-label">Foto KTP</label>
                    <input type="file" name="uproposal[]" class="form-control" id="ktp<?php echo $i; ?>" required />
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <button type="submit" name="insert" class="btn btn-danger" value="insert">Insert</button>
</form>