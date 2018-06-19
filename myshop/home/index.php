<?php
session_start();
include "../public/common/config.php";
$sqlAdvert="select * from advert";
mysql_query("set names utf8");
$rstAdvert=mysql_query($sqlAdvert);
while($rowAdvert=mysql_fetch_assoc($rstAdvert)){
	$rowAds[$rowAdvert['pos']]=$rowAdvert;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>myshop15</title>
	<link rel="stylesheet" href="public/css/index.css"/>
	<script type="text/javascript" src="public/js/jquery.js"></script>
	<style>

	</style>
</head>

<body>
		<div class="main">
			<?php
				include "header.php";
			?>

			<!-- 搜索导航条-->	
			<div class="search">
				<div class="searchlogo">
					<img src="public/image/logo2.png" alt="" width="250px" height="140px">
				</div>
				<div class="searchinput">
				<form action="index.php" method="POST" name="usgin" onsubmit="return myfunction(this)">
					<input type="text" name="search" placeholder="电脑/手机/鼠标">
					<input type="submit" value="搜索">
				</form>
				</div>

				<div class="indexclass">
					<a href="">分类:</a>
					<span>
					<?php
						$sqlClass="select * from class";
				mysql_query("set names utf8");
				$rstClass=mysql_query($sqlClass);
				while($rowClass=mysql_fetch_assoc($rstClass)){
					echo "<a href='indexclass.php?class_id={$rowClass['id']}'>{$rowClass['name']}&nbsp;</a>";
					
				}

					?>
					</span>
				</div>


				
			</div>
			<div class="nav"></div>
			
			<div class="wrapper">
  				<div id="focus">
   					 <ul>
    					  <li><a href="<?php echo $rowAds[0]['url']?>"><img src='../public/advert/thumb_<?php echo $rowAds[0]['img']?>' alt='该图片已丢失' style='height:250px; width:1300px'></a></li>
     					 <li><a href="<?php echo $rowAds[1]['url']?>"><img src='../public/advert/thumb_<?php echo $rowAds[1]['img']?>' alt='该图片已丢失' style='height:250px; width:1300px'></a></li>
     					 <li><a href="<?php echo $rowAds[2]['url']?>"><img src='../public/advert/thumb_<?php echo $rowAds[2]['img']?>' alt='该图片已丢失' style='height:250px; width:1300px'></a></li>
     					 <li><a href="<?php echo $rowAds[3]['url']?>"><img src='../public/advert/thumb_<?php echo $rowAds[3]['img']?>' alt='该图片已丢失' style='height:250px; width:1300px'></a></li>
      
      
    				</ul>
  				</div>
			</div>
			<div class="quanbu">
				<h1><span class="bgleft"><img src="public/image/left.png" alt=""></span>热门卖品</h1>

				<div class="im">
				<?php
					$sqlshell="select shop.* from shop,brand,class where shop.brand_id=brand.id and brand.class_id=class.id  and shelf=1 order by shell desc limit 4";
					$rstshell=mysql_query($sqlshell);
					while($rowshell=mysql_fetch_assoc($rstshell)){
				?>	
					<li><a href=""><img src="../public/uploads/<?php  echo $rowshell['img']?>" alt="tan90" ><p class="p1"><?php echo $rowshell['name']?></p><p class="p2"><?php echo $rowshell['price']?></p>
					</a></li>
				
				<?php
			}
				?>
				</div>

			</div>

			<div class="quanbu">
				<h1><span class="bgleft"><img src="public/image/left.png" alt=""></span>超级优惠</h1>

				<div class="im">	
					<li><a href=""><img src="../public/uploads/img1.jpg" alt="tan90" ><p class="p1">联想小清晰 15.6寸</p><p class="p2">价格：￥3699</p>
					</a></li>
					<li><a href=""><img src="../public/uploads/img2.jpg" alt="tan90"><p class="p1">华硕灵耀</p><p class="p2">价格：￥3899</p>
					</a></li>
					<li><a href=""><img src="../public/uploads/img3.jpg" alt="tan90"><p class="p1">宏基墨舞</p><p class="p2">价格：￥3599</p>
					</a></li>
					<li><a href=""><img src="../public/uploads/img4.jpg" alt="tan90"><p class="p1">炫龙骑士</p><p class="p2">价格：￥3799</p>
					</a></li>
				</div>

			</div>
		
		<?php
			//获取搜索数据进行模糊查询
		if(isset($_POST['search'])){
			//防止报错
			$page_num=1;

			$name=$_POST['search'];
			$sqlsearch=" select distinct shop.* ,brand.name bname, class.name cname from shop,brand,class where shop.name like '%$name%' or brand.name like '$name' or class.name like '%$name%' group by name";
			$rstsearch=mysql_query($sqlsearch);
			$searchnum=mysql_num_rows($rstsearch);
			while($rowsearch=mysql_fetch_assoc($rstsearch)){
				//当用户进行搜索时有产品时
				if($searchnum>0){

		echo "<div class='floor'>
		
			<div class='floorfooter'>
				<div class='shop'>
					<ul class='shopimg'>
						<li><a href='shop.php?shop_id={$rowsearch['id']}'><img src='../public/uploads/thumb_{$rowsearch['img']}' alt=''><br/><span class='shopname'>{$rowsearch['name']}</span><span class='shopprice'>{$rowsearch['price']}元</span></a></li>
					</ul>
			
				
			</div>";
			}
		}
			//当产品没有时则显示
				if($searchnum==0){
					echo "<div class='floor'>
		
			<div class='floorfooter'>
				<div class='shop'>
					<img src='public/image/02.jpg' alt=''>
				
			</div>";
				
				}
				
				
	

	?>
			</div>	
		</div>
	
		

	<?php 

	}
	else{ 
		?>




		
			<div class="content">
			<!--floor 为商品-->
			<?php

			if(isset($_GET['page'])){
			$page=$_GET['page'];
		}else{
		$page=1;
	}

				//查询有多少分类进行分页
				
				$Classnum="select * from class";
				$rstnum=mysql_query($Classnum);
				$num=mysql_num_rows($rstnum);
				$page_size=4;
				$page_num=ceil($num/$page_size);



				$i=1;
				$sqlClass="select * from class limit ".($page-1)*$page_size.",$page_size";
				mysql_query("set names utf8");
				$rstClass=mysql_query($sqlClass);
				while($rowClass=mysql_fetch_assoc($rstClass)){
			?>
				<div class="floor"> 
					<div class="floorheader">
						<div class="left" >
							<span><?php echo $i?>f<?php echo $rowClass['name']?></span>
							
						</div>
						<div class="right">
							<span>热销产品</span>
							<a href="class.php?class_id=<?php echo $rowClass['id']?>"><span>更多</span></a>
						</div>
					</div>
					<div class="floorfooter">
						<div class="shop">
							<?php
								$sqlShop="select shop.* from shop,brand,class where shop.brand_id=brand.id and brand.class_id=class.id and class.id={$rowClass['id']} and shelf=1 order by shell desc limit 4";
								mysql_query("set names utf8");
								$rstShop=mysql_query($sqlShop);
								while($rowShop=mysql_fetch_assoc($rstShop)){


							?>
							<ul class="shopimg">
								<li><a href="shop.php?shop_id=<?php echo $rowShop['id']?>"><img src="../public/uploads/thumb_<?php echo $rowShop['img'] ?>" alt=""><br/><span class="shopname"><?php echo $rowShop['name']?></span><span class="shopprice"><?php echo $rowShop['price']?>元</span></a></li>
							
							</ul>
							<?php
						}
							?>
						</div>
					
					</div>
				</div>
				<?php
				$i++;
					}
				}
				?>

			</div>

			<div class="page">
			

			


		
				<ul>
					<li>
					<?php


						if($page_num>1){

						if($page>=2 and $page<=$page_num){
							$page_start=$page-1;
								if($page==$page_num){
									$page_end=$page_num;
								}else{

									$page_end=$page+1;
								}
						}else if($page<2){
							$page_start=1;
							$page_end=$page+2;
						}else{
							$page_Star=$page-1;
							$page_end=$page_num;
						}

						if($page>1){
						echo "<a href=index.php?page=1'>首页</a>";
						}
				
					echo "</li>";
					echo "<li>";
						
							$return=$page-1;
							if($return>=2){
								echo "<a href='index.php?page=$return'>上一页</a>";
							}

					
					echo "</li>";
					echo "<li>";
						
						for($i=1;$i<=$page_num;$i++){
					if($i==$page){
						echo "<b>$i</b>&nbsp;";
					}else{
						echo "<a href='index.php?page=$i'>$i</a>&nbsp;"; 
					}
				}
					
					echo "</li>";
					echo "<li>";
						
						$xia=$page+1;
				if($xia<=$page_num){
					echo "<a href='index.php?page=$xia'>下一页</a>";
				}
						
					echo "</li>";
					echo "<li>";
						

				if($page<$page_num){
					echo "<a href='index.php?page=$page_num'>最后一页</a>";
				}

					
					echo "</li>";
				echo "</ul>";
						}
				?>
			</div>
			<div class="nav"></div>
			
			<div class="nav"></div>
				<?php   include "footer.php"; 
				?>
			
		</div>
		<script src="public/js/index.js"></script>
</body>

<script>
		function myfunction(usgin){
			if(!usgin.search.value){
				alert("不允许为空请输入值");
				return false;
			}
		}
</script>
</html>