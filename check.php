<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
 require_once dirname(__FILE__) . '/conn.php';   

 //获取用户名
 $username= $_POST["username"];
  
 //获取密码
 
  $password= $_POST["password"];
 
 // 获取用户类型
  $usertype= $_POST["usertype"];
 
  //如果用户类型2是教师，则从教师表中查询数据;否则从管理员表查询数据
  if($usertype=="2"){

		$sql="select * from teachers where UserName='$username' and Password='$password'";
		$rs = $db->query($sql);
		$row = $rs->fetch();
		if($row){
			   $relative_url="teacher/display.html";
				header("Location: ".$relative_url); 
		}else{
				$relative_url="login.html";
				header("Location: ".$relative_url); 
		}
		
		
  
  }else{
  
		$sql="select * from admins where AdminName='$username' and AdminPassword='$password'"
		$rs = $db->query($sql);
		$row = $rs->fetch();
		if($row){
			 
			   $relative_url="admin/display.html";
				header("Location: ".$relative_url); 
		   
		}else{
				$relative_url="login.html";
				header("Location: ".$relative_url); 
		
		}
  
  }
  
  
  
  
  
  
?>
</body>
</html>
