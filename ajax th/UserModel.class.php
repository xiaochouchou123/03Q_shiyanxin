<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
	//查询
	public function sels(){
		return $this->select();
	}

	//删除
	public function del($id){
		return $this->where("id='$id'")->delete();
	}
}

 ?>