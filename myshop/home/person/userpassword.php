<?php
session_start();
include "../../public/common/config.php";
 

  $username=$_SESSION['home_username'];
  $user_id=$_SESSION['home_userid'];

$sql="select * from user where id='$user_id' and username='$username'";
mysql_query("set names utf8");
$rst=mysql_query($sql);
$row=mysql_fetch_assoc($rst);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改密码</title>
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
								<li><a href="">修改密码</a></li>
								<li><a href="userlist.php">查看联系方式</a></li>
								<li><a href="useradd.php">添加联系方式</a></li>
								<li><a href="orderlist.php">查看我的订单</a></li>
							</ul>
						</div>
						<div class="floorfooter2Right">
							<div class="personUseraddimg">
								<img src="../public/image/jianzhi.jpg" alt="" width="800px" height="290px">
							</div>
							<div class="personUseradd" > 
							<form action="passupdate.php" method="POST">
								
									<p>用户名:<input type="text"  name="username" placeholder="用户名或者电话" value="<?php echo $row['username']?>"></p>
									<p>新密码:<input type="password" placeholder="密码" name='password' ></p>
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
