<?php 
header("content-type:text/html;charset=utf-8");
//入口文件
// echo "<pre>";
// var_dump(__DIR__);die;
// 定义应用目录为当前目录
define('APP_PATH',__DIR__.'/');

//开启调试模式
define('APP_DEBUG',true);

//配置文件=链接数据库的配置
// require './config/config.php';

//加载框架入口文件
require './fastphp/fastphp.php';

//启动框架
$fastobj = new Fastphp();
$fastobj->run();
// $aa = APP_PATH."Application/{$class}".Controller.".php";
// print_r($arr["controller"]);die;
// $obj1 = new $arr["controller"]();
// $obj1->$arr["action"]();
// $obj = new Controller();
// $obj->go();





 ?>