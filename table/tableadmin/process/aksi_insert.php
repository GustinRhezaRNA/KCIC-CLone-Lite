<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {

        $id_user = $_GET['id'][$i];
        $username = $_POST['username'][$i];
        $password = $_POST['password'][$i];
        $role = $_POST['roles'][$i];

        $query = "INSERT INTO admin (username, password, role) VALUES ('$username','$password', '$role')";
        $a = $koneksi->query($query);

        if ($a === true) {
            header('location:../tableadmin.php');
        } else {
            echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
        }
    }
}
