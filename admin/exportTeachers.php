<?php
require_once dirname(__FILE__) . '/../conn.php';
require_once dirname(__FILE__) . '/../libs/medoo.min.php'; 
$database = new medoo("dyscore");
$sql="select * from classes ";
$rows=$database->query($sql)->fetchAll();
//var_dump($rows);
// ------------下面是PHPExcel类-------------------------------------------
require_once dirname(__FILE__) .'/../libs/PHPExcel.php';
require_once dirname(__FILE__) .'/../libs/PHPExcel/IOFactory.php';
require_once dirname(__FILE__) .'/../libs/PHPExcel/Reader/Excel5.php';
require_once dirname(__FILE__) .'/../libs/PHPExcel/Reader/Excel2007.php';
require_once dirname(__FILE__) .'/../libs/PHPExcel/Writer/Excel5.php';
require_once dirname(__FILE__) .'/../libs/PHPExcel/Writer/Excel2007.php';
require_once dirname(__FILE__) .'/../inc/functions.php';
/*
  定义每列的信息（包括列标题，列对应的字段名，列的数据类型）
*/
$headers=array(
"A"=>array('colName'=>"编号",	'colField'=>"ID"		,'colType'=>'n'),
'B'=>array('colName'=>"学校编号",	'colField'=>"SchoolID"	,'colType'=>'n'),
'C'=>array('colName'=>"班级",	'colField'=>"Classname"	,'colType'=>'n'),
'D'=>array('colName'=>"年级",	'colField'=>"Level"		,'colType'=>'n')
);

arrayToExcel($headers,$rows,"demo1.xlsx");



?>
