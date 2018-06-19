<?php

include "../../public/common/config.php";

$id=$_GET['id'];
$sql="delete from touch where id={$id}";
mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "<script>location='userlist.php'</script>";
}

?>