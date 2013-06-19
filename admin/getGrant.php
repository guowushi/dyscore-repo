<?php
	 require_once dirname(__FILE__) .  '/../conn.php';
	 header('Content-Type:text/html;charset:utf-8');

	foreach($_POST as $key => $value)
	{
		list($grade, $class,$object) = sscanf($key, "%c %d %s");
		$inf = "初"."$grade"."-"."$class"."班";
		$sql = "select * FROM classCourse where ClassID = $inf";
		$rs = $db->query($query_sql);
		if($rs)
		{
			$sql = "INSERT INTO classCourse
				(ClassID,$object)
				values
				('$inf','$value')";
				$rs = $db->query($sql);
				if($rs)
					echo '写入数据库成功';
				else
				{
					echo '写入数据库失败';
					exit;
				}
		}
		else
		{
			$sql = "UPDATE classCourse
				SET
				$object = $value
				WHERE ClassID = '$inf'";
				$rs = $db->query($sql);
				if($rs)
					echo '写入数据库成功';
				else
				{
					echo '写入数据库失败';
					exit;
				}
		}
	}
	//alert("添加成功","grant.php");
?>