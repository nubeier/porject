<?php
session_start();
include "../../public/common/config.php";
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
									<td>订单号</td>
									<td>下单时间</td>
									<td>订单状态</td>
									<td>确认收货</td>
								</tr>
							<?php
								$user_id=$_SESSION['home_userid'];
								$sql="select indent.*,status.name from indent,status where indent.status_id=status.id and user_id={$user_id} group by indent.code";
								mysql_query("set names utf8");
								$rst=mysql_query($sql);
								while($row=mysql_fetch_assoc($rst)){
								
								echo "<tr>";
								echo	"<td><a href='usercode.php?code={$row['code']}' class='cartNum'>{$row['code']}</a></td>";

								echo	"<td>".date('Y-m-d h-i-s',$row['time'])."</td>";
								echo	"<td>{$row['name']}</td>";
								//0在PHP中是false不存在的如果是1他就会改变为评论
								
								if($row['confim']){
								echo	"<td><a href='usercode.php?code={$row['code']}' class='cartNum'>评论</a></td>";
								}else{
								echo	"<td><a href='confim.php?code={$row['code']}' class='cartNum'>否</a></td>";	
								}

								
								echo "</tr>";
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
