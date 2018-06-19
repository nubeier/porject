<?php
session_start();
unset($_SESSION['home_userid']);
unset($_SESSION['home_username']);
echo "<script>location='index.php'</script>";
?>