<?php
include_once 'db.php';
include_once './inc/meta.php';
?>
    <title>登录-田超的博客-原创独立个人博客</title>
<?php
include_once './inc/header.php';
?>
<?php
@session_start();
require_once 'db.php';  //引入相关文件
@$user=md5($_POST['user']);
@$password=$_POST['password'];
$query = "select * from register where user='$user' and password='$password'"; //对比输入的数据和数据库里的数据
$res=mysql_query($query);
@$row=mysql_fetch_array($res);
if(isset($_POST['submit'])){
    if($_POST['user']=$row['user'] and $_POST['password']=$row['password']){
        $_SESSION['user']=$user;
        $_SESSION['id']=@$result['id'];
        echo $user,'欢迎你！进入<a href="admin.php">个人中心</a><br/>';
        echo '点击此处<a href="login.php?action=logout">注销</a>';
        exit;
    }else{
        echo "<script>alert('登陆失败！')</script>",mysql_error();
        echo "点击<a href='javascript:history.back(-1);'>返回上一步</a>重试";
    }
    die;
}
?>
<?php
if(@$_GET['action']=='logout'){
    unset($_SESSION['id']);
    unset($_SESSION['user']);
    echo '注销成功，点击此处<a href="login.php">重新登陆</a>';
    exit;
}
?>
    <div class="container">
        <h1 class="page-header"><span class="glyphicon glyphicon-user"></span> 登陆框</h1>
        <form action="" method="post" class="form-horizontal">
            <div class="col-sm-offset-3">
                <div class="form-group">
                    <label class="col-md-2 control-label">用户名：</label>
                    <div class="col-md-3">
                        <input type="text" name="user" class="form-control" placeholder="用户名">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">密码：</label>
                    <div class="col-md-3">
                        <input type="password" name="password" class="form-control" placeholder="输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2">
                        <div class="col-md-2">
                            <button type="submit" name="submit" class="btn btn-primary">登陆</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php
include_once './inc/footer.php';
?>
