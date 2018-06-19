<?php
include "lock.php";
include "../public/common/config.php";


$id=$_SESSION['admin_userid'];
$sql="select * from user where id=$id";
mysql_query("set names utf8");
$rst=mysql_query($sql);
$row=mysql_fetch_assoc($rst);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>left</title>
	<style>
		*{
			font-family: 微软雅黑;
			text-decoration:none;
		}
		h4{
			cursor: pointer;
			background: #E4393C;
			border-radius:7px;
			text-align: center;
			color:#fff;
		}

		h4:hover{
			color:#aff;
		}

		div{
			display: none;
		}

		p{
			padding-left:15px;
		}
		a:hover{
			color:#888;
		}
	</style>
	<script src='public/js/jquery.js'></script>
</head>
<body>
<?php
	switch($row['isadmin']){
		case 1:
		echo "<h4>用户管理:</h4>
	<div>
		<p><a href='user/index.php' target='right'>|-查看用户 </a></p>
		<p><a href='user/admin.php' target='right'>|-查看管理员</a></p>
		<p><a href='user/add.php' target='right'>|-添加管理</a></p>
	</div>
	<h4>广告管理:</h4>
	<div>
		<p><a href='advert/index.php' target='right'>|-查看广告</a></p>
		<p><a href='advert/add.php' target='right'>|-添加广告</a></p>
	</div>
	<h4>分类管理:</h4>
	<div>
		<p><a href='class/index.php' target='right'>|-查看分类</a></p>
		<p><a href='class/add.php' target='right'>|-添加分类</a></p>
	</div>
	<h4>品牌管理:</h4>
	<div>
		<p><a href='brand/index.php' target='right'>|-查看品牌</a></p>
		<p><a href='brand/add.php' target='right'>|-添加品牌</a></p>
	</div>
	<h4>商品管理:</h4>
	<div>
			<p><a href='shop/index.php' target='right'>|-查看商品</p>
			<p><a href='shop/add.php' target='right'>|-添加商品</a></p>
	</div>
	<h4>评论管理:</h4>
	<div>
		<p><a href='comment/index.php' target='right'>|-查看评论</a></p>
		
	</div>
	<h4>订单状态:</h4>
	<div>
		<p><a href='status/index.php' target='right'>|-查看状态</a></p>
		<p><a href='status/add.php' target='right'>|-添加状态</a></p>
	</div>
	<h4>订单管理:</h4>
	<div>
		<p><a href='indent/index.php' target='right'>|-查看订单</a></p>
	</div>
	
	<h4>系统管理</h4>
	<div>
		<p><a href='adminpass.php' target='right'>|-修改口令</a></p>
		<p><a href='logout.php' target='_top' onclick='return confirm('你确定退出系统吗?')'>|-退出系统</a></p>
		<p><a href='../home/index.php' target='_blank'>|-回到首页</a></p>
	</div>";
	break;
	case 2:
	echo "<h4>用户管理:</h4>
	<div>
		<p><a href='user/index.php' target='right'>|-查看用户 </a></p>
		<p><a href='user/add.php' target='right'>|-添加管理</a></p>
	</div>
	<h4>分类管理:</h4>
	<div>
		<p><a href='class/index.php' target='right'>|-查看分类</a></p>
		<p><a href='class/add.php' target='right'>|-添加分类</a></p>
	</div>
	<h4>品牌管理:</h4>
	<div>
		<p><a href='brand/index.php' target='right'>|-查看品牌</a></p>
		<p><a href='brand/add.php' target='right'>|-添加品牌</a></p>
	</div>
	<h4>商品管理:</h4>
	<div>
			<p><a href='shop/index.php' target='right'>|-查看商品</p>
			<p><a href='shop/add.php' target='right'>|-添加商品</a></p>
	</div>
	<h4>评论管理:</h4>
	<div>
		<p><a href='comment/index.php' target='right'>|-查看评论</a></p>
		
	</div>
	<h4>系统管理</h4>
	<div>
		<p><a href='adminpass.php' target='right'>|-修改口令</a></p>
		<p><a href='logout.php' target='_top' onclick='return confirm('你确定退出系统吗?')'>|-退出系统</a></p>
		<p><a href='../home/index.php' target='_blank'>|-回到首页</a></p>
	</div>
	";
	break;
	case 3:
	echo "
	<h4>订单状态:</h4>
	<div>
		<p><a href='status/index.php' target='right'>|-查看状态</a></p>
		<p><a href='status/add.php' target='right'>|-添加状态</a></p>
	</div>
	<h4>订单管理:</h4>
	<div>
		<p><a href='indent/index.php' target='right'>|-查看订单</a></p>
	</div>
	
	<h4>系统管理</h4>
	<div>
		<p><a href='adminpass.php' target='right'>|-修改口令</a></p>
		<p><a href='logout.php' target='_top' onclick='return confirm('你确定退出系统吗?')'>|-退出系统</a></p>
		<p><a href='../home/index.php' target='_blank'>|-回到首页</a></p>
	</div>
	";
	break;
	}


?>
	
</body>
<script>
$('h4').click(function(){
	$(this).next().toggle();
	$('div').not($(this).next()).hide();
});

</script>
</html>