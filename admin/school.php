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
<?php
 require_once dirname(__FILE__) .  '/../conn.php'; 
 ?>
<h1>所有学校信息</h1>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <th scope="col">编号</th>
    <th scope="col">学校代码</th>
    <th scope="col">所属区域</th>
    <th scope="col">学校名称</th>
     <th scope="col">操作</th>
  </tr>
  
  <?php 
  	$sql="select * from schools ";
		$rs = $db->query($sql);
		$i=1;
		while($row = $rs->fetch())
		{
			
			
		 
		
  
  ?>
  <tr>
    <td><?php  echo $i; ?></td>
    <td><?php  echo $row["SchoolID"]; ?></td>    <td><?php  echo $row["Region"]; ?></td>
    <td><?php  echo $row["SchoolName"]; ?></td>
     <td><a href="#">编辑</a> |  <a href="schoolDel.php?id=<?php  echo $row["ID"]; ?>">删除</a></td>
  </tr>
  
  <?php
    $i=$i+1;
  }
  
  ?>
  
</table>
<form id="form1" name="form1" method="post" action="">
  <input type="submit" name="button" id="button" value="添加学校" />
</form>
<p>&nbsp;</p>
</body>
</html>
