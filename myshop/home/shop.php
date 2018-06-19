<?php
session_start();
include "../public/common/config.php";
$shop_id=$_GET['shop_id'];
$sqlShop="select * from shop where id='$shop_id'";
mysql_query("set names utf8");
$rstShop=mysql_query($sqlShop);
$rowShop=mysql_fetch_assoc($rstShop);
$sqlBrand="select brand.* from shop,brand where shop.brand_id=brand.id and shop.id={$shop_id}";
mysql_query("set names utf8");
$rstBrand=mysql_query($sqlBrand);
$rowBrand=mysql_fetch_assoc($rstBrand);
$class_id=$rowBrand['class_id'];
$brand_id=$rowBrand['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品详情</title>
	<link rel="stylesheet" href="public/css/index.css">
</head>
<body>
	<div class="main">
		<div class="header">
			<?php
				include "header.php";
			?>
		</div>
		<div class="nav">
		</div>
		<div class="content">
			<div class="floor">

					<div class="floorheader">
						<div class="left" >
							<span><a href="class.php?class_id=<?php echo $class_id?>&brand_id=<?php echo $brand_id?>" class="index">品牌</a>&raquo;<?php echo $rowShop['name']?></span>
							
						</div>
					</div>
					<div class="floorfooter2">
						<table width="100%" border="1px">
							<tr>
								<td>商品</td>
								<td>价格</td>
								<td>库存</td>
								<td>购物车</td>
							</tr>
							<tr>
								<td><img src="../public/uploads/thumb_<?php echo $rowShop['img']?>"></td>
								<td><?php echo $rowShop['price']?>元</td>
								<td><?php echo $rowShop['stock']?></td>
								<td><a href="cart/insert.php?id=<?php echo $rowShop['id']?>"><img src="public/image/cart.jpg" alt=""></a></td>

							</tr>

						</table>
					</div>	
			</div>
			<div class="floor">
				
					<div class="floorheader">
						<div class="left" >
							<span>商品评论</span>
							
						</div>
					</div>
					<div style="height:20px">
						<div class="floorfooter2">
							<div class="comment">
							<?php
									$sqlComment="select comment.*,user.username from comment,user where comment.user_id=user.id and comment.shop_id={$shop_id}";
									mysql_query("set names utf8");
									$rstComment=mysql_query($sqlComment);
									while($rowComment=mysql_fetch_assoc($rstComment)){

								?>
								<div class="left">
									<div class="logo"><img src="public/image/logo.png" width="70px" width="50px"></div>
									<div class="name"><?php echo $rowComment['username']?></div>
								</div>
								<div class="right">
									<span class="commcontent">
									<?php
										echo  $rowComment['content'];
									?>
									</span>
									<span class="commcontentright">
									<?php echo Date("Y-m-d",$rowComment['time']);?>
									</span>
							<?php
							//判断如果评论表中的值没有则不输出
								if($rowComment['admintime']){

								echo "<p class='reply'>回复评论：</p>";	
								echo "<span class='replycontent'>
									  {$rowComment['admincontent']}
									 </span>";
								echo "<span class='replycontentright'>
								
									 ".Date("Y-m-d",$rowComment['admintime'])."
								
									</span>";
								}
							?>
								</div>
								<div class="xuxian"></div>
								<?php
									}
								?>
							
						</div>
					</div>		
				</div>	
			

		</div>
		<div class="nav"></div>
		<div class="footer">
			<?php
				include "footer.php";
			?>
		
		</div>

	
</body>
</html>