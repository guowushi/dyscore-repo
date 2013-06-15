<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>保存数据页面</title>
</head>

<body>
<?php
require_once dirname(__FILE__) . '/common.php';


/*   
  从formv2.html中获取用户的输入
*/
$student = array();

//$student["ID"]=null; 
$student["classes"] = $_POST["classes"];    //
$student["StudentName"] = $_POST["StudentName"];
$student["sex"] = $_POST["sex"];
$student["IDType"] = $_POST["IDType"];

//----
$student["IDCard"]=$_POST["IDCard"]; 
$student["nationality"]=$_POST["nationality"];
$student["birth"]=$_POST["birth"];
$student["RuXueNianYue"]=$_POST["RuXueNianYue"];
$student["EntranceWay"]=$_POST["EntranceWay"];

$student["XueJiHao"]=$_POST["XueJiHao"];
//----
$student["schoolCode"]=$_POST["schoolCode"];
$student["IDExpiredDate"]=$_POST["IDExpiredDate"]; //
$student["HuJiDi"]=$_POST["hujidi"];
$student["jdCategory"]=$_POST["jdCategory"];
$student["JiuDuFangShi"]=$_POST["JiuDuFangShi"];
//------
$student["XueShengLaiYuan"]=$_POST["XueShengLaiYuan"];
$student["schoolGraduation"]=$_POST["schoolGraduation"];
$student["entranceScores"]=$_POST["entranceScores"];
$student["usedName"]=$_POST["usedName"];
$student["nativePlace"]=$_POST["nativePlace"];
//------
$student["BirthAddress"]=$_POST["BirthAddress"];
$student["LiveAddress"]=$_POST["LiveAddress"];
$student["PostalAddress"]=$_POST["PostalAddress"];
$student["postalCode"]=$_POST["postalCode"];
$student["telephone"]=$_POST["telephone"];
//------
$student["email"]=$_POST["email"];
$student["ZhuYeDiZhi"]=$_POST["ZhuYeDiZhi"];
$student["GangTaiQiaoWai"]=$_POST["GangTaiQiaoWai"]; ///
$student["bloodType"]=$_POST["bloodType"];
$student["health"]=$_POST["health"];
//------
$student["politicsStatus"]=$_POST["politicsStatus"];
$student["SuiBanJiuDu"]=$_POST["SuiBanJiuDu"];
$student["disability"]=$_POST["disability"];
$student["speciality"]=$_POST["speciality"];
$student["MaixueWei"]=$_POST["MaiXueWei"];//-- //////////
//------
$student["LeftOverChildren"]=$_POST["LeftOverChildren"];
$student["onlyChild"]=$_POST["onlyChild"];
$student["migrantChildren"]=$_POST["MigrantChildren"];
$student["DiBao"]=$_POST["DiBao"];
$student["SingleFamily"]=$_POST["SingleFamily"];
//------
$student["BuZhu"]=$_POST["BuZhu"];   
$student["JiaoShiZiNv"]=$_POST["JiaoShiZiNv"];
$student["MilitaryChildren"]=$_POST["MilitaryChildren"];
$student["XueQianJiaoYu"]=$_POST["XueQianJiaoYu"];
$student["orphan"]=$_POST["orphan"];
//------
$student["LieShi"]=$_POST["LieShi"];
$student["applyForFunding"]=$_POST["applyForFunding"];
$student["HasSubsidy"]=$_POST["HasSubsidy"];
$student["distance"]=$_POST["distance"];
$student["transportation"]=$_POST["transportation"];
//------
$student["SchoolBus"]=$_POST["SchoolBus"];
//--------------------------------------------
$student["F_name"]=$_POST["F_name"];
$student["F_nationality"]=$_POST["F_nationality"];
$student["F_tel"]=$_POST["F_tel"];
$student["F_workPlace"]=$_POST["F_workPlace"];
//------
$student["F_hujidi"]=$_POST["F_hujidi"];
$student["F_address"]=$_POST["F_address"];
$student["F_IDtype"]=$_POST["F_IDtype"];
$student["F_IDcard"]=$_POST["F_IDcard"];
$student["F_job"]=$_POST["F_job"];

//---------------------------------------------
$student["M_name"]=$_POST["M_name"];
$student["M_nationality"]=$_POST["M_nationality"];
$student["M_tel"]=$_POST["M_tel"];
$student["M_workPlace"]=$_POST["M_workPlace"];
$student["M_hujidi"]=$_POST["M_hujidi"];
//------
$student["M_address"]=$_POST["M_address"];
$student["M_IDtype"]=$_POST["M_IDtype"];
$student["M_IDcard"]=$_POST["M_IDcard"];
$student["M_job"]=$_POST["M_job"];

//--------------------------------------------
$student["Q_name"]=$_POST["Q_name"];
//------
$student["Q_nationality"]=$_POST["Q_nationality"];
$student["Q_tel"]=$_POST["Q_tel"];
$student["Q_workPlace"]=$_POST["Q_workPlace"];
$student["Q_hujidi"]=$_POST["Q_hujidi"];
$student["Q_address"]=$_POST["Q_address"];
//------
$student["Q_IDtype"]=$_POST["Q_IDtype"];
$student["Q_IDcard"]=$_POST["Q_IDcard"];
$student["Q_job"]=$_POST["Q_job"];
$student["Q_Introductions"]=$_POST["Q_Introductions"];

// 显示数组中的所有值  
//echo(count($student));

//print_r(array_values($student));


if(isExist($student["IDCard"])){
		alert("系统中已存在该身份证号码！");

}else{
		
		save($student);
		$lastid=$db->lastinsertid();
	 //跳转到查看页面
	 //echo('<script\>alert('提交成功！')</script\>');
	 echo $lastid;
	 $relative_url="detail.php?id=$lastid";
	 header("Location: ".$relative_url); 
	// header("Location: http://" . $_SERVER['HTTP_HOST']. dirname($_SERVER['PHP_SELF']). "/" . $relative_url);
}






?>


</body>
</html>