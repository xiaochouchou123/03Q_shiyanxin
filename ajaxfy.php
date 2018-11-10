<?php 
header("content-type:text/html;charset=utf-8");
mysql_connect('127.0.0.1','root','196001');
mysql_select_db('day7-13');
mysql_query("set names utf-8");
$page=isset($_GET['page'])?$_GET['page']:1;
$pagesize=isset($_GET['pagesize'])?$_GET['pagesize']:3;
$sql="select * from z_table";
$res=mysql_query($sql);
$num=mysql_num_rows($res);
$end=ceil($num/$pagesize);
$up=$page-1<1?1:$page-1;
$down=$page+1>$end?$end:$page+1;
$limit=($page-1)*$pagesize;
$s_sql="select * from z_table limit $limit,$pagesize";
$s_res=mysql_query($s_sql);
$data=array();
while ($arr=mysql_fetch_assoc($s_res)) {
	$data[]=$arr;
}


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>展示</title>
 </head>
 <body>
 	<center>
 		<form action="">
 			<table border="1">
 				<tr>
 					<td>ID</td>
 					<td>用户名</td>
 					<td>性别</td>
 					<td>年龄</td>
 					<td>班级</td>
 					<td>操作</td>
 				</tr>
 				<tbody id="box">
 				<?php 
 				foreach ($data as $key => $value) {
 				?>	
 				<tr>
 					<td><?php echo $value['id'] ?></td>
 					<td><?php echo $value['user'] ?></td>
 					<td><?php echo $value['sex'] ?></td>
 					<td><?php echo $value['age'] ?></td>
 					<td><?php echo $value['class'] ?></td>
 					<td><a href="">删除</a></td>
 				</tr>
 				<?php } ?>
 				<tr>
 				<td colspan="6">
 				当前是第<font color="red"><?php echo $page;?>/<?php echo $end;?></font>页，每页显示<font color="red"><?php echo $pagesize?></font>条数据，一共有<font color="red"><?php echo $end ?></font>页.	
 				</td>
 				</tr>
 				<tr>
 					<td colspan="6" align="center">
 						<a href="javascript:void(0)" onclick="page(1)">首页</a>
 						<a href="javascript:void(0)" onclick="page(<?php echo $up?>)">上一页</a>
 						<a href="javascript:void(0)" onclick="page(<?php echo $down?>)">下一页</a>
 						<a href="javascript:void(0)" onclick="page(<?php echo $end?>)">尾页</a>
 					</td>
 				</tr>
 				</tbody>
 				 
 				
 			</table>
 		</form>
 	</center>
 </body>
 </html>
 <script>
 //p是把4个点击事件都传过来，当然也可以设置四个点击事件，这个事件影响连接的页面。
 function page(p){
var ajax = new XMLHttpRequest();
ajax.open('get','show.php?page='+p,true);
ajax.send();
ajax.onreadystatechange=function(){
	if (ajax.readyState==4&&ajax.status==200) {
			document.getElementById('box').innerHTML=ajax.responseText;
		}
}
}
 </script>
