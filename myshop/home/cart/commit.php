<?php
session_start();
include "../../public/common/config.php";




$code=time().mt_rand();
$userid=$_SESSION['home_userid'];
$time=time();
$touch_id=$_POST['touch_id'];
foreach($_SESSION['shops'] as $shop){
	$time=time();


//计算出对应 的商品数量
$sqlNum="select * from shop where id={$shop['id']}";
$rstNum=mysql_query($sqlNum);
$rowNum=mysql_fetch_assoc($rstNum);
$newNum=$rowNum['shell']+1;
$sqlshell="update shop set shell={$newNum} where id={$shop['id']}";
mysql_query($sqlshell);

	$sql="insert into indent(code,user_id,time,touch_id,shop_id,price,num) values('$code','$userid','$time','$touch_id','{$shop['id']}','{$shop['price']}','{$shop['num']}')";
	mysql_query("set names utf8");
	mysql_query($sql);
	//减库存
	$stock=$shop['stock']-$shop['num'];
	$sqlstcok="update shop set stock={$stock}";
	mysql_query("set names utf8");
	mysql_query($sqlstcok);
	
}
$_SESSION['shops']=array();
echo "<script>location='../person/orderlist.php'</script>";

?>