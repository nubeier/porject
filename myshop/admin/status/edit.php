<?php
include "../lock.php";
include "../../public/common/config.php";
$id=$_GET['id'];
$sql="select * from status where id=$id ";
mysql_query("set names utf8");
$rst=mysql_query($sql);

$row=mysql_fetch_assoc($rst);
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
		<form action="update.php" method="POST">
			<p>状态名称:</p>
			<p><input type="text" name="name" value="<?php echo $row['name']; ?>"></p>
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<p><input type="submit" name="submit" value="修改"></p>
		</form>
	</div>
</body>
</html>