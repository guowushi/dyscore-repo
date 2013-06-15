<?php
	
	session_start();												// 启用此页面的会话功能
	require_once '/global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.inc';								// 包含通用函数文件
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
		$datas = $database->select("schools", [	"schoolID","SchoolName","region"], ["id" => $id]);
		//获取第一行
		$data=$datas[0]; 
	}
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>录入学校信息</title>
</head> 
<body>

<form method="post" action="schoolSave.php">
	<h1>请录入学校信息</h1>
	<table width="584" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="201"><label>学校代码：</label>
		</td>
		<td width="462"><input type="text" name="SchoolID"  value="<?php  echo $data['schoolID']; ?>" /></td>
	  </tr>
	  <tr>
		<td><label>学校名称：</label></td>
		<td><input type="text" name="SchoolName" value="<?php  echo $data['SchoolName']; ?>" /></td>
	  </tr>
	  <tr>
		<td><label>学校区域：</label></td>
		<td><input type="text" name="Region"  value="<?php  echo $data['region']; ?>" /></td>
	  </tr>
	</table>
	<input name="id" type="hidden" value="<?php echo $id;?>"/>
	<input name="ok"  value="提交信息" class="submit"  title="保存学校信息" type="submit" onclick="return validate()" >
    <input name="dfbgdg" title="取消"  type="button" value="退出"/>
</form>
	
</body>
</html>
