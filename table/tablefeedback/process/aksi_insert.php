<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {

        $id_user = $_POST['user'][$i];
        $message = $_POST['message'][$i];
        $rating = $_POST['rating'][$i];
        


        $query = "INSERT INTO feedback (id_user, message, rating) VALUES ('$id_user','$message', '$rating')";
        $a = $koneksi->query($query);

        if ($a === true) {
            header('location:../tablefeedback.php');
        } else {
            echo "<script>alert('Data Gagal Masuk Database');history.go(-1);</script>";
        }
    }
}
