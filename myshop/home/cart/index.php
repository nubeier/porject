<?php
session_start();
include "../../public/common/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类</title>
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
							<span>我的购物车</span>
							
						</div>
					</div>

					<div class="nav"></div>
					<div class="floorfooter2">
						<?php
							if(empty($_SESSION['shops'])){
								echo "<div class='notcart'>你还没有购物请<a href='../index.php'>购物</a></div>";
							}else{
							
						?>					
						<table width="100%"  cellpadding="0" cellspacing="0">
							<tr>
								<td>商品</td>
								<td>图片</td>
								<td>价格</td>
								<td>库存</td>
								<td>数量</td>
								<td>合计</td>
								<td><span>删除</span></td>
							</tr>
						
							
							<?php
							$total=0;
								if(isset($_SESSION['shops'])){
									
								foreach($_SESSION['shops'] as $shop){
									$total+=$shop['price']*$shop['num'];
							?>
							<tr>
								<td><?php echo $shop['name']?></td>
								<td><img src="../../public/uploads/thumb_<?php echo $shop['img']?>" alt=""></td>
								<td><?php echo $shop['price'] ?></td>
								<td><?php echo $shop['stock'] ?></td>
								<td><a href="cut.php?id=<?php echo $shop['id'] ?>" class="cartNum">-</a> <?php echo $shop['num']?> <a href="add.php?id=<?php echo $shop['id'] ?>" class="cartNum">+</a></td>
								<td><?php echo $shop['price']*$shop['num']?></td>
								<td><a href="delete.php?id=<?php echo $shop['id']?>" class="cartDel">删除</a></td>
							</tr>
							<?php
							}
						}


							?>
							<tr class="carttotal">
								<td colspan="2"><a href="../index.php" class="cartNum">继续购物</a></td>
								<td colspan="2"><a href="clearcart.php" class="cartNum">清空购物车</td>
								<td colspan="2">总计</td>
								<td><?php echo $total?>元</td>
							</tr>

						</table>
					</div>	
					<?php
				}
					?>
			</div>
			<div class="floor">

					<div class="floorheader">
						<div class="left" >
							<span>我的联系地址</span>
							
						</div>
					</div>
					<div class="floorfooter3">
					<?php
						if(isset($_SESSION['home_userid'])){
					?>	
					<form action='commit.php' method="POST">	
						<table width="100%"  class="touch">
							<tr>
								<td>选择</td>
								<td>姓名</td>
								<td>地址</td>
								<td>电话</td>
								<td>邮箱</td>								
							</tr>
						<?php

							$user_id=$_SESSION['home_userid'];
							$sql="select * from touch where user_id={$user_id}";
							mysql_query("set names utf8");
							$rst=mysql_query($sql);
							while($row=mysql_fetch_assoc($rst)){
							
							
							echo "<tr>
								<td><input type='radio' name='touch_id' value='{$row['id']}'></td>
								<td>{$row['name']}</td>
								<td>{$row['addr']}</td>
								<td>".substr_replace($row['tel'],"*****",3,5)."</td>
								<td>{$row['email']}</td>
							</tr>";
							
						}
						?>

						</table>	
					<?php
						}else{
					?>
					您还没有登录请<a href='../login.php' class='cartlogin'>登录</a>		
					<?php		
						}
					?>
						
					</div>
					<input type='submit' name='submit' value='提交' class='commit'>
				</form>		
			</div>
			<div class="floor">
		</div>
		<div class="nav"></div>
		<div class="footer">
			<?php
				include "../footer.php";
			?>
		
		</div>

	
</body>
</html>