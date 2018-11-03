<?php 
	class Fastphp{
		// public function __construct($arr){

		// }

		public function route(){
			$url = $_SERVER['REQUEST_URI'];
			$url = trim($url,"/");
			$arrInfo = explode("?",$url);
			$handleStr = $arrInfo[1];
			$arrHandle = explode("&",$handleStr);
			$arrTmp = array();
			foreach ($arrHandle as $key => $value) {
				$tmp = explode("=",$value);//已经使用了
				$arrTmp[$tmp[0]]=$tmp[1];//加下标赋值给数组
			}
			$arr["controller"] = ucfirst($arrTmp['c'])."Controller";
			$arr["action"] = $arrTmp['a'];
			$arr['cname'] = ucfirst($arrTmp['c']);
			return $arr;
			// print_r($arr['controller']);die;
			// $obj = new $arr["controller"]();
			// $obj->$arr["action"]();
			// require APP_PATH."Application/Controllers/{$c}.php";
			
		}


		#执行调用
		public function run(){
			//自动调用
			spl_autoload_register(array($this,"loadClaa"));
			$arr = $this->route();
			$cName = $arr['cname'];
			$obj = new $arr['controller']($cName,$arr['action']);
			$obj->$arr['action']();
			// echo "<pre>";
			// var_dump($arr);exit;
		}

		//自动加载机制
		public function loadClaa($class){
			$controller =  APP_PATH."Application/Controllers/{$class}.php";
			if (file_exists($controller)) {
				require $controller;
			}
			$indexcontroller = APP_PATH."fastphp/{$class}.php";
			if (file_exists($indexcontroller)) {
				require $indexcontroller;	
			}
			$model = APP_PATH."Application/Model/{$class}.php";
			if (file_exists($model)) {
				require $model;
			}
			
		}

	}




 ?>