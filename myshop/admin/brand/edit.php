<?php
include "../lock.php";
include "../../public/common/config.php";
$id=$_GET['id'];
$sqlBrand="select * from brand where id='$id'";
mysql_query("set names utf8");
$rstBrand=mysql_query($sqlBrand);
$rowBrand=mysql_fetch_assoc($rstBrand);
$sqlClass="select * from class";
mysql_query("set names utf8");
$rstClass=mysql_query($sqlClass);
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
		<form action="update.php" method="POST">
			<p>品牌名称:</p>
			<p><input type="text" name="name" value="<?php echo $rowBrand['name']?>"></p>
			<p>选择分类:</p>
			<p>
				<select name="class_id">
					<?php
						while($rowClass=mysql_fetch_assoc($rstClass)){
							if($rowClass['id']==$rowBrand['class_id']){
								echo "<option selected value='{$rowClass['id']}'>".$rowClass['name']."</option>";	
							}else{
								echo "<option value='{$rowClass['id']}'>".$rowClass['name']."</option>";
							}
				}

				?>
				</select>
			</p>
			<p><input type="hidden" name='id' value="<?php echo $rowBrand['id']; ?>"></p>
			<p><input type="submit" name="submit" value="修改"></p>
		</form>
	</div>
</body>
</html>