<?php
session_start();
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
								<img src="../public/image/jianzhi.jpg" alt="" width="800px" height="290px">
							</div>
							<div class="personUseradd" > 
							<form action="userinsert.php" method="POST" name="usgin" onsubmit="return myfunction(this)">
								<p>姓名:<input type="text"  name="username" placeholder="姓名" ></p>
								<p>地址:<input type="text" placeholder="地址" name='addr'></p>
								<p>电话:<input type="text" placeholder="电话" name='tel'></p>
								<p>邮箱:<input type="text" placeholder="邮箱" name='email'></p>
								<input type="submit" value="提交">

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
	<script>
		function myfunction(usgin){
			if(!usgin.username.value){
				alert("请输入姓名");
				usgin.username.focus();
				return false;
			}
			if(!usgin.addr.value){
				alert("请输入地址");
				usgin.addr.focus();
				return false;
			}
			if(!usgin.tel.value){
				alert("请输入电话号码");
				usgin.tel.focus();
				return false;
			}
			if(!usgin.email.value){
				alert("请输入地址");
				usgin.email.focus();
				return false;
			}
		}

	</script>
</body>
</html>
