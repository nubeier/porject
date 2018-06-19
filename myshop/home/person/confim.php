<?php
include "../../public/common/config.php";
$code=$_GET['code'];
$cofim=1;

$sql="update indent set confim=1 where code='{$code}'";
if(mysql_query($sql)){
	echo "<script>location='orderlist.php'</script>";
}

?>
