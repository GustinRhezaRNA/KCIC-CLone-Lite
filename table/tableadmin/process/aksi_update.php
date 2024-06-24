<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_user = $_GET['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['roles'];



$query = "UPDATE admin SET username='$username', password='$password',role='$role' WHERE id_admin=$id_user";
$a = $koneksi->query($query);

if ($a === true) {
    header('location:../tableadmin.php');
} else {
    echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
}
?>
