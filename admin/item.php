<?php
 	require_once dirname(__FILE__) . '/../conn.php';
	require_once dirname(__FILE__) . '/../libs/medoo.min.php'; 
	$database = new medoo("dyscore");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>各校信息</title>
<style type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
</style>
</head>

<body>

<h1 class="tableHeader">课程信息</h1>
<form  class="ButtonBanner"   name="form1" method="post" action="">
  <input type="submit" name="button" id="button" value="添加课程" />
</form>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <th scope="col"><input type="checkbox" class="SelectAll"></th>
	<th scope="col">编号</th>
    <th scope="col">课程代码</th>
    <th scope="col">课程名称</th>
    <th scope="col">操作</th>
  </tr>
  
  <?php 
  	
	
	$sql="select * from items ";
	$rows=$database->query($sql)->fetchAll();
	
	$i=1;
	foreach($rows  as $row)
		{
  ?>
  <tr>
    <td><input type="checkbox" class="Selected"></td>
	<td><?php  echo $i; ?></td>
    <td><?php  echo $row["ItemCode"]; ?></td>  
    <td><?php  echo $row["ItemName"]; ?></td>
     <td><a href="SchoolForm.php?id=<?php  echo $row["ItemID"]; ?>">编辑</a> |  <a href="schoolDel.php?id=<?php  echo $row["ItemID"]; ?>">删除</a></td>
  </tr>
  
  <?php
    $i=$i+1;
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
