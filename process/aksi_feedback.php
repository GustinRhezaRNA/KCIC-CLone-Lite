<?php
include "../koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
?>
    <script language="javascript">
        alert("Anda belum login, login terlebih dahulu?");
        document.location = "../form/login.php";
    </script>
<?php
}

$user = $_SESSION['username'];
$message = $_POST['message'];
$rating = $_POST['rating'];

//Cari id user
$sql1 = "SELECT * from user where username='$user'";
$query = $koneksi->query($sql1);
$dt_user = $query->fetch_array();
$id_user = $dt_user['id_user'];

$sql = "INSERT INTO feedback (id_user,message,rating) VALUES ('" . $id_user . "','" . $message . "','" . $rating . "')";
$a = $koneksi->query($sql);


if ($a === true) {

    echo "<script>alert('Payment Berhasil')";
    header("Location: ../home.php");
} else {
    echo "<script>alert('Feedback gagal dikirim');history.go(-1);</script>";
}

?>