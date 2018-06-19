<?php
include "../lock.php";
include "../../public/common/config.php";

$sql="select * from class";
mysql_query("set names utf8");
$rst=mysql_query($sql);


?>
<!doctype html>
<html>
<head>
	<title>index</title>
	<script src="../public/js/jquery.js"></script>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		
			<table>
				<tr>
					<th>编号</th>
					<th>名称</th>
					<th>修改</th>
					<th>删除</th>
				</tr>	
			<?php 
				while($row=mysql_fetch_assoc($rst)){
						//查询分类中是否有商品
					$sqlBrand="select * from brand where class_id={$row['id']}";
						mysql_query("set names utf8");
						$rstBrand=mysql_query($sqlBrand);
						$rst_num=mysql_num_rows($rstBrand);


					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td><a href='edit.php?id={$row['id']}' class='button'>修改</a></td>";
					echo "<td><a href='delete.php?id={$row['id']}&num={$rst_num}' value='{$rst_num}' class='button'>删除</a></td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
</body>
</html>