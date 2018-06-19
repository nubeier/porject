<?php
include "../lock.php";
include "../../public/common/config.php";

if($_GET['num']>0){
	echo "删除失败，需要删除相关的商品，才能删除成功";
	echo "<script>
		setInterval(function(){
			location='../shop/index.php';
		},2000);

	</script>";
	exit;
}


$id=$_GET['id'];
$sql="delete from brand where id=".$id."";
mysql_query("set naems utf8");
if(mysql_query($sql)){
	echo '<script>location="index.php"</script>';
}
?>