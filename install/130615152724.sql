/*
MySQL Backup
Source Server Version: 5.5.25
Source Database: dyscore
Date: 2013/6/15 15:27:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `admins`
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员流水编号',
  `SchoolID` int(6) NOT NULL COMMENT '学校编码',
  `AdminName` char(20) NOT NULL DEFAULT '' COMMENT '管理员账号',
  `AdminPassword` char(20) DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`ID`,`AdminName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='所有学校的管理员';

-- ----------------------------
--  Table structure for `classcourse`
-- ----------------------------
DROP TABLE IF EXISTS `classcourse`;
CREATE TABLE `classcourse` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '班级流水编号',
  `SchoolID` int(11) NOT NULL COMMENT '所属学校编号',
  `ClassID` int(11) NOT NULL COMMENT '班级编号',
  `Chinese` varchar(10) DEFAULT NULL COMMENT '可录入成绩的语文教师真实姓名',
  `Math` varchar(10) DEFAULT NULL COMMENT '可录入成绩的数学教师真实姓名',
  `English` varchar(10) DEFAULT NULL COMMENT '可录入成绩的英语教师真实姓名',
  `Politics` varchar(10) DEFAULT NULL COMMENT '可录入成绩的政治教师真实姓名',
  `History` varchar(10) DEFAULT NULL COMMENT '可录入成绩的历史教师真实姓名',
  `Geography` varchar(10) DEFAULT NULL COMMENT '可录入成绩的地理教师真实姓名',
  `Biological` varchar(10) DEFAULT NULL COMMENT '可录入成绩的生物教师真实姓名',
  `Physical` varchar(10) DEFAULT NULL COMMENT '可录入成绩的物理教师真实姓名',
  `Chemistry` varchar(10) DEFAULT NULL COMMENT '可录入成绩的化学教师真实姓名',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `classes`
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '班级流水编号',
  `SchoolID` int(11) NOT NULL COMMENT '所属学校',
  `Classname` char(20) NOT NULL COMMENT '班级名称',
  `ClassLevel` char(1) DEFAULT NULL COMMENT '年级(初一、初二、初三)',
  `ClassCode` char(8) DEFAULT NULL COMMENT '8位的班级编码',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COMMENT='班级表';

-- ----------------------------
--  Table structure for `items`
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `ItemID` int(11) NOT NULL AUTO_INCREMENT COMMENT '科目编号',
  `ItemName` char(4) NOT NULL COMMENT '课程名称',
  `ItemsLevel` char(10) DEFAULT NULL COMMENT '适合年级',
  `ItemCode` char(10) DEFAULT NULL COMMENT '课程的代码',
  `MaxScore` int(3) unsigned DEFAULT '100' COMMENT '课程考试的分值',
  `Num` int(11) DEFAULT NULL COMMENT '试卷的题目数量',
  PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='所有的课程表';

-- ----------------------------
--  Table structure for `lessons`
-- ----------------------------
DROP TABLE IF EXISTS `lessons`;
CREATE TABLE `lessons` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水编号',
  `SchoolID` int(11) NOT NULL COMMENT '学校编号',
  `ClassID` int(11) NOT NULL COMMENT '班级编号',
  `TeacherID` int(11) NOT NULL COMMENT '教师编号',
  `Lesson` char(10) NOT NULL COMMENT '课程名称',
  `ItemID` int(11) DEFAULT NULL COMMENT '课程编码',
  `Term` varchar(20) NOT NULL COMMENT '学期',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='选课表';

-- ----------------------------
--  Table structure for `schools`
-- ----------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水编号',
  `SchoolCode` char(6) NOT NULL COMMENT '学校编码',
  `Region` varchar(40) DEFAULT NULL COMMENT '学校区域',
  `SchoolName` varchar(40) NOT NULL COMMENT '学校名称',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `scoredetail`
-- ----------------------------
DROP TABLE IF EXISTS `scoredetail`;
CREATE TABLE `scoredetail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水编号',
  `StudentID` int(11) NOT NULL COMMENT '学生学号',
  `Item` varchar(10) DEFAULT NULL COMMENT '科目',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `scores`
-- ----------------------------
DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水编号,自动增加',
  `StudentID` int(11) NOT NULL COMMENT '学生学号',
  `Term` varchar(20) NOT NULL COMMENT '学期',
  `Chinese` float DEFAULT NULL COMMENT '语文',
  `Math` float DEFAULT NULL COMMENT '数学',
  `English` float DEFAULT NULL COMMENT '英语',
  `Politics` float DEFAULT NULL COMMENT '政治',
  `History` float DEFAULT NULL COMMENT '历史',
  `Geography` float DEFAULT NULL COMMENT '地理',
  `Biological` float DEFAULT NULL COMMENT '生物',
  `Physical` float DEFAULT NULL COMMENT '物理',
  `Chemistry` float DEFAULT NULL COMMENT '化学',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生流水编号',
  `SchoolID` int(11) NOT NULL COMMENT '所属学校',
  `ClassID` int(11) NOT NULL COMMENT '所属班级',
  `StudentCode` int(11) NOT NULL COMMENT '学生学号',
  `StudentName` varchar(10) NOT NULL COMMENT '学生姓名',
  `StudentLevel` varchar(10) DEFAULT NULL COMMENT '所在年级',
  `CandidateID` char(255) DEFAULT NULL COMMENT '考号',
  `Password` char(20) DEFAULT NULL COMMENT '学生密码',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `studentsdetail`
-- ----------------------------
DROP TABLE IF EXISTS `studentsdetail`;
CREATE TABLE `studentsdetail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学生详细信息表';

-- ----------------------------
--  Table structure for `teachcourse`
-- ----------------------------
DROP TABLE IF EXISTS `teachcourse`;
CREATE TABLE `teachcourse` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '任课老师流水编号',
  `SchoolID` int(11) NOT NULL COMMENT '任课教师所属学校编号',
  `TeacherID` char(18) NOT NULL COMMENT '任课教师编号',
  `Items` varchar(40) DEFAULT NULL COMMENT '任课教师上课的科目',
  `Term` varchar(20) DEFAULT NULL COMMENT '学期',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='保存教师上课科目';

-- ----------------------------
--  Table structure for `teachers`
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水编号',
  `SchoolID` int(11) NOT NULL COMMENT '所属学校编号',
  `TeacherCode` char(18) DEFAULT NULL COMMENT '教师编号',
  `TeacherName` varchar(20) NOT NULL COMMENT '教师真实姓名',
  `Email` varchar(20) DEFAULT NULL COMMENT '教师邮件',
  `Username` char(20) NOT NULL COMMENT '教师账号',
  `Password` varchar(20) NOT NULL COMMENT '教师密码',
  `Items` varchar(40) DEFAULT NULL COMMENT '任课的科目',
  `TeacherRole` char(10) DEFAULT NULL COMMENT '教师角色（如班主任，管理员,年级主任）',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='教师基本信息表';

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `admins` VALUES ('1','2','lisi','123'), ('2','1','zhangsan','123'), ('3','1','zhangli','456');
INSERT INTO `classes` VALUES ('104','550103','初1-2班','1',NULL), ('105','550103','初1-3班','1',NULL), ('106','550103','初1-4班','1',NULL), ('107','550103','初1-5班','1',NULL), ('108','550103','初1-6班','1',NULL), ('109','550103','初1-7班','1',NULL), ('110','550103','初1-8班','1',NULL), ('111','550103','初1-9班','1',NULL), ('112','550103','初1-10班','1',NULL), ('113','550103','初1-11班','1',NULL), ('114','550103','初1-12班','1',NULL), ('115','550103','初1-2班','1',NULL), ('116','550103','初1-3班','1',NULL), ('117','550103','初1-4班','1',NULL), ('118','550103','初1-5班','1',NULL), ('119','550103','初1-6班','1',NULL), ('120','550103','初1-7班','1',NULL), ('121','550103','初1-8班','1',NULL), ('122','550103','初1-9班','1',NULL), ('123','550103','初1-10班','1',NULL), ('124','550103','初1-11班','1',NULL), ('125','550103','初1-12班','1',NULL);
INSERT INTO `items` VALUES ('1','语文','1',NULL,'100',NULL), ('2','数学','1',NULL,'100',NULL), ('3','英语','1',NULL,'100',NULL), ('4','政治','1',NULL,'100',NULL), ('5','历史','1',NULL,'100',NULL), ('6','地理','1',NULL,'100',NULL), ('7','生物','1',NULL,'100',NULL), ('8','语文','2',NULL,'100',NULL), ('9','数学','2',NULL,'100',NULL), ('10','英语','2',NULL,'100',NULL), ('11','政治','2',NULL,'100',NULL), ('12','历史','2',NULL,'100',NULL), ('13','地理','2',NULL,'100',NULL), ('14','生物','2',NULL,'100',NULL), ('15','物理','2',NULL,'100',NULL), ('16','语文','3',NULL,'100',NULL), ('17','数学','3',NULL,'100',NULL), ('18','英语','3',NULL,'100',NULL), ('19','政治','3',NULL,'100',NULL), ('20','历史','3',NULL,'100',NULL), ('21','地理','3',NULL,'100',NULL), ('22','生物','3',NULL,'100',NULL), ('23','物理','3',NULL,'100',NULL), ('24','化学','3',NULL,'100',NULL);
INSERT INTO `schools` VALUES ('3','550101','旌阳及直属','德阳中学'), ('4','550102','旌阳及直属','德阳二中'), ('5','550103','旌阳及直属','德阳七中'), ('6','550104','旌阳及直属','孝泉中学'), ('7','201334','中间','测试学校'), ('8','550107','旌阳及直属','德阳八中');
INSERT INTO `scores` VALUES ('1','2012120500','hujm','23','234','45','65','353','434','34','234','24'), ('2','214142','125','65','57','54','547','745','4567','47','47','76'), ('3','1234124124','fgd','47','476','476','456','78','88','21','12','4323');
INSERT INTO `teachcourse` VALUES ('1','290029','1213','Chinese',NULL), ('2','232','1213','Chinese',NULL);
INSERT INTO `teachers` VALUES ('1','5','22','ggadf','dfd','dddd','www','ddd',NULL), ('2','5','001','zhangsi',NULL,'zhangsi','123','数学',NULL), ('3','3','3214','zhangsi','wefw','abc','123','语文',NULL);
