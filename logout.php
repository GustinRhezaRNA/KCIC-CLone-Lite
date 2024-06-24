<?php
session_start();
session_destroy();
?>

<script language="javascript">
    alert("Anda yakin ingin keluar?");
    document.location = "form/login.php";
</script>