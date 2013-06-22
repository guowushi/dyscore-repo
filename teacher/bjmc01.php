  <?php
	
	session_start();												// 启用此页面的会话功能
	require_once 'global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
	   
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/common.css" type="text/css" rel="stylesheet" />
<style  type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
.head{font-size:18px; float:left; margin:10px;}	
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    年级
    <select name="level" id="select">
		<?php
		 foreach($LEVEL as $l)
		 {
			echo "<option>".$l."</option>";
		 }
		
		?>
    </select>
  <input type="submit" name="query" id="button" value="提交" />
</form>

<h2>
年级成绩名次分析表</h2>
<h4>
  <span>
  <?php 
	echo !empty($_SESSION['school']['SchoolName'])?$_SESSION['school']['SchoolName']:""; 
	?>
</span>
  <span>
  2012-2013-2学期
  </span>
  <span>(半期或期末)</span></h4>
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td rowspan="2">学号</td>
    <td rowspan="2">姓名</td>
    <td colspan="2">语文</td>
    <td colspan="2">数学</td>
    <td colspan="2">英语</td>
    <td colspan="2">政治</td>
    <td colspan="2">历史</td>
    <td colspan="2">地理</td>
    <td colspan="2">生物</td>
    <td rowspan="2">总分</td>
    <td rowspan="2">名次</td>
    <td rowspan="2">上次名次</td>
    <td rowspan="2">升降</td>
  </tr>
  <tr>
    <td>得分</td>
    <td>名次</td>
    <td>得分</td>
    <td>名次</td>
    <td>得分</td>
    <td>名次</td>
    <td>得分</td>
    <td>名次</td>
    <td>得分</td>
    <td>名次</td>
    <td>得分</td>
    <td>名次</td>
    <td>得分</td>
    <td>名次</td>
  </tr>
  
  <?php 
  /* 计算值在一个数组中的名次*/
  function mc($arr,$v){
	  
	  
  }
  
  
  	if(isset($_POST['query'])){
	   	//当前年级 
	  	 $current_level=$_POST['level'];
		/* 获取某个学校*/
		$current_school=$_SESSION['school']['SchoolCode'];
		$sql=" select  * from view_scores ";
		$sql.=" where  SchoolCode= ".$current_school;
		$sql.=" AND    StudentLevel='".$current_level."'";
		$student_score=$database->query($sql)->fetchAll();
		$row_number=1;	
		foreach($student_score as $row){
  
  ?>
  <tr>
    <td><?php echo $row_number; ?></td>
    <td><?php echo $row['StudentName']; ?></td>
    <td><?php echo $row['Chinese']; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Math']; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row['English']; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Politics']; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row['History']; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Geography']; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Biological']; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Chinese']; ?></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Chinese']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <?php
  		$row_number++;	
		}
	}
  ?>
</table>
<p>
<input name="" type="button" value="返回"/>
<input name="" type="button" value="导出Excel"/>
</p>

</body>
</html>
