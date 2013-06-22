<?php 
 session_start();
 require_once '../global.inc';										// 包含系统配置文件
 require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
body{
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color:#fafafa;
    border-color: -moz-use-text-color;
    border-image: none;
    border-radius: 0 0 0 0;
    border-style: none;
    border-width: 0 0 medium;
    margin: 0;
    padding: 0 1em;
	font-size:14px;
}
body p{padding:0;margin:0;height:36px;line-height:36px;}
.user_info{
	float:right;
}
</style>
<body>

<p>
<strong><?php 
echo !empty($_SESSION['school']['SchoolName'])?$_SESSION['school']['SchoolName']:""; 
//var_dump($_SESSION);  
?></strong>
成绩管理系统           
<span class="user_info" >
	<span>  </span>
	当前用户：<span class="user_name"> 
	<?php  
	if($_SESSION['usertype']=="2"){
		echo $_SESSION['user']['AdminName'];
	}elseif($_SESSION['usertype']=="3"){
		echo $_SESSION['user']['TeacherName'];
	}
	?>
	</span>
</span>
</p>
</body>
</html>
