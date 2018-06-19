<?php 
include "../lock.php";
include '../../public/common/config.php';
include '../../public/common/function.php';


$sname=$_POST['name'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$shelf=$_POST['shelf'];
$brand_id=$_POST['brand_id'];
$shell=1;

//图片上传
$src=$_FILES['img']['tmp_name'];
$name=$_FILES['img']['name'];

$dst='../../public/uploads/'.time().mt_rand().$name;
if(move_uploaded_file($src,$dst)){
	//进行图片缩放200x200
	thumb($dst,200,200);

	$img=basename($dst); 
	$sql="insert shop(name,img,price,stock,brand_id,shelf,shell) values('$sname',
	'$img',$price,$stock,$brand_id,$shelf,'$shell')";

	mysql_query("set names utf8");
	if(mysql_query($sql)){
		echo "<script>location='index.php'</script>";
	}
		
}


?>
