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
			//获取当前学生，当前学期的成绩
			
			//$fields=[];
			$filters=[
				'AND'=>[
						'StudentID'=>$current_student_id,
						'Term'=>$current_term
					]
				];
			$student_score=$database->get("scores",$SCHEMAS['scores'],$filters);
			 //var_dump($student_score);
			//
	   
  ?>
  <tr>
	
    <td><?php echo $num;?><input type="hidden" name="SID[]" value="<?php echo $current_student_id; ?>"></a></td>
    <td><?php echo $row['StudentCode'];?></td>
    <td><?php echo $row['StudentName'];?></td>
    <td> 
	  if(){
      <input name="Chinese[<?php echo $current_student_id; ?>]" type="text"  class="scoreWidth"  value="<?php echo $student_score['Chinese'] ?>" />
	  }
     </td>
    <td> 
     
      <input name="Math[<?php echo $current_student_id; ?>]" type="text"  class="scoreWidth"  value="<?php echo $student_score['Math'] ?>"/>
    </td>
    <td> 
      
      <input name="English[<?php echo $current_student_id; ?>]" type="text" class="scoreWidth"   value="<?php echo $student_score['English'] ?>"/>
    </td>
    <td> 
      
      <input name="Politics[<?php echo $current_student_id; ?>]" type="text" class="scoreWidth"  value="<?php echo $student_score['Politics'] ?>" />
     </td>
    <td> 
     
      <input name="History[<?php echo $current_student_id; ?>]" type="text" class="scoreWidth"  value="<?php echo $student_score['History'] ?>"/>
     </td>
    <td> 
      
      <input name="Geography[<?php echo $current_student_id; ?>]" type="text" class="scoreWidth"  value="<?php echo $student_score['Geography'] ?>" />
    </td>
    <td> 
    
      <input name="Biological[<?php echo $current_student_id; ?>]" type="text" class="scoreWidth"  value="<?php echo $student_score['Biological'] ?>" />
    </td>
    <td> 
     
      <input name="Physical[<?php echo $current_student_id; ?>]" type="text" class="scoreWidth"   value="<?php echo $student_score['Physical'] ?>" />
    </td>
    <td> 
      
      <input name="Chemistry[<?php echo $current_student_id; ?>]" type="text" class="scoreWidth"   value="<?php echo $student_score['Chemistry'] ?>" />
  </td>
  </tr>
  <?php
	$num=$num+1;
  }
  ?>
  
</table>
  <input type="hidden" value="<?php echo $current_term; ?>" name="Term" />
  <input type="submit"   value="保存" />
  <input type="submit"   value="提交锁定" />
  <a href="/teacher/input.php">返回</a>
</form>

 
</body>
</html>
