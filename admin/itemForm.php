<?php
 	require_once dirname(__FILE__) . '/../conn.php';
	require_once dirname(__FILE__) . '/../libs/medoo.min.php'; 
	$database = new medoo("dyscore");
	
	
	$id= !empty($_GET['id']) ? $_GET['id']:'';
	if($id){
		// 查找指定Id的记录.参数1：表名；参数2：字段组成的数组；参数3：条件
		$datas = $database->select("schools", [	"schoolID","SchoolName","region"	], ["id" => $id]);
		$data=$datas[0]; 
	}
	/*
	 显示值
	*/
	function show($data){
	   if(isset($data)){
		echo $data;
	   }
		
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
