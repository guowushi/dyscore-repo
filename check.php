<?php 
 session_start();
 require_once  '/global.inc';
 require_once ROOT . '/libs/medoo.min.php'; 
 require_once ROOT . '/inc/conn.php'; 
 $database = new medoo("dyscore");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
  

 $schoolID=$_POST['SchoolID'];  //获取学校编码
 $username= $_POST["username"]; //获取用户名
 $password= $_POST["password"]; //获取密码
 $usertype= $_POST["usertype"]; // 获取用户类型
 
 $_SESSION['usertype']=$usertype;
  
   //-----管理员类型-------------------------------------------------------
   if($usertype=="2"){
  
		$sql="select * from admins where AdminName='$username' and AdminPassword='$password'";
		$sql=$sql."  And SchoolCode=".$schoolID;
		$rs = $db->query($sql);
		$row = $rs->fetch();
		if($row){
			 
			   $relative_url="admin/default.html";
				header("Location: ".$relative_url); 
		}else{
				$relative_url="login.php";
				header("Location: ".$relative_url); 
		
		}
  
  }
  // -------如果用户类型2是教师--------------------------------------
  if($usertype=="3"){
		$sql="select * from teachers where UserName='$username' and Password='$password'";
		$sql=$sql."  And SchoolCode='".$schoolID."'";
		$rs = $db->query($sql);
		$row = $rs->fetch();
		//var_dump($row);
		if($row){
			   //获取当前学校
			   $currentSchool = $database->get("schools", ['ID','SchoolCode','SchoolName'], ["SchoolCode" => $row['SchoolCode']]);
			   //获取当前用户
			   $currentUser=$database->get("teachers",['ID','SchoolCode','TeacherCode','TeacherName','Email','Username'] , ["ID" => $row['ID']]);
			   //var_dump($currentUser);
			   
				$_SESSION['school']=$currentSchool;
				$_SESSION['user']=$currentUser;
				
			   $relative_url="teacher/default.html";
				header("Location: ".$relative_url); 
		}else{
				$relative_url="login.php";
				header("Location: ".$relative_url); 
		}

  }
 
  
  
  
?>
</body>
</html>
