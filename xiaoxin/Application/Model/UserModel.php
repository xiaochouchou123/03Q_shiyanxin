<?php 
//新建用户模型
class UserModel extends Model{
	//增
	public function add($data){
       return $this->add_data($data);
	}
	//删除
	public function del($id){
		return $this->delete($id);
	}
	//修改
	public function update(){
		return $this->update();
	}
	//多条查询
	public function sels(){
		return $this->select();
	}	
	//单条查询
	public function sel($id){
		return $this->where($id)->find();
	}
}

 ?>
