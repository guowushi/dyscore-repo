<?php
	
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	//echo $_SERVER["DOCUMENT_ROOT"].'/global.inc';	
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>各校信息</title>
<link rel="stylesheet" type="text/css" href="/libs/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/css/reset.css">


<style type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
</style>
</head>

<body>

<h1 class="tableHeader">所有学校信息</h1>
<form  class="ButtonBanner"   name="form1" method="post" action="">
  <input type="submit" name="button" id="button" value="添加学校" />
</form>
<table  class="table" width="90%">
  <tr>
    <th scope="col"><input type="checkbox" class="SelectAll"></th>
	<th scope="col">编号</th>
    <th scope="col">学校代码</th>
    <th scope="col">所属区域</th>
    <th scope="col">学校名称</th>
	 <th scope="col">班级数量</th>
	  <th scope="col">学生数量</th>
    <th scope="col">操作</th>
  </tr>
  
  <?php 
	
	/*
		定义查询语句,执行该$sql语句，并获去所有记录放到一个二维数组$rows中
	*/
	$sql="select * from schools ";  	
	$rows=$database->query($sql)->fetchAll();
	$row_number=1;	
	// 遍历数组，每行就表示一条记录。访问记录的字段可以使用 $row['字段名']或$row[1]的格式
	foreach($rows  as $row){
	
	// 根据学校编号查询下属班级和学生
	 $sid=$row["SchoolCode"];
	 $count_class= $database->count("classes", ["SchoolCode" => $sid]);
	 $count_student=$database->count("students", ["SchoolCode" => $sid]);
  ?>
  <tr>
    <td><input type="checkbox" class="Selected"></td>
	<td><?php  echo $row_number; ?></td>
    <td><?php  echo $row["SchoolCode"]; ?></td>    
	<td><?php  echo $row["Region"]; ?></td>
    <td><?php  echo $row["SchoolName"]; ?></td>
	<td><?php  echo $count_class; ?></td>
	<td><?php  echo $count_student; ?></td>
     <td><a href="SchoolForm.php?id=<?php  echo $row["ID"]; ?>">编辑</a> |  <a href="schoolDel.php?id=<?php  echo $row["ID"]; ?>">删除</a></td>
  </tr>
  
  <?php
    $row_number=$row_number+1;
  }
  
  ?>
  
</table>
<form  class="ButtonBanner"   name="form1" method="post" action="">
  <input type="submit" name="button" id="button" value="添加学校" />
  <span>共<?php echo count($rows);?>条记录</span>
</form>
<p>&nbsp;</p>
</body>
</html>
