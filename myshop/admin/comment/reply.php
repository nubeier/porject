<?php
include "../../public/common/config.php";

$comment_id=$_POST['id'];
$time=time();
$content=$_POST['content'];

$sql="update comment set admintime='$time',admincontent='$content' where id=$comment_id";

mysql_query("set names utf8");
if(mysql_query($sql)){
	echo "评论成功,三秒后即将返回页面";
	echo "<script>
		setTimeout(function(){
			location='index.php';
		},3000);

	</script>";
}
?>