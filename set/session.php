<?php 
header("content-type:text/html;charset=utf-8");
$user = isset($_POST['user'])?$_POST['user']:"";

session_start();//session的开启
$_SESSION['user'] = $user;
$id = session_id();

echo "<a href='my.php?id={$id}'>个人中心</a>";










 ?>