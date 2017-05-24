<?php
//发布文章检测用户是否是登录的
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit;
}
?>
<?php
include_once './inc/meta.php';
?>
<title>发布说说-田超的博客|原创独立个人博客</title>
<?php
include_once './inc/header.php';
include_once 'db.php';
 if(isset($_POST['submit'])){
	 $query = "insert into `say` (`id`,`content`,`time`) values (NULL,'".$_POST['content']."',now())";
	 if(mysql_query($query)){
		  echo "发布成功！";
		 }else{
			   echo '抱歉啊，失败了，再试试吧？',mysql_error();
			 }
			 die;
	 }
?>
<div class="container">
 <form action="" method="post" class="form-horizontal">
     <div class="form-group">
         <div class="col-sm-7 col-sm-offset-3">
             <textarea class="form-control" name="content" rows="10" placeholder="说说"></textarea>
         </div>
     </div>
     <div class="form-group">
         <div class="col-sm-3 col-sm-offset-3">
             <button type="submit" name="submit" class="btn btn-primary" >好了,发布吧</button>
         </div>
     </div>
 </form>
</div>
<?php
include_once './inc/footer.php';
?>
