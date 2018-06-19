<?php
include "../lock.php";
include "../../public/common/config.php";

//对传值进行判断


if($_GET['num']>0){
	echo "删除失败,您的分类绑定了品牌需要删除才能删除分类";
	echo "<script>
		setInterval(function(){
			location='../shop/index.php';
		},2000);
	</script>";

	exit;
}


$id=$_GET['id'];
$sql="delete from class where id=".$id."";
mysql_query("set naems utf8");
if(mysql_query($sql)){
	echo '<script>location="index.php"</script>';
}



?>