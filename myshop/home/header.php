<?php

$path=$_SERVER['PHP_SELF'];
$arr=explode('/', $path);
$root='/'.$arr[1];
//echo "<pre>";
//print_r($arr);
//echo "</pre>";

?>
<div class="header">
			
				<div class="headerleft">
					<a href="<?php echo $root ?>/home/index.php">campus shcool 首页</a>
				</div>
				<div class="headerRight">
					<?php
						if(isset($_SESSION['home_userid'])){
							echo "<a>欢迎{$_SESSION['home_username']}</a>";
							echo "<a href='$root/home/logout.php' style='margin-left:10px;'>退出</a>";
						}else{
						echo "<a href='{$root}/home/login.php'>登录|</a>";
						echo "<a href='{$root}/home/reg.php'>注册|</a>";
						}
					?>
					
					
					<a href="<?php echo $root ?>/home/person/index.php">个人中心|</a>
					<a href="<?php echo $root ?>/home/cart/index.php">购物车</a>
				</div>
		
			</div>