<?php
include "../lock.php";
include "../../public/common/config.php";

$sql="select comment.*,user.adminname from comment,user where comment.user_id=user.id";
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
					<th>内容</th>
					<th>时间</th>
					<th>评论名</th>
				</tr>	
			<?php 
				while($row=mysql_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>{$row['admincontent']}</td>";
					echo "<td>".Date('Y-m-d',$row['time'])."</td>";
					echo "<td>{$row['adminname']}</td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
	
</body>
</html>