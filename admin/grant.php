<?php
	
	session_start();												// 启用此页面的会话功能
	ini_set('include_path',$_SERVER['DOCUMENT_ROOT']);
	//set_include_path("/dyscore ; /dyscore/inc");
	//set_include_path($path . PATH_SEPARATOR .$path1. PATH_SEPARATOR .$path2);
	//set_include_path(get_include_path() . PATH_SEPARATOR . $path . PATH_SEPARATOR .$path1. PATH_SEPARATOR .$path2);
	//require_once("global.php");
	require_once ("inc/functions.php");								// 包含通用函数文件
	require_once("global.inc");										// 包含系统配置文件
	require_once ('libs/medoo.min.php'); 						// 引用用medoo框架类，可以简化数据库的操作（数据用户名和密码在此文件中修改） 
	$database = new medoo("dyscore");							// 连接到dyscore数据库
	
 ?>
<?php
	//--------------
	//--------------------需要换环境需要修改
	$sql = "select Classname from classes";
	$rs = $db->query($sql);
	$list = array();
	while($row = $rs->fetch())
			$list[] = $row;
	$arr1 = array();
	$arr2 = array();
	$arr3 = array();
	$a1 =0;$a2 =0;$a3 =0;
	for($i=0,$len=count($list);$i<$len;$i++)
	{
		//---------------------需要换环境需要修改
		$list[$i]['Classname'] = str_replace('初','',$list[$i]['Classname']);
		$list[$i]['Classname'] = str_replace('-','',$list[$i]['Classname']);
		list($grade,$notMean,$class) = sscanf($list[$i]['Classname'], "%c %d");
		if($grade == '1')
		{
			$arr1[$a1][0] = $grade;
			$arr1[$a1][1] = $class;
			$a1++;
		}
		if($grade == '2')
		{
			$arr2[$a2][0] = $grade;
			$arr2[$a2][1] = $class;
			$a2++;
		}
		if($grade == '3')
		{
			$arr3[$a3][0] = $grade;
			$arr3[$a3][1] = $class;
			$a3++;
		}
	}
	for($i=0,$len=count($arr1);$i<$len;$i++)
	{
		$arr1[$i][1] = $i+1;
	}
	for($i=0,$len=count($arr2);$i<$len;$i++)
	{
		$arr2[$i][1] = $i+1;
	}
	for($i=0,$len=count($arr3);$i<$len;$i++)
	{
		$arr3[$i][1] = $i+1;
	}
	
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>选择录入教师</title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta charset = "utf-8" />
  <meta name="Keywords" content="">
  <meta name="Description" content="">
	<script type="text/javascript" src="../js/jquery-1.6.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var techerVal;
			$(":text").click(function(){
				teacherDiv();
				
			});
			$(":text").blur(function(){
				if(techerVal!='关闭')
					this.value = techerVal;
				
			});

			//---------------------
			$("#teacher li").click(function(){
				$("#teacher").hide("slow");
			});
			$("#teacher li,#teacher p").mouseover(function(){
				techerVal = $(this).text();
			});
			function teacherDiv() {
				$("#teacher").show("slow");
			}
			//--------------------
			$("#teacher p").mouseover(function(){
				$(this).css({backgroundColor:"#e11"});
			});
			$("#teacher p").mouseout(function(){
				$(this).css({backgroundColor:"#999"});
			});
			$("#teacher p").click(function(){
				$("#teacher").hide("fast");
			});
			/*------------------------*/
			/*var teach = document.getElementById("teacher");
			var childlen = teach.children.length;
			var lineHei = 0;
			for(var i=0;i<childlen;i++)
			{
				$("#teacher p:nth-child("+i+")").css({top:lineHei+'px'});
				lineHei += 20;
			}*/

			/*------------------------*/
			//--------------------------
			var bigWidth = $("body").innerWidth();
			bigWidth = bigWidth*0.88;
			$(".bigWrap").width(bigWidth);
			$(".wrap").width(bigWidth);
		});
