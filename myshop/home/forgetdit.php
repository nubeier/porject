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
					<form action="checkforget.php" method="POST">
					<p>用户名:</p>
					<p><input type="text" name="username" value="<?php echo $_SESSION['username']?>"></p>
					<p>重置新密码:</p>
					<p><input type="password" name="password" placeholder="请填写要修改的密码"></p>
					<p><input type="submit" value="修改" name='submit'></p>
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
</html>

