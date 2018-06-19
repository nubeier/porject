<?php
session_start();
include "../public/common/config.php";
$username=$_POST['username'];
$password=md5($_POST['password']);
$date=time();
$sql="select * from user where username='$username' and password='$password' and  not isadmin='0'";
mysql_query("set names utf8");
$rst=mysql_query($sql);

if($row=mysql_fetch_assoc($rst)){
	//存储一次SESSION对管理员的真实姓名进行记录
	$_SESSION['adminname']=$row['adminname'];
	$_SESSION['admin_username']=$username;
	$_SESSION['admin_userid']=$row['id'];
	//登录成功就进行一次对管理员时间记录
	$sqlUser="update user set admintime=$date where username='{$_SESSION['admin_username']}' ";
	mysql_query("set names utf8");

	mysql_query($sqlUser);

	echo "<script>location='index.php'</script>";
}else{
	echo "<script>alert('您输入的账号或密码有误！')</script>";
	echo "<script>location='login.php'</script>";
}


?>