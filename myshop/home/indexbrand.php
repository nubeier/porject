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
				<div class="indexbrand">
					<a href="">品牌:</a>
					<span>
				<?php
					if(isset($_GET['class_id'])){
					$class_id=$_GET['class_id'];
					$_SESSION['class_id']=$class_id;	
					}else{
						$class_id=$_SESSION['class_id'];
					}
					$sqlBrand="select * from brand where class_id={$class_id}";
					$rstBrand=mysql_query($sqlBrand);
					while($rowBrand=mysql_fetch_assoc($rstBrand)){
						echo "<a href='indexbrand.php?brand_id={$rowBrand['id']}'>{$rowBrand['name']}&nbsp;</a>";
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
			<div class="nav"></div>
		
		<?php
		//当分页没有传值的时候默认值为0，可以点击时候则给一个值
		if(isset($_GET['page'])){
			$id=6;
			$page=$_GET['page'];
		}else{
			$id=$_GET['brand_id'];
		$page=1;
	}

		if(isset($_GET['brand_id'])){
					$brand_id=$_GET['brand_id'];
					$_SESSION['brand_id']=$brand_id;	
					}else{
						$brand_id=$_SESSION['brand_id'];
					}
	//查询数据有几条进行分页
	$sql="select shop.*,brand.name bname,class.name cname from brand,class,shop where brand.class_id=class.id and shop.brand_id=brand.id and brand_id={$brand_id}";
		mysql_query("set names utf8");
		$rst=mysql_query($sql);
			$num=mysql_num_rows($rst);
			//分页数量
		$page_size=5;
		$page_num=ceil($num/$page_size);


			//获取搜索数据进行模糊查询
		if(isset($_POST['search'])){

			$name=$_POST['search'];
			$sqlsearch="select *  from shop where name like '%$name%'";
			$rstsearch=mysql_query($sqlsearch);
			$searchnum=mysql_num_rows($rstsearch);
			while($rowsearch=mysql_fetch_assoc($rstsearch)){
				
				if($searchnum>0){

		echo "<div class='floor'>
		
			<div class='floorfooter'>
				<div class='shop'>
					<ul class='shopimg'>
						<li><a href='shop.php?shop_id={$rowsearch['id']}'><img src='../public/uploads/thumb_{$rowsearch['img']}' alt=''><br/><span class='shopname'>{$rowsearch['name']}</span><span class='shopprice'>{$rowsearch['price']}元</span></a></li>
					</ul>";
			}else{echo "<h1>搜索为空</h1>";}
				}
					
				
	

	?>
				</div>
				
			</div>
		</div>
	
		

	<?php 

	}
	else{ 
		?>




		
			<div class="content">
			<!--floor 为商品-->
					<div class="floor">
						<div class="floorheader">
						<div class="left" >
						<?php
							$sql="select name from brand where id=$id";
							$rst=mysql_query($sql);
							$row=mysql_fetch_assoc($rst);
						?>
							<span><span><a href="index.php" style="color:#fff;" >首页</a></span>»<?php echo $row['name']?></span>
							
						</div>
					</div>
					<div class="floorfooter">
						<div class="shop">
							<?php
							//进行分页
								$sqlShop="select shop.*,brand.name bname,class.name cname from brand,class,shop where shop.brand_id=brand.id and brand.class_id=class.id  and brand_id={$brand_id} and shelf=1  limit ".($page-1)*$page_size.",$page_size";
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
						echo "<a href=indexbrand.php?page=1'>首页</a>";
						}
				
					echo "</li>";
					echo "<li>";
						
							$return=$page-1;
							if($return>=2){
								echo "<a href='indexbrand.php?page=$return'>上一页</a>";
							}

					
					echo "</li>";
					echo "<li>";
						
						for($i=1;$i<=$page_num;$i++){
					if($i==$page){
						echo "<b>$i</b>&nbsp;";
					}else{
						echo "<a href='indexbrand.php?page=$i'>$i</a>&nbsp;"; 
					}
				}
					
					echo "</li>";
					echo "<li>";
						
						$xia=$page+1;
				if($xia<=$page_num){
					echo "<a href='indexbrand.php?page=$xia'>下一页</a>";
				}
						
					echo "</li>";
					echo "<li>";
						

				if($page<$page_num){
					echo "<a href='indexbrand.php?page=$page_num'>最后一页</a>";
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