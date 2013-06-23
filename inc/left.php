<?php 
 session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
body{
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color:#fefefe;
    border-color: -moz-use-text-color;
    border-image: none;
    border-radius: 0 0 0 0;
    border-style: none;
    border-width: 0 0 medium;
    margin: 0;
    padding: 0 1em;
	font-size:12px;
}
ul,li{
	padding:0;
	margin:0px;	
}
li{
	list-style:none;
	height:24px;
	line-height:24px;
}
ul{
	margin-top:14px;
}
</style>
</head>

<body>
<br/>

<!-- 超级管理员的菜单 -->
<?php 
//  if($_SESSION['usertype']=='1'){
?>
<ul>
<li><a href="/admin/school.php" target="mainFrame">学校管理</a></li>
<li><a href="/admin/admin.php" target="mainFrame">学校管理员设置</a></li>

</ul>
<hr/>
<?php 
  //}
?>


<?php 
 // if($_SESSION['usertype']=='2'){
?>
<ul>
<!-- 学校管理员的菜单 -->
<li><a href="/admin/student.php" target="mainFrame">学生管理</a></li>
<li><a href="/admin/classes.php" target="mainFrame">班级管理</a></li>
<li><a href="/admin/teacher.php" target="mainFrame">教师管理</a></li>
<li><a href="/admin/lesson.php" target="mainFrame">课程管理</a></li>
<li><a href="/admin/scores.php" target="mainFrame">成绩解锁</a></li>
</ul>
<hr/>
<?php 
 // }
?>



<?php 
 // if($_SESSION['usertype']=='3'){
?>
<!-- 教师的菜单 -->
<ul>
	<li><a href="/teacher/input.php" target="mainFrame">成绩录入</a></li>
	<li><a href="/admin/classes.php" target="mainFrame">班级管理</a></li>
</ul>
<hr/>
<?php 
 // }
?>

<?php 
  //if($_SESSION['usertype']=='4'){
?>
<!-- 学生的菜单 -->
<ul>
<li><a href="/teacher/input.php" target="mainFrame">个人信息录入</a></li>
</ul>
<?php 
  //}
?>
<ul>
	<li><a href="/logout.php">退出</a></li> 
</ul>
</body>
</html>
