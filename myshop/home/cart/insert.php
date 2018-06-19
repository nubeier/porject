<?php
session_start();
include "../../public/common/config.php";
$id=$_GET['id'];
$sql="select * from shop where id='$id'";
mysql_query("set names utf8");
$rst=mysql_query($sql);
$row=mysql_fetch_assoc($rst);
	
	
	if($row['stock']>0){
	$_SESSION['shops'][$id]=$row;
	$_SESSION['shops'][$id]['num']=1;
	echo "<script>location='index.php'</script>";
	}else{
		echo "<script>alert('库存不足')</script>";
		echo "<script>location='../index.php'</script>";
	}


?>