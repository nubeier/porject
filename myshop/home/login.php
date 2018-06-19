<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加联系方式</title>
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
					<!-- 提交表单判断表单内容如密码是否为空 -->
					<form action="checklogin.php" method="POST" name="usgin" onsubmit="return checkinput(this)">
					<p>用户名:</p>
					<p><input type="text" name="username" placeholder="用户名/手机号"></p>
					<p>密码:</p>
					<p><input type="password" name="password" placeholder="请填写您的用户名密码"></p>
					<p><a href="forgetpassword.php">忘记密码</a></p>
					<p><input type="submit" value="登录"></p>
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

	<script>
	function checkinput(usgin){
		if(!usgin.password.value){
			alert("密码不能为空");
			usgin.password.focus();
			return (false);
		}
		if(!usgin.username.value){
			alert("用户名不能为空");
			usgin.username.focus();
			return (false);
		}
	}
	</script>
</body>
</html>
