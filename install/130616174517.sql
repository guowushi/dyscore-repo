/*
MySQL Backup
Source Server Version: 5.5.25
Source Database: dyscore
Date: 2013/6/16 17:45:17
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
  `comment` text,
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
  `comment` text,
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
  `comment` text,
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
  `comment` text,
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
  `comment` text,
  PRIMARY KEY (`ID`,`SchoolCode`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

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
  `comment` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生流水编号',
  `SchoolID` char(6) NOT NULL COMMENT '所属学校',
  `ClassID` int(11) NOT NULL COMMENT '所属班级',
  `StudentCode` int(11) NOT NULL COMMENT '学生学号',
  `StudentName` varchar(10) NOT NULL COMMENT '学生姓名',
  `StudentLevel` varchar(10) DEFAULT NULL COMMENT '所在年级',
  `CandidateID` char(255) DEFAULT NULL COMMENT '考号',
  `Password` char(20) DEFAULT NULL COMMENT '学生密码',
  `comment` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=415 DEFAULT CHARSET=utf8;

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
  `SchoolID` char(6) NOT NULL COMMENT '所属学校编号',
  `TeacherCode` char(18) DEFAULT NULL COMMENT '教师编号',
  `TeacherName` varchar(20) NOT NULL COMMENT '教师真实姓名',
  `Email` varchar(20) DEFAULT NULL COMMENT '教师邮件',
  `Username` char(20) NOT NULL COMMENT '教师账号',
  `Password` varchar(20) NOT NULL COMMENT '教师密码',
  `Items` varchar(40) DEFAULT NULL COMMENT '任课的科目',
  `TeacherRole` char(10) DEFAULT NULL COMMENT '教师角色（如班主任，管理员,年级主任）',
  `comment` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COMMENT='教师基本信息表';

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `admins` VALUES ('1','2','lisi','123',NULL), ('2','1','zhangsan','123',NULL), ('3','1','zhangli','456',NULL);
INSERT INTO `classes` VALUES ('104','550103','初1-2班','1',NULL,NULL), ('105','550103','初1-3班','1',NULL,NULL), ('106','550103','初1-4班','1',NULL,NULL), ('107','550103','初1-5班','1',NULL,NULL), ('108','550103','初1-6班','1',NULL,NULL), ('109','550103','初1-7班','1',NULL,NULL), ('110','550103','初1-8班','1',NULL,NULL), ('111','550103','初1-9班','1',NULL,NULL), ('112','550103','初1-10班','1',NULL,NULL), ('113','550103','初1-11班','1',NULL,NULL), ('114','550103','初1-12班','1',NULL,NULL), ('115','550103','初1-2班','1',NULL,NULL), ('116','550103','初1-3班','1',NULL,NULL), ('117','550103','初1-4班','1',NULL,NULL), ('118','550103','初1-5班','1',NULL,NULL), ('119','550103','初1-6班','1',NULL,NULL), ('120','550103','初1-7班','1',NULL,NULL), ('121','550103','初1-8班','1',NULL,NULL), ('122','550103','初1-9班','1',NULL,NULL), ('123','550103','初1-10班','1',NULL,NULL), ('124','550103','初1-11班','1',NULL,NULL), ('125','550103','初1-12班','1',NULL,NULL);
INSERT INTO `items` VALUES ('1','语文','1',NULL,'100',NULL,NULL), ('2','数学','1',NULL,'100',NULL,NULL), ('3','英语','1',NULL,'100',NULL,NULL), ('4','政治','1',NULL,'100',NULL,NULL), ('5','历史','1',NULL,'100',NULL,NULL), ('6','地理','1',NULL,'100',NULL,NULL), ('7','生物','1',NULL,'100',NULL,NULL), ('8','语文','2',NULL,'100',NULL,NULL), ('9','数学','2',NULL,'100',NULL,NULL), ('10','英语','2',NULL,'100',NULL,NULL), ('11','政治','2',NULL,'100',NULL,NULL), ('12','历史','2',NULL,'100',NULL,NULL), ('13','地理','2',NULL,'100',NULL,NULL), ('14','生物','2',NULL,'100',NULL,NULL), ('15','物理','2',NULL,'100',NULL,NULL), ('16','语文','3',NULL,'100',NULL,NULL), ('17','数学','3',NULL,'100',NULL,NULL), ('18','英语','3',NULL,'100',NULL,NULL), ('19','政治','3',NULL,'100',NULL,NULL), ('20','历史','3',NULL,'100',NULL,NULL), ('21','地理','3',NULL,'100',NULL,NULL), ('22','生物','3',NULL,'100',NULL,NULL), ('23','物理','3',NULL,'100',NULL,NULL), ('24','化学','3',NULL,'100',NULL,NULL);
INSERT INTO `schools` VALUES ('9','550101','旌阳及直属','德阳中学11',NULL), ('10','550102','旌阳及直属','德阳二中',NULL), ('11','550103','旌阳及直属','德阳七中',NULL), ('12','550104','旌阳及直属','孝泉中学',NULL), ('13','550105','旌阳及直属','岷江东路学校',NULL), ('14','550107','旌阳及直属','德阳八中',NULL), ('15','550108','旌阳及直属','金沙江路学校',NULL), ('16','550109','旌阳及直属','高新区通威中学',NULL), ('17','550110','旌阳及直属','德阳九中',NULL), ('18','550111','旌阳及直属','德阳十中',NULL), ('19','550113','旌阳及直属','柏隆初中',NULL), ('20','550114','旌阳及直属','扬嘉镇千秋中学',NULL), ('21','550115','旌阳及直属','景福初中',NULL), ('22','550116','旌阳及直属','寿丰初中',NULL), ('23','550117','旌阳及直属','新中初中',NULL), ('24','550118','旌阳及直属','双东初中',NULL), ('25','550119','旌阳及直属','通江初中',NULL), ('26','550120','旌阳及直属','和新初中',NULL), ('27','550121','旌阳及直属','黄许初中',NULL), ('28','550122','旌阳及直属','袁家初中',NULL), ('29','550123','旌阳及直属','东泰初中',NULL), ('30','550124','旌阳及直属','孟家初中',NULL), ('31','550125','旌阳及直属','德新初中',NULL), ('32','550126','旌阳及直属','东电中学',NULL), ('33','550127','旌阳及直属','德阳五中',NULL), ('34','550128','旌阳及直属','德阳三中',NULL), ('35','550129','旌阳及直属','外国语学校',NULL), ('36','550131','旌阳及直属','衡山路学校',NULL), ('37','550132','旌阳及直属','东汽中学',NULL);
INSERT INTO `scores` VALUES ('1','2012120500','hujm','23','234','45','65','353','434','34','234','24',NULL), ('2','214142','125','65','57','54','547','745','4567','47','47','76',NULL), ('3','1234124124','fgd','47','476','476','456','78','88','21','12','4323',NULL);
INSERT INTO `students` VALUES ('1','550105','0','0','谢之昱','初一','','',NULL), ('2','550105','0','0','杨蕤涵','初一','','',NULL), ('3','550105','0','0','傅耀','初一','','',NULL), ('4','550105','0','0','兰智翔','初一','','',NULL), ('5','550105','0','0','侯君杰','初一','','',NULL), ('6','550105','0','0','孙乐颖','初一','','',NULL), ('7','550105','0','0','杨新钰','初一','','',NULL), ('8','550105','0','0','邓玉珊','初一','','',NULL), ('9','550105','0','0','邓翔尹','初一','','',NULL), ('10','550105','0','0','江欣芮','初一','','',NULL), ('11','550105','0','0','刘雪灵','初一','','',NULL), ('12','550105','0','0','田蕾','初一','','',NULL), ('13','550105','0','0','杨培榆','初一','','',NULL), ('14','550105','0','0','邹贻婕','初一','','',NULL), ('15','550105','0','0','陈余佳黛','初一','','',NULL), ('16','550105','0','0','赵晗艺','初一','','',NULL), ('17','550105','0','0','刘溢中','初一','','',NULL), ('18','550105','0','0','覃奕','初一','','',NULL), ('19','550105','0','0','舒杨','初一','','',NULL), ('20','550105','0','0','肖劲涛','初一','','',NULL), ('21','550105','0','0','张庆扬','初一','','',NULL), ('22','550105','0','0','陈泽伟','初一','','',NULL), ('23','550105','0','0','代钧益','初一','','',NULL), ('24','550105','0','0','李龙','初一','','',NULL), ('25','550105','0','0','杨宸霁','初一','','',NULL), ('26','550105','0','0','阳诗雨','初一','','',NULL), ('27','550105','0','0','张雨静','初一','','',NULL), ('28','550105','0','0','吕依隆','初一','','',NULL), ('29','550105','0','0','汪子怡','初一','','',NULL), ('30','550105','0','0','王丽艳','初一','','',NULL), ('31','550105','0','0','肖阳','初一','','',NULL), ('32','550105','0','0','刘思源','初一','','',NULL), ('33','550105','0','0','舒韵璇','初一','','',NULL), ('34','550105','0','0','向蓝灵','初一','','',NULL), ('35','550105','0','0','谢世虞','初一','','',NULL), ('36','550105','0','0','张欣','初一','','',NULL), ('37','550105','0','0','张雅欣','初一','','',NULL), ('38','550105','0','0','刘思冰','初一','','',NULL), ('39','550105','0','0','肖懿','初一','','',NULL), ('40','550105','0','0','刘嫒琳','初一','','',NULL), ('41','550105','0','0','聂芷莹','初一','','',NULL), ('42','550105','0','0','蔡雨龙','初一','','',NULL), ('43','550105','0','0','李自鹏','初一','','',NULL), ('44','550105','0','0','林国友','初一','','',NULL), ('45','550105','0','0','彭子瀚','初一','','',NULL), ('46','550105','0','0','蒲颜斌','初一','','',NULL), ('47','550105','0','0','高靖萱','初一','','',NULL), ('48','550105','0','0','王成文','初一','','',NULL), ('49','550105','0','0','付少宗','初一','','',NULL), ('50','550105','0','0','胡秀健','初一','','',NULL), ('51','550105','0','0','江忠悦','初一','','',NULL), ('52','550105','0','0','匡健清','初一','','',NULL), ('53','550105','0','0','银海深','初一','','',NULL), ('54','550105','0','0','柏云泷','初一','','',NULL), ('55','550105','0','0','龙前林','初一','','',NULL), ('56','550105','0','0','罗中豪','初一','','',NULL), ('57','550105','0','0','杨世铭','初一','','',NULL), ('58','550105','0','0','陈柯宇','初一','','',NULL), ('59','550105','0','0','黄运泽','初一','','',NULL), ('60','550105','0','0','凌涛','初一','','',NULL), ('61','550105','0','0','刘思危','初一','','',NULL), ('62','550105','0','0','魏发山','初一','','',NULL), ('63','550105','0','0','文笑天','初一','','',NULL), ('64','550105','0','0','闫杭','初一','','',NULL), ('65','550105','0','0','尹睿','初一','','',NULL), ('66','550105','0','0','周银潮','初一','','',NULL), ('67','550105','0','0','周崟','初一','','',NULL), ('68','550105','0','0','黄伟禄','初一','','',NULL), ('69','550105','0','0','李诗怡','初一','','',NULL), ('70','550105','0','0','杨璨瑜','初一','','',NULL), ('71','550105','0','0','刘钰','初一','','',NULL), ('72','550105','0','0','唐清','初一','','',NULL), ('73','550105','0','0','黄瑶','初一','','',NULL), ('74','550105','0','0','唐志平','初一','','',NULL), ('75','550105','0','0','何嘉雯','初一','','',NULL), ('76','550105','0','0','舒秋雨','初一','','',NULL), ('77','550105','0','0','王媛媛','初一','','',NULL), ('78','550105','0','0','吴明灿','初一','','',NULL), ('79','550105','0','0','王露晶','初一','','',NULL), ('80','550105','0','0','代亚雯','初一','','',NULL), ('81','550105','0','0','江雨泽','初一','','',NULL), ('82','550105','0','0','谢可心','初一','','',NULL), ('83','550105','0','0','杨智','初一','','',NULL), ('84','550105','0','0','潘春雨','初一','','',NULL), ('85','550105','0','0','李丰宇','初一','','',NULL), ('86','550105','0','0','刘鹏','初一','','',NULL), ('87','550105','0','0','刘豪','初一','','',NULL), ('88','550105','0','0','郭琪琪','初一','','',NULL), ('89','550105','0','0','熊翰琳','初一','','',NULL), ('90','550105','0','0','隆镒泽','初一','','',NULL), ('91','550105','0','0','胡欣','初一','','',NULL), ('92','550105','0','0','陈忠坤','初一','','',NULL), ('93','550105','0','0','何焌珑','初一','','',NULL), ('94','550105','0','0','李昊骏','初一','','',NULL), ('95','550105','0','0','胡佳','初一','','',NULL), ('96','550105','0','0','胡家若','初一','','',NULL), ('97','550105','0','0','刘俊杰','初一','','',NULL), ('98','550105','0','0','张铭望','初一','','',NULL), ('99','550105','0','0','郑志豪','初一','','',NULL), ('100','550105','0','0','胡秀康','初一','','',NULL);
INSERT INTO `students` VALUES ('101','550105','0','0','蒋宇','初一','','',NULL), ('102','550105','0','0','廖文皓','初一','','',NULL), ('103','550105','0','0','谢典','初一','','',NULL), ('104','550105','0','0','余世清','初一','','',NULL), ('105','550105','0','0','郑权府','初一','','',NULL), ('106','550105','0','0','罗杨洋','初一','','',NULL), ('107','550105','0','0','罗阳','初一','','',NULL), ('108','550105','0','0','周英荣','初一','','',NULL), ('109','550105','0','0','江本霖','初一','','',NULL), ('110','550105','0','0','李世林','初一','','',NULL), ('111','550105','0','0','唐俊','初一','','',NULL), ('112','550105','0','0','杨森','初一','','',NULL), ('113','550105','0','0','范云山','初一','','',NULL), ('114','550105','0','0','陈乾坤','初一','','',NULL), ('115','550105','0','0','邓冰冰','初一','','',NULL), ('116','550105','0','0','龚宇','初一','','',NULL), ('117','550105','0','0','王露瑶','初一','','',NULL), ('118','550105','0','0','钟诗琪','初一','','',NULL), ('119','550105','0','0','何诗雨','初一','','',NULL), ('120','550105','0','0','黄晓莹','初一','','',NULL), ('121','550105','0','0','黄怡欣','初一','','',NULL), ('122','550105','0','0','吴鸿鸥','初一','','',NULL), ('123','550105','0','0','兰希','初一','','',NULL), ('124','550105','0','0','李佳','初一','','',NULL), ('125','550105','0','0','许雨春','初一','','',NULL), ('126','550105','0','0','张静','初一','','',NULL), ('127','550105','0','0','钟佩瑶','初一','','',NULL), ('128','550105','0','0','陈雨婷','初一','','',NULL), ('129','550105','0','0','林青','初一','','',NULL), ('130','550105','0','0','陈欣雨','初一','','',NULL), ('131','550105','0','0','邹小娇','初一','','',NULL), ('132','550105','0','0','吕瀚月','初一','','',NULL), ('133','550105','0','0','蔡浩煊','初一','','',NULL), ('134','550105','0','0','刘卓玉','初一','','',NULL), ('135','550105','0','0','蔡雨恒','初一','','',NULL), ('136','550105','0','0','王磊','初一','','',NULL), ('137','550105','0','0','刘逸睛','初一','','',NULL), ('138','550105','0','0','田梦雪','初一','','',NULL), ('139','550105','0','0','成梦婷','初一','','',NULL), ('140','550105','0','0','刘颖','初一','','',NULL), ('141','550105','0','0','吴德强','初一','','',NULL), ('142','550105','0','0','巫亚星','初一','','',NULL), ('143','550105','0','0','肖何星','初一','','',NULL), ('144','550105','0','0','吉鑫涛','初一','','',NULL), ('145','550105','0','0','李志康','初一','','',NULL), ('146','550105','0','0','周思捷','初一','','',NULL), ('147','550105','0','0','左昊文','初一','','',NULL), ('148','550105','0','0','陈俊良','初一','','',NULL), ('149','550105','0','0','李强','初一','','',NULL), ('150','550105','0','0','林家洛','初一','','',NULL), ('151','550105','0','0','汤小虎','初一','','',NULL), ('152','550105','0','0','薛昌达','初一','','',NULL), ('153','550105','0','0','张新昊','初一','','',NULL), ('154','550105','0','0','邓龙腾','初一','','',NULL), ('155','550105','0','0','刘天奥','初一','','',NULL), ('156','550105','0','0','罗尹昊','初一','','',NULL), ('157','550105','0','0','谢韬','初一','','',NULL), ('158','550105','0','0','杨双','初一','','',NULL), ('159','550105','0','0','曾超','初一','','',NULL), ('160','550105','0','0','贺志武','初一','','',NULL), ('161','550105','0','0','林翱翀','初一','','',NULL), ('162','550105','0','0','刘玖艺','初一','','',NULL), ('163','550105','0','0','孙霖','初一','','',NULL), ('164','550105','0','0','谢普杰','初一','','',NULL), ('165','550105','0','0','张智毅','初一','','',NULL), ('166','550105','0','0','邓曲','初一','','',NULL), ('167','550105','0','0','邓怡','初一','','',NULL), ('168','550105','0','0','曾燕妮','初一','','',NULL), ('169','550105','0','0','朱琬玉','初一','','',NULL), ('170','550105','0','0','何欣','初一','','',NULL), ('171','550105','0','0','罗峥嵘','初一','','',NULL), ('172','550105','0','0','潘晴','初一','','',NULL), ('173','550105','0','0','汤嫚嫚','初一','','',NULL), ('174','550105','0','0','杨钧婷','初一','','',NULL), ('175','550105','0','0','赵雪','初一','','',NULL), ('176','550105','0','0','段思祺','初一','','',NULL), ('177','550105','0','0','高滢轩','初一','','',NULL), ('178','550105','0','0','李游佳','初一','','',NULL), ('179','550105','0','0','黄福玲汇','初一','','',NULL), ('180','550105','0','0','戚濒月','初一','','',NULL), ('181','550105','0','0','秦羽','初一','','',NULL), ('182','550105','0','0','谢芙蓉','初一','','',NULL), ('183','550105','0','0','杨瑞澜','初一','','',NULL), ('184','550105','0','0','朱洲瑶','初一','','',NULL), ('185','550105','0','0','黎涵琳','初一','','',NULL), ('186','550105','0','0','罗梅','初一','','',NULL), ('187','550105','0','0','罗涛','初一','','',NULL), ('188','550105','0','0','马代权','初一','','',NULL), ('189','550105','0','0','王凯博','初一','','',NULL), ('190','550105','0','0','李木子','初一','','',NULL), ('191','550105','0','0','杨宇','初一','','',NULL), ('192','550105','0','0','黄潞','初一','','',NULL), ('193','550105','0','0','杨俊康','初一','','',NULL), ('194','550105','0','0','郑全江','初一','','',NULL), ('195','550105','0','0','邹炉林','初一','','',NULL), ('196','550105','0','0','黄梦林','初一','','',NULL), ('197','550105','0','0','朱彬','初一','','',NULL), ('198','550105','0','0','陈李飞阳','初一','','',NULL), ('199','550105','0','0','郑文斌','初一','','',NULL), ('200','550105','0','0','陈麒麟','初一','','',NULL);
INSERT INTO `students` VALUES ('201','550105','0','0','邓涛','初一','','',NULL), ('202','550105','0','0','赖超','初一','','',NULL), ('203','550105','0','0','赖孝安','初一','','',NULL), ('204','550105','0','0','欧志福','初一','','',NULL), ('205','550105','0','0','徐贤昊','初一','','',NULL), ('206','550105','0','0','陈照阳','初一','','',NULL), ('207','550105','0','0','高朝阳','初一','','',NULL), ('208','550105','0','0','彭元锐','初一','','',NULL), ('209','550105','0','0','唐小龙','初一','','',NULL), ('210','550105','0','0','谢为立','初一','','',NULL), ('211','550105','0','0','胡爽亮','初一','','',NULL), ('212','550105','0','0','李煜','初一','','',NULL), ('213','550105','0','0','谢智','初一','','',NULL), ('214','550105','0','0','袁宇杰','初一','','',NULL), ('215','550105','0','0','周仕杰','初一','','',NULL), ('216','550105','0','0','魏雯昱','初一','','',NULL), ('217','550105','0','0','张友余','初一','','',NULL), ('218','550105','0','0','杨苹','初一','','',NULL), ('219','550105','0','0','刘雨琪','初一','','',NULL), ('220','550105','0','0','王春雁','初一','','',NULL), ('221','550105','0','0','温倩','初一','','',NULL), ('222','550105','0','0','钱余静美','初一','','',NULL), ('223','550105','0','0','周维','初一','','',NULL), ('224','550105','0','0','邹子静','初一','','',NULL), ('225','550105','0','0','江雨','初一','','',NULL), ('226','550105','0','0','蒋炬佳','初一','','',NULL), ('227','550105','0','0','李明沁','初一','','',NULL), ('228','550105','0','0','刘璐','初一','','',NULL), ('229','550105','0','0','张钰稀','初一','','',NULL), ('230','550105','0','0','曾熙','初一','','',NULL), ('231','550105','0','0','邓美玲','初一','','',NULL), ('232','550105','0','0','张佳琪','初一','','',NULL), ('233','550105','0','0','姜文静','初一','','',NULL), ('234','550105','0','0','尹志强','初一','','',NULL), ('235','550105','0','0','肖煜','初一','','',NULL), ('236','550105','0','0','梁永锡','初一','','',NULL), ('237','550105','0','0','马棣燚','初一','','',NULL), ('238','550105','0','0','周世永','初一','','',NULL), ('239','550105','0','0','卢雨青','初一','','',NULL), ('240','550105','0','0','肖敏','初一','','',NULL), ('241','550105','0','0','冯苏萍','初一','','',NULL), ('242','550105','0','0','彭洪坤','初一','','',NULL), ('243','550105','0','0','詹蕊宁','初一','','',NULL), ('244','550105','0','0','马淑君','初一','','',NULL), ('245','550105','0','0','林夏','初一','','',NULL), ('246','550125','0','0','陈加鹏\r\n陈加鹏\r\n','初二',NULL,NULL,NULL), ('247','550125','55012501','0','陈加鹏','初二','','',''), ('248','550125','55012501','0','陈冉','初二','','',''), ('249','550125','55012501','0','陈璇','初二','','',''), ('250','550125','55012501','0','陈宇彤','初二','','',''), ('251','550125','55012501','0','邓洪辉','初二','','',''), ('252','550125','55012501','0','方婷','初二','','',''), ('253','550125','55012501','0','吉申德','初二','','',''), ('254','550125','55012501','0','李文灵','初二','','',''), ('255','550125','55012501','0','梁洋锋','初二','','',''), ('256','550125','55012501','0','刘曹伟','初二','','',''), ('257','550125','55012501','0','刘丽丽','初二','','',''), ('258','550125','55012501','0','刘文平','初二','','',''), ('259','550125','55012501','0','刘雅文','初二','','',''), ('260','550125','55012501','0','刘越','初二','','',''), ('261','550125','55012501','0','龙佳','初二','','',''), ('262','550125','55012501','0','龙利华','初二','','',''), ('263','550125','55012501','0','龙芸杉','初二','','',''), ('264','550125','55012501','0','米运进','初二','','',''), ('265','550125','55012501','0','邱豪 ','初二','','',''), ('266','550125','55012501','0','邱述林','初二','','',''), ('267','550125','55012501','0','孙莎莎','初二','','',''), ('268','550125','55012501','0','田俊','初二','','',''), ('269','550125','55012501','0','王江林','初二','','',''), ('270','550125','55012501','0','肖工辉','初二','','',''), ('271','550125','55012501','0','肖伟','初二','','',''), ('272','550125','55012501','0','谢佳妮','初二','','',''), ('273','550125','55012501','0','严诗','初二','','',''), ('274','550125','55012501','0','杨俊','初二','','',''), ('275','550125','55012501','0','杨磊','初二','','',''), ('276','550125','55012501','0','杨政','初二','','',''), ('277','550125','55012501','0','袁书俊','初二','','',''), ('278','550125','55012501','0','袁秋雨','初二','','',''), ('279','550125','55012501','0','张果','初二','','',''), ('280','550125','55012501','0','张杰','初二','','',''), ('281','550125','55012501','0','张林','初二','','',''), ('282','550125','55012501','0','张雨婷','初二','','',''), ('283','550125','55012501','0','赵丽','初二','','',''), ('284','550125','55012501','0','郑杰','初二','','',''), ('285','550125','55012501','0','周萌林','初二','','',''), ('286','550125','55012501','0','周麒','初二','','',''), ('287','550125','55012501','0','周思雨','初二','','',''), ('288','550125','55012501','0','周易','初二','','',''), ('289','550125','55012501','0','左慧明','初二','','',''), ('290','550125','55012501','0','罗欢','初二','','',''), ('291','550125','55012501','0','秦永钦','初二','','',''), ('292','550125','55012502','0','蔡吉','初二','','',''), ('293','550125','55012502','0','陈田','初二','','',''), ('294','550125','55012502','0','付唐银','初二','','',''), ('295','550125','55012502','0','高静茹','初二','','',''), ('296','550125','55012502','0','高俊','初二','','',''), ('297','550125','55012502','0','高洋','初二','','',''), ('298','550125','55012502','0','何雯','初二','','',''), ('299','550125','55012502','0','胡蓉花','初二','','',''), ('300','550125','55012502','0','蒋逸','初二','','','');
INSERT INTO `students` VALUES ('301','550125','55012502','0','蒋勇','初二','','',''), ('302','550125','55012502','0','赖文欣','初二','','',''), ('303','550125','55012502','0','李 泽文','初二','','',''), ('304','550125','55012502','0','李铧莉','初二','','',''), ('305','550125','55012502','0','李琴琴','初二','','',''), ('306','550125','55012502','0','李霄','初二','','',''), ('307','550125','55012502','0','李雪梅','初二','','',''), ('308','550125','55012502','0','刘莎','初二','','',''), ('309','550125','55012502','0','刘鹏','初二','','',''), ('310','550125','55012502','0','刘青钰','初二','','',''), ('311','550125','55012502','0','刘毅','初二','','',''), ('312','550125','55012502','0','龙苏园','初二','','',''), ('313','550125','55012502','0','卿凯悦','初二','','',''), ('314','550125','55012502','0','石昊宇','初二','','',''), ('315','550125','55012502','0','王根旋','初二','','',''), ('316','550125','55012502','0','王龚丽','初二','','',''), ('317','550125','55012502','0','王文坤','初二','','',''), ('318','550125','55012502','0','夏东','初二','','',''), ('319','550125','55012502','0','肖鸿基','初二','','',''), ('320','550125','55012502','0','肖瑞','初二','','',''), ('321','550125','55012502','0','杨珂','初二','','',''), ('322','550125','55012502','0','杨鑫','初二','','',''), ('323','550125','55012502','0','杨勇','初二','','',''), ('324','550125','55012502','0','袁辉','初二','','',''), ('325','550125','55012502','0','张成','初二','','',''), ('326','550125','55012502','0','张思雨','初二','','',''), ('327','550125','55012502','0','张燚','初二','','',''), ('328','550125','55012502','0','郑伟','初二','','',''), ('329','550125','55012502','0','钟翔','初二','','',''), ('330','550125','55012502','0','周启燕','初二','','',''), ('331','550125','55012502','0','周智华','初二','','',''), ('332','550125','55012502','0','李刚','初二','','',''), ('333','550125','55012502','0','尹小水','初二','','',''), ('334','550125','55012503','0','蔡希','初二','','',''), ('335','550125','55012503','0','陈祥','初二','','',''), ('336','550125','55012503','0','杜治勇','初二','','',''), ('337','550125','55012503','0','符贵川','初二','','',''), ('338','550125','55012503','0','付峻湄','初二','','',''), ('339','550125','55012503','0','高枫琳','初二','','',''), ('340','550125','55012503','0','高林','初二','','',''), ('341','550125','55012503','0','郭佳','初二','','',''), ('342','550125','55012503','0','李林林','初二','','',''), ('343','550125','55012503','0','李燃','初二','','',''), ('344','550125','55012503','0','李泽武','初二','','',''), ('345','550125','55012503','0','刘静','初二','','',''), ('346','550125','55012503','0','刘月','初二','','',''), ('347','550125','55012503','0','龙丹','初二','','',''), ('348','550125','55012503','0','龙生林','初二','','',''), ('349','550125','55012503','0','欧阳庆德','初二','','',''), ('350','550125','55012503','0','彭路佳','初二','','',''), ('351','550125','55012503','0','彭伟','初二','','',''), ('352','550125','55012503','0','王俊豪','初二','','',''), ('353','550125','55012503','0','王敏','初二','','',''), ('354','550125','55012503','0','王姝晴','初二','','',''), ('355','550125','55012503','0','王兴悦','初二','','',''), ('356','550125','55012503','0','王永杰','初二','','',''), ('357','550125','55012503','0','王雨','初二','','',''), ('358','550125','55012503','0','魏家豪','初二','','',''), ('359','550125','55012503','0','谢赟','初二','','',''), ('360','550125','55012503','0','徐文兵','初二','','',''), ('361','550125','55012503','0','许志成','初二','','',''), ('362','550125','55012503','0','杨爱','初二','','',''), ('363','550125','55012503','0','杨帆','初二','','',''), ('364','550125','55012503','0','杨柳','初二','','',''), ('365','550125','55012503','0','张陈陈','初二','','',''), ('366','550125','55012503','0','张纪希','初二','','',''), ('367','550125','55012503','0','张洁','初二','','',''), ('368','550125','55012503','0','张林','初二','','',''), ('369','550125','55012503','0','张巍','初二','','',''), ('370','550125','55012503','0','张欣宇','初二','','',''), ('371','550125','55012503','0','张尹尧','初二','','',''), ('372','550125','55012503','0','张雨洁','初二','','',''), ('373','550125','55012503','0','赵准','初二','','',''), ('374','550125','55012503','0','钟汶希','初二','','',''), ('375','550125','55012503','0','李伟','初二','','',''), ('376','550125','55012503','0','袁伟','初二','','',''), ('377','550125','55012503','0','王月','初二','','',''), ('378','550125','55012504','0','曹静','初二','','',''), ('379','550125','55012504','0','陈玉琳','初二','','',''), ('380','550125','55012504','0','程号','初二','','',''), ('381','550125','55012504','0','关明月','初二','','',''), ('382','550125','55012504','0','何跃祖','初二','','',''), ('383','550125','55012504','0','胡玲','初二','','',''), ('384','550125','55012504','0','胡紫月','初二','','',''), ('385','550125','55012504','0','黄程','初二','','',''), ('386','550125','55012504','0','黄健','初二','','',''), ('387','550125','55012504','0','黄玲康','初二','','',''), ('388','550125','55012504','0','孔祥瑞','初二','','',''), ('389','550125','55012504','0','赖佳怡','初二','','',''), ('390','550125','55012504','0','李小波','初二','','',''), ('391','550125','55012504','0','刘红','初二','','',''), ('392','550125','55012504','0','刘思思','初二','','',''), ('393','550125','55012504','0','刘鑫','初二','','',''), ('394','550125','55012504','0','龙泳洁','初二','','',''), ('395','550125','55012504','0','陆芹','初二','','',''), ('396','550125','55012504','0','米玲','初二','','',''), ('397','550125','55012504','0','彭元新','初二','','',''), ('398','550125','55012504','0','邱士林','初二','','',''), ('399','550125','55012504','0','任强','初二','','',''), ('400','550125','55012504','0','唐竟','初二','','','');
INSERT INTO `students` VALUES ('401','550125','55012504','0','唐茂国','初二','','',''), ('402','550125','55012504','0','田磊','初二','','',''), ('403','550125','55012504','0','田绍文','初二','','',''), ('404','550125','55012504','0','王宇亮','初二','','',''), ('405','550125','55012504','0','肖帅','初二','','',''), ('406','550125','55012504','0','谢永芳','初二','','',''), ('407','550125','55012504','0','阳佳蕊','初二','','',''), ('408','550125','55012504','0','杨政','初二','','',''), ('409','550125','55012504','0','袁明清','初二','','',''), ('410','550125','55012504','0','张亮','初二','','',''), ('411','550125','55012504','0','张悦','初二','','',''), ('412','550125','55012504','0','周健','初二','','',''), ('413','550125','55012504','0','周正兴','初二','','',''), ('414','550125','55012504','0','张皓轩','初二','','','');
INSERT INTO `teachcourse` VALUES ('1','290029','1213','Chinese',NULL), ('2','232','1213','Chinese',NULL);
INSERT INTO `teachers` VALUES ('4','550103','','蔡仲秀','','蔡仲秀','123','英语','',NULL), ('5','550103','','曹崇钰','','曹崇钰','123','语文','',NULL), ('6','550103','','曾传刚','','曾传刚','123','数学','',NULL), ('7','550103','','曾学刚','','曾学刚','123','政治','',NULL), ('8','550103','','曾瑛','','曾瑛','123','数学','',NULL), ('9','550103','','常中伦','','常中伦','123','体育','',NULL), ('10','550103','','谌贻强','','谌贻强','123','音乐','',NULL), ('11','550103','','邓龙玉','','邓龙玉','123','语文','',NULL), ('12','550103','','段玉梅','','段玉梅','123','英语,地理','',NULL), ('13','550103','','冯敏','','冯敏','123','语文','',NULL), ('14','550103','','高娟','','高娟','123','数学','',NULL), ('15','550103','','顾安菊','','顾安菊','123','语文','',NULL), ('16','550103','','顾欢','','顾欢','123','语文','',NULL), ('17','550103','','郭金奎','','郭金奎','123','美术','',NULL), ('18','550103','','郭涛','','郭涛','123','英语','',NULL), ('19','550103','','何绪海','','何绪海','123','政治','',NULL), ('20','550103','','洪兵','','洪兵','123','数学','',NULL), ('21','550103','','胡天强','','胡天强','123','数学,健康','',NULL), ('22','550103','','黄斌','','黄斌','123','地理','',NULL), ('23','550103','','黄达虎','','黄达虎','123','英语','',NULL), ('24','550103','','黄永巧','','黄永巧','123','英语','',NULL), ('25','550103','','江敏','','江敏','123','体育','',NULL), ('26','550103','','赖祖顺','','赖祖顺','123','数学','',NULL), ('27','550103','','兰方','','兰方','123','语文','',NULL), ('28','550103','','李灼','','李灼','123','英语','',NULL), ('29','550103','','李海燕','','李海燕','123','语文','',NULL), ('30','550103','','李燕','','李燕','123','体育','',NULL), ('31','550103','','林海波','','林海波','123','语文','',NULL), ('32','550103','','刘军','','刘军','123','政治,数学','',NULL), ('33','550103','','刘萌','','刘萌','123','语文','',NULL), ('34','550103','','刘顺菊','','刘顺菊','123','政治','',NULL), ('35','550103','','龙华轩','','龙华轩','123','生物','',NULL), ('36','550103','','罗丹','','罗丹','123','英语','',NULL), ('37','550103','','罗秀芝','','罗秀芝','123','数学','',NULL), ('38','550103','','吕名','','吕名','123','地理','',NULL), ('39','550103','','毛丹丹','','毛丹丹','123','化学','',NULL), ('40','550103','','梅奇','','梅奇','123','地理','',NULL), ('41','550103','','米琼','','米琼','123','语文,政治','',NULL), ('42','550103','','聂林','','聂林','123','物理','',NULL), ('43','550103','','聂中林','','聂中林','123','数学','',NULL), ('44','550103','','彭平','','彭平','123','语文','',NULL), ('45','550103','','秦加林','','秦加林','123','数学','',NULL), ('46','550103','','邱崇伟','','邱崇伟','123','生物','',NULL), ('47','550103','','税丽娟','','税丽娟','123','数学','',NULL), ('48','550103','','宋瑛','','宋瑛','123','历史','',NULL), ('49','550103','','唐华','','唐华','123','物理','',NULL), ('50','550103','','唐婧','','唐婧','123','语文','',NULL), ('51','550103','','王国才','','王国才','123','物理','',NULL), ('52','550103','','王和英','','王和英','123','英语','',NULL), ('53','550103','','王明芬','','王明芬','123','历史','',NULL), ('54','550103','','王明琼','','王明琼','123','英语','',NULL), ('55','550103','','王明远','','王明远','123','数学','',NULL), ('56','550103','','王倩','','王倩','123','英语','',NULL), ('57','550103','','谢慧明','','谢慧明','123','数学','',NULL), ('58','550103','','谢凯南','','谢凯南','123','化学,生物','',NULL), ('59','550103','','谢燕华','','谢燕华','123','英语','',NULL), ('60','550103','','杨成','','杨成','123','数学','',NULL), ('61','550103','','杨光满','','杨光满','123','物理','',NULL), ('62','550103','','杨礼菊','','杨礼菊','123','生物,英语','',NULL), ('63','550103','','杨晓琴','','杨晓琴','123','数学','',NULL), ('64','550103','','杨咏梅','','杨咏梅','123','英语','',NULL), ('65','550103','','姚洪玉','','姚洪玉','123','物理','',NULL), ('66','550103','','叶世华','','叶世华','123','化学,生物','',NULL), ('67','550103','','袁晓','','袁晓','123','历史','',NULL), ('68','550103','','张素兰','','张素兰','123','英语','',NULL), ('69','550103','','张婉华','','张婉华','123','英语','',NULL), ('70','550103','','张婉华','','张婉华','123','英语','',NULL), ('71','550103','','张秀英','','张秀英','123','语文,政治','',NULL), ('72','550103','','张远坤','','张远坤','123','语文','',NULL), ('73','550103','','周会','','周会','123','历史','',NULL), ('74','550103','','周晓宏','','周晓宏','123','健康','',NULL), ('75','550103','','周雄','','周雄','123','物理','',NULL), ('76','550103','','周雄','','周雄','123','物理','',NULL), ('77','550103','','周雄','','周雄','123','物理','',NULL), ('78','550103','','周玉菊','','周玉菊','123','计算机','',NULL), ('79','550103','','周裕民','','周裕民','123','政治','',NULL);
