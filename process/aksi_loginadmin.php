<?php
session_start();
include "../koneksi.php";
$user = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if ($op == "in") {
    $sql = "SELECT * from admin where username='$user' AND password='$password'";
    $query = $koneksi->query($sql);
    if (mysqli_num_rows($query) == 1) {
        $data = $query->fetch_array();
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        if ($data['role'] == "admin") {
            header("location:../home_admin.php");
        } else if ($data['role'] == "viewer") {
            header("location:../home_admin.php");
        }
    } else {
        echo "<script>alert('Username atau password salah');history.go(-1);</script>";
    }
} elseif ($op == "out") {
    unset($_SESSION['username']);
    unset($_SESSION['role']);
    header("location:login.php");
}
