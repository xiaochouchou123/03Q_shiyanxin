<?php 
class Model{
	//查询所有数据
	public function select(){
		$sql = "select * from `user`";
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$res = $pdo->query($sql)->fetchAll();
		return $res;
	}

	//查询单条数据
	public function find($id){
		$sql = "select * from `user` where `id`='$id'";
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$res = $pdo->query($sql)->fetch();
		return $res;
	}

	//添加
	public function add_data($data){
		$key = '';
		$val = '';
		foreach ($data as $k => $v) {
			$key.="`$k`,";
			$val.="'$v',";
		}
		$key = rtrim($key,',');
		$val = rtrim($val,',');
		$sql = "insert into `user`($key) values($val)";
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$res = $pdo->query($sql)->execute();
		return $res;
	}

	//删除
	public function delete($id){
		$sql = "delete from `user` where `id`='$id'";
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$res = $pdo->query($sql)->execute();
		return $res;
	}

	//修改
	public function upd($data){
		$str = '';
		foreach ($data as $k => $v) {
			$str.="`$k`='$v',";
		}
		$str = rtrim($str,',');
		$sql = "update `user` set $str where `id`={$data['id']}"; 
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$res = $pdo->query($sql)->execute();
		return $res;

	}
}


 ?>