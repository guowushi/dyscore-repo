<?php
/* --------------------------------------------------------------------------
 定义数据库变量
*/
$databaseName = "school";
$user = "root";
$pass = "guowushi";
/* ------(1)链接数据库--------- */
try {
    $db = new PDO("mysql:host=localhost;dbname=$databaseName", $user, $pass);
	$db->exec("SET NAMES 'utf8';");
    //echo "链接成功！";
} catch (PDOException $e) {
    print "错误信息: " . $e->getMessage() . "<br/>";
    die();
}
/* --------------------------------------------
  保存注册学生信息
  参数$student：是一个包含所有字段值的数组
*/
function save($student)
{
    // 添加数据代码
    global $db;
    $create_sql = "INSERT INTO students (
	  `classes`,  `StudentName`,  `sex` ,  `IDType` ,
  `IDCard`,  `nationality`,  `birth`,  `RuXueNianYue`,  `EntranceWay` ,
  `XueJiHao`,  `schoolCode`,  `IDExpiredDate`,  `HuJiDi`,  `jdcategory`,
  `JiuDuFangShi`,  `XueShengLaiYuan`,  `schoolGraduation`,  `entranceScores`,  `usedName`,
  `nativePlace`,  `BirthAddress`,  `LiveAddress`,  `PostalAddress`,  `postalCode`,
  `telephone`,  `email`,  `ZhuYeDiZhi`,  `GangTaiQiaoWai`,  `bloodType`,
  `health`,  `politicsStatus` ,  `SuiBanJiuDu`,  `disability`,  `speciality`,
  `MaiXueWei`,  `LeftoverChildren`,  `onlyChild`,  `MigrantChildren` ,  `DiBao`,
  `SingleFamily`,  `BuZhu`,  `JiaoShiZiNv`,  `MilitaryChildren`,  `XueQianJiaoYu`,
  `orphan`,  `LieShi`,  `applyForFunding`,  `HasSubsidy`,  `distance`,
  `transportation`,  `SchoolBus`,  `F_name`,  `F_nationality`,  `F_tel`,
  `F_workPlace`,  `F_hujidi`,  `F_address`,  `F_IDtype`,  `F_IDcard`,
  `F_job` ,  `M_name`,  `M_nationality`,  `M_tel` ,  `M_workPlace`,
  `M_hujidi`,  `M_address`,  `M_IDtype`,  `M_IDcard`,  `M_job`,  
  `Q_name`,  `Q_nationality`,  `Q_tel`,  `Q_workPlace`,  `Q_hujidi`, 
  `Q_address`,  `Q_IDtype`,  `Q_IDcard`,  `Q_job` ,  `Q_Introductions`
	 ) 
	VALUES (
	 ?, ?, ?, ?, 
	?, ?, ?, ?, ?,
	?, ?, ?, ?, ?, 
	?, ?, ?, ?, ?, 
	?, ?, ?, ?, ?, 
	?, ?, ?, ?, ?, 
	?, ?, ?, ?, ?, 
	?, ?, ?, ?, ?,
	?, ?, ?, ?, ?,
	?, ?, ?, ?, ?,
	?, ?, ?, ?, ?, 
	?, ?, ?, ?, ?,
	?, ?, ?, ?, ?,
	?, ?, ?, ?, ?, 
	?, ?, ?, ?, ?, 
	?, ?, ?, ?, ?)";

    $sth = $db->prepare($create_sql);

	//----------------------绑定参数-----------------------------------	 
	/*
	$sth->bindParam(1, $student["classes"] );
	$sth->bindParam(2, $student["StudentName"] );
	$sth->bindParam(3, $student["sex"] );
	$sth->bindParam(4, $student["IDType"] );
	$sth->bindParam(5, $student["IDCard"] );
	$sth->bindParam(6, $student["className"] );
	$sth->bindParam(7, $student["className"] );
	$sth->bindParam(8, $student["className"] );
	$sth->bindParam(9, $student["className"] );
	$sth->bindParam(10, $student["className"] );
	$sth->bindParam(11, $student["className"] );
	$sth->bindParam(12, $student["className"] );
	$sth->bindParam(13, $student["className"] );
	$sth->bindParam(14, $student["className"] );
	$sth->bindParam(15, $student["className"] );
	$sth->bindParam(16, $student["className"] );
	$sth->bindParam(17, $student["className"] );
	$sth->bindParam(18, $student["className"] );
	$sth->bindParam(19, $student["className"] );
	$sth->bindParam(20, $student["className"] );
	$sth->bindParam(21, $student["className"] );
	$sth->bindParam(22, $student["className"] );
	$sth->bindParam(23, $student["className"] );
	$sth->bindParam(24, $student["className"] );
	$sth->bindParam(25, $student["className"] );
	$sth->bindParam(26, $student["className"] );
	$sth->bindParam(27, $student["className"] );
	$sth->bindParam(28, $student["className"] );
	$sth->bindParam(29, $student["className"] );
	$sth->bindParam(30, $student["className"] );
	$sth->bindParam(31, $student["className"] );
	$sth->bindParam(32, $student["className"] );
	$sth->bindParam(33, $student["className"] );
	$sth->bindParam(34, $student["className"] );
	$sth->bindParam(35, $student["className"] );
	$sth->bindParam(36, $student["className"] );
	$sth->bindParam(37, $student["className"] );
	$sth->bindParam(38, $student["className"] );
	$sth->bindParam(39, $student["className"] );
	$sth->bindParam(40, $student["className"] );
	$sth->bindParam(41, $student["className"] );
	$sth->bindParam(42, $student["className"] );
	$sth->bindParam(43, $student["className"] );
	$sth->bindParam(44, $student["className"] );
	$sth->bindParam(45, $student["className"] );
	$sth->bindParam(46, $student["className"] );
	$sth->bindParam(47, $student["className"] );
	$sth->bindParam(48, $student["className"] );
	$sth->bindParam(49, $student["className"] );
	$sth->bindParam(50, $student["className"] );
	$sth->bindParam(51, $student["className"] );
	$sth->bindParam(52, $student["className"] );
	$sth->bindParam(53, $student["className"] );
	$sth->bindParam(54, $student["className"] );
	$sth->bindParam(55, $student["className"] );
	$sth->bindParam(56, $student["className"] );
	$sth->bindParam(57, $student["className"] );
	$sth->bindParam(58, $student["className"] );
	$sth->bindParam(59, $student["className"] );
	$sth->bindParam(60, $student["className"] );
	$sth->bindParam(61, $student["className"] );
	$sth->bindParam(62, $student["className"] );
	$sth->bindParam(63, $student["className"] );
	$sth->bindParam(64, $student["className"] );
	$sth->bindParam(65, $student["className"] );
	$sth->bindParam(66, $student["className"] );
	$sth->bindParam(67, $student["className"] );
	$sth->bindParam(68, $student["className"] );
	$sth->bindParam(69, $student["className"] );
	$sth->bindParam(70, $student["className"] );
	$sth->bindParam(71, $student["className"] );
	$sth->bindParam(72, $student["className"] );
	$sth->bindParam(73, $student["className"] );
	$sth->bindParam(74, $student["className"] );
	$sth->bindParam(75, $student["className"] );
	$sth->bindParam(76, $student["className"] );
	$sth->bindParam(77, $student["className"] );
	$sth->bindParam(78, $student["className"] );
	$sth->bindParam(79, $student["className"] );
	$sth->bindParam(80, $student["className"] );
	*/
	 
    $sth->execute(array_values($student));


}
/*
  根据学生学号查询学生信息
  参数$id：为学生的唯一编号
*/
function getStudentById($id)
{
    global $db;
    $query_sql = "SELECT * FROM student Where ID=" .$id;
    // 执行sql语句，得到一个结果集合
    $rs = $db->query($query_sql);
    // 获取第一行
    $row = $rs->fetch();
    //print_r($row);
    // 显示数据
}

 


/**
从数据表中查找一个身份证号码等于$id的记录
 */
function isExist($id)
{
    global $db;
    $query_sql = "SELECT count(*) FROM students Where IDCard=" + $id;
    $sth = $db->prepare($query_sql);
    $sth->execute();
    $col = $sth->fetchColumn();
    if ($col >= 1) {
        return true;
    } else {
        return false;
    }
}
 
?>