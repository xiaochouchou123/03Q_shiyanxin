<?php 

class IndexController extends Controller{
	public function index(){
		$data = array('0'=>'账户','1'=>'六十万');
		$this->display("index");
	}

	//数据库CURD封装,查询所有
	public function sels(){
		$model = new UserModel();
		$data = $model->sels();
		$this->assign($data);
		// echo "<pre>";
		// var_dump($data);
	}

	//数据库CURD封装,查询单条数据
	public function sel(){
		$id = $_GET['id'];
		$model = new UserModel();
		$data = $model->find($id);
		echo "<pre>";
		var_dump($data);
	}

	//数据库CURD封装,删除单条数据
	public function del($id){
		$id = $_GET['id'];
		$model = new UserModel();
		$data = $model->del($id);
		if ($data) {
			echo "<script>alert('删除成功！');location.href='http://localhost/xiaoxin/index.php?c=index&a=sels'</script>";
		}
	}

	//数据库CURD封装,添加数据
	public function add(){
		$data = array('user'=>'小臭臭','pwd'=>'123','age'=>'23');
		$model = new UserModel();
		$data = $model->add($data);
		if ($data) {
			echo "<script>alert('添加成功！');location.href='http://localhost/xiaoxin/index.php?c=index&a=sels'</script>";
		}
	}

	//数据库CURD封装,修改数据
	public function upd($data){
		$id = $_GET['id'];
		$data = array('id'=>"$id",'user'=>'小臭臭','pwd'=>'123','age'=>'23');
		$model = new UserModel();
		$data = $model->upd($data);
		if ($data) {
			echo "<script>alert('修改成功！');location.href='http://localhost/xiaoxin/index.php?c=index&a=sels'</script>";
		}
	}

}


 ?>