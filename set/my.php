<?php 
header("content-type:text/html;charset=utf-8");
$id = $_GET['id'];
session_id($id);
session_start();
$user = $_SESSION['user'];
if ($user="") {
	echo "<script>alert('请先登录');location.href='login.php'</script>";
}
// echo $user;


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>个人中心</title>
</head>
<body>
<h1 style="color:red">欢迎来到个人中心</h1>
</body>
</html>