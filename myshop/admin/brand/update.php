<?php
include "../lock.php";
include "../../public/common/config.php";
$id=$_POST['id'];
$name=$_POST['name'];
$class_id=$_POST['class_id'];
$sql="update brand set name='$name',class_id='$class_id' where id='$id'";
mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "<script>location='index.php'</script>";
}else{
	echo "SQL语句错误";
}
?>