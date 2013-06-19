<?php
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除记录</title>
</head>

<body>
<?php
 /*require_once dirname(__FILE__) .  '/../conn.php'; 

 //获取要删学校的ID
 
    $ID=$_GET["id"];
    
 	$sql="DELETE  FROM teachers WHERE ID =".$ID;
    
    //处理一条SQL语句，并返回所影响的条目数
    $cnt=$db->exec($sql);
    alert("删除成功！","teachers.php");*/
?>
 <?php
	//获取要删学校的ID，ID统一使用自动编号的主键.注意大小写
    $ID=$_GET["id"];
	// 定义并执行删除的SQL语句
 	$sql="DELETE  FROM teachers WHERE ID =".$ID;
	$database->query($sql);
	// 也可以使用$database->delete("account", ["ID" =>$ID]);
	// 执行后，跳转到school.php页面
    alert("删除成功！","teacher.php");

?>
</body>
</html>