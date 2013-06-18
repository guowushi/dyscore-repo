<?php
	
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
	
 ?>
<?php

	//获取传递过来的记录唯一编号
	$id= !empty($_GET['id']) ? $_GET['id']:'';
	if($id){
		/* 
		查找指定Id的记录.
		参数1：表名；
		参数2：字段组成的数组；
		参数3：数组格式的条件。如[id[>]=>10]表示id>10
		返回结果是一个二维数据
		*/
		$datas = $database->select("classes", [	"SchoolID","Classname"], ["id" => $id]);
		//获取第一行
		$data=$datas[0]; 
	}
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>录入班级信息</title>
<link href="../css/common.css" type="text/css" rel="stylesheet">
</head>

<body> 
<form action="classesAdd.php" method="post">
<table width="1024 " border="0" cellspacing="1" cellpadding="0">
    <h1 align="center">录入班级信息</h1>
	<br/><br/>
  <tr>
       <td>学校：<select name="SchoolCode">
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
			?>
         </select>
      </td>
          <td>年级:<select name="ClassLevel" id="Level"><option name="Level" value="1">初一</option>
		  <option name="Level" value="2">初二</option><option name="Level" value="3">初三</option></select></td>
             <td>班级:<input type="text" name="Classname" id="Classname" value="<?php  echo $data['Classname']; ?>"/></td>
  
  </tr>
  </table>
  <input name="id" type="hidden" value="<?php echo $id;?>"/>
<input type="submit" name="button2" id="button2" value="提交" />
<input type="reset" name="button" id="button" value="退出" /></form>
</body>
</html>
