<?php
include "../public/common/config.php";
$username=$_POST['username'];
$password=md5($_POST['password']);
$sql="update  user set password='$password' where username='$username'";

mysql_query("set names utf8");
if($rst=mysql_query($sql)){
	echo "<script>alert('用户密码修改成功,请登录');</script>";
	echo "<script>location='login.php'</script>";
}else{
	echo "<script>alert('修改密码失败请重新修改');</script>";
	echo "<script>location='forgetdit.php'</script>";
}


?>