<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	//添加入库的方法
	public function add1($data){
		return $this->add($data);
	}

	//查询所有数据的方法
	public function sels(){
		return $this->select();
	}
}
 ?>