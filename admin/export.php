<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
$result = mysql_query("select * from student"); 
$str = "姓名\t性别\t年龄\t\n"; 
$str = iconv('utf-8','gb2312',$str); 
while($row=mysql_fetch_array($result)){ 
    $name = iconv('utf-8','gb2312',$row['name']); 
    $sex = iconv('utf-8','gb2312',$row['sex']); 
    $str .= $name."\t".$sex."\t".$row['age']."\t\n"; 
} 
$filename = date('Ymd').'.xls'; 
exportExcel($filename,$str); 
/*
 exportExcel函数用于设置header信息。
*/
function exportExcel($filename,$content){ 
     header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
    header("Content-Type: application/vnd.ms-execl"); 
    header("Content-Type: application/force-download"); 
    header("Content-Type: application/download"); 
    header("Content-Disposition: attachment; filename=".$filename); 
    header("Content-Transfer-Encoding: binary"); 
    header("Pragma: no-cache"); 
    header("Expires: 0"); 
 
    echo $content; 
} 
?>
</body>
</html>