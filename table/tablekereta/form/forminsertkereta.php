<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<h2>Insert Data</h2>
 
<form method="post" action="formentrykereta.php">
Jumlah Data <input type="text" name="jum" size="1"> 
<input type="submit" name="submit" value="Proses">
</form>
