<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>各校教师信息表</title>
<style type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
.head{font-size:18px; float:left; margin:10px;}
</style>
</head>


<body>
     <?php
 require_once dirname(__FILE__) .  '/../conn.php'; 
 
 
 ?>
 <form method="post" action="">
      <h1>各校教师信息表</h1>
      <div class="head">
      <label>请选择教师所属学校：</label>
      <select name="SchoolName">
      <option>德阳七中</option>
      <option>德阳七中</option>
      <option>德阳七中</option>
      </select>
      </div>
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
	
  <tr>
    <th scope="col" name="ID">编号</th>
    <th scope="col" name="TeacherID">教师编号</th>
    <th scope="col" name="TeacherName">教师真实姓名</th>
    <th scope="col" name="Email">教师邮件</th>
    <th scope="col" name="Username">教师账号</th>
    <th scope="col" name="Password">教师密码</th>
    <th scope="col" name="Items">教授科目</th>
  </tr>

  <?php 
  	$sql="select * from teachers ";
		$rs = $db->query($sql);
		$i=1;
		while($row = $rs->fetch())
		{
			
			
		 
		
  
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $row['TeacherID'];?></td>
    <td><?php echo $row['TeacherName'];?></td>
    <td><?php echo $row['Email'];?></td>
    <td><?php echo $row['Username'];?></td>
    <td><?php echo $row['Password'];?></td>
    <td><?php echo $row['Items'];?></td>
  </tr>
  
   <?php
    $i=$i+1;
  }
  
  ?>  </form>
</body>
</html>
