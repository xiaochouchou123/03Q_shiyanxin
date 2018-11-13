<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	//分页展示
    public function index(){
    	$User = M('User'); // 实例化User对象
    	$count      = $User->count();// 查询满足要求的总记录数
    	$Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$show       = $Page->show();// 分页显示输出// 进行分页数据查询 
    	//注意limit方法的参数要使用Page类的属性
    	$list = $User->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('data',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	$this->display("show"); // 输出模板
    }
    // public function page(){
    //     $User = M('User'); // 实例化User对象
    //     $count      = $User->count();// 查询满足要求的总记录数
    //     $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    //     $show       = $Page->show();// 分页显示输出// 进行分页数据查询 
    //     //注意limit方法的参数要使用Page类的属性
    //     $list = $User->limit($Page->firstRow.','.$Page->listRows)->select();
    //     return $list;
        
    // }
    //ajax删除
    public function del(){
        $id = $_POST['id'];
        $model = D("user");
        $res = $model->del($id);
        $User = M('User'); // 实例化User对象
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 
        //注意limit方法的参数要使用Page类的属性
        $list = $User->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('data',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display("del");
        // return $res;
    }


    //ajax搜索
    public function sou(){
        $search = $_POST['data'];
        $User = M('User'); // 实例化User对象
        $count      = $User->where("`user` like '%$search%'")->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出// 进行分页数据查询 
        //注意limit方法的参数要使用Page类的属性
        $list = $User->limit($Page->firstRow.','.$Page->listRows)->where("`user` like '%$search%'")->select();
        $this->assign('data',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display("sou");
    }




}
