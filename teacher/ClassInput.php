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
<link rel="stylesheet" type="text/css" href="/libs/bootstrap/css/bootstrap.css">
<title>成绩录入</title>
 <style type="text/css">
  
 p{
	font-size:16px;
	font-weight:bold;
}
input.scoreWidth{
	width:40px;
	border-bottom-width: 2px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-bottom-color: #800;
	margin:0px;
}

 </style>

<body>


  
  <form method="POST" action="inputSave.php"> 
  <p align="center">xx学期xx课程xx班级 学生成绩录入</p> 
  <table  class="table" width="100%">
  <tr>
    <th   width="76" scope="col">编号</th>
	<th   width="76" scope="col">学期</th>
	<th   width="76" scope="col">科目</th>
    <th   width="76" scope="col">学号</th>
    <th width="76"   scope="col">姓名</th>
    <th width="84"  scope="col">成绩</th>
   
  </tr>
  <?php 
	  
	  //(1)获取任务ID获取当前课程信息
	  $lesson_id=$_GET['lesson'];
	  $lesson=$database->get('lessons',$SCHEMAS['lessons'],['ID'=>$lesson_id]);
	  //var_dump($lesson);
	   
	  //(2)根据班级编号获取班级信息
		$classid=$lesson['ClassID']; 
	   $sql=" SELECT * FROM Classes  ";  
	   $sql.="  WHERE ClassCode=".$classid;  
	  
	  //(3)获取该班级中所有学生的编号

	  $sql="SELECT ID FROM students ";  
	  $sql.=" WHERE ClassID=".$classid;  
	 // echo $sql;
	  $student_ids=$database->query($sql)->fetchAll(PDO::FETCH_COLUMN,0);;
	  // var_dump($student_ids);
	  //(4)获取该班级所有学生信息
	  $sql="select * from students  ";
	  $sql.=" Where ID in(".implode(",", $student_ids).")";
	  //echo $sql;
	   $rows=$database->query($sql);
	   $num=1;
	   
	   
	   
	   foreach($rows as $row){
			//当前学号
			$current_student_id=$row['ID']; 
			//当前学期
			$current_term=$lesson['Term'];
			//当前科目名称
			$current_item=$lesson['Lesson'];

			/*	从成绩表里获取当前学生，当前学期，当前科目的成绩。
				情况1：有且没有锁定，则用文本框显示。保存则是修改原成绩
			 	情况2：没有（没有锁定），则用文本框显示，保存则新增
				情况3：有且锁定。直接显示，不允许修改
			*/
			
			//$fields=[];
			
			$item_name= array_flip($KM)[$current_item];
			
				 $sql=" SELECT ID,StudentID,Term,";
				 $sql.=$item_name." as Item,".$item_name."Status as status FROM scores";
				 $sql.=" WHERE StudentID=".$current_student_id;
				 $sql.=" AND  Term='".$current_term."'";
		

			$student_score=$database->query($sql)->fetch();
			 

	   
  ?>
  <tr>
	
    <td><?php echo $num;?><input type="hidden" name="SID[]" value="<?php echo $current_student_id; ?>"></a></td>
	 <td><?php echo $current_term;?></td>
	 <td><?php echo $current_item;?></td>
    <td><?php echo $row['StudentCode'];?></td>
    <td><?php echo $row['StudentName'];?></td>
    <td>
	<?php
	if($student_score && $student_score['status']=='1'){
				//情况3
				
			 echo $student_score['Item'];
			
			}else{
			?>
			 <input name="score[<?php echo $current_student_id; ?>]" type="text"  class="scoreWidth"   value="<?php echo $student_score['Item'] ?>" />
		<?php
			}
			 //var_dump($student_score);
	
	
	?>
	 
      
	  
	 
    
      
  </td>
  </tr>
  <?php
	$num=$num+1;
  }
  ?>
  
</table>
	<input type="hidden" value="<?php echo $current_item; ?>" name="item" />
  <input type="hidden" value="<?php echo $current_term; ?>" name="Term" />
  <input type="submit"   value="保存" />
  <input type="submit"   value="提交锁定" />
  <a href="/teacher/input.php">返回</a>
</form>

 
</body>
</html>
