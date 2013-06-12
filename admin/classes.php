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
  <?php
 require_once dirname(__FILE__) .  '/../conn.php'; 
 
 
 ?>
   <form method="post" action="">
      <h1>各校班级信息表</h1>
      <div class="head">
      <label>请选择学生所属学校：</label>
      <select>
      <option>德阳七中</option>
      <option>德阳七中</option>
      <option>德阳七中</option>
      </select>
      <label>请选择学生师所属年级：</label>
      <select>
      <option>初一</option>
      <option>初二</option>
      <option>初三</option>
      </select>
      </div>
  <table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <th scope="col" name="ID">编号</th>
    <th scope="col" name="SchoolID">学校名称</th>
    <th scope="col" name="Classname">班级名称</th>
	<th scope="col" name="ClassDel">删除班级信息</th>
  </tr>
   <?php 
  	$sql="select * from classes ";
		$rs = $db->query($sql);
		$i=1;
		while($row = $rs->fetch())
		{
			
			
		 
		
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $row['SchoolID'];?></td>
    <td><?php echo $row['Classname'];?></td>
	<td><a href="#">编辑</a> |  <a href="ClassDel.php?id=<?php  echo $row["ID"]; ?>">删除</a></td>
  </tr>
  <?php
    $i=$i+1;
  }
  
  ?>
</table>

   </form>
</body>
</html>
