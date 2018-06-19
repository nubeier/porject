<?php
session_start();
include "../../public/common/config.php";

$username=$_POST['username'];
$password=md5($_POST['password']);
$user_id=$_SESSION['home_userid'];
$sql="update user set username='$username' ,password='$password' where id='$user_id'";
mysql_query("set names utf8");
if(mysql_query($sql)){
	unset($_SESSION['home_userid']);
	unset($_SESSION['home_username']);
	echo "3秒后即将退出登录，请重新登录";

	echo "<script>setInterval(function(){
	location='../index.php';
	},3000);</script>";
}

?>