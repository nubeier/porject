<?php
include "../lock.php";
include "../../public/common/config.php";

$sql="select comment.*,shop.name,user.username from comment,shop,user  where comment.shop_id=shop.id and comment.user_id=user.id order by time  DESC";
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
					<th>用户</th>
					<th>商品名称</th>
					<th>评论</th>
					<th>时间</th>
					<th>查看评论</th>
					<th>回复评论</th>
					<th>删除</th>
				</tr>	
			<?php 
				while($row=mysql_fetch_assoc($rst)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['username']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td>".mb_substr($row['content'],0,20,'utf-8')."....</td>";
					echo "<td>".date('Y-m-d',$row['time'])."</td>";
					echo "<td>{$row['admincontent']}</td>";
					if($row['admincontent']){

					echo "<td><a href='javascript:' class='button' style='background:#888'>回复评论</a></td>";
					}else{
					echo "<td><a href='edit.php?comment_id={$row['id']}' class='button'>回复评论</a></td>";	
					}
					echo "<td><a href='delete.php?id={$row['id']}' class='button'>删除</a></td>";
					echo "</tr>";
				}
			?>
			</table>
	</div>
	
</body>
</html>