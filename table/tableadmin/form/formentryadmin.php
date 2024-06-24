<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<h2>Tambah Akun Admin Baru</h2>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="../../form.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data" action="../process/aksi_insert.php">
        <?php
        $jum = $_POST['jum'];
        ?>

        <input type="hidden" name="jum" value="<?php echo $jum; ?>">

        <?php
        for ($i = 1; $i <= $jum; $i++) {
        ?>
            <h4>Create Admin Account <?php echo $i; ?></h4>

            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="username<?php echo $i; ?>" class="form-label">Username</label>
                        <input type="text" name="username[]" class="form-control" id="username<?php echo $i; ?>" required />
                    </div>
                </div>
                <div class="col">
                    <label for="role" class="form-label">Role</label>
                    <select name="roles[]" id="role">
                        <option value="admin">Admin</option>
                        <option value="viewer">Viewer</option>
                    </select>

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



            </div>
        <?php
        }
        ?>

        <button type="submit" name="insert" class="btn btn-danger" value="insert">Insert</button>
    </form>
</body>

</html>