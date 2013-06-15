<?php
require_once dirname(__FILE__) . '/libs/medoo.min.php'; 
require_once dirname(__FILE__) .  '/conn.php'; 
header("Content-type:text/html;charset=utf8");
// $_POST[];   a.php?a=1&b=2&c=3e
		// echo $_GET["level"];
/*$level=  $_POST["name"];		 

$sql="SELECT * FROM items WHERE ItemsLevel='$level' ";
$rs1 = $db->query($sql);
while($row = $rs1->fetch()){

		 ?>
           <input type="checkbox" name="Items[]" value="<?php echo $row['ItemName']; ?>"/><?php echo $row['ItemName']; ?>
         <?php
}
	
*/
echo getSchools();	
//获取学校信息		  
function getSchools(){
		$table="schools";
		$fileds=["schoolID","SchoolName","region"];
		//$filters=["id" => 6];
		$filters=[];
		return getJsonData($table,$fileds,$filters);
}
//返回JSON格式的数据
function getJsonData($table,$fileds,$filters){
		$database = new medoo("dyscore");
		$datas = $database->select($table, $fileds, $filters);
		return json_encode($datas);
}
?>
			
			