<?php
 	require_once dirname(__FILE__) . '/../conn.php';
	require_once dirname(__FILE__) . '/../libs/medoo.min.php'; 
	$database = new medoo("dyscore");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>所有学生信息</title>
<script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
<style type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$.post("/ajaxfunc.php", { name: "John", time: "2pm" },loadSchool);
	// 改变选项的时候，执行匿名函数
	$("#SchoolID").change(function(){
		//alert($(this).children('option:selected').val());
	});
});
// ----载入学校信息---------
function loadSchool(data){
	//alert("Data Loaded: " + data);
	var objs=eval(data);
	$("#SchoolID").empty(); //清空SELECT控件 
	for(var key in objs){
		$("<option></option>").val(objs[key].schoolID).text(objs[key].SchoolName).appendTo($("#SchoolID"));
		//alert(objs[key].schoolID);
	}
}
// ----载入年级信息---------
function loadLevel(){

}
// ----载入班级信息---------
function loadClass(){

}
</script>
</head>

<body>


<form action="" method="post">
选择学校：
<select name="SchoolID" id="SchoolID">
  
</select>
选择年级：<select name="Level">
  <option>初一</option>
  <option>初二</option>
  <option>初三</option>
</select>
选择班级：<select name="ClassID">
  <option>一班</option>
  <option>二班</option>
  <option>三班</option>
</select>

<input name="BtnSearch" type="submit" value="查找"/>
<input value="新增" type="button" name="BtnNew" />
<input value="导出" type="button" name="BtnExport" />
<input value="导入" type="button" name="BtnImport" onclick="window.location='importxls.php'"/>
</form>

<table width="1024" border="1">
<caption>所有学生信息</caption>
  <tr>
    <th scope="col">编号</th>
    <th scope="col">学号</th>
    <th scope="col">姓名</th>
    <th scope="col">年级</th>
    <th scope="col">班级</th>
    <th scope="col">操作</th>
  </tr>
<?php 
  	$sql="select * from students ";
	$rows=$database->query($sql)->fetchAll();
	$i=1;
	foreach($rows  as $row){
  ?>
  <tr>
    <td><?php  echo $i;?></td>
   <td><?php  echo $row["StudentID"];?></td> 
     <td><?php  echo $row["StudentName"]; ?></td> 
     <td><?php  echo $row["Level"]; ?></td> 
    <td><?php  echo $row["ClassID"]; ?></td> 
     <td><a href="#">编辑</a> |  <a href="StudentDel.php?id=<?php  echo $row["ID"]; ?>">删除</a></td>
  </tr>
  <?php
    $i=$i+1;
  }
  
  ?>
</table>


</body>
</html>