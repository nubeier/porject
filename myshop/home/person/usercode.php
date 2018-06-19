<?php
session_start();
include "../../public/common/config.php";
if(!$_SESSION['home_userid']){
	echo "<a href='../login.php'>你还没有登录请登录</a>";
	exit;
}
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
						<div class="floorfooter3Left">
							<ul>
								<li><a href="userpassword.php">修改密码</a></li>
								<li><a href="userlist.php">查看联系方式</a></li>
								<li><a href="useradd.php">添加联系方式</a></li>
								<li><a href="orderlist.php">查看我的订单</a></li>
							</ul>
						</div>
						<div class="floorfooter3Right">
							<table width="100%" style="border:1px dashed #888">
								<tr>
									<td>商品</td>
									<td>图片</td>
									<td>价格</td>
									<td>数量</td>
									<td>合计</td>
									<td>评论</td>
								</tr>
							<?php
							$code=$_GET['code'];
							$sql="select indent.*,shop.* from indent,shop where indent.shop_id=shop.id and code={$code} ";
							mysql_query("set names utf8");
							$rst=mysql_query($sql);
							$total=0;
							while($row=mysql_fetch_assoc($rst)){
								$total=$row['price']*$row['num'];
								
							echo	"<tr>";
							echo		"<td>{$row['name']}</td>";
							echo		"<td><img src='../../public/uploads/thumb_".$row['img']."'></td>";
							echo		"<td>{$row['price']}</td>";
							echo		"<td>{$row['num']}</td>";
							echo		"<td>".$total."</td>";
							if($row['confim']){
							echo		"<td><a href='common.php?shop_id={$row['id']}' class='cartNum'>评论</a></td>";
							}else{
							echo		"<td><a href='javascript:' onclick=\"alert('您没有确认收货还不能评论')\" style='background:#888;border-radius:5px; padding:5px;'>评论</a></td>";
							}
							
							echo	"</tr>";
							}
							?>
							</table>
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
