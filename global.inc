<?php
//网站根路径常量
define("ROOT",dirname(__FILE__));
//系统角色
define("ROLE_ADMIN","1");
define("ROLE_SCHOOL_ADMIN","2");
define("ROLE_TEACHER","3");
define("ROLE_STUDENT","4");
$ROLES=array(
				"1"=>"超级管理员",
				"2"=>"学校管理员",
				"3"=>"教师",
				"4"=>"学生"
				);
//定义年级
$LEVEL=array("1"=>"一年级",
			 "2"=>"二年级",
			 "3"=>"三年级");
//定义学期			 
$TERMS=array("2012-2013-2学期","2012-2013-1学期");

//所有可上的科目
$ITEMS=array('语文','数学','英语','政治','历史','地理','生物','物理','化学');


// 定义所有表的字段（不包括ID）
$SCHEMAS=array(
			'schools'=>['ID','SchoolCode','Region','SchoolName','comment'],
			'lessons'=>['ID','SchoolCode','ClassID','TeacherID','Lesson','ItemID','Term','comment'],
			'classes'=>['ID','SchoolCode','ClassName','ClassLevel','ClassCode','comment'],
			'students'=>['ID','SchoolID','ClassID','StudentCode','StudentName','StudentLevel','CandidateID','Password','comment'],
			'teachers'=>['ID','SchoolCode','TeacherCode','TeacherName','Email','Username','Password','Items','TeacherRole','comment']
			);
			
?>