<?php
 	require_once dirname(__FILE__) . '/../conn.php';
	require_once dirname(__FILE__) . '/../libs/medoo.min.php'; 
	$database = new medoo("dyscore");
	
	/* ---------------------------------------------------------------------------
		保存（包括新增记录，修改记录）
	   ---------------------------------------------------------------------------------
	*/
	// (1)获取表单输入,将所有字段的值存入一个key=>value数组中；key需要和字段名一致，value与表单命名一致
	
	$row=array();
	$row['SchoolID']=$_POST['SchoolID'];
	$row['SchoolName']=$_POST['SchoolName'];
	$row['Region']=$_POST['Region'];
 
	 
    //(2)区分是保存还是新增加
    $id=$_POST['id'];
	if($id){
		//修改代码，参数1：表名；参数2：值；参数3：条件
		$database->update("schools", $row, ["id" => $id]);
	}else{
		// 新增代码
		$last_user_id = $database->insert("schools", $row);
		
		
		
	}
	//(3) 跳转
	
	alert("修改成功","/admin/school.php");
    
   
 ?>
