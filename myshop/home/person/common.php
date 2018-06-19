<?php
session_start();
include "../../public/common/config.php";
if(!$_SESSION['home_userid']){
	echo "<a href='../login.php'>你还没有登录请登录</a>";
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<div class="header">
			<?php
				include "../header.php";
			?>
		</div>
		<div class="nav">
		</div>
		<div class="content">
			<div class="floor">
					<div class="floorheader">
						<div class="left" >
							<span>个人中心</span>
						</div>

					</div>

					<?php
						//控制用户评论的刺水防止恶意刷评论
						
							$sql="select * from comment where shop_id='{$_GET['shop_id']}'";
							$rst=mysql_query($sql);
							$num=mysql_num_rows($rst);
							

					?>
					<div class="floorfooter2">
						<div class="floorfooter3Left">
							<ul>
								<li><a href="userpassword.php">修改密码</a></li>
								<li><a href="userlist.php">查看联系方式</a></li>
								<li><a href="useradd.php">添加联系方式</a></li>
								<li><a href="orderlist.php">查看我的订单</a></li>
							</ul>
						</div>
						<div class="floorfooter3Right">
						<form action="commoninsert.php" method="POST"  onsubmit=" return checkinput(this)">
							<p class='commoncenter'>请发表评论:</p>
							<p>
								<textarea name="content"  rows="10" class='commoncenter'></textarea>
							</p>
							<p>
								<input type="hidden" name="shop_id" value="<?php echo $_GET['shop_id']?>">
							</p>
							<p>
								<input type="hidden" name="num" value="<?php  echo $num?>">
							</p>
							<p><input type="submit" class='cartDel'></p>
						</form>	
						</div>

					</div>
			</div>
		</div>			
		<div class="nav"></div>
		<div class="footer">
			<?php
				include "../footer.php";
			?>
		
		</div>

	</div>
	<script>
			//获取表单的数据进行判断，从而控制评论的控制条数
			function checkinput(usgin){
				if(usgin.num.value>=1){
					alert("你已经评论该商品了，请勿重复评论");
					return false;
				}
				if(usgin.content.value==''){
					alert("评论不能为空");
					return false;
				}
			}



	</script>
</body>
</html>
