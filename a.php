<?php

require_once dirname(__FILE__) .  '/conn.php'; 
		// $_POST[];   a.php?a=1&b=2&c=3e
		// echo $_GET["level"];
		$level=  $_POST["name"];
		 
		$sql="SELECT * FROM items WHERE ItemsLevel='$level' ";
		$rs1 = $db->query($sql);
		 
		while($row = $rs1->fetch())
		{

		 ?>
           <input type="checkbox" name="Items[]" value="<?php echo $row['ItemName']; ?>"/><?php echo $row['ItemName']; ?>
         <?php
          }
?>
			
			