<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	include_once("excel/reader.php"); //引入PHP-ExcelReader 
	$tmp = $_FILES['file']['tmp_name']; 
	if (empty ($tmp)) { 
		echo '请选择要导入的Excel文件！'; 
		exit; 
	} 
     
	$save_path = "xls/"; 
	$file_name = $save_path.date('Ymdhis') . ".xls"; //上传后的文件保存路径和名称 
	
	if (copy($tmp, $file_name)) { 
		
		$xls = new Spreadsheet_Excel_Reader(); 
		$xls->setOutputEncoding('utf-8');  //设置编码 
		$xls->read($file_name);  //解析文件 
		for ($i=2; $i<=$xls->sheets[0]['numRows']; $i++) { 
			$name = $xls->sheets[0]['cells'][$i][0]; 
			$sex = $xls->sheets[0]['cells'][$i][1]; 
			$age = $xls->sheets[0]['cells'][$i][2]; 
			$data_values .= "('$name','$sex','$age'),"; 
		} 
		$data_values = substr($data_values,0,-1); //去掉最后一个逗号 
		$query = mysql_query("insert into student (name,sex,age) values $data_values");//批量插入数据表中 
		if($query){ 
			echo '导入成功！'; 
		}else{ 
			echo '导入失败！'; 
		} 
	} 
?>
</body>
</html>