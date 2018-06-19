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
			<p>状态名称:</p>
			<p><input type="text" name="name"></p>
			<p><input type="submit" name="submit" value="添加"></p>
		</form>
	</div>
</body>
</html>