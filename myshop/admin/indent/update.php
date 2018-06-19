<?php
include "../lock.php";
include "../../public/common/config.php";

$code=$_POST['code'];
$status_id=$_POST['status_id'];
$adminname=$_POST['adminname'];
$sql="update indent set status_id='{$status_id}' ,consignor='{$adminname}'  where code='{$code}'";

mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "<script>location='index.php'</script>";
}
?>