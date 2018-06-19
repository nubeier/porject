<?php
session_start();
include "../public/common/config.php";

$id=$_GET['class_id'];
$sqlClass="select * from class where id={$id}";
mysql_query("set names utf8");
$rstClass=mysql_query($sqlClass);
$rowClass=mysql_fetch_assoc($rstClass);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分类</title>
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
							<span><a href="index.php" class="index">首页</a>&raquo;<?php echo $rowClass['name']?></span>
							
						</div>

						
						<div class="right">
						<?php
					
							$sqlBrand="select * from brand where class_id={$id}";
								$firstBrand='';
								$i=0;
							mysql_query("set names utf8");
							$rstBrand=mysql_query($sqlBrand);
							while($rowBrand=mysql_fetch_assoc($rstBrand)){
								if($i==0){
								$firstBrand=$rowBrand['id'];
							}
							echo "
								<span>
								<a href='class.php?class_id={$id}&brand_id={$rowBrand['id']}'>{$rowBrand['name']}</a>
							</span>";
							$i++;
							}
						?>
							
						</div>
					</div>
					<div class="floorfooter">
						<div class="shop">
						<ul class="shopimg">
						<?php
							if(isset($_GET['brand_id'])){
								$brand_id=$_GET['brand_id'];
							}else{
								$brand_id=$firstBrand;
							}
						//$brand_id=$_GET['brand_id']?$_GET['brand_id']:$firstBrand;
							$sqlShop="select * from shop  where brand_id={$brand_id}";
							mysql_query("set naems utf8");
							$rstShop=mysql_query($sqlShop);
							while($rowShop=mysql_fetch_assoc($rstShop)){

						?>
							
								<li><a href="shop.php?shop_id=<?php echo $rowShop['id'] ?>"><img src="../public/uploads/thumb_<?php echo $rowShop['img'] ?>" alt=""><br/><span class="shopname"><?php echo $rowShop['name'] ?></span><span class="shopprice"><?php echo $rowShop['price']?>元</span></li>
						<?php
						}
					
						?>		
							</ul>
						
						</div>
						
						
		</div>

		
						
		</div>

		<div class="nav"></div>
		<div class="footer">
			<?php
				include "footer.php";
			?>
		
		</div>

	</div>
</body>
</html>