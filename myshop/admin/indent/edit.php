<?php
include "../lock.php";
include "../../public/common/config.php";
$code=$_GET['code'];
$status_id=$_GET['status_id'];
$adminname=$_SESSION['adminname'];
$sql="select * from status";
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
		<form action="update.php" method="POST">
			
			<p>订单号:</p>
			<p><input type="text" name='code' value='<?php echo $code?>'></p>
			<p>订单状态</p>
			<p>
				<select name='status_id'>
					<?php
						while($row=mysql_fetch_assoc($rst)){
							if($status_id==$row['id']){
								echo "<option value='{$row['id']}' selected>{$row['name']}</option>";
							}else{
								echo "<option value='{$row['id']}' >{$row['name']}</option>";
							}
						}
					?>					
					
				</select>

			</p>
			
			<input type="hidden" name='adminname' value='<?php echo $adminname ?>'>
			
			<p><input type="submit" name="submit" value="修改"></p>
		</form>
	</div>
</body>
</html>