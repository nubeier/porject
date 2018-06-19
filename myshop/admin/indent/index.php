<?php
include "../lock.php";
include "../../public/common/config.php";

$sql="select  indent.*,user.username,status.name from indent,user,status where indent.user_id=user.id and indent.status_id=status.id group by indent.code order by time desc";

mysql_query("set names utf8");
$rst=mysql_query($sql);

$sqlUser="select  * from user where id={$_SESSION['admin_userid']}";
mysql_query("set names utf8");
$rstUser=mysql_query($sqlUser);
$rowUser=mysql_fetch_assoc($rstUser);
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
					<th>订单号</th>
					<th>用户</th>
					<th>下单时间</th>
					<th>订单状态</th>
					<th>联系方式</th>
					<th>确认收货</th>
					<th>发货人</th>
					<th>修改</th>
					<th>删除</th>
				</tr>	
			<?php 
				while($row=mysql_fetch_assoc($rst)){

					echo "<tr>";
					echo "<td><a href='code.php?code={$row['code']}' class='button'>{$row['code']}</a></td>";
					echo "<td>{$row['username']}</td>";
					echo "<td>".date('Y-m-d H-i-s',$row['time'])."</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td><a href='touch.php?touch_id={$row['touch_id']}' class='button'>联系方式</a></td>";
					if($row['confim']){
					echo "<td><a href='touch.php?touch_id={$row['touch_id']}' class='button'>是</a></td>";
					}else{
					echo "<td><a href='touch.php?touch_id={$row['touch_id']}' class='button'>否</a></td>";
					}
					echo "<td>{$row['consignor']}</td>";
					echo "<td><a href='edit.php?code={$row['code']}&status_id={$row['status_id']}' class='button'>修改</a></td>";
					if($rowUser['isadmin']==1){
						echo "<td><a href='delete.php?code={$row['code']}' class='button'>删除</a></td>";
					}else{
						echo "<td><a href='javascript:' style='background:#888;' class='button'>删除</a>";
					}
					
					
				}
			?>
			</table>
	</div>
	
</body>
</html>