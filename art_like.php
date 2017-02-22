<?php
/**
 * Created by PhpStorm.
 * User: tachou
 * Date: 2016/12/15
 * Time: 下午8:17
 */
include_once 'db.php';
$id = $_POST['id'];
$sql = "update arts set art_love=art_love+1 where id='$id'"; //更新数据
mysql_query( $sql);
$result = mysql_query("select art_love from arts where id='$id'");
$row = mysql_fetch_array($result);
$love = $row['art_love']; //获取赞数值
echo $love;
