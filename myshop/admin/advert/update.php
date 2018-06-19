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
$id=$_POST['id'];
$pos=$_POST['pos'];
$imgsrc=$_POST['imgsrc'];
$url=$_POST['url'];
$imgerror=$_FILES['img']['error'];
if($imgerror==0){
	$src=$_FILES['img']['tmp_name'];
	$name=$_FILES['img']['name'];

	$dst='../../public/advert/'.time().mt_rand().$name;
	if(move_uploaded_file($src,$dst)){
	//进行图片缩放200x200
	thumb($dst,1300,200);
	//删除原图
	$oldfile="../../public/advert/$imgsrc";
	$oldfile2="../../public/advert/thumb_$imgsrc";
	unlink($oldfile);
	unlink($oldfile2);
	$img=basename($dst);
			$sql="update advert set pos='$pos',img='$img',url='$url' where id='$id'";

	mysql_query("set names utf8");
	if(mysql_query($sql)){
		echo "<script>location='index.php'</script>";
	}
}
}else{
		$sql="update advert set pos='$pos',url='$url' where id='$id'";
	
	mysql_query("set names utf8");
	if(mysql_query($sql)){
		echo "<script>location='index.php'</script>";
	}
}
?>