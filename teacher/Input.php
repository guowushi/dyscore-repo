<?php
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
	$conf=require_once( ROOT . '/inc/system.conf.php');  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/common.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成绩录入</title>
 <style type="text/css">
 table{ background-color:#000;}
 tr{ background-color:#FFF;}
 p{
	font-size:16px;
	font-weight:bold;
	
	
 
	 
}
input.scoreWidth{
	width:90%;
	border-bottom-width: 2px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-bottom-color: #800;
}

 </style>

<body>

<!--  下面是筛选表单  -->
 <form action="input.php" method="post">
  <p>学期
    <select name="term">
      <?php 
	  foreach($TERMS as $term){
	    echo "<option value='$term'>$term</option>";	  
	  }
	 ?>
    </select>
  </p>
</form>

  
  
  <form> 
  <p align="center">
	<?php echo !empty($_SESSION['school']['SchoolName'])?$_SESSION['school']['SchoolName']:""; ?>
	学校 教师开设课程情况</p> 
  <table  border="0" cellspacing="1 " cellpadding="0 " width="100%">
  <tr>
    <th name="ID" width="76" scope="col">编号</th>
    <th name="SchoolID" width="76" scope="col">教师编号</th>
    <th width="76" name="StudentsNane" scope="col">教师姓名</th>
    <th width="84" name="Chinese" scope="col">班级名称</th>
    <th width="84" name="Math" scope="col">班级人数</th>
    <th width="84" name="English" scope="col">课程名称</th>
    <th width="84"  name="Geography"scope="col">操作</th>
  </tr>
  <?php
  $sql="SELECT * FROM  lessons ";
   $sql="SELECT * FROM  lessons ";
  $rows=$database->query($sql);
  $num=1;
  foreach($rows as $row){
  
	// 跟据教师编号获取教师信息
		$teacher_info=$database->get("teachers",$SCHEMAS['teachers'],['ID'=>$row['TeacherID']]);
	
	// 根据班级编号获取班级信息
	    $class_info=$database->get("classes",$SCHEMAS['classes'],['ClassCode'=>$row['ClassID']]);
		//$class_info=$database->get("classes",$SCHEMAS['classes'],['ID'=>$row['ClassID']]);
	//根据班级编号统计班级人数
	 // $count = $database->count("students", ["classID"=>$row['ClassID']]);55010301
	 $count = $database->count("students", ["classID"=>$row['ClassID']]); 
  ?>
  <tr>
    <td><?php echo $num; ?></td>
    <td><?php echo $row['TeacherID']; ?></td>
    <td><a href="#" title="<?php echo $teacher_info['TeacherName']; ?>"> <?php echo $teacher_info['TeacherName']; ?></a></td>
    <td><a href="#" title="<?php echo $class_info['ClassName']; ?>">  <?php echo $class_info['ClassName']; ?> </a></td>
    <td><?php echo $count; ?></td>
    <td><?php echo $row['Lesson']; ?></td>
    <td><a href="classInput.php?lesson=<?php echo $row['ID']; ?>">成绩管理</a></td>
  </tr>
  <?php } ?>
</table>
</form>

 
</body>
</html>
