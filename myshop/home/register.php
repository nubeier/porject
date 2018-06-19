<?php
session_start();
include "../public/common/config.php";
 $username=$_POST['username'];
 $password=md5($_POST['password']);
 $vcode=$_SESSION['vcode'];
 $fcode=$_POST['fcode'];
 $email=$_POST['email'];
if($fcode==$vcode){
		if(preg_match('/^[0-9a-zA-Z]+@[0-9a-zA-Z]+\.[0-9a-zA-Z]+/', $email)==0){
			
			echo "<script>alert('您输入的邮箱格式不对请重新输入')</script>";
			echo "<script>location='reg.php'</script>";
			exit;
		}
	
	$Checksql="select  * from user where username='$username'";
	mysql_query("set names utf8");
	$rst=mysql_query($Checksql);
	if(mysql_num_rows($rst)==1){
		echo "<script>alert('该用户已经被注册请重新更改名字')</script>";
		echo "<script>location='reg.php</script>";
	}else{
		$Regsql="insert into user (username,password,email) values('$username','$password','$email')";
		mysql_query("set names utf8");
		
		if($rst=mysql_query($Regsql)){
			echo "<script>alert('注册成功')</script>";
			
			echo "<script>location='index.php</script>";
		}
	}
}else{
	echo "<script>alert('您的验证码输入错误请重新输入')</script>";
	echo "<script>location='reg.php'</script>";
}

?>