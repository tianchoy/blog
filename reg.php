<?php
  require_once'db.php';
  @$user=$_POST['user'];
  function secret($num){
      $num = md5($num);
      return $num;
  }
  @$password= secret($_POST['password']);
  if(isset($_POST['submit'])){
  	$search = "select `user` from register where user='$user'";
  	$res=mysql_query($search);
  	if(mysql_num_rows($res)>0){
  	echo "<script>alert('用户名已经存在！')</script>";
  	}else {
    $query="insert into `register`(`id`,`user`,`password`) values (null,'".$_POST['user']."','".$_POST['password']."')";
  	if(mysql_query($query)){
  		echo '注册成功！', header("location: user.php");
      unlink ( 'install.php' );
      unlink ( 'reg.php' );
  	}else{
  		echo '失败，请重新尝试!',mysql_error();
  	}
  	die;
  }
 
  }

?>
<?php
include_once 'db.php';
include_once './inc/meta.php';
?>
<title>首页-田超的博客-原创独立个人博客</title>
<?php
include_once './inc/header.php';
?>
<div class="container">
    <h1 class="page-header"><span class="glyphicon glyphicon-user"></span> 注册框
        <small>已有账号？点击<a href="login.php" target="_blank">登录</a>吧！</small>
    </h1>
    <form class="form-horizontal" action="" method="POST" name="zhuce" onsubmit="return zc()">
        <div class="col-sm-offset-2">
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名称:</label>
                <div class="col-sm-4">
                    <input class="form-control" name="user" type="text" placeholder="请输入用户名" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">输入密码:</label>
                <div class="col-sm-4">
                    <input class="form-control" name="password" type="password" placeholder="请输入密码" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">确认密码:</label>
                <div class="col-sm-4">
                    <input class="form-control" name="password1" type="password" placeholder="请再次输入密码" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2">
                    <div class="col-md-2">
                        <button type="submit" name="submit" class="btn btn-primary">注册</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include_once './inc/footer.php';
?>
