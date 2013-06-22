<?php
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
 
 /*
	判断$student在$term学期是否有成绩;
	返回true,false
  */
  function hasScore($student,$term){
	global $database;
	$filters=[
				'AND'=>[
						'StudentID'=>$student,
						'Term'=>$term
					]
				]; 
	$s=$database->get("scores",['ID'],$filters);
	if($s){
		return true;
	}else{
		return false;
	}
  
  }
  /*
	判断$score分数是否有效
	在成绩录入框中填写有效数字
  */
  function scoreIsValid($score){
		$ret=false;
		 if(!empty($score)){
					$ret=true;	
				}
		 
		return $ret; 
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php

if(isset($_POST['SID'])){
  //获取分数
   //var_dump($_POST);
  //所有学生编号
  $ids=$_POST['SID'];
  // 将某个学生的成绩保存到数据库
  //当前学期 
  $current_term=$_POST['Term'];
  //当前科目  
  $current_item=$_POST['item'];
  
  foreach($ids as $id){
		
	
		$item_name= array_flip($KM)[$current_item];
		$score[$item_name]=$_POST['score']["$id"];  //获取分数
		//var_dump($score);
		
		if(hasScore($id,$current_term)){
			//如果有分数，则是修改
			$filters=[
					'AND'=>[
							'StudentID'=>$id,
							'Term'=>$current_term
						]
					];
					
			$database->update("scores",$score,$filters);
			
		}else{
			//没有分数则是新增
			if(scoreIsValid($score[$item_name])){
				$score['StudentID']=$id;
				$score['Term']=$current_term;
				$database->insert("scores",$score);
			}
		
		
		}
		//alert("修改成功",$_SERVER["HTTP_REFERER"]);
  }

 }
?>
</body>
</html>