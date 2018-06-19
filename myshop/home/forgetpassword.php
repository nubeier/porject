<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>重置密码</title>
	<link rel="stylesheet" href="public/css/index.css">
</head>
<body>
	<div class="main">
		<div class="header">
			<?php
				include "header.php";
			?>
		</div>
		<div class="nav">
		</div>
		<div class="loginContent">
			<div class="login">
				<div class="loginForm">
					<form action="forgetpassword.php" method="POST" name='usgin' onsubmit='return myfunction(this)'>
					<p>您之前的用户名:</p>
					<p><input type="text" name="username" placeholder="手机号/用户名"></p>
					<p>邮箱:</p>
					<p><input type="text" name="email" placeholder="邮箱"></p>
					<p><input type="submit" value="提交" name='submit'></p>
					</form>
				</div>	
			</div>
		</div>			
		<div class="nav"></div>
		<div class="footer">
			<?php
				include "footer.php";
			?>
		
		</div>

	</div>
	<?php
	if(isset($_POST['submit'])){
	include "../public/common/config.php";
	$username=$_POST['username'];
	$email=$_POST['email'];
$sql="select * from user where email='$email' and username='$username'";

$rst=mysql_query($sql);
$num=mysql_num_rows($rst);
if($num>0){
	$_SESSION['username']=$username;
	echo "<script>location='forgetdit.php'</script>";
}else{
	echo "<script>alert('您输入的用户或邮箱错误请重新输入');</script>";
}
}

?>
<script>
	function myfunction(usgin){
		if(usgin.username.value==''){
			alert("用户框不能为空");
			usgin.username.focus();
			return false;
		}
		if(usgin.email.value==''){
			alert("请输入邮箱");
			usgin.email.focus();
			return false;
		}

	}
</script>
</body>
</html>
