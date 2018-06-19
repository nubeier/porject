<?php
include "../lock.php";

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
		<form action="insert.php" method="POST">
			<p>用户名:</p>
			<p><input type="text" name="username"></p>
			<p>密码:</p>
			<p><input type="password" name="password"></p>
			<p>管理员姓名:</p>
			<p><input type="text" name="adminname"></p>
			<p>管理权限:</p>
			<select name="adminroot">
				<option value="2">二级管理员</option>
				<option value="3">三级管理员</option>
			
			</select>
			<p><input type="submit" name="submit" value="注册"></p>
		</form>
	</div>
</body>
</html>