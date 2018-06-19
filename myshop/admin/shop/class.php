<?php
include "../lock.php";
include "../../public/common/config.php";


//当分页没有传值的时候默认值为0，可以点击时候则给一个值
if(isset($_GET['page'])){
	$page=$_GET['page'];
}else{
	$page=1;
}

//点击分类时进行分类，并保存SESSION值
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$_SESSION['id']=$id;
}else{

$class_id=$_SESSION['id'];
	
}
//查询数据有几条进行分页
$sql="select shop.*,brand.name bname,class.name cname from brand,class,shop where brand.class_id=class.id and shop.brand_id=brand.id and class_id={$_SESSION['id']}";
mysql_query("set names utf8");
$rst=mysql_query($sql);
$num=mysql_num_rows($rst);
//分页数量
$page_size=5;
$page_num=ceil($num/$page_size);
//进行分页
	$sql2="select shop.*,brand.name bname,class.name cname from brand,class,shop where brand.class_id=class.id and shop.brand_id=brand.id and class_id=".$_SESSION['id']." limit ".($page-1)*$page_size.",$page_size";
	mysql_query("set names utf8");
	$rst2=mysql_query($sql2);
?>
<!doctype html>
<html>
<head>
	<title>index</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		<div class="shopclass">
			<p><a href="">分类:</a></p>
			<span>
			<?php
				$sqlClass="select * from class";
				mysql_query("set names utf8");
				$rstClass=mysql_query($sqlClass);
				while($rowClass=mysql_fetch_assoc($rstClass)){
					echo "<a href='class.php?id={$rowClass['id']}'>{$rowClass['name']}</a>";
				}

			?>
			</span>
			
		</div>
		<div class="classbrand">
			<p><a href="">品牌:</a></p>
			<span>
			<?php
				$sqlBrand="select  * from brand where class_id={$_SESSION['id']}";
				mysql_query("set names utf8");
				$rstBrand=mysql_query($sqlBrand);
				while($rowBrand=mysql_fetch_assoc($rstBrand)){
					echo "<a href='classbrand.php?brand_id={$rowBrand['id']}'>{$rowBrand['name']}</a>";
				}

			?>
			</span>
		</div>
			
			<table>
				<tr>
					<th>编号</th>
					<th>商品名称</th>
					<th>商品图片</th>
					<th>价格</th>
					<th>库存</th>
					<th>品牌</th>
					<th>分类</th>
					<th>上下架</th>
					<th>修改</th>
					<th>删除</th>
				</tr>	
			<?php 
				while($row=mysql_fetch_assoc($rst2)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['name']}</td>";
					echo "<td><img src='../../public/uploads/".$row['img']."'  width='100px'></td>";
					echo "<td>{$row['price']}</td>";
					echo "<td>{$row['stock']}</td>";
					echo "<td>{$row['bname']}</td>";
					echo "<td>{$row['cname']}</td>";
					if($row['shelf']==1){
					echo "<td>上架</td>";
					}else{
					echo "<td>下架</td>";
					}
					
					echo "<td><a href='edit.php?id={$row['id']}' class='button'>修改</a></td>";
					echo "<td><a href='delete.php?id={$row['id']}&img={$row['img']}' class='button'>删除</a></td>";
					echo "</tr>";
				}
			?>
			</table>
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
						echo "<a href=class.php?page=1'>首页</a>";
						}
				
					echo "</li>";
					echo "<li>";
						
							$return=$page-1;
							if($return>=2){
								echo "<a href='class.php?page=$return'>上一页</a>";
							}

					
					echo "</li>";
					echo "<li>";
						
						for($i=$page_start;$i<=$page_end;$i++){
					if($i==$page){
						echo "<b>$i</b>&nbsp;";
					}else{
						echo "<a href='class.php?page=$i'>$i</a>&nbsp;"; 
					}
				}
					
					echo "</li>";
					echo "<li>";
						
						$xia=$page+1;
				if($xia<=$page_num){
					echo "<a href='class.php?page=$xia'>下一页</a>";
				}
						
					echo "</li>";
					echo "<li>";
						

				if($page<$page_num){
					echo "<a href='class.php?page=$page_num'>最后一页</a>";
				}

					
					echo "</li>";
				echo "</ul>";
						}
				?>
		
			</div>
	</div>
	
</body>
</html>