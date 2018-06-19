<?php
include "../lock.php";
include "../../public/common/config.php";
$name=$_POST['name'];
$id=$_POST['id'];
$sql="update class set name='$name' where id='$id'";
mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "<script>location='index.php'</script>";
}
?>