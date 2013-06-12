<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>所有学生信息</title>
<style type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
</style>
</head>

<body>
<?php
 require_once dirname(__FILE__) .  '/../conn.php'; 
 ?>
<h1>所有学生信息</h1>
<form action="" method="post">
选择学校：<select name="SchoolID">
  <option>德阳八中</option>
  <option>德阳七中</option>

</select>
选择年级：<select name="Level">
  <option>初一</option>
  <option>初二</option>
  <option>初三</option>
</select>
选择班级：<select name="ClassID">
  <option>一班</option>
  <option>二班</option>
  <option>三班</option>
</select>


</form>
<table width="1024" border="1" cellspacing=" 0" cellpadding=" 0">
  <tr>
    <th scope="col">编号</th>
    <th scope="col">学号</th>
    <th scope="col">姓名</th>
    <th scope="col">年级</th>
    <th scope="col">班级</th>
    <th scope="col">操作</th>
  </tr>
<?php 
  	$sql="select * from students ";
		$rs = $db->query($sql);
		$i=1;
		while($row = $rs->fetch())
		{
			
			
		 
		
  
  ?>
  <tr>
    <td><?php  echo $i;?></td>
   <td><?php  echo $row["StudentID"];?></td> 
     <td><?php  echo $row["StudentName"]; ?></td> 
     <td><?php  echo $row["Level"]; ?></td> 
    <td><?php  echo $row["ClassID"]; ?></td> 
     <td><a href="#">编辑</a> |  <a href="StudentDel.php?id=<?php  echo $row["ID"]; ?>">删除</a></td>
  </tr>
  
  
  <?php
    $i=$i+1;
  }
  
  ?>
</table>


</body>
</html>