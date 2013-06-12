<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>untitle</title>
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

 //获取要删班级的ID
 
    $ID=$_GET["id"];
    
 	$sql="DELETE  FROM classes WHERE ID =".$ID;
    
    //处理一条SQL语句，并返回所影响的条目数
    $cnt=$db->exec($sql);
    alert("删除成功！","classes.php");
	 
?>
</body>
</html>
