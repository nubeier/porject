<?php
include "../lock.php";
include "../../public/common/config.php";
include "../../public/common/function.php";
$id=$_GET['id'];
$sql="select *  from advert where id='$id'";
$rst=mysql_query($sql);
$row=mysql_fetch_assoc($rst);
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
			<p>位置:</p>
			<p>
			<select name='pos'>
				<?php
					switch ($row['pos']) {
						case '0':
							echo "<option value='0' select>0</option>";
							echo "<option value='1'>1</option>";
							echo "<option value='2'>2</option>";
							echo "<option value='3'>3</option>";
							echo "<option value='4'>4</option>";
							break;
						
						case '1':
							echo "<option value='0'>0</option>";
							echo "<option value='1' selected>1</option>";
							echo "<option value='2'>2</option>";
							echo "<option value='3'>3</option>";
							echo "<option value='4'>4</option>";
							break;
						case '2':
							echo "<option value='0'>0</option>";
							echo "<option value='1' >1</option>";
							echo "<option value='2' selected>2</option>";
							echo "<option value='3'>3</option>";
							echo "<option value='4'>4</option>";
							break;
						case '3':
							echo "<option value='0'>0</option>";
							echo "<option value='1' >1</option>";
							echo "<option value='2' >2</option>";
							echo "<option value='3' selected>3</option>";
							echo "<option value='4'>4</option>";
							break;
					
								
					}
				?>
			</select>
			</p>
			<p>原图片:</p>
			<p><img src='../../public/advert/<?php echo $row['img'] ?>' alt="" width='200px'></p>
			<p>URL:</p>
			<p><input type="text" name='url' value='<?php echo $row['url']?>'></p>
			<p><input type="file" name="img"></p>

			<p><input type="hidden" name="id" value="<?php echo $row['id']; ?>"></p>
			<p><input type="hidden" name="imgsrc" value='<?php echo $row['img']; ?>'></p>
			<p><input type="submit" name="submit" value="修改"></p>
		</form>
	</div>
</body>
</html>