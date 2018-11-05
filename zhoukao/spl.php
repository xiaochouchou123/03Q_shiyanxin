<?php
header("content-type:text/html;charset=utf-8");
require  "./Db.class.php";
class Del
{
	public function run(){
		spl_autoload_register(array($this,"rou"));
	}

	public function rou($class){
		// print_r($class);die;
		$db = "./{class}.class.php";
		if (file_exists($db)) {
			require $db;
		}
		
	}
}

//入库
		// $user = "小臭臭";
		// $pwd = "520";
		// $obj = new Db();
		// $res = $obj->add1($user,$pwd);
		// echo $res;
			
//查询
//$obj1 = new Del();
$obj1->run();
$obj = new Db();
$data = $obj->select();
	// var_dump($data);
	


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>展示页面</title>
 </head>
 <body>
 <table border="1">
 	<tr>
 		<td>id</td>
 		<td>姓名</td>
 		<td>密码</td>
 		<td>操作</td>
 	</tr>
 	<?php foreach ($data as $k => $v): ?>
 	<tr>
 		<td><?php echo $v['id'] ?></td>
 		<td><?php echo $v['user'] ?></td>
 		<td><?php echo $v['pwd'] ?></td>
 		<td><a href="del.php?id=<?php echo $v['id'] ?>">删除</a></td>
 	</tr>
 	<?php endforeach ?>
 	
 </table>
 </body>
 </html>