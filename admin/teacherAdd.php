<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除记录</title>
</head>

<body>
<?php
 require_once dirname(__FILE__) .  '/../conn.php'; 
 
 //--------------------------
 $items=$_POST[Items];
 $str_items=implode(',',$items);
 
 
 //--------------------------
 
$sql="INSERT INTO teachers (SchoolID,TeacherID,TeacherName,Email,Username,Password,Items) VALUES(" ;

$sql=$sql."'$_POST[SchoolID]','$_POST[TeacherID]','$_POST[TeacherName]','$_POST[Email]','$_POST[Username]','$_POST[Password]','$str_items')";
$cnt=$db->exec($sql);
 alert("添加成功！","teacherForm.php");
mysql_close($con)
?>
?>
</body>
</html>