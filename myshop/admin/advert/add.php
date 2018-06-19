<?php
include "../lock.php";
include "../../public/common/config.php";
$sql="select * from advert";
mysql_query("set names utf8");
$rst=mysql_query($sql);
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
		<form action="insert.php" method="POST" enctype="multipart/form-data">
		
			<p>位置:</p>
			<select name='pos'>
				<option value='0'>0</option>
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
			
			</select> 
			<p>图片:</p>
			<p><input type="file" name='img'></p>
			<p>URL:</p>
			<p><input type="text" name="url"></p>		
			<p><input type="submit" name="submit" value="添加"></p>

		</form>
	</div>
</body>
</html>