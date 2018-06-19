<?php
include "../lock.php";
include "../../public/common/config.php";
$id=$_GET['id'];
$img=$_GET['img'];
$filename="../../public/advert/$img";
$filename2="../../public/advert/thumb_$img";
$sql="delete from advert where id=".$id."";
mysql_query("set naems utf8");

if(mysql_query($sql)){
	//删除图片
	unlink($filename);
	unlink($filename2);
	echo "<script>location='index.php'</script>";
}
?>