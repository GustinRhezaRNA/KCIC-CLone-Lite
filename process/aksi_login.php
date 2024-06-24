<?php
session_start();
include "../koneksi.php";
$user = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];
echo $user;

if ($op == "in") {
    $sql = "SELECT * from user where username='$user' AND password='$password'";
    $query = $koneksi->query($sql);
    if (mysqli_num_rows($query) == 1) {
        $data = $query->fetch_array();
        $_SESSION['username'] = $data['username'];
        header("location:../home.php");
    } else {
        echo "<script>alert('Username atau password salah');history.go(-1);</script>";
    }
} elseif ($op == "out") {
    unset($_SESSION['username']);
    header("location:login.php");
}
