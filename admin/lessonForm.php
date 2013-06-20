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
		参数2：字段名组成的数组；
		参数3：数组格式的条件。如[id[>]=>10]表示id>10
		返回结果是一个二维数据
		*/
		$tablename="lessons";			
		$fields=["SchoolCode","ClassID","TeacherID","Lesson","ItemID","Term","comment"];
		$conditions=["id" => $id];
		$data = $database->get($tablename, $fields, $conditions);
		
		

	}else{
		
		$data['SchoolCode']=!empty($_SESSION['school']['SchoolCode'])?$_SESSION['school']['SchoolCode']:"";
		 
		$data['ItemID']='';
		$data['Term']=$TERMS[0];
		$data['comment']='';
		//var_dump($data);
		//var_dump($_SESSION['school']);
	
	}
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head> 
<body>

<form method="post" action="lessonSave.php">
	<h1>请编辑排课信息</h1>
	<table width="584" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="201"><label>学校代码：</label>
		</td>
		<td width="462"><input type="text" name="SchoolCode" readonly value="<?php  echo $data['SchoolCode']; ?>" /></td>
	  </tr>
	  <tr>
		<td><label>班级名称</label></td>
		<td>
			<select name="ClassID">
			<?php
			$tablename='classes';			
			$fields=$SCHEMAS['classes'];
			if(!empty($data['SchoolCode'])){
				
				$conditions=["SchoolCode" => $data['SchoolCode']];
				 
			}else{
				$conditions=[];
			}
			//获取当前学校所有班级
			$rows = $database->select($tablename,$fields , $conditions);
			foreach($rows as $row){
			?>
				<option value="<?php echo $row['ClassCode'];?>"><?php echo $row['SchoolCode'].'-'.$row['ClassName'];?></option>
			<?php
			}
			?>
		
		</select>
		 
		</td>
	  </tr>
	  <tr>
		<td><label>教师名</label></td>
		<td>
		<select name="TeacherID">
			<?php
			$tablename='teachers';			
			$fields=$SCHEMAS['teachers'];
			if(!empty($data['SchoolCode'])){
				$conditions=["SchoolCode" => $data['SchoolCode']];
			}else{
				$conditions=[];
			}
			$rows = $database->select($tablename,$fields , $conditions);
			foreach($rows as $row){
			?>
				<option value="<?php echo $row['ID'];?>"><?php echo $row['TeacherName'];?></option>
			<?php
			}
			?>
		
		</select>
	 
	  </tr>
	  <tr>
		<td><label>课名</label></td>
		<td>
			<select name="Lesson">
			<?php
		 
			foreach($ITEMS as $item){
			?>
				<option value="<?php echo $item;?>"><?php echo $item;?></option>
			<?php
			}
			?>
		
		</select>
		 
	  </tr>
	  <tr>
		<td><label>课程编号</label></td>
		<td><input type="text" name="ItemID"  value="<?php  echo $data['ItemID']; ?>" /></td>
	  </tr>
	  <tr>
		<td><label>学期</label></td>
		<td>
			<select name="Term" readonly>
		<?php
		 
			foreach($TERMS as $item){
			?>
				<option value="<?php echo $item;?>"><?php echo $item;?></option>
			<?php
			}
			?>
			</select>
		</td>
	  </tr>
	  <tr>
		<td><label>说明</label></td>
		<td><input type="text" name="comment"  value="<?php  echo $data['comment']; ?>" /></td>
	  </tr>
	</table>
	<input name="id" type="hidden" value="<?php echo $id;?>"/>
	<input name="ok"  value="提交信息" class="submit"  title="保存学校信息" type="submit" onclick="return validate()" >
    <input name="dfbgdg" title="取消"  type="button" value="退出"/>
</form>
	
</body>
</html>
