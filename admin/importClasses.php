<?php
	require_once dirname(__FILE__) . '/../conn.php';
	require_once dirname(__FILE__) . '/../libs/medoo.min.php'; 
	$database = new medoo("dyscore");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form method="post" enctype="multipart/form-data" action="importxls.php">
    <input name="file" type="file" />
    <input type="submit" name="submit" value="导入数据" />
</form>
<?php


		require_once dirname(__FILE__) .'/../libs/PHPExcel.php';
		require_once dirname(__FILE__) .'/../libs/PHPExcel/IOFactory.php';
		require_once dirname(__FILE__) .'/../libs/PHPExcel/Reader/Excel5.php';
		require_once dirname(__FILE__) .'/../libs/PHPExcel/Reader/Excel2007.php';
		require_once dirname(__FILE__) .'/../inc/functions.php';
		
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
					'C'=>array('colName'=>"班级",	'colField'=>"Classname"	,'colType'=>'n'),
					'D'=>array('colName'=>"年级",	'colField'=>"Level"		,'colType'=>'n')
				);
				//将excel导入到哪个表中，需要根据实际情况修改
				$table="classes";
				//
				 araryToTable($tmp,$headers,$database,$table);
		}
		
?>
</body>
</html>