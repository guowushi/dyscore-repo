<?php
	require_once  '/global.inc';
 	require_once  ROOT.'/inc/conn.php';
	require_once ROOT.'/libs/medoo.min.php'; 
	$database = new medoo("dyscore");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css/common.css" rel="stylesheet" type="text/css" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<style type="text/css">
.z{
 text-align:center;	
}
 .z table{
	margin-left:auto;margin-right:auto; 
	text-align:left;	
 }

</style>
<body>

 <div class="z">
 <form method="post" action="check.php">
 <table width="400" border="0">
  <tr class="r30">
     <th>学校</th>
     <td width="221">
       <select name="SchoolID" id="SchoolID">
       <?php 
	$sql="select * from schools ";
	$rows=$database->query($sql)->fetchAll();
	foreach($rows  as $row){
	?>
         <option value="<?php echo $row['SchoolCode'] ?>"><?php echo  $row['SchoolName']?></option>
          
     <?php } ?>
       </select></td>
   </tr>
  <tr class="r30">
     <th>账号类型</th>
     <td width="221">
       <select name="usertype" id="select">
       <?php 
	   
	   ?>
         <option value="1" disabled="disabled">超级管理员</option>
         <option value="2">学校管理员</option>
         <option value="3">教师</option>
         <option value="4">学生</option>
       </select></td>
   </tr>
  <tr  class="r30">
    <th>账号：</th>
    <td width="221">
        <input type="text" name="username" id="username" />
      </td>
  </tr>
  <tr  class="r30">
    <th>密码：</th>
    <td> 
           <input type="password" name="password" id="password"/>
      </td>
  </tr>
  <tr>
    <td height="50" colspan="2">
    <input type="submit" name="ok" id="button" value="登陆"  />
      <input type="reset" name="cancel" id="button2" value="取消" /></td>
    </tr>
 </table>
 </form>
</div>
</body>
</html>
