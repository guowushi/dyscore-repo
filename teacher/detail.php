<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
th{height:30px; background-color: #63C; padding-top:10px;}
td p{height:40px; background-color:#ccc; text-align: left; padding-top:20px;}
td{ font-size:12px}
</style>
</head>
<?php
require_once dirname(__FILE__) . '/common.php';
require_once dirname(__FILE__) . '/student.class.php';

$id=$_GET["id"];
$query_sql = "SELECT * FROM students Where ID=" .$id;
// 执行sql语句，得到一个结果集合
$rs = $db->query($query_sql);
// 获取第一行
$row = $rs->fetch();
//print_r($row); 


/*
$row['classes'],  
$row['StudentName'],
$row['sex'] , 
$row['IDType'] ,
$row['IDCard'],  
$row['nationality'],  
$row['birth'],  
$row['RuXueNianYue'], 
$row['EntranceWay'] ,
$row['XueJiHao'],  
$row['schoolCode'],  
$row['IDExpiredDate'], 
$row['HuJiDi'], 
$row['jdcategory'],
$row['JiuDuFangShi'],  
$row['XueShengLaiYuan'],  
$row['schoolGraduation'],  
$row['entranceScores'],  
$row['usedName'],
$row['nativePlace'], 
$row['BirthAddress'], 
$row['LiveAddress'],  
$row['PostalAddress'], 
$row['postalCode'],
$row['telephone'],  
$row['email'],  
$row['ZhuYeDiZhi'],  
$row['GangTaiQiaoWai'],  
$row['bloodType'],
$row['health'],  
$row['politicsStatus'] , 
$row['SuiBanJiuDu'],  
$row['disability'],  
$row['speciality'],
$row['MaiXueWei'],  
$row['LeftoverChildren'],  
$row['onlyChild'],  
$row['MigrantChildren'] ,  
$row['DiBao'],
$row['SingleFamily'], 
$row['BuZhu'],  
$row['JiaoShiZiNv'],  
$row['MilitaryChildren'], 
$row['XueQianJiaoYu'],
$row['orphan'],  
$row['LieShi'],  
$row['applyForFunding'],  
$row['HasSubsidy'],  
$row['distance'],
$row['transportation'], 
$row['SchoolBus'],  
$row['F_name'],  
$row['F_nationality'], 
$row['F_tel'],
$row['F_workPlace'],  
$row['F_hujidi'],  
$row['F_address'],  
$row['F_IDtype'],  
$row['F_IDcard'],
$row['F_job'] ,  
$row['M_name'],  
$row['M_nationality'],  
$row['M_tel'] ,  
$row['M_workPlace'],
$row['M_hujidi'],  
$row['M_address'],  
$row['M_IDtype'],  
$row['M_IDcard'],  
$row['M_job'],  
$row['Q_name'],  
$row['Q_nationality'],  
$row['Q_tel'],  
$row['Q_workPlace'],  
$row['Q_hujidi'], 
$row['Q_address'],  
$row['Q_IDtype'],  
$row['Q_IDcard'],  
$row['Q_job'] ,  
$row['Q_Introductions']
*/
?>
<body><h2 align="center">学生基本信息表</h2></p>
<table width="1000" border="0" bgcolor="#000000" cellspacing="1" cellpadding="0" align="center">
 <tr align="center" bgcolor="#FFFFFF">
   <th>编号</th>
    <th width="210px">项目名称</th>
    <th>基础数据</th>
    <th>编号</th>
    <th width="200px">项目名称</th>
    <th>基础数据</th>
  </tr>
  <tr>
      <td colspan="8">
      <p>学生个人基础信息</p>
      </td>      
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">1</td>
    <td>姓名 <font color="#ff0000">*</font></td>
    <td><?php echo $row['StudentName'];?></td>
    <td align="center">8</td>
    <td>身份证件类型 <font color="#ff0000">*</font></td>
    <td><?php echo $row['IDType'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">2</td>
    <td>性别 <font color="#ff0000">*</font></td>
    <td><?php echo $row['sex'];?></td>
    <td align="center">9</td>
    <td>身份证件号</td>
    <td><?php echo $row['IDCard'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">3</td>
    <td>出生日期 <font color="#ff0000">*</font></td>
    <td><?php echo $row['birth'];?></td>
    <td align="center">10</td>
    <td>港澳台侨外 <font color="#ff0000">*</font></td>
    <td><?php echo $row['GangTaiQiaoWai'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">4</td>
    <td>出生地 <font color="#ff0000">*</font></td>
    <td><?php echo $row['BirthAddress'];?></td>
    <td align="center">11</td>
    <td>政治面貌</td>
    <td><?php echo $row['politicsStatus'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">5</td>
    <td>籍贯 <font color="#ff0000">*</font></td>
    <td><?php echo $row['nativePlace'];?></td>
    <td align="center">12</td>
    <td>健康状况 <font color="#ff0000">*</font></td>
    <td><?php echo $row['health'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">6</td>
    <td>民族 <font color="#ff0000">*</font></td>
    <td><?php echo $row['nationality'];?></td>
    <td align="center">13</td>
    <td>照片 <font color="#ff0000">*</font></td>
    <td></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">7</td>
    <td>国籍/地区 <font color="#ff0000">*</font></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
      <td colspan="8">
      <p>学生个人辅助信息</p>
      </td>      
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">14</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">17</td>
    <td>户口所在地 <font color="#ff0000">*</font></td>
    <td><?php echo $row['HuJiDi'];?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">15</td>
    <td>曾用名</td>
    <td><?php echo $row['usedName'];?></td>
    <td align="center">18</td>
    <td>户口性质 <font color="#ff0000">*</font></td>
    <td><?php echo $row['jdCategory'];?></td>
  </tr>
  
  
  <tr bgcolor="#FFFFFF">
    <td align="center">16</td>
    <td>身份证件有效期</td>
    <td><?php echo $row['IDExpiredDate'];?></td>
    <td align="center">19</td>
    <td>特长</td>
    <td><?php echo $row['speciality'];?></td>
  </tr>
   <tr>
      <td colspan="8">
      <p>学生学籍基本信息</p>
      </td>      
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">20</td>
    <td>学籍辅号</td>
    <td><?php echo $row['XueJiHao'];?></td>
    <td align="center">24</td>
    <td>入学年月 <font color="#ff0000">*</font></td>
    <td><?php echo $row['RuXueNianYue'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">21</td>
    <td>班内学号</td>
    <td><?php echo $row['schoolCode'];?></td>
    <td align="center">25</td>
    <td>入学方式 <font color="#ff0000">*</font></td>
    <td><?php echo $row['EntranceWay'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">22</td>
    <td>年级</td>
    <td></td>
    <td align="center">26</td>
    <td>就读方式 <font color="#ff0000">*</font></td>
    <td><?php echo $row['JiuDuFangShi'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">23</td>
    <td>班级</td>
    <td><?php echo $row['classes'];  ?></td>
    <td align="center">27</td>
    <td>学生来源</td>
    <td><?php echo $row['XueShengLaiYuan'];?></td>
  </tr>
   <tr>
      <td colspan="8">
      <p>学生个人联系信息</p>
      </td>      
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">28</td>
    <td>现住址 <font color="#ff0000">*</font></td>
    <td><?php echo $row['LiveAddress'];?></td>
    <td align="center">32</td>
    <td>邮政编码 <font color="#ff0000">*</font></td>
    <td><?php echo $row['postalCode'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">29</td>
    <td>通信地址 <font color="#ff0000">*</font></td>
    <td><?php echo $row['PostalAddress'];?></td>
    <td align="center">33</td>
    <td>电子信箱</td>
    <td><?php echo $row['email'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">30</td>
    <td>家庭地址 <font color="#ff0000">*</font></td>
    <td><?php echo $row['LiveAddress'];?></td>
    <td align="center">34</td>
    <td>主页地址</td>
    <td><?php echo $row['ZhuYeDiZhi'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">31</td>
    <td>联系电话 <font color="#ff0000">*</font></td>
    <td><?php echo $row['telephone'];?></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
      <td colspan="8">
      <p>学生个人拓展信息</p>
      </td>      
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">35</td>
    <td>是否独生子女 <font color="#ff0000">*</font></td>
    <td><?php echo $row['onlyChild'];?></td>
    <td align="center">41</td>
    <td>随班就读</td>
    <td><?php echo $row['SuiBanJiuDu'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">36</td>
    <td>是否受过学前教育 <font color="#ff0000">*</font></td>
    <td><?php echo $row['XueQianJiaoYu'];?></td>
    <td align="center">42</td>
    <td>残疾人类型</td>
    <td><?php echo $row['disability'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">37</td>
    <td>是否留守儿童 <font color="#ff0000">*</font></td>
    <td><?php echo $row['LeftOverChildren'];?></td>
    <td align="center">43</td>
    <td>是否由政府购买学位</td>
    <td><?php echo $row['MaiXueWei'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">38</td>
    <td>是否进城务工人员随迁子女 <font color="#ff0000">*</font></td>
    <td><?php echo $row['MigrantChildren'];?></td>
    <td align="center">44</td>
    <td>是否需要申请资助 <font color="#ff0000">*</font></td>
    <td><?php echo $row['applyForFunding'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">39</td>
    <td>是否孤儿 <font color="#ff0000">*</font></td>
    <td><?php echo $row['orphan'];?></td>
    <td align="center">45</td>
    <td>是否享受一补 <font color="#ff0000">*</font></td>
    <td><?php echo $row['HasSubsidy'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">40</td>
    <td>是否烈士或优抚子女 <font color="#ff0000">*</font></td>
    <td><?php echo $row['LieShi'];?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
      <td colspan="8">
      <p>学生上下学交通方式</p>
      </td>      
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">46</td>
    <td>上下学距离</td>
    <td><?php echo $row['distance'];?></td>
    <td align="center">48</td>
    <td>是否需要乘坐校车</td>
    <td><?php echo $row['SchoolBus'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">47</td>
    <td>上下学交通方式</td>
    <td><?php echo $row['transportation'];?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td colspan="8">
      <p>学生家庭成员或监护人信息（父亲）</p>
      </td>      
  </tr>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">49</td>
    <td>家庭成员或监护人姓名 <font color="#ff0000">*</font></td>
    <td><?php echo $row['F_name'];?></td>
    <td align="center">55</td>
    <td>户口所在地 <font color="#ff0000">*</font></td>
    <td><?php echo $row['F_hujidi'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">50</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">56</td>
    <td>联系电话  <font color="#ff0000">*</font></td>
    <td><?php echo $row['F_tel'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">51</td>
    <td>关系说明</td>
    <td></td>
    <td align="center">57</td>
    <td>是否监护人 <font color="#ff0000">*</font></td>
    <td><?php echo "是"; ?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">52</td>
    <td>民族</td>
    <td><?php echo $row['F_nationality'];?></td>
    <td align="center">58</td>
    <td>身份证件类型</td>
    <td><?php echo $row['F_IDtype'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">53</td>
    <td>工作单位</td>
    <td><?php echo $row['F_workPlace'];?></td>
    <td align="center">59</td>
    <td>身份证件号</td>
    <td><?php echo $row['F_IDcard'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">54</td>
    <td>现住址 <font color="#ff0000">*</font></td>
    <td><?php echo $row['F_address'];?></td>
    <td align="center">60</td>
    <td>职务</td>
    <td><?php echo $row['F_job'];?></td>
<tr>
      <td colspan="8">
      <p>学生家庭成员或监护人信息（母亲）</p>
      </td>      
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">61</td>
    <td>家庭成员或监护人姓名 <font color="#ff0000">*</font></td>
    <td><?php echo $row['M_name'];?></td>
    <td align="center">67</td>
    <td>户口所在地 <font color="#ff0000">*</font></td>
    <td><?php echo $row['M_hujidi'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">62</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">68</td>
    <td>联系电话 <font color="#ff0000">*</font></td>
    <td><?php echo $row['M_tel'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">63</td>
    <td>关系说明</td>
    <td></td>
    <td align="center">69</td>
    <td>是否监护人 <font color="#ff0000">*</font></td>
    <td><?php echo "是"; ?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">64</td>
    <td>民族</td>
    <td><?php echo $row['M_nationality'];?></td>
    <td align="center">70</td>
    <td>身份证件类型</td>
    <td><?php echo $row['M_IDtype'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">65</td>
    <td>工作单位</td>
    <td><?php echo $row['M_workPlace'];?></td>
    <td align="center">71</td>
    <td>身份证件号</td>
    <td><?php echo $row['M_IDcard'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">66</td>
    <td>现住址 <font color="#ff0000">*</font></td>
    <td><?php echo $row['M_address'];?></td>
    <td align="center">72</td>
    <td>职务</td>
    <td><?php echo $row['M_job'];?></td>
  </tr>
  <tr>
      <td colspan="8">
      <p>学生家庭成员或监护人信息（其他）</p>
      </td>      
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">73</td>
    <td>家庭成员或监护人姓名 <font color="#ff0000">*</font></td>
    <td><?php echo $row['Q_name'];?></td>
    <td align="center">79</td>
    <td>户口所在地 <font color="#ff0000">*</font></td>
    <td><?php echo $row['Q_nationality'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">74</td>
    <td>关系 <font color="#ff0000">*</font></td>
    <td><?php echo $row['Q_Introductions'];?></td>
    <td align="center">80</td>
    <td>联系电话 <font color="#ff0000">*</font></td>
    <td><?php echo $row['Q_tel'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">75</td>
    <td>关系说明</td>
    <td><?php echo $row['Q_Introductions'];?></td>
    <td align="center">81</td>
    <td>是否监护人 <font color="#ff0000">*</font></td>
    <td></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">76</td>
    <td>民族</td>
    <td><?php echo $row['Q_nationality'];?></td>
    <td align="center">82</td>
    <td>身份证件类型</td>
    <td><?php echo $row['Q_IDtype'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">77</td>
    <td>工作单位</td>
    <td><?php echo $row['Q_workPlace'];?></td>
    <td align="center">83</td>
    <td>身份证件号</td>
    <td><?php echo $row['Q_IDcard'];?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="center">78</td>
    <td>现住址 <font color="#ff0000">*</font></td>
    <td><?php echo $row['Q_address'];?></td>
    <td align="center">84</td>
    <td>职务</td>
    <td><?php echo $row['Q_job'];?></td>
  </tr>
   
</table>


</body>
</html>
