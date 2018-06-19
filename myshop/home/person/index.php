<?php
session_start();
if(empty($_SESSION['home_userid'])){
	echo "<a href='../login.php'>你还没有登录请登录</a>";
	exit;
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人中心</title>
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
							<h3>欢迎您回家！！</h3>
							<div>
								<img src="../public/image/jianzhi.jpg" alt="" width="1140px" height="285px">
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
<?php
}
?>
