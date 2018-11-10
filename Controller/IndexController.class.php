<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $this->display("form");
    }

//信息入库
    public function add(){
    	$user = $_POST['user'];
    	$text = $_POST['text'];
    	 $upload = new \Think\Upload();// 实例化上传类    
    	 $upload->maxSize   =     9*1028*1028 ;// 设置附件上传大小    
    	 $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
    	 $upload->rootPath  =      './Public/'; // 设置附件上传目录    // 上传文件     
    	 $upload->savePath  =      './Uploads/'; // 设置附件上传目录    // 上传文件     
    	 $info   =   $upload->upload();    
    	 if(!$info) {
    	 // 上传错误提示错误信息       
    	 $this->error($upload->getError());    
    	 }else{
    	 // 上传成功        
    	 // $this->success('上传成功！');  
    	  foreach($info as $file){        
    	  	$img = $file['savepath'].$file['savename']; 
    	 }
    	 $model = D('user');
    	 $data['user'] = $user;
    	 $data['text'] = $text;
    	 $data['img'] = $img;
    	 $data = $model->add1($data);
    	 if ($data) {
    	 	$this->success("添加成功！",U("Index/show"));
    	 }
    }
}

//展示
	public function show(){
		$User = M('User'); // 实例化User对象
		$count      = $User->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$show       = $Page->show();// 分页显示输出	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$this->assign('data',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		// $model = D("user");
		// $data = $model->sels();
		// $this->assign("data",$data);
		$this->display("show");
}
}