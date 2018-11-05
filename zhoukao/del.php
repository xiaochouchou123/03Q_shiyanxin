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
$id = $_GET['id'];
$res = $obj->delete($id);
if ($res) {
	echo "<script>alert('删除成功！');location.href='spl.php'</script>";
}
 ?>
