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


            <div class="mb-3 mt-3">
                <div class="col">
                    <label for="user<?php echo $i; ?>" class="form-label">ID User</label>
                    <select name="user[]" id="user<?php echo $i; ?>" >
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
            </div>

            <div class="row">
                <div class="col">
                    <label for="message<?php echo $i; ?>" class="form-label">Message</label>
                    <input type="text" name="message[]" class="form-control" id="message<?php echo $i; ?>" required />
                </div>
                <div class="col">
                    <label for="rating<?php echo $i; ?>" class="form-label">Rating</label>
                    <input type="number" min="0" max="5" name="rating[]" class="form-control" id="rating<?php echo $i; ?>" required />
                </div>
            </div>

        </div>
    <?php
    }
    ?>

    <button type="submit" name="insert" class="btn btn-danger" value="insert">Insert</button>
</form>