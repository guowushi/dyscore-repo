<?php
	
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件	
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看本校学生成绩</title>
<style type="text/css">

</style>
</head>
<body>

<div class="p">

    <p>请选择年级:
<select name="Level">
	<?php
		foreach($LEVEL as $l){
			echo "<option value=".$l.">".$l."</option>";
		}
	
	?>
</select>
&nbsp;&nbsp;请选择班级：
<select name="Classname">
<?php 
$current_school=$_SESSION['school']['SchoolCode'];
function getClasses($sid,$classid){
	global $database;
	$sql="select * from classes ";
	if(!empty($sid)){
		$sql.=" WHERE SchoolCode=".$sid;
	}
	$rows=$database->query($sql)->fetchAll();
	foreach($rows  as $row){
        echo   "<option value=".$row['ID'].">".$row['Classname']."</option>";
    }   
    
}
 getClasses($current_school,'');
	?>
   </select>  
    
       <input type="submit" value="筛选" />
    </p>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th name="ID">编号</th>
    <th name="StudentID">学号</th>
    <th name="StudentName">姓名</th>
    <th name="Chinese">语文</th>
    <th name="Math">数学 </th>
    <th name="English">英语</th>
    <th name="Politics">政治</th>
    <th name="History">历史</th>
    <th name="Geography">地理</th>
    <th name="Biological">生物</th>
    <th name="Physical">物理</th>
    <th name="Chemistry">化学</th>
  </tr>
   <?php 
   
	$current_school=$_SESSION['school']['SchoolCode'];
	/*
		定义查询语句,执行该$sql语句，并获去所有记录放到一个二维数组$rows中
	*/
	$sql="select * from view_scores ";  
	$sql.="  WHERE SchoolCode=".$current_school;	
	$rows=$database->query($sql)->fetchAll();
	$row_number=1;	
	// 遍历数组，每行就表示一条记录。访问记录的字段可以使用 $row['字段名']或$row[1]的格式
	foreach($rows  as $row)
		{
  ?>
  
  <tr>
    <td><?php  echo $row["ID"];  ?></td>
    <td><?php  echo $row["StudentID"];  ?></td>
    <td ><?php  echo $row["StudentName"];  ?></td>
    <td ><?php  echo $row["Chinese"];  ?></td>
    <td ><?php  echo $row["Math"];  ?></td>
    <td ><?php  echo $row["English"];  ?></td>
    <td ><?php  echo $row["Politics"];  ?></td>
    <td ><?php  echo $row["History"];  ?></td>
    <td ><?php  echo $row["Geography"];  ?></td>
    <td ><?php  echo $row["Biological"];  ?></td>
    <td ><?php  echo $row["Physical"];  ?></td>
    <td ><?php  echo $row["Chemistry"];  ?></td>
  </tr>
  
  <?php
    $i=$i+1;
  }
  
  ?>
  
</table>
<div class="return">
  <input name="按钮" type="button" value="返回顶部"/>
  <input name="按钮" type="button" value="退出"/>
</div>

</body>
</html>
