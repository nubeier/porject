<?php
include "../lock.php";

include "../../public/common/config.php";

$username=$_POST['username'];
$password=md5($_POST['password']);
$adminname=$_POST['adminname'];
$adminroot=$_POST['adminroot'];
$id=$_POST['id'];
$sql="update user set username='$username',password='$password',adminname='$adminname',isadmin='$adminroot' where id='$id'";

mysql_query("set names utf8");

if(mysql_query($sql)){
	echo "<script>location='admin.php'</script>";
}
?>