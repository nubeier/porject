<?php
session_start();
include "../public/common/config.php";
$username=$_POST['username'];
$password=md5($_POST['password']);

$sql="select * from user where  username='$username' and password='$password'";
mysql_query("set naems utf8");
$rst=mysql_query($sql);
if($row=mysql_fetch_assoc($rst)){
	
	 $_SESSION['home_username']=$username;
	 $_SESSION['home_userid']=$row['id'];
	echo "<script>location='person/useradd.php'</script>";
}else{
	echo "<script>alert('您输入的用户名或者密码请重新输入')</script>";
	echo "<script>location='login.php'</script>";
}






?>