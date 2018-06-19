<?php
include "../../public/common/config.php";
$id=$_POST['id'];
$username=$_POST['username'];
$addr=$_POST['addr'];
$tel=$_POST['tel'];
$email=$_POST['email'];

$sql="update touch set name='$username',addr='$addr', tel='$tel', email='$email' where id='$id'";
mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "<script>location='userlist.php'</script>";
}
?>