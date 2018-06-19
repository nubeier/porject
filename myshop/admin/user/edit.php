<?php
include "../lock.php";
include "../../public/common/config.php";


$id=$_GET['id'];

$sql="select * from user where id={$id} ";
mysql_query("set names utf8");
$rst=mysql_query($sql);
$row=mysql_fetch_assoc($rst);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改管理员</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<form action="update.php" method="POST">
			<p>用户名:</p>
			<p><input type="text" name="username" value="<?php echo $row['username']?>"></p>
			<p>密码:</p>
			<p><input type="password" name="password"></p>
			<p>管理员姓名:</p>
			<p><input type="text" name="adminname" value="<?php  echo $row['adminname']?>"></p>
			<p>管理权限:</p>
			<?php
			echo "<select name='adminroot'>";
			if($row['isadmin']==2){
				echo 	"<option value='2' selected=>二级管理员</option>";
				echo	"<option value='3'>三级管理员</option>";
				
			}else{
				echo 	"<option value='2' >二级管理员</option>";
				echo	"<option value='3' selected=''>三级管理员</option>";
				
			}
			
			echo "</select>";

			?>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<p><input type="submit" name="submit" value="修改"></p>
		</form>
	</div>
</body>
</html>