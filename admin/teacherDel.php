<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除记录</title>
</head>

<body>
<?php
 require_once dirname(__FILE__) .  '/../conn.php'; 

 //获取要删学校的ID
 
    $ID=$_GET["id"];
    
 	$sql="DELETE  FROM teachers WHERE ID =".$ID;
    
    //处理一条SQL语句，并返回所影响的条目数
    $cnt=$db->exec($sql);
    alert("删除成功！","teachers.php");

?>
</body>
</html>