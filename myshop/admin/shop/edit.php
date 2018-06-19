<?php
include "../lock.php";
include "../../public/common/config.php";
$id=$_GET['id'];
$sqlShop="select *  from shop where id=$id";
mysql_query("set names utf8");
$rstShop=mysql_query($sqlShop);
$rowShop=mysql_fetch_assoc($rstShop);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加用户</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<form action="update.php" method="POST" enctype="multipart/form-data">
			<p>商品名称:</p>
			<p><input type="text" name="name" value="<?php echo $rowShop['name']?>"></p>
			<p>价格:</p>
			<p><input type="text" name="price" value="<?php echo $rowShop['price']?>"></p>
			<p>库存:</p>
			<p><input type="text" name="stock" value="<?php echo $rowShop['stock']?>"></p>
			<p>货架:</p>
			<p>
			<?php
			if($rowShop['shelf']==1){
				?>
			<label><input type='radio' name='shelf' value='1' checked>上架</label>
		<label><input type='radio' name='shelf' value='0'>下架</label> <?php }else{
			?>
			<label><input type='radio' name='shelf' value='1'>上架</label>
			<label><input type='radio' name='shelf' value='0' checked>下架</label>
			<?php
			}
			?>
			</p>
			<p>选择分类:</p>
			<p>
				<select name="brand_id">
					<?php
						$sqlClass="select * from class ";
						mysql_query("set names utf8");
						$rstClass=mysql_query($sqlClass);
					while($rowClass=mysql_fetch_assoc($rstClass)){
							echo "<option disabled>{$rowClass['name']}</option>";
							
						$sqlBrand="select * from brand where class_id='{$rowClass['id']}'";
						mysql_query("set names utf8");
						$rstBrand=mysql_query($sqlBrand);
						while($rowBrand=mysql_fetch_assoc($rstBrand)){
							if($rowBrand['id']==$rowShop['brand_id']){
							echo "<option value='{$rowBrand['id']}' selected>--{$rowBrand['name']}</option>";
						}else{
							echo "<option value='{$rowBrand['id']}'>--{$rowBrand['name']}</option>";
							}
						}
					}

				?>
				</select>
			<p>原图:</p>
			<p><img src="../../public/uploads/<?php echo $rowShop['img'];?>" alt="" width="100px"></p>
			</p>
			<p><input type="file" name="img"></p>
			<p><input type="hidden" name="id" value="<?php echo $rowShop['id']; ?>"></p>
			<p><input type="hidden" name="imgsrc" value='<?php echo $rowShop['img']; ?>'></p>
			<p><input type="submit" name="submit" value="修改"></p>
		</form>
	</div>
</body>
</html>