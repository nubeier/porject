<?php
session_start();
include "../../public/common/config.php";
$id=$_SESSION['home_userid'];

$username=$_POST['username'];
$addr=$_POST['addr'];
$tel=$_POST['tel'];
$email=$_POST['email'];


if(!preg_match('/^1[0-9]{9}/',$tel)){
	echo "<script>alert('您的电话号码不对请重新输入');
		location='useradd.php';
	</script>";
	exit;
}
if(!preg_match('/^[0-9a-zA-Z]+@[0-9a-zA-Z]+\.[0-9a-zA-Z]+/', $email)){
			
			echo "<script>alert('您输入的邮箱格式不对请重新输入')</script>";
			echo "<script>location='useradd.php'</script>";
			exit;
		}
$sql="insert touch (name,addr,tel,email,user_id) values('$username','$addr','$tel','$email',{$id}) ";
mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "<script>location='userlist.php'</script>";
}
?>