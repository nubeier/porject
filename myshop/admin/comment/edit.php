<?php
include "../lock.php";
//评论表的ID
$id=$_GET['comment_id'];
?>
<!doctype html>
<html>
<head>
	<title>index</title>
	<link rel="stylesheet" href="../public/css/index.css">
</head>
<body>
	<div class="main">
		
			<form action="reply.php" method="POST">
				<p>回复评论:</p>
				<textarea name="content"  cols="100" rows="10"></textarea>
				<p><input type="submit" name="submit" value="回复评论"></p>
				<p><input type="hidden" name="id" value="<?php echo $id?>"></p>
			</form>
	</div>
	
</body>
</html>