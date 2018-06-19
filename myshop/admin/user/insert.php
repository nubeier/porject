<?php

include "../../public/common/config.php";
$username=$_POST['username'];
$password=md5($_POST['password']);
$adminname=$_POST['adminname'];
$adminroot=$_POST['adminroot'];
$sql="insert into user(username,password,adminname,isadmin)values('$username','$password','$adminname',$adminroot)";

mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "<script>location='index.php'</script>";
}

?>