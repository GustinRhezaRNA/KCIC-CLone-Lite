<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_user = $_GET['id'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$nama_file = $_FILES['uproposal']['name'];
$ukuran_file = $_FILES['uproposal']['size'];
$tipe_file = $_FILES['uproposal']['type'];
$tmp_file = $_FILES['uproposal']['tmp_name'];
$path = "../../../dokumen/" . $nama_file;


if ($tipe_file == "application/pdf") {
    if ($ukuran_file <= 1000000) {
        if (move_uploaded_file($tmp_file, $path)) {
            echo $query = "UPDATE user SET username='$username', nama='$nama', email='$email', password='$password', file='$nama_file', type='$tipe_file', size='$ukuran_file' WHERE id_user=$id_user";

            $a = $koneksi->query($query);
            if ($a === true) {
                header('location:../tableuser.php');
            } else {
                echo "<script>alert('File Gagal Masuk Database');history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('File Gagal Terupload');history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Ukuran File lebih dari 1MB');history.go(-1);</script>";
    }
} else {
    echo "<script>alert('File Bukan Berekstensi PDF');history.go(-1);</script>";
}
