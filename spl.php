<?php 
//类的自动加载
class Spl{
	public function __construct(){
		pre_autoload_register(array($this,"loadclass"));
	}

	public function loadclass($class){
		$db = "./{$class}.php";
		if (file_exists($db)) {
			require $db;
		}
	}
}


 ?>