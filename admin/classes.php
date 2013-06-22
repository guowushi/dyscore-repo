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
<title>各校班级信息表</title>
<style type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
.head{font-size:18px; float:left; margin:10px;}
</style>
</head>

<body>
   <form method="post" action="">
      <h1>各校班级信息表</h1>
      <div class="head">
       
      <label>请选择学生师所属年级：</label>
      <select>
      <option>初一</option>
      <option>初二</option>
      <option>初三</option>
      </select>
      </div>
  <table width="100%" class="table">
  <tr>
    <th scope="col" name="ID">编号</th>
    <th scope="col" name="SchoolID">学校名称</th>
    <th scope="col" name="Classname">班级名称</th>
	<th scope="col" name="ClassDel">删除班级信息</th>
  </tr>
  <?php 
	$current_school=$_SESSION['school']['SchoolCode'];
	/*
		定义查询语句,执行该$sql语句，并获去所有记录放到一个二维数组$rows中
	*/
	$sql="select * from classes "; 
	$sql.="  WHERE SchoolCode =".$current_school;   	
	$rows=$database->query($sql)->fetchAll();
	$row_number=1;	
	// 遍历数组，每行就表示一条记录。访问记录的字段可以使用 $row['字段名']或$row[1]的格式
	foreach($rows  as $row)
		{
  ?>
  <tr>
    <td><?php echo $row_number;?></td>
	<?php
	   //  当前记录的学校编号 $row['SchoolID']
	   $sql="select * from Schools Where  SchoolCode=".$row['SchoolCode'] ; 
        //var_dump($sql);		
		$row1=$database->query($sql)->fetchAll();
		//var_dump($row1);
		//$row1['SchoolName'];
	
	?>
    <td><?php echo $row1[0]['SchoolName'];?></td>
    <td><?php echo $row['Classname'];?></td>
	<td><a href="classesForm.php?id=<?php  echo $row["ID"]; ?>">编辑</a> |  <a href="classDel.php?id=<?php  echo $row["ID"]; ?>">删除</a></td>
  </tr>
  <?php
    $row_number=$row_number+1;
  } 
  ?>
</table>

   </form>
</body>
</html>
