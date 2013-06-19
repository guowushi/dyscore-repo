<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>保存记录</title>
</head>
<body>
<?php
	
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
	

	// (1)获取表单输入,将所有字段的值存入一个key=>value数组中；key需要和字段名一致，value与表单命名一致
	$row=array();
	$row['SchoolCode']=$_POST['SchoolCode'];
	$row['SchoolName']=$_POST['SchoolName'];
	$row['Region']=$_POST['Region'];
	
    //(2)区分是保存还是新增加
    $id=$_POST['id'];
	if($id){
		//修改代码，参数1：表名；参数2：值；参数3：条件
		$database->update("schools", $row, ["id" => $id]);
	}else{
		// 新增代码
		$last_user_id = $database->insert("schools", $row);
	}
	//(3) 跳转
	alert("修改成功","/admin/school.php");
 ?>
 </body>
</html>
