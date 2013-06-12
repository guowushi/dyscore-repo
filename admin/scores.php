<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看学生信息</title>
<style type="text/css">
.p p{
	font-size:36px; text-align:center; font-family:"仿宋"; font-weight:bold;}
.submit{ width:250px; text-align:center; padding-top:10px; padding-bottom:10px;}
.return{ width:1024; text-align:right; padding:10px 0 20px 50px; padding-right:50px;}
</style>
</head>
<body>
<?php
 require_once dirname(__FILE__) .  '/../conn.php'; 
 ?>
<div class="p">
  <p>学生成绩表</p></div>
   <div class="tishi">
    请选择所查询的年级和班级：
   </div>
    <p>请选择年级:
      <select>
        <option selected="selected">年  级</option>
        <option>初一</option>
        <option>初二</option>
        <option>初三</option>
      </select>
        &nbsp;&nbsp;请选择班级：
        <select>
          <option selected="selected">班  级</option>
          <option>一班</option>
          <option>二班</option>
          <option>三班</option>
          <option>四班</option>
          <option>五班</option>
          <option>六班</option>
          <option>七班</option>
          <option>八班</option>
          <option>九班</option>
          <option>十班</option>
        </select>  
    
       <input type="submit" value="筛选" />
    </p>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th name="ID">编号</th>
    <th name="StudentID">学号</th>
    <th name="StudentName">姓名</th>
    <th name="Chinese">语文</th>
    <th name="Math">数学 </th>
    <th name="English">英语</th>
    <th name="Politics">政治</th>
    <th name="History">历史</th>
    <th name="Geography">地理</th>
    <th name="Biological">生物</th>
    <th name="Physical">物理</th>
    <th name="Chemistry">化学</th>
  </tr>
   <?php 
  	$sql="select * from scores ";
		$rs = $db->query($sql);
		$i=1;
		while($row = $rs->fetch())
		{	
  
  ?>
  
  <tr>
    <td><?php  echo $row["ID"];  ?></td>
    <td><?php  echo $row["StudentID"];  ?></td>
    <td ><?php  echo $row["StudentName"];  ?></td>
    <td ><?php  echo $row["Chinese"];  ?></td>
    <td ><?php  echo $row["Math"];  ?></td>
    <td ><?php  echo $row["English"];  ?></td>
    <td ><?php  echo $row["Politics"];  ?></td>
    <td ><?php  echo $row["History"];  ?></td>
    <td ><?php  echo $row["Geography"];  ?></td>
    <td ><?php  echo $row["Biological"];  ?></td>
    <td ><?php  echo $row["Physical"];  ?></td>
    <td ><?php  echo $row["Chemistry"];  ?></td>
  </tr>
  
  <?php
    $i=$i+1;
  }
  
  ?>
  
</table>
<div class="return">
  <input name="按钮" type="button" value="返回顶部"/>
  <input name="按钮" type="button" value="退出"/>
</div>

</body>
</html>
