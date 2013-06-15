<?php
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
	// ------------------------------------------------------------------------------------------
	require_once ROOT .'/libs/PHPExcel.php';
	require_once ROOT .'/libs/PHPExcel/IOFactory.php';
	require_once ROOT .'/libs/PHPExcel/Reader/Excel5.php';
	require_once ROOT .'/libs/PHPExcel/Reader/Excel2007.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="">
    <input name="file" type="file" />
    <input type="submit" name="submit" value="导入数据" />
</form>
<?php

		if(!empty($_POST['submit'])){	
				//获取上传文件的类型	
				$file_type=$_FILES["file"]["type"];
				echo $file_type;
				// 获取传到服务器上的临时文件
				$tmp = $_FILES['file']['tmp_name']; 
				echo $tmp;
				
				// 
				if(empty($tmp)){ 
						echo '请选择要导入的Excel文件'; 
						exit; 
				} 
				// 上传的文件后缀必须是xlsx或xls
				if(!($file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
				{
						echo '请选择Excel2007格式的文件'; 
						exit;
				}
				//定义excel结构,需要根据实际的Excel和导入的表进行修改
				$headers=array(
					"A"=>array('colName'=>"编号",	'colField'=>"ID"		,'colType'=>'n'),
					'B'=>array('colName'=>"学校编号",	'colField'=>"SchoolID"	,'colType'=>'n'),
					'C'=>array('colName'=>"教师编码",	'colField'=>"TeacherCode"	,'colType'=>'n'),
					'D'=>array('colName'=>"教师姓名",	'colField'=>"TeacherName"		,'colType'=>'n'),
					'E'=>array('colName'=>"邮件地址",	'colField'=>"Email"		,'colType'=>'n'),
					'F'=>array('colName'=>"帐号",	'colField'=>"Username"		,'colType'=>'n'),
					'G'=>array('colName'=>"密码",	'colField'=>"Password"		,'colType'=>'n'),
					'H'=>array('colName'=>"上课科目",	'colField'=>"Items"		,'colType'=>'n'),
					'I'=>array('colName'=>"角色",	'colField'=>"TeacherRole"		,'colType'=>'n')
				);
				//将excel导入到哪个表中，需要根据实际情况修改
				$table="teachers";
				 araryToTable($tmp,$headers,$database,$table);
		}
		
?>
</body>
</html>