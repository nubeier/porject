<?php
session_start();
include "../../public/common/config.php";
$id=$_GET['id'];
$sql="select * from touch where id={$id}";
mysql_query("set names utf8");
$rst=mysql_query($sql);
$row=mysql_fetch_assoc($rst);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加联系方式</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<div class="header">
			<?php
				include "../header.php";
			?>
		</div>
		<div class="nav">
		</div>
		<div class="content">
			<div class="floor">
					<div class="floorheader">
						<div class="left" >
							<span>个人中心</span>
						</div>

					</div>
					<div class="floorfooter2">
						<div class="floorfooter2Left">
							<ul>
								<li><a href="userpassword.php">修改密码</a></li>
								<li><a href="userlist.php">查看联系方式</a></li>
								<li><a href="useradd.php">添加联系方式</a></li>
								<li><a href="orderlist.php">查看我的订单</a></li>
							</ul>
						</div>
						<div class="floorfooter2Right">
							<div class="personUseraddimg">
								<img src="../public/image/useradd.jpg" alt="" width="800px" height="290px">
							</div>
							<div class="personUseradd" > 
							<form action="userupdate.php" method="POST">
								<p>姓名:<input type="text"  name="username" value='<?php echo $row['name']?>'></p>
								<p>地址:<input type="text" name='addr' value="<?php echo $row['addr'] ?>"></p>
								<p>电话:<input type="text"  name='tel' value="<?php echo $row['tel'] ?>"></p>
								<p>邮箱:<input type="text" name='email' value="<?php echo $row['email'] ?>"></p>
								<input type="hidden" name='id' value="<?php echo $row[
								'id'] ?>">
								<input type="submit" value="修改">

							</from>	
							</div>
						</div>

					</div>
			</div>
		</div>			
		<div class="nav"></div>
		<div class="footer">
			<?php
				include "../footer.php";
			?>
		
		</div>

	</div>
</body>
</html>
