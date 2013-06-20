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
 <form action="" method="post">
  <p>请选择年级、班级、科目筛选数据 </p>
  <p>年级：
    <select name="">
    <?php 
	  foreach($conf["levels"] as $level){
	    echo "<option value='$level'>$level</option>";	  
	  }
	 ?>
     
    </select>   
   班级：
  <select name="Classname">
   	 
   	 <?php 
	  $sql="select * from classes  ";
	  // $sql.=" Where schoolID=".$currentSID;
	   $rows=$database->query($sql);
	   foreach($rows as $row){
		   echo "<option value='".$row['Classname']."'>".$row['Classname']."</option>";
	   }
  ?>
     
     
     
  </select>
      科目：
    <select name="Item">
      <option  name="Chinese">语文</option>
      <option  name="Math">数学</option>
      <option name="English">英语</option>
      <option name="Physical">物理</option>
      <option name="Chemisty">化学</option>
      <option name="Biological">生物</option>
      <option name="Polities">政治</option>
      <option name="History">历史</option>
      <option name="Geography">地理</option>
      </select>
    <input name="input" type="submit" / value="筛选" />
  </p>
</form>

  
  
  <form method="POST" action="inputSave.php"> 
  <p align="center">xx学期xx课程xx班级 学生成绩录入</p> 
  <table  border="0" cellspacing="1 " cellpadding="0 " width="100%">
  <tr>
    <th name="ID" width="76" scope="col">编号</th>
    <th name="SchoolID" width="76" scope="col">学号</th>
    <th width="76" name="StudentsNane" scope="col">姓名</th>
    <th width="84" name="Chinese" scope="col">语文</th>
    <th width="84" name="Math" scope="col">数学</th>
    <th width="84" name="English" scope="col">英语</th>
    <th width="84" name="Physical" scope="col">物理</th>
    <th width="84" name="Chemisty" scope="col">化学</th>
    <th width="84" name="Biological" scope="col">生物</th>
    <th width="84" name="Polities" scope="col">政治</th>
    <th width="84" name="History" scope="col">历史 </th>
    <th width="84"  name="Geography"scope="col">地理</th>
  </tr>
  <?php 
	  
	  //(1)获取任务ID获取当前课程信息
	  $lesson_id=$_GET['lesson'];
	  $sql="SELECT * FROM  lessons ";
	  $sql.="  WHERE ID=".$lesson_id;  
	  $lesson=$database->get($sql);
	  
	   
	  //(2)根据班级编号获取班级信息
		$classid=$lesson['ClassID']; 
	   $sql=" SELECT * FROM Classes  ";  
	   $sql.="  WHERE ClassCode=".$classid;  
	  
	  //(3)获取该班级中所有学生的编号

	  $sql="SELECT ID FROM students ";  
	  $sql.=" WHERE ClassCode=".$classid;  
	  echo $sql;
	  $student_ids=$database->query($sql);
	  
	  //(4)获取学生的成绩信息
	  $sql="select * from Scores  ";
	  $sql.=" Where StudentID in(".implode(",", $student_ids).")";
	  echo $sql;
	   $rows=$database->query($sql);
	   $num=1;
	   
	   
	   
	   foreach($rows as $row){
			$current_student_id=$row['StudentID'];
			
			$student_info=$database->get("students",['ID','StudentID','StudentName','ClassID'],['ID'=>$current_student_id]);
	   
  ?>
  <tr>
    <td><?php echo $num;?></td>
    <td><?php echo $student_info['StudentID'];?></td>
    <td><?php echo $student_info['StudentName'];?></td>
    <td> 
      <input name="Chinese['<?php echo $current_student_id; ?>']" type="text"  class="scoreWidth"  />
     </td>
    <td> 
     
      <input name="Math['<?php echo $current_student_id; ?>']" type="text"  class="scoreWidth"/>
    </td>
    <td> 
      
      <input name="English['<?php echo $current_student_id; ?>']" type="text" class="scoreWidth" />
    </td>
    <td> 
      
      <input name="Politics['<?php echo $current_student_id; ?>']" type="text" class="scoreWidth" />
     </td>
    <td> 
     
      <input name="History['<?php echo $current_student_id; ?>']" type="text" class="scoreWidth"/>
     </td>
    <td> 
      
      <input name="Geography['<?php echo $current_student_id; ?>']" type="text" class="scoreWidth" />
    </td>
    <td> 
    
      <input name="Biological['<?php echo $current_student_id; ?>']" type="text" class="scoreWidth" />
    </td>
    <td> 
     
      <input name="Physical['<?php echo $current_student_id; ?>']" type="text" class="scoreWidth" />
    </td>
    <td> 
      
      <input name="Chemistry['<?php echo $current_student_id; ?>']" type="text" class="scoreWidth" />
  </td>
  </tr>
  <?php
	$num=$num+1;
  }
  ?>
  
</table>
  <input type="submit"   value="保存" />
  <input type="submit"   value="提交锁定" />
  <input type="button"   value="返回" />
</form>

 
</body>
</html>
