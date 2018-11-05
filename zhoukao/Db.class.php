<?php 
/**
 * 
 */
class Db 
{
	//封装curd入库方法
	public function add1($user,$pwd){
		// $kstr = "";
		// $vstr = "";
		// foreach ($data as $key => $value) {
		// 	$kstr .= $key;
		// 	$vstr .= $value;
		// }
		// $kstr = trim($kstr);
		// $vstr = trim($vstr);
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$sql = "insert into `user`(`user`,`pwd`) values($user,$pwd)";
		$data = $pdo->query($sql)->execute();
		return $data;
	}

	//封装curd删除方法
	public function delete($id){
		$sql = "delete from `user` where `id`=$id";
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$data = $pdo->query($sql)->execute();
		return $data;
	}

	//封装curd查询单条数据
	public function find($id){
		$sql = "select * from `user` where id=$id";
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$data = $pdo->query($sql)->fetchAll();
		return $data;
	}

	//封装curd查询所有数据
	public function select(){
		$sql = "select * from `user`";
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$data = $pdo->query($sql)->fetchAll();
		return $data;
	}	

	//封装curd修改方法
	public function update($data){
		$kstr = "";
		$vstr = "";
		foreach ($data as $key => $value) {
			$kstr .= `$key','`;
			$vstr .= "$value','";
		}
		$kstr = trim($kstr);
		$vst = trim($vstr);
		$sql = "update `user` set($kstr) values($vstr)";
		$pdo = new PDO("mysql:host=127.0.0.1;dbname=xjy",'root','root');
		$data = $pdo->query($sql)->execute();
		return $data;
	}
}


 ?>