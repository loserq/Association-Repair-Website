<?php
	$host="127.0.0.1";
	$root="ljh";
	$pwd="123456";
	$link=@mysqli_connect($host,$root,$pwd) or die("数据库连接失败");
	mysqli_select_db($link,'hldx');
	mysqli_set_charset($link,'utf8');
 ?>
