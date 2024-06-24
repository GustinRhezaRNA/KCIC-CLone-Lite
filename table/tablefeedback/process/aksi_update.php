<?php
include "../../../koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$id_feedback = $_GET['id'];
$id_user = $_POST['user'];
$message = $_POST['message'];
$rating = $_POST['rating'];



$query = "UPDATE feedback set  id_user = '$id_user' ,message = '$message', rating = '$rating' WHERE id_feedback = $id_feedback";
$a = $koneksi->query($query);

if ($a === true) {
    header('location:../tablefeedback.php');
} else {
    echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
}
