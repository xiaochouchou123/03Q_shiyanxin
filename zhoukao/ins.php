<?php 
header("content-type:text/html;charset=utf-8");
require  "./Db.class.php";
/**
 * 
 */
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

$obj1 = new Del();
$obj1->run();
$obj = new Db();
$user = $_POST['user'];
$pwd = $_POST['pwd'];
$obj = new Db();
$res = $obj->add1($user,$pwd);
if ($res) {
	echo "<script>alert('添加成功！');location.href='spl.php'</script>";
}
 ?>
