<?php
include "../lock.php";
include "../../public/common/config.php";
$sql="select * from class";
mysql_query("set names utf8");
$rst=mysql_query($sql);
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
		<form action="insert.php" method="POST" enctype="multipart/form-data">
			<p>品牌名称:</p>
			<p><input type="text" name="name"></p>
			<p>价格:</p>
			<p><input type="text" name="price">元</p>
			<p>库存:</p>
			<p><input type="text" name="stock"></p>
			<p>品牌:</p>
			<p>
				<select name="brand_id" >
					<?php
						$sqlClass="select * from class";
						$rstClass=mysql_query($sqlClass);
						while($rowClass=mysql_fetch_assoc($rstClass)){

							echo "<option value='' disabled=''>{$rowClass['name']}</option>";
							$sqlBrand="select * from brand where class_id=".$rowClass['id']."";
							$rstBrand=mysql_query($sqlBrand);
							while($rowBrand=mysql_fetch_assoc($rstBrand)){
								echo "<option value='".$rowBrand['id']."'>||{$rowBrand['name']}</option>";
							}
						}	


					?>

				</select>
			</p>
			<p>货架:</p>
			<p>上架<input type="radio" name="shelf" value='1' checked="">下架<input type="radio" name='shelf' value='0'></p>
			<p>图片:</p>
			<p><input type="file" name='img'></p>
			<p>选择分类:</p>
		
			<p><input type="submit" name="submit" value="添加"></p>
		</form>
	</div>
</body>
</html>