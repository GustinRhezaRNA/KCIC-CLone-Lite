<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "kereta_api";
    $koneksi = mysqli_connect($host, $username, $password, $database);
    if ($koneksi) {
        echo "connected";
    } else {
        echo "Server not connected";
    }
    ?>

    <br>
    <br>
</body>

</html>