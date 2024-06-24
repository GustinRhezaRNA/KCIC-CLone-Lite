<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<h2>Tambah Data Produk</h2>
<link rel="stylesheet" href="../../form.css">
<form method="POST"  action="../process/aksi_insert.php">
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
                        <label for="tiket<?php echo $i; ?>" class="form-label">ID Tiket</label>
                        <select name="tiket[]" id="tiket<?php echo $i; ?>" style="height: 100px; width: 30%;">
                            <option value="" disabled selected>From</option>
                            <?php
                            $query = "SELECT * FROM tiket";
                            $dt_query = $koneksi->query($query);
                            while ($dt_tiket = $dt_query->fetch_array()) {
                            ?>
                                <option value="<?php echo $dt_tiket['id_tiket']; ?>">
                                    <?php echo $dt_tiket['id_tiket']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="va<?php echo $i; ?>" class="form-label">ID Jadwal</label>
                        <select name="va[]" id="va<?php echo $i; ?>" style="height: 100px; width: 30%;">
                            <option value="bri" >BRI</option>
                            <option value="bca" >BCA</option>
                            <option value="bni" >BNI</option>
                            <option value="mandiri" >Mandiri</option>
                            <option value="btn" >BTN</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>


    <?php
    }
    ?>

    <button type="submit" name="insert" class="btn btn-danger" value="insert">Insert</button>
</form>