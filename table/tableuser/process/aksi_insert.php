<?php
include "../../../koneksi.php";

echo $_POST['jum'];
echo $_POST['insert'];

if (isset($_POST['insert'])) {
    $jum = $_POST['jum'];

    for ($i = 0; $i < $jum; $i++) {
        $username = $_POST['username'][$i];
        $nama = $_POST['nama'][$i];
        $email = $_POST['email'][$i];
        $password = $_POST['password'][$i];
        $nama_file = $_FILES['uproposal']['name'][$i];
        $ukuran_file = $_FILES['uproposal']['size'][$i];
        $tipe_file = $_FILES['uproposal']['type'][$i];
        $tmp_file = $_FILES['uproposal']['tmp_name'][$i];
        $path = "../../../dokumen/" . $nama_file;

        if ($tipe_file == "application/pdf") {
            if ($ukuran_file <= 1000000) {
                if (move_uploaded_file($tmp_file, $path)) {
                    $query = "INSERT INTO user (username, nama, email, password, file, type, size) VALUES ('$username', '$nama', '$email', '$password', '$nama_file', '$tipe_file', '$ukuran_file')";
                    $a = $koneksi->query($query);

                    if ($a === false) {
                        echo "<script>alert('File Gagal Masuk Database');history.go(-1);</script>";
                        exit;
                    }
                } else {
                    echo "<script>alert('File Gagal Terupload');history.go(-1);</script>";
                    exit;
                }
            } else {
                echo "<script>alert('Ukuran File lebih dari 1MB');history.go(-1);</script>";
                exit;
            }
        } else {
            echo "<script>alert('File Bukan Berekstensi PDF');history.go(-1);</script>";
            exit;
        }
    }
    echo "<script>alert('Data telah tersimpan');document.location='../tableuser.php'</script>";
}
