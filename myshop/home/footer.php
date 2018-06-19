<?php
//$_SERVER
$path=$_SERVER['PHP_SELF'];
$arr=explode('/', $path);
$root='/'.$arr[1];
// echo "<pre>";
// print_r($arr);
// echo "</pre>";

?>
<div class="footer">
				<div class="quanwei">
				<ul>
					<li><p class="footerimg"><img src="public/image/renzheng.png" alt=""></p><span>资质认证</span><br/><span>服务商100%实名认证</span></li>
					<li><p class="footerimg"><img src="public/image/renzheng.png" alt=""></p><span>支付安全</span><br/><span>明码标价质量保证</span></li>
					<li><p class="footerimg"><img src="public/image/renzheng.png" alt=""></p><span>专门服务</span><br/><span>服务全程进行信息化监控</span></li>
					<li><p class="footerimg"><img src="public/image/renzheng.png" alt=""></p><span>售后无忧</span><br/><span>服务出问题进行跟进</span></li>
				</ul>

				</div>

				<div class="footerfont">
					<ul>
						<li><a href="<?php echo $root?>/home/index.php">首页</a></li>
						<li><a href="">关于我们</a></li>
						<li><a href="">联系我们</a></li>
						<li><a href="">加入我们</a></li>
						<li><a href="">产品咨询</a></li>
					</ul>
				</div>
			</div>