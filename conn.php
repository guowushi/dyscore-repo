<?php
/* --------------------------------------------------------------------------
 定义数据库变量
*/
$databaseName = "dyscore";
$user = "root";
$pass = "";
/* ------(1)链接数据库--------- */
try {
    $db = new PDO("mysql:host=localhost;dbname=$databaseName", $user, $pass);
	$db->exec("SET NAMES 'utf8';");
    //echo "链接成功！";
} catch (PDOException $e) {
    print "错误信息: " . $e->getMessage() . "<br/>";
    die();
}


/*
 通用提示信息
 参数$msg:	需要显示的消息；
 参数$url:	需要跳转的URL
*/

function alert($msg,$url="")
{
$str = '<script type="text/javascript">';
$str.="alert('".$msg."');";

if ($url !="")
{
	$str.="window.location.href='{$url}';";
}
else
{
	$str.="window.history.back();";
}
echo $str.='</script>';
}


$SYSTEM="xxx";

$LEVEL=array("一年你","二年纪","三念你");
?>