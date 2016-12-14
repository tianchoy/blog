<?php
$sit_link="localhost";
$user="root";
$pw="root";
$sql="blog";
@$link=mysql_connect($sit_link,$user,$pw) or die ("数据库连接失败");
$blog=mysql_select_db($sql,$link) or die ("数据库连接失败");
mysql_query("SET NAME 'utf-8'");
?>