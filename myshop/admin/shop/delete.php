<?php
include "../lock.php";
include "../../public/common/config.php";
$id=$_GET['id'];
$img=$_GET['img'];
$filename="../../public/uploads/$img";
$filename2="../../public/uploads/thumb_$img";
$sql="delete from shop where id=".$id."";
mysql_query("set naems utf8");

if(mysql_query($sql)){
	//删除图片
	unlink($filename);
	unlink($filename2);
	echo "<script>location='index.php'</script>";
}
?>