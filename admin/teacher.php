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
<title>各校教师信息表</title>
<style type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
.head{font-size:18px; float:left; margin:10px;}
</style>
</head>


<body>
 <form method="post" action="">
      <h1>各校教师信息表</h1>
      <div class="head">
      <label>请选择教师所属学校：</label>
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
           <option value="<?php echo $row["SchoolCode"];  ?>"><?php echo $row["ID"].$row["SchoolName"];  ?></option>
         <?php
                }
			?></select>
      </div>
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
	
  <tr>
    <th scope="col" name="ID">编号</th>
    <th scope="col" name="TeacherCode">教师编号</th>
    <th scope="col" name="TeacherName">教师真实姓名</th>
    <th scope="col" name="Email">教师邮件</th>
    <th scope="col" name="Username">教师账号</th>
    <th scope="col" name="Password">教师密码</th>
    <th scope="col" name="Items">教授科目</th>
    <th scope="col" name="caozuo">操作</th>
  </tr>
  <?php 
	
	/*
		定义查询语句,执行该$sql语句，并获去所有记录放到一个二维数组$rows中
	*/
	$sql="select * from teachers ";  	
	$rows=$database->query($sql)->fetchAll();
	$row_number=1;	
	// 遍历数组，每行就表示一条记录。访问记录的字段可以使用 $row['字段名']或$row[1]的格式
	foreach($rows  as $row)
		{
  ?>
  <tr>
    <td><?php echo $row_number;?></td>
    <td><?php echo $row['TeacherCode'];?></td>
    <td><?php echo $row['TeacherName'];?></td>
    <td><?php echo $row['Email'];?></td>
    <td><?php echo $row['Username'];?></td>
    <td><?php echo $row['Password'];?></td>
    <td><?php echo $row['Items'];?></td>
    <td><a href="teacherForm.php?id=<?php  echo $row["ID"]; ?>">修改</a>|<a href="teacherDel.php?id=<?php  echo $row["ID"]; ?>">删除</a></td>
  </tr>
     <?php
    $row_number=$row_number+1;
  }
  
  ?>
  
   <p><a href="teacherForm.php">
    <input type="button" value="添加"  /> 
   </a></p>
 </form>
</body>
</html>
