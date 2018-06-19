<?php
session_start();

include "../../public/common/config.php";

 $id=$_GET['id'];
unset($_SESSION['shops'][$id]);
echo "<script>location='index.php'</script>";
?>