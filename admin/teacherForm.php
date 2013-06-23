<?php
	
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
	
 ?>
<?php

	//获取传递过来的记录唯一编号
	$id= !empty($_GET['id']) ? $_GET['id']:'';
	if($id){
		/* 
		查找指定Id的记录.
		参数1：表名；
		参数2：字段组成的数组；
		参数3：数组格式的条件。如[id[>]=>10]表示id>10
		返回结果是一个二维数据
		*/
		$datas = $database->select("teachers", ["TeacherCode","TeacherName","Email","Username","Password","Items"], ["id" => $id]);
		//获取第一行
		$data=$datas[0]; 
	}else{
	
			 $data['TeacherCode']="";
			 $data['TeacherName']="";
			 $data['Email']="";
			 $data['Username']="";
			 $data['Password']="";
			 $data['Items']="";
	}
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type = "text/javascript" src = "../js/jquery.js"></script>
<script type="text/javascript">
//jQuery.post(url, [data], [callback], [type])
	$(document).ready(function(){
		$(".agee").click(function(){
			var level=$("#level").val();
			
			var url="/a.php?level="+level;
			var url="/a.php";
			var postdata={name: level};
			
			//alert(url);
			$.post(url,  postdata,
			function(data){
				//alert("Data Loaded: " + data);
				$("#kemu").html(data);
			});
		});
	});

</script>
<title>无标题文档</title>
</head>

<body>
<h1>录入教师信息</h1>



<form method="post" action="teacherAdd.php">
     
       <p>
         <label>所属学校：</label>
         <select name="SchoolID">
		 <?php 
	
	/*
		定义查询语句,执行该$sql语句，并获去所有记录放到一个二维数组$rows中
	*/
	$sql="select * from schools ";  	
	$rows=$database->query($sql)->fetchAll();
	$row_number=1;	
	// 遍历数组，每行就表示一条记录。访问记录的字段可以使用 $row['字段名']或$row[1]的格式
	foreach($rows  as $row)
		{
  ?>
           <option  value="<?php echo $row["ID"];  ?>"><?php echo $row["ID"].$row["SchoolName"];  ?></option>
         <?php
                }
			?>
         </select>
      
         <br />
         <br />
         <label>教师编号：</label>
         <input  type="text" name="TeacherCode" value="<?php  echo $data['TeacherCode']; ?>"/>
         <label>教师姓名：</label>
         <input type="text" name="TeacherName" value="<?php  echo $data['TeacherName']; ?>"/>
       </p>
       <p>
         <label>教师邮箱：</label>
         <input  type="text" name="Email" value="<?php  echo $data['Email']; ?>"/>
		 <label>教授科目：</label>
	     <input type="text" name="Items" id="Items" value="<?php  echo $data['Items']; ?>"/>
       </p>
       <p>
         <label>教师账号：</label>
         <input  type="text" name="Username" value="<?php  echo $data['Username']; ?>"/>
         <label>教师密码：</label>
         <input  type="text" name="Password" value="<?php  echo $data['Password']; ?>"/>     
       </p>
  <p>
 <input name="id" type="hidden" value="<?php echo $id;?>"/>  
 <input type="submit" value="提交信息"/>
  </p>
</form>



</body>
</html>
