<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>录入班级信息</title>
<link href="../css/common.css" type="text/css" rel="stylesheet">
</head>

<body> 
<form action="classesForminsert.php" method="post">
<table width="1024 " border="0" cellspacing="1" cellpadding="0">
  <tr>
    <th colspan="3" scope="col">录入班级信息</th>
  </tr> 
  <tr>
       <td>学校：<select name="SchoolID" id="SchoolID"><option name="SchoolID" value="德阳中学">德阳中学</option>
	   <option name="SchoolID" value="德阳二中">德阳二中</option></select></td>
          <td>年级:<select name="Level" id="Level"><option name="Level" value="a">初一</option>
		  <option name="Level" value="b">初二</option><option name="Level" value="c">初三</option></select></td>
             <td>班级:<input type="text" name="ClassName" id="ClassName" value=""/></td>
  
  </tr>
  </table>
<input type="submit" name="button2" id="button2" value="提交" />
<input type="reset" name="button" id="button" value="退出" /></form>
</body>
</html>
