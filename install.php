<?php
/*
 * Created on 2013-03-11
 * Powered by TianChao
 * tool by phpstorm
 */
$sit_link="localhost";     //一般默认为localhost
$user="root";              //主机用户名
$pw="";                    //用户密码
@$link=mysql_connect($sit_link,$user,$pw) or die ("数据库连接失败！");
mysql_query("SET NAME 'utf-8'");   //使用utf-8编码
$sql="CREATE DATABASE blog";
$blog1=mysql_query($sql,$link) or die ("blog数据库创建失败"."<br>");
if ($blog1){
    echo "blog数据库创建成功！".'<br/>';
    $sql2="CREATE TABLE blog.arts(id INT(4) NOT NULL AUTO_INCREMENT,title VARCHAR(50) NOT NULL,time DATE NOT NULL , content TEXT NOT NULL ,  hits INT(11) NOT NULL, art_love INT(4) ,PRIMARY KEY (id))";
    $blog2=mysql_query($sql2) or die ("arts数据库创建失败！");
    if ($blog2)
        echo "arts 数据库创建成功！".'<br/>';
    $sql3="CREATE TABLE blog.liuyan(id INT(4) NOT NULL AUTO_INCREMENT,name VARCHAR(30) NOT NULL,content TEXT NOT NULL,time DATE NOT NULL ,huifu_content TEXT NULL ,huifu_time DATETIME NULL,PRIMARY KEY (id))";
    $blog3=mysql_query($sql3) or die ("留言板数据库创建失败!");
    if ($blog3)
        echo "留言板数据库创建成功".'<br/>';
    $sql4="CREATE TABLE blog.reply(r_id INT(4)NOT NULL AUTO_INCREMENT,art_id INT(4) NOT NULL,name VARCHAR(50) NOT NULL,pl_time DATETIME NOT NULL ,pl_content TEXT NOT NULL,repl_content TEXT,repl_time DATETIME,PRIMARY KEY (id))";
    $blog4=mysql_query($link,$sql4) or die ("文章回复创建失败");
    if ($blog4)
        echo "文章回复创建成功！".'<br/>';
    $sql5="CREATE TABLE blog.register(id INT(4)NOT NULL AUTO_INCREMENT, user VARCHAR(8) NOT NULL, password VARCHAR(16) NOT NULL,PRIMARY KEY (id))";
    $blog5=mysql_query($sql5) or die ("注册资料创建失败");
    if($blog5)
        echo '注册资料创建成功！'.'<br/>';
    $sql6="CREATE TABLE blog.say(id INT(4) NOT NULL AUTO_INCREMENT, content TEXT NOT NULL,time DATE NOT NULL,art_love INT(4),PRIMARY KEY(id))";
    $blog6=mysql_query($sql6) or die ("说说数据库失败");
    if($blog6)
        echo '说说数据库创建成功！'.'<br/>';
    echo "点击".'<a href="reg.php">注册</a>'."后台账号";
}
else echo "数据库创建失败！";
?>
