<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
body{font-size:12px;}
th{ padding-top:5px;padding-bottom:5px;}
</style>
</head>

<body>


<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FFFFFF"><B>
    <td colspan="6"><form id="form1" name="form1" method="post" action="">
     姓名搜索
        <input type="text" name="textfield" id="textfield" />
        <input name="button" type="submit" id="button" value="搜索" />
      
    </form>    </td>
    </B>
  </tr>
  
</table>

 
  
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
 
  <tr align="center" bgcolor="#CCCCCC">
    <th>编号</th>
    <th>班级</th>
    <th>姓名</th>
    <th>性别</th>
    <th>出生日期</th>
    <th>民族</th>
    <th>身份证号码</th>
	<th>身份证号码</th>
  </tr>
   <?php
require_once dirname(__FILE__) . '/common.php';
require_once dirname(__FILE__) . '/student.class.php';


$query_sql = "SELECT * FROM students Order By classes,studentName";
// 执行sql语句，得到一个结果集合
$rs = $db->query($query_sql);
// 获取第一行
$i=0;
while($row = $rs->fetch()){

  $i++;
  ?>
  <tr align="center" bgcolor="#FFFFFF">
	<td><?php  echo $i;  ?></td>
    <td><?php  echo $row["StudentName"];  ?></td>
    <td><?php  echo $row["StudentName"];  ?></td>
    <td><?php  echo $row["StudentName"];  ?></td>
    <td><?php  echo $row["StudentName"];  ?></td>
    <td><?php  echo $row["StudentName"];  ?></td>
    <td><?php  echo $row["StudentName"];  ?></td>
	<td><a href="detail.php?id=<?php  echo $row["ID"];  ?>" target="_blank">查看详细信息</a></td>
  </tr>
 <?php
 }
 ?>
</table>
</body>

</html>
