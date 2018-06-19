<?php
session_start();
include "../public/common/config.php";
$username=$_SESSION['admin_username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加用户</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<form action="adminupdate.php" method="POST">
			<p>用户名:</p>
			<p><input type="text" name="username" value="<?php echo $username ?>" disabled=""></p>
			<p>密码:</p>
			<p><input type="password" name="password"></p>
			<p><input type="submit" name="submit" value="修改"></p>
		</form>
	</div>
</body>
</html>