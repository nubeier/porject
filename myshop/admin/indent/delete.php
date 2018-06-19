<?php
include "../lock.php";
include "../../public/common/config.php";
$code=$_GET['code'];
$sql="delete from indent where code='$code'";
mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "<script>location='index.php'</script>";
}


?>