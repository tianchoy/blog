<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit;
}
//引入文件
require_once 'db.php';
include_once'./inc/meta.php';
$query = "delete from `arts` where `id`='".$_GET['del']."'";
if(mysql_query($query)){
	echo '<script>alert("删除成功");window.location.href="admin.php"</script>';
}else{
	echo '删除失败';
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">