<?php
/**
 * Created by PhpStorm.
 * User: tachou
 * Date: 2016/12/26
 * Time: 下午8:23
 */
include_once 'db.php';
$id = $_POST['id'];
$sql = "update say set zan=zan+1 where id='$id'"; //更新数据
mysql_query( $sql);
$result = mysql_query("select zan from arts where id='$id'");
$row = mysql_fetch_array($result);
$love = $row['zan']; //获取赞数值
echo $love;
