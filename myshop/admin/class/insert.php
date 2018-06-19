<?php
include "../lock.php";
include "../../public/common/config.php";
$name=$_POST['name'];
$sql="insert into class(name)values('$name')";
mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "<script>location='index.php'</script>";
}

?>