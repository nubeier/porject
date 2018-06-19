<?php
include "../lock.php";
include "../../public/common/function.php";
include "../../public/common/config.php";
//echo "<pre>";
//print_r ($_POST);
//echo "</pre>";
//echo "<pre>";
//print_r ($_FILES);
//echo "</pre>";

$sname=$_POST['name'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$shelf=$_POST['shelf'];
$brand_id=$_POST['brand_id'];
$imgerror=$_FILES['img']['error'];
$id=$_POST['id'];
$imgsrc=$_POST['imgsrc'];
if($imgerror==0){
	$src=$_FILES['img']['tmp_name'];
	$name=$_FILES['img']['name'];

	$dst='../../public/uploads/'.time().mt_rand().$name;
	if(move_uploaded_file($src,$dst)){
	//进行图片缩放200x200
	thumb($dst,200,200);
	//删除原图
	$oldfile="../../public/uploads/$imgsrc";
	$oldfile2="../../public/uploads/thumb_$imgsrc";
	unlink($oldfile);
	unlink($oldfile2);
	$img=basename($dst);
			$sql="update shop set name='$sname',price='$price',stock='$stock',shelf='$shelf',brand_id='$brand_id',img='$img' where id='$id'";

	mysql_query("set names utf8");
	if(mysql_query($sql)){
		echo "<script>location='index.php'</script>";
	}
}
}else{
	$sql="update shop set name='$sname',price='$price',stock='$stock',shelf='$shelf',brand_id='$brand_id' where id='$id'";
	mysql_query("set names utf8");
	if(mysql_query($sql)){
		echo "<script>location='index.php'</script>";
	}
}
?>