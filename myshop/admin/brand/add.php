<?php
include "../lock.php";
include "../../public/common/config.php";
$sql="select * from class";
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
		<form action="insert.php" method="POST">
			<p>品牌名称:</p>
			<p><input type="text" name="name"></p>
			<p>选择分类:</p>
			<p>
				<select name="class_id">
					<?php
						while($row=mysql_fetch_assoc($rst)){
						echo "<option value='{$row['id']}'>".$row['name']."</option>";
				}

				?>
				</select>
			</p>
			<p><input type="submit" name="submit" value="添加"></p>
		</form>
	</div>
</body>
</html>