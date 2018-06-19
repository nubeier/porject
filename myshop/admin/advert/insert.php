<?php
include "../lock.php"; 
include '../../public/common/config.php';
include '../../public/common/function.php';
$pos=$_POST['pos'];
$img=$_POST['img'];
$url=$_POST['url'];
$tmp_name=$_FILES['img']['tmp_name'];
$name=$_FILES['img']['name'];
$dst='../../public/advert/'.time().mt_rand().$name;

if(move_uploaded_file($tmp_name,$dst)){
	thumb($dst,1300,200);
	$img=basename($dst);
	$sql="insert into advert (img,pos,url) values('$img',$pos,'$url')";
	mysql_query("set names utf8");
	if(mysql_query($sql)){
		echo "<script>location='index.php'</script>";
	}
}
?>
