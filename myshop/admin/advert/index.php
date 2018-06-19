<?php
include "../lock.php";
include "../../public/common/config.php";

$sql="select * from advert";
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
					<th>编号</th>
					<th>图片</th>
					<th>位置</th>
					<th>url</th>
					<th>修改</th>
					<th>删除</th>
					
				</tr>	
			<?php 
			
				while($row=mysql_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td><img src='../../public/advert/".$row['img']."' alt='' width='200px'></td>";
					echo "<td>{$row['pos']}</td>";
					echo "<td>{$row['url']}</td>";
					echo "<td><a href='edit.php?id={$row['id']}' class='button'>修改</a></td>";
					echo "<td><a href='delete.php?id={$row['id']}&img={$row['img']}' class='button'>删除</a></td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
	
</body>
</html>