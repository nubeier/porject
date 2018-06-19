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
					<form action="register.php" method="POST" name="usgin" onsubmit="return checkinput(this)">
					<p>用户名:</p>
					<p><input type="text" name="username" placeholder="请填写用户名或姓名"></p>
					<p>邮箱:</p>
					<p><input type="text" name="email" placeholder="请填写邮箱"></p>
					<p>密码:</p>
					<p><input type="password" name="password" placeholder="请填写您的用户名密码"></p>
					<p><img src='vcode.php' onclick='this.src="vcode.php?rand="+Math.random()'></p>
					<p><input type="text" name="fcode" placeholder="请输入验证码"></p>
					<p><input type="submit" value="注册"></p>
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

	
</body>
<script>
			function checkinput(usgin){
				if(!usgin.username.value){
					alert("用户名不能为空");
					usgin.username.focus();
					return false;
				}
				if(!usgin.email.value){
					alert("邮箱不能为空");
					usgin.email.focus();
					return false;
				}
				if(!usgin.password.value){
					alert("密码不能为空");
					usgin.password.focus();
					return false;
				}
				
				if(!usgin.fcode.value){
					alert("验证码不能为空");
					usgin.fcode.focus();
					return false;
				}
			}
	</script>
</html>
