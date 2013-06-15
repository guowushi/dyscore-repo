<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type = "text/javascript" src = "../js/jquery.js"></script>
<script type="text/javascript">
//jQuery.post(url, [data], [callback], [type])
$(document).ready(function(){
		$(".agee").click(function(){
			var level=$("#level").val();
			
			var url="/a.php?level="+level;
			var url="/a.php";
			var postdata={name: level};
			
			//alert(url);
			$.post(url,  postdata,
			function(data){
				//alert("Data Loaded: " + data);
				$("#kemu").html(data);
			});
		});
	});

</script>
<title>无标题文档</title>
</head>

<body>
<h1>录入教师信息</h1>
<form method="post" action="teacherAdd.php">
     
       <p>
         <label>所属学校：</label>
         <select name="SchoolName">
		 <?php
		require_once dirname(__FILE__) .  '/../conn.php'; 
		$sql="select * from schools ";
		$rs = $db->query($sql);
		$i=1;
		while($row = $rs->fetch())
		{

		 ?>
           <option value="<?php echo $row["ID"];  ?>"><?php echo $row["ID"].$row["SchoolName"];  ?></option>
         <?php
                }
			?>
         </select>
      
         <br />
         <br />
         <label>教师编号：</label>
         <input  type="text" name="TeacherID"/>
         <label>教师姓名：</label>
         <input type="text" name="TeacherName"/>
       </p>
       <p>
         <label>教师邮箱：</label>
         <input  type="text" name="Email"/>
       </p>
       <p>
         <label>教师账号：</label>
         <input  type="text" name="Username"/>
         <label>教师密码：</label>
         <input  type="text" name="Password"/>
       </p>
  <p>
  
		<label>教授年纪：</label>
	   <select  name="level" id="level">
		<?php
			foreach($LEVEL as $key=>$value){
				echo "<option class='agee'  value='".$key."'>".$value."</option>"	;
			
			}
		
		?>
	   
	   </select>
       <label>教授科目：</label>
	   
       <div id="kemu">
       
       </div>
	    
        
     
	 
       </p>
  <p>
 
 <input type="submit" value="提交信息"/>
 
  </p>
</form>
</body>
</html>
