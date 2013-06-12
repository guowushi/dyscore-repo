<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>录入班级信息</title>
</head>

<body> 
<!--?php
$con = mysql_connect("localhost");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_db", $con);

$sql="INSERT INTO person (FirstName, LastName, Age)
VALUES
('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con)
?-->

<?php
 
 require_once dirname(__FILE__) .  '/../conn.php'; 

 //获取要删学校的ID
 
    $ID=$_GET["SchoolID","Level","ClassesName"];
    
 	$sql="INSERT INTO classes (SchoolID, Level, ClassName)
VALUES
('$_POST[SchoolID]','$_POST[Level]','$_POST[ClassName]')";
    
    //处理一条SQL语句，并返回所影响的条目数
    $cnt=$db->exec($sql);
    alert("录入成功！","classesForm.html");
	 
?>
</body>
</html>
