<?php 
include "../lock.php";

include "../../public/common/config.php";

$sql="select * from user where not isadmin In(0,1)";
mysql_query("set names utf8");
$rst=mysql_query($sql);

?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		
			<table>
				<tr>
					<th>编号</th>
					<th>用户名</th>
					<th>真实姓名</th>
					<th>最近登录时间</th>
					<th>修改</th>
					<th>删除</th>
				</tr>	
			<?php 
				while($row=mysql_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['username']}</td>";
					echo "<td>{$row['adminname']}</td>";
					echo "<td>".Date("Y-m-d-h-i-s",$row['admintime'])."</td>";
					echo "<td><a href='edit.php?id={$row['id']}' class='button'>修改</a></td>";
					echo "<td><a href='delete.php?id={$row['id']}' class='button'>删除</a></td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
	
</body>
</html>