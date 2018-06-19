<?php
include "../lock.php";
include "../../public/common/config.php";
$id=$_GET['id'];
$sql="delete from status where id=".$id."";
mysql_query("set naems utf8");
if(mysql_query($sql)){
	echo '<script>location="index.php"</script>';
}
?>