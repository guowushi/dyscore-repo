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
<title>所有学生信息</title>
<script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/libs/bootstrap/css/bootstrap.css">

<style type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
</style>
</head>

<body>


<form action="" method="post">
选择学校：
<select name="SchoolName">
		 <?php 
	
	/*
		定义查询语句,执行该$sql语句，并获去所有记录放到一个二维数组$rows中
	*/
	$sql="select * from schools ";  	
	$rows=$database->query($sql)->fetchAll();
	$row_number=1;	
	// 遍历数组，每行就表示一条记录。访问记录的字段可以使用 $row['字段名']或$row[1]的格式
	foreach($rows  as $row)
		{
  ?>
           <option value="<?php echo $row["ID"];  ?>"><?php echo $row["ID"].$row["SchoolName"];  ?></option>
         <?php
                }
			?>
         </select>
选择年级：<select name="Level">
  <option>初一</option>
  <option>初二</option>
  <option>初三</option>
</select>
选择班级：
<select name="Classname">
		 <?php 
	
	/*
		定义查询语句,执行该$sql语句，并获去所有记录放到一个二维数组$rows中
	*/
	$sql="select * from classes ";  	
	$rows=$database->query($sql)->fetchAll();
	$row_number=1;	
	// 遍历数组，每行就表示一条记录。访问记录的字段可以使用 $row['字段名']或$row[1]的格式
	foreach($rows  as $row)
		{
  ?>
           <option value="<?php echo $row["ID"];  ?>"><?php echo $row["Classname"];  ?></option>
         <?php
                }
			?>
         </select>

<input name="BtnSearch" type="submit" value="查找"/>
<input value="新增" type="button" name="BtnNew" />
<input value="导出" type="button" name="BtnExport" />
<input value="导入" type="button" name="BtnImport" onclick="window.location='importxls.php'"/>
</form>

<table width="100%" border="1" >
<caption>所有学生信息</caption>
  <tr>
    <th scope="col">编号</th>
    <th scope="col">学号</th>
    <th scope="col">姓名</th>
    <th scope="col">年级</th>
    <th scope="col">班级编号</th>
    <th scope="col">操作</th>
  </tr>
  <?php 
	
	/*
		定义查询语句,执行该$sql语句，并获去所有记录放到一个二维数组$rows中
	*/
	$sql="select * from students ";  	
	$rows=$database->query($sql)->fetchAll();
	$row_number=1;	
	// 遍历数组，每行就表示一条记录。访问记录的字段可以使用 $row['字段名']或$row[1]的格式
	foreach($rows  as $row)
		{
  ?>
  <tr>
    <td><?php  echo $row_number;?></td>
   <td><?php  echo $row["StudentCode"];?></td> 
     <td><?php  echo $row["StudentName"]; ?></td> 
     <td><?php  echo $row["StudentLevel"]; ?></td> 
    <td><?php  echo $row["ClassID"]; ?></td> 
     <td><a href="StudentForm.php?id=<?php  echo $row["ID"]; ?>">编辑</a> |  <a href="StudentDel.php?id=<?php  echo $row["ID"]; ?>">删除</a></td>
  </tr>
  <?php
    $row_number=$row_number+1;
  } 
  ?>
</table>


</body>
</html>