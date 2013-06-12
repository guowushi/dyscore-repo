<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/common.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成绩录入</title>
 <style type="text/css">
 table{ background-color:#000;}
 tr{ background-color:#FFF;}
 p{
	font-size:16px;
	font-weight:bold;
	
	
 
	 
}
input.scoreWidth{
	width:90%;
	border-bottom-width: 2px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-bottom-color: #800;
}

 </style>

<body>
<p align="center">学生成绩录入</p> 

<?php 
	require_once dirname(__FILE__) . '/../conn.php'; 
	$conf=require_once(dirname(__FILE__) . '/../conf/system.conf.php');  
	//print_r($conf["levels"]);  
?>
<!--  下面是筛选表单  -->
 <form action="" method="post">
  <p>请选择年级、班级、科目筛选数据 </p>
  <p>年级：
    <select name="">
    <?php 
	  foreach($conf["levels"] as $level){
	    echo "<option value='$level'>$level</option>";	  
	  }
	 ?>
     
    </select>   
   班级：
  <select name="Classname">
   	<option value="不限">不限</option>
   	 <?php 
	  $sql="select * from classes  ";
	  // $sql=" Where schoolID=".$currentSID;
	  $rs = $db->query($sql);
	   while($row = $rs->fetch())
	   {
	       
			echo "<option value='".$row['Classname']."'>".$row['Classname']."</option>";	  
	   }
	 ?>
  </select>
      科目：
    <select name="Item">
      <option  name="Chinese">语文</option>
      <option  name="Math">数学</option>
      <option name="English">英语</option>
      <option name="Physical">物理</option>
      <option name="Chemisty">化学</option>
      <option name="Biological">生物</option>
      <option name="Polities">政治</option>
      <option name="History">历史</option>
      <option name="Geography">地理</option>
      </select>
    <input name="input" type="submit" / value="筛选" />
  </p>
</form>

  
  
  <form> 
  <table  border="0" cellspacing="1 " cellpadding="0 " width="100%">
  <tr>
    <th name="ID" width="76" scope="col">编号</th>
    <th name="SchoolID" width="76" scope="col">学号</th>
    <th width="76" name="StudentsNane" scope="col">姓名</th>
    <th width="84" name="Chinese" scope="col">语文</th>
    <th width="84" name="Math" scope="col">数学</th>
    <th width="84" name="English" scope="col">英语</th>
    <th width="84" name="Physical" scope="col">物理</th>
    <th width="84" name="Chemisty" scope="col">化学</th>
    <th width="84" name="Biological" scope="col">生物</th>
    <th width="84" name="Polities" scope="col">政治</th>
    <th width="84" name="History" scope="col">历史 </th>
    <th width="84"  name="Geography"scope="col">地理</th>
  </tr>
  <tr>
    <td>1</td>
    <td>20111</td>
    <td>张三</td>
    <td> 
      <input name="Chinese" type="text"  class="scoreWidth"  />
     </td>
    <td> 
     
      <input name="Math" type="text"  class="scoreWidth"/>
    </td>
    <td> 
      
      <input name="English" type="text" class="scoreWidth" />
    </td>
    <td> 
      
      <input name="Politics" type="text" class="scoreWidth" />
     </td>
    <td> 
     
      <input name="History" type="text" class="scoreWidth"/>
     </td>
    <td> 
      
      <input name="Geography" type="text" class="scoreWidth" />
    </td>
    <td> 
    
      <input name="Biological" type="text" class="scoreWidth" />
    </td>
    <td> 
     
      <input name="Physical" type="text" class="scoreWidth" />
    </td>
    <td> 
      
      <input name="Chemistry" type="text" class="scoreWidth" />
  </td>
  </tr>
</table>
  <input type="submit" / value="保存">
  <input type="submit" / value="提交锁定" />
 
</form>

 
</body>
</html>
