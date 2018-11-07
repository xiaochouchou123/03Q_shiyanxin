<?php 
header("content-type:text/html;charset=utf-8");

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>用户的登录页面</title>
</head>
<body>
	<form action="session.php" method="post">
		<table>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="user"></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="pwd"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="立即登录"></td>
			</tr>
		</table>
	</form>
</body>
</html>