</script>


  <style type = "text/css">
		*{
			margin:0;
			padding:0;
		}
		body{
			font-size: 12px
		}
		.bigWrap {
			margin: 0 auto;
		}
		legend.title{
			font-size: 16px;
			
			
		}
		legend{
			font-size: 14px;
			margin-left: 50px;
			font-weight: bold;
		}
		fieldset {
			padding: 10px 0 10px 15px;
			width: 70%;
			margin: 0 auto;
		}
		fieldset.wrap{
			padding:20px 0 20px 40px;
			border: 2px solid #222;
		}
		.objects {
			overflow:hidden;
		}
		.objects li {
			float:left;
			width:120px;
			list-style: none;
			margin: 5px 0 5px 0;
		}
		.objects li input {
			width: 70px;
			margin-right: 10px;
		}
		
		#teacher {
			background-color: #999999;
			position: fixed;
			left: 10%;
			top: 50px;
			min-height: 400px;
			height: 80%;
			width: 80%;
			display:none;
			padding: 20px;
			border: 2px solid #92f;
			overflow: scroll;
		}
		#teacher .wrapli {
			float:left;
			list-style:none;
			margin-right: 15px;
			min-width: 30px;
			width: auto;
			cursor:pointer;
			line-height: 26px;
		}
		#teacher li {
			float:left;
			list-style:none;
			min-width: 25px;
			width: auto;
			cursor:pointer;
			line-height: 26px;
		}
		#teacher h2 {
			margin-bottom: 10px;
		}
		#teacher p {
			position: absolute;
			top:10px;
			right: 10px;
			cursor:pointer;
		}
		.jumpSubmit{
			width: 50px;
			height: 50px;
			color:#aaa;
			position: fixed;
			top: 40%;
			right: 30px;
			display:block;
			background-color:#c3a;
			padding:8px;
			text-decoration:none;
		}
		input[type=submit]{
			width:100px;
			height:60px;
			text-align: center;
			margin: 0 45%;
		}

  </style>
 </head>

 <body>
		<form method= "post" action = "getGrant.php">
		<div class ="bigWrap">
			<fieldset class = "wrap">
				<legend class = "title">初一年级</legend>
				<?php
					for($i=0,$len=count($arr1);$i<$len;$i++)
					{
						$counGrade = $arr1[$i][0]; 
						$counClass = $arr1[$i][1];
						echo "<fieldset>
						<legend>初一 $counClass 班</legend>";
						echo '<ul class = "objects">';
						echo	"<li>语文:<input type = 'text' name ="."'".$counGrade,$counClass."chinese"."'"."/></li>";
						echo	"<li>数学:<input type = 'text' name ="."'".$counGrade,$counClass."math"."'"." /></li>";
						echo	"<li>英语:<input type = 'text' name ="."'".$counGrade,$counClass."english"."'"." /></li>";
						echo	"<li>政治:<input type = 'text' name ="."'".$counGrade,$counClass."politics"."'"." /></li>";
						echo	"<li>历史:<input type = 'text' name ="."'".$counGrade,$counClass."history"."'"." /></li>";
						echo	"<li>地理:<input type = 'text' name ="."'".$counGrade,$counClass."geography"."'"." /></li>";
						echo	"<li>生物:<input type = 'text' name ="."'".$counGrade,$counClass."biological"."'"." /></li>";
						echo "</ul>
						</fieldset>";
					}?>
						<!--fieldset>

						<legend>初一二班</legend>
						<ul class = "objects">
							<li>语文:<input type = "text" name = "chinese" /></li>
							<li>数学:<input type = "text" name = "math" /></li>
							<li>英语:<input type = "text" name = "english" /></li>
							<li>政治:<input type = "text" name = "politics" /></li>
							<li>历史:<input type = "text" name = "history" /></li>
							<li>地理:<input type = "text" name = "geography" /></li>
							<li>生物:<input type = "text" name = "biological" /></li>
						</ul>
						</fieldset-->
			</fieldset>
			<fieldset class = "wrap">
				<legend class = "title">初二年级</legend>
				<?php
					for($i=0,$len=count($arr2);$i<$len;$i++)
					{
						$counGrade = $arr2[$i][0]; 
						$counClass = $arr2[$i][1];
						echo "<fieldset>
						<legend>初二 $counClass 班</legend>";
						echo '<ul class = "objects">';
						echo	"<li>语文:<input type = 'text' name ="."'".$counGrade,$counClass."chinese"."'"."/></li>";
						echo	"<li>数学:<input type = 'text' name ="."'".$counGrade,$counClass."math"."'"." /></li>";
						echo	"<li>英语:<input type = 'text' name ="."'".$counGrade,$counClass."english"."'"." /></li>";
						echo	"<li>政治:<input type = 'text' name ="."'".$counGrade,$counClass."politics"."'"." /></li>";
						echo	"<li>历史:<input type = 'text' name ="."'".$counGrade,$counClass."history"."'"." /></li>";
						echo	"<li>地理:<input type = 'text' name ="."'".$counGrade,$counClass."geography"."'"." /></li>";
						echo	"<li>生物:<input type = 'text' name ="."'".$counGrade,$counClass."biological"."'"." /></li>";
						echo	"<li>物理:<input type = 'text' name ="."'".$counGrade,$counClass."physical"."'"." /></li>";
						echo "</ul>
						</fieldset>";
					}?>
						<!--fieldset>
						<legend>初二二班</legend>
						<ul class = "objects">
							<li>语文:<input type = "text" name = "chinese" /></li>
							<li>数学:<input type = "text" name = "math" /></li>
							<li>英语:<input type = "text" name = "english" /></li>
							<li>政治:<input type = "text" name = "politics" /></li>
							<li>历史:<input type = "text" name = "history" /></li>
							<li>地理:<input type = "text" name = "geography" /></li>
							<li>生物:<input type = "text" name = "biological" /></li>
							<li>物理:<input type = "text" name = "physical" /></li>
						</ul>
						</fieldset-->
			</fieldset>
			<fieldset class = "wrap">
				<legend class = "title">初三年级</legend>
				<?php
					for($i=0,$len=count($arr3);$i<$len;$i++)
					{
						$counGrade = $arr3[$i][0]; 
						$counClass = $arr3[$i][1];
						echo "<fieldset>
						<legend>初三 $counClass 班</legend>";
						echo '<ul class = "objects">';
						echo	"<li>语文:<input type = 'text' name ="."'".$counGrade,$counClass."chinese"."'"."/></li>";
						echo	"<li>数学:<input type = 'text' name ="."'".$counGrade,$counClass."math"."'"." /></li>";
						echo	"<li>英语:<input type = 'text' name ="."'".$counGrade,$counClass."english"."'"." /></li>";
						echo	"<li>政治:<input type = 'text' name ="."'".$counGrade,$counClass."politics"."'"." /></li>";
						echo	"<li>历史:<input type = 'text' name ="."'".$counGrade,$counClass."history"."'"." /></li>";
						echo	"<li>地理:<input type = 'text' name ="."'".$counGrade,$counClass."geography"."'"." /></li>";
						echo	"<li>生物:<input type = 'text' name ="."'".$counGrade,$counClass."biological"."'"." /></li>";
						echo	"<li>物理:<input type = 'text' name ="."'".$counGrade,$counClass."physical"."'"." /></li>";
						echo	"<li>化学:<input type = 'text' name ="."'".$counGrade,$counClass."chemistry"."'"." /></li>";
						echo "</ul>
						</fieldset>";
					}?>
						<!--fieldset>
						<legend>初三二班</legend>
						<ul class = "objects">
							<li>语文:<input type = "text" name = "chinese" /></li>
							<li>数学:<input type = "text" name = "math" /></li>
							<li>英语:<input type = "text" name = "english" /></li>
							<li>政治:<input type = "text" name = "politics" /></li>
							<li>历史:<input type = "text" name = "history" /></li>
							<li>地理:<input type = "text" name = "geography" /></li>
							<li>生物:<input type = "text" name = "biological" /></li>
							<li>物理:<input type = "text" name = "physical" /></li>
							<li>化学:<input type = "text" name = "chemistry" /></li>
						</ul>
						</fieldset-->
			</fieldset>
			<input type = "submit" value = "确认"><a name = "submitt"></a>
			</div>
		</form>
		<div id = "teacher">
			<h2>选择教师</h2>
			<p>关闭</p>
			<ul>
		<?php
			$sql = "select TeacherName,TeacherID FROM teachers";
			$rs = $db->query($sql);
			while($row = $rs->fetch())
				echo '<div class = "wrapli">'.'<li>'.$row['Username'].'</li>'.'('.$row['TeacherName'].')'.'</div>';
		?>
			<ul>
		</div>
		<a class = "jumpSubmit" href = "#submitt">跳转</a>
 </body>
</html>
