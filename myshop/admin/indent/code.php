<?php
include "../lock.php";
include "../../public/common/config.php";
$code=$_GET['code'];
$sql="select indent.*,shop.name,shop.img from indent,shop where indent.shop_id=shop.id and code='$code'";
mysql_query("set names utf8");
$rst=mysql_query($sql);
?>
<!doctype html>
<html>
<head>
	<title>index</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		
			<table>
				<tr>
					<th>名称</th>
					<th>图片</th>
					<th>价格</th>
					<th>数量</th>
					<th>合计</th>
				</tr>	
			<?php 
				while($row=mysql_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>{$row['name']}</td>";
					echo "<td><img src='../../public/uploads/".$row['img']."' width='100px'></td>";
					echo "<td>{$row['price']}元</td>";
					echo "<td>{$row['num']}</td>";
					echo "<td>".$row['price']*$row['num']."元</td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
	
</body>
</html>