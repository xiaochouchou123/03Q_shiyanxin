<?php 
	class Controller{
		public $cNam;
		public $aNam;
		//自动加载方法首先实例化父类，实例化时进行传参，接受参数
		public function __construct($cName,$aName){
			$this->cNam = $cName;
			$this->aNam = $aName;
			// echo $cName;
			// echo $aName;
		}

		//在父类中编写赋值方法
		public function assign($data){
			$this->data = $data;
			// file_put_contents("./log/log.html",$data);
 			// echo "<pre>";
			// var_dump($str);die;
			// file_put_contents(, data)
			// $filePath = APP_PATH."Application/Views/{$this->cName}/{$fileName}";
			// file_put_contents($filePath,$data);
			// echo $filePath;
		}

		//在父类中编写渲染模板方法
		public function display($filename){
			$this->filename = $filename;
			$file = $this->filename;
			$fileName = $file.".php";
			$filePath = APP_PATH."Application/Views/{$this->cNam}/{$fileName}";
			require $filePath;
		}


	}

 ?>