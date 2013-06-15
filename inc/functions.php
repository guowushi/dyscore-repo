<?php
/* ---------------------------------------------------------------------
 将execel中的数据，导入到$database中的$table表中
结构需要定义在$headers中
*/
function araryToTable($xls,$headers,$database,$table){
			// 使用'Excel2007'读入xlsx文件，'Excel5'读入xls文件
			$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			// 加载上传的Excel文件
			$objPHPExcel = $objReader->load($xls);
			// 参数1：空单元格返回的值；参数2：公式是否计算；参数3：是否保留格式；参数4：true返回数组索引值对应的就是单元格行列值
			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
			//var_dump($sheetData);
			$start=2;  
			for($i=$start;$i<=count($sheetData);$i++){
		
			//获取第i行的第A列（通常都是ID字段数据）；如果有值则修改，否则是新增
			$primaryKeyValue=$sheetData[$i]['A'];  
			echo $primaryKeyValue;
			$primaryKey=$headers['A']['colField'];
			// excel第i行数据
			$sheetRow=$sheetData[$i];
			foreach($headers as $key=>$header){
					$row[$header['colField']]=$sheetRow[$key];
			}
			if(!empty($primaryKeyValue)){
				$database->update($table, $row, [$primaryKey => $primaryKeyValue]);
			}else{
				// 新增代码
				$last_user_id = $database->insert($table, $row);

				
			}
		
			}
		
}
		
/** ------------------------------------------------------------------------------
 根据列数组、数据数组，产生excel文件
**/
function arrayToExcel($headers,$rows,$filename){  
     $objPHPExcel = new PHPExcel(); 
	// 标题设置
	foreach($headers as $key=>$value){
		$objPHPExcel->getActiveSheet()->setCellValue($key."1",$value['colName']);
	}
	// 设置其他属性   
    $objPHPExcel->setActiveSheetIndex(0);  
    $objPHPExcel->getActiveSheet()->setTitle('firstsheet');  
    $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');  
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(10); 
    $i = 2;  
    foreach ($rows as $line){  
		foreach($headers as $key=>$header){
			// 设置单元格值
			$objPHPExcel->getActiveSheet()->setCellValue($key.$i, $line[$header['colField']]); 
			// 设置单元格类型  
			//$objPHPExcel->getActiveSheet()->getCell($key.$i)->setDataType($header['colType']);  
		}
        $i++;  
    }  
    /* 保存Excel2007文件到服务器*/
	/*
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
    $objWriter->save($filename);
	*/
	// 下载(Excel2007)格式
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header("Content-Disposition: attachment;filename=$filename");
	header('Cache-Control: max-age=0');
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	// 下载(Excel5)格式  
	//$fn="gxtj-$year-$jd.xls";  
	/*
	$fn="demo.xlsx";
	header('Content-Type: application/vnd.ms-excel; charset=utf-8');  
	header("Content-Disposition: attachment;filename=$filename");  
	header('Cache-Control: max-age=0');  
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
	$objWriter->save('php://output');  
	*/

} 


/* ----------------------------------------------------------
 通用提示信息
 参数$msg:	需要显示的消息；
 参数$url:	需要跳转的URL
*/
function alert($msg,$url=""){
	$str = '<script type="text/javascript">';
	$str.="alert('".$msg."');";
	if($url !="")
	{
		$str.="window.location.href='{$url}';";
	}
	else
	{

		$str.="window.history.back();";
	}
	echo $str.='</script>';
}
/*-----------------------------------------------------
 显示变量
*/
function p($v,$default=""){
	if(empty($v)){
		echo $default;
	}else{
		echo $v;
	}
	
}
?>