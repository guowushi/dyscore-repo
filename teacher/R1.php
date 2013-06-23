 <?php
	
	session_start();												// 启用此页面的会话功能
	require_once '../global.inc';										// 包含系统配置文件
	require_once ROOT.'/inc/functions.php';								// 包含通用函数文件
	require_once ROOT.'/libs/medoo.min.php'; 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");								// 连接到dyscore数据库
	   
	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/common.css" type="text/css" rel="stylesheet" />
<style  type="text/css">
table{background-color:#000;}
tr{background-color:#FFF; text-align:center;}
h1{text-align:center;}
.head{font-size:18px; float:left; margin:10px;}	
</style>
</head>

<body>
  <h2>	成绩指标分析表</h2>
  <form id="form1" name="form1" method="post" action="">
    年级
    <select name="level" id="select">
		<?php
		 foreach($LEVEL as $l)
		 {
			echo "<option>".$l."</option>";
		 }
		
		?>
    </select>
  科目
  <select name="item" id="select2">
  		<?php
		 foreach($KM as $k=>$v)
		 {
			echo "<option value=".$k.">".$v."</option>";
		 }
		
		?>
  </select>
  <input type="submit" name="query" id="button" value="提交" />
  </form>
  <p>&nbsp;</p>
  
  
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td width="40" rowspan="2">编号</td>
    <td width="98" rowspan="2">学校</td>
    <td width="43" rowspan="2">参考<br/>人数</td>
    <td width="38" rowspan="2">平均分</td>
    <td colspan="2">A1(95~100)</td>
    <td colspan="2">A2(90~95)</td>
    <td colspan="2">B1(85~90)</td>
    <td colspan="2">B2(80~85)</td>
    <td colspan="2">C1(75~80)</td>
    <td colspan="2">C2(70~75)</td>
    <td colspan="2">D1(65~70)</td>
    <td colspan="2">D2(60~65)</td>
    <td colspan="2">E(60以下)</td>
  </tr>
  <tr>
    <td>人数</td>
    <td>百分比</td>
    <td>人数</td>
    <td>百分比</td>
    <td>人数</td>
    <td>百分比</td>
    <td>人数</td>
    <td>百分比</td>
    <td>人数</td>
    <td>百分比</td>
    <td>人数</td>
    <td>百分比</td>
    <td>人数</td>
    <td>百分比</td>
    <td>人数</td>
    <td>百分比</td>
    <td>人数</td>
    <td>百分比</td>
  </tr>
  <?php
    

   if(isset($_POST['query'])){
	   //当前年级 
	   $current_level=$_POST['level'];
	   //当前科目的英文名称（与字段对应）
	   $current_item=$_POST['item'];

	   //(1) 获取所有学校信息
	    $sql="select * from schools ";  	
		$rows=$database->query($sql)->fetchAll();
		$row_number=1;	
		
		foreach($rows  as $row){
			 // 当前学校编号	
			$sid=$row["SchoolCode"];
		
			/* 获取某个学校，某个年级,特定科目的成绩 */
		 $sql=" select ".$current_item." As score from view_scores ";
		 $sql.=" where  SchoolCode= ".$sid;
		 $sql.=" AND    StudentLevel='".$current_level."'";
		 $sql.=" AND    ".$current_item." is not null " ;
		 $scores=$database->query($sql)->fetchAll(PDO::FETCH_COLUMN,0);
		 //var_dump($scores);
		 // (1-1)计算平均分
		 if(count($scores)==0){
		 	$score_avg=0;
		 }else{
		 	$score_avg=array_sum($scores)/count($scores);
		 }
		 //echo $score_avg;
		 /*
		 A1:90-100
		 A2（90～95）		
		 B1（85～90）		
		 B2（80～85）		
		 C1（75～80）		
		 C2（70～75）		
		 D1（65～70）		
		 D2（60～65）		
		 E（60以下）	
		 */
		 $SECTION01=[
		 	'A1'=>['down'=>95,'up'=>100],
			'A2'=>['down'=>90,'up'=>95],
			'B1'=>['down'=>85,'up'=>90],
			'B2'=>['down'=>80,'up'=>85],
			'C1'=>['down'=>75,'up'=>80],
			'C2'=>['down'=>70,'up'=>75],
			'D1'=>['down'=>65,'up'=>70],
			'D2'=>['down'=>60,'up'=>65],
			'E'=>['up'=>60]
		 ];
		 foreach($SECTION01 as $key=>$sec){
				 $sec_count[$key]=0;
		 }
		 //（1-2）计算分数段人数	
		 foreach($scores as $score){
			//取每个成绩与区段比较
			foreach($SECTION01 as $key=>$sec){
				// 有下限和上限
				if(isset($sec['down']) && isset($sec['up'])){
					//echo "有下限和上限 <br/> ";
					if($score>$sec['down'] && $score<=$sec['up']){
						 $sec_count[$key]++;
					 	
			   		 }	
				}
				// 有上限
				if(!isset($sec['down']) && isset($sec['up'])){
					if( $score<=$sec['up']){
						 $sec_count[$key]++;
					 	
			   		 }	
				}
				// 有下限
				if(isset($sec['down']) && !isset($sec['up'])){
					if( $score>$sec['down']){
						 $sec_count[$key]++;
					 	
			   		 }	
				}
				
			}	 
		 }
		 //var_dump($sec_count);
		 //（1-3）计算分数段百分比
		 foreach($sec_count as $k=>$c){
			 if(count($scores)==0){
			 	$percents[$k]=0;	
			 }else{
				$percents[$k]=$c/count($scores)*100;
			 }
		 }
		/* 
		 (1-1)根据学校编号,年级,科目查询参考人数	
		*/
		 $sql="select count(*) from view_scores ";
		 $sql.=" where  SchoolCode= ".$sid;
		 $sql.=" AND    StudentLevel='".$current_level."'";
		 $sql.=" AND    ".$current_item." is not null " ;
		// echo $sql;
		 $count_student=$database->query($sql)->fetchColumn(0);
		
		 
  ?>
  <tr>
    <td><?php echo $row_number; ?></td>
    <td><?php echo $row['SchoolName']; ?></td>
    <td><?php echo $count_student; ?></td>
    <td><?php echo $score_avg; ?></td>
    <td><?php echo $sec_count['A1']; ?></td>
    <td><?php echo $percents['A1']; ?></td>
    <td><?php echo $sec_count['A2']; ?></td>
    <td><?php echo $percents['A2']; ?></td>
    <td><?php echo $sec_count['B1']; ?></td>
    <td><?php echo $percents['B1']; ?></td>
    <td><?php echo $sec_count['B2']; ?></td>
    <td><?php echo $percents['B2']; ?></td>
    <td><?php echo $sec_count['C1']; ?></td>
    <td><?php echo $percents['C1']; ?></td>
    <td><?php echo $sec_count['C2']; ?></td>
    <td><?php echo $percents['C2']; ?></td>
    <td><?php echo $sec_count['D1']; ?></td>
    <td><?php echo $percents['D1']; ?></td>
    <td><?php echo $sec_count['D2']; ?></td>
    <td><?php echo $percents['D2']; ?></td>
    <td><?php echo $sec_count['E']; ?></td>
    <td><?php echo $percents['E']; ?></td>
  </tr>
  <?php
		
 
		$R1_Count[]=$sec_count;
		$R1_Percent[]=$percents;
		$row_number++;
	}
  }
   //var_dump($R1_Percent);
   $sql="select count(*) from view_scores ";
	 $sql.=" where  ";
		 $sql.="      StudentLevel='".$current_level."'";
		 $sql.=" AND    ".$current_item." is not null " ;
		// echo $sql;
		 $count_all=$database->query($sql)->fetchColumn(0);

 
 /*
	取二维数组的第i列的和
	$arr=[
		0=>array("A1"=>10,'A2'=>20),
		1=>array("A1"=>22,'A2'=>20),
	]
 */
 
 function GetColumn($arr,$canshu){
	$zongshu=0;
	for($i=0,$len=count($arr);$i<$len;$i++)
	{
		$zongshu+=$arr[$i][$canshu];
	}
	return $zongshu;
 }
 
  ?>
  <tr>
    <td height="47">&nbsp;</td>
    <td><strong>全区总计</strong></td>
    <td><?php echo $count_all;?></td>
    <td></td>
    <td><?php echo GetColumn($R1_Count,"A1"); ?></td>
    <td><?php echo GetColumn($R1_Percent,"A1"); ?></td>
    <td><?php echo GetColumn($R1_Count,"A2"); ?></td>
    <td><?php echo GetColumn($R1_Percent,"A2"); ?></td>

    <td><?php echo GetColumn($R1_Count,"B1"); ?></td>
    <td><?php echo GetColumn($R1_Percent,"B1"); ?></td>

    <td><?php echo GetColumn($R1_Count,"B2"); ?></td>
    <td><?php echo GetColumn($R1_Percent,"B2"); ?></td>

    <td><?php echo GetColumn($R1_Count,"C1"); ?></td>
    <td><?php echo GetColumn($R1_Percent,"C1"); ?></td>

    <td><?php echo GetColumn($R1_Count,"C2"); ?></td>
    <td><?php echo GetColumn($R1_Percent,"C2"); ?></td>

    <td><?php echo GetColumn($R1_Count,"D1"); ?></td>
    <td><?php echo GetColumn($R1_Percent,"D1"); ?></td>

    <td><?php echo GetColumn($R1_Count,"D2"); ?></td>
    <td><?php echo GetColumn($R1_Percent,"D2"); ?></td>

    <td><?php echo GetColumn($R1_Count,"E"); ?></td>
    <td><?php echo GetColumn($R1_Percent,"E"); ?></td>

  </tr>
</table>
<p>
<input name="" type="button" value="返回"/>
<input name="" type="button" value="退出"/>
</p>

</body>
</html>
