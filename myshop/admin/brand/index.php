<?php
include "../lock.php";
include "../../public/common/config.php";

$sql="select brand.*,class.name cname from brand,class where brand.class_id=class.id";
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
					<th>ID</th>
					<th>分类名称</th>
					<th>品牌名称</th>
					<th>修改</th>
					<th>删除</th>
				</tr>	
			<?php 
				while($row=mysql_fetch_assoc($rst)){


					//查询商品的数量进行判断
					$sql="select * from shop where brand_id={$row['id']}";
					$rst_num=mysql_query($sql);
					$num=mysql_num_rows($rst_num);
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['cname']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td><a href='edit.php?id={$row['id']}' class='button'>修改</a></td>";
					echo "<td><a href='delete.php?id={$row['id']}&num={$num}' class='button'>删除</a></td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
	
</body>
</html>