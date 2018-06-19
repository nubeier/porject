<?php
session_start();
include "../../public/common/config.php";

$user_id=$_SESSION['home_userid'];

$sql="select * from touch where user_id={$user_id}";
mysql_query("set names utf8");
$rst=mysql_query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>查看联系方式</title>
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
							<table width="1140px"  style="border:1px dashed #888">
								<tr>
									<td>姓名</td>
									<td>地址</td>
									<td>电话</td>
									<td>邮箱</td>
									<td>修改</td>
									<td>删除</td>
								</tr>
							<?php
								while($row=mysql_fetch_assoc($rst)){
							?>
								<tr>
									<td><?php echo $row['name'] ?></td>
									<td><?php echo $row['addr'] ?></td>
									<td><?php echo $row['tel'] ?></td>
									<td><?php echo $row['email'] ?></td>
									<td><a href="useredit.php?id=<?php echo  $row['id']?>">修改</a></td>
									<td><a href="userdel.php?id=<?php echo $row['id'] ?>">删除</a></td>
								</tr>
							<?php
						}
							?>	
							</table>
						</div>
						<div class="clear"></div>
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
