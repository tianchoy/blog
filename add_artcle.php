<?php
//发布文章检测用户是否是登录的
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit;
}
require_once 'db.php';
if(isset($_POST['submit'])){
	$query = "insert into `arts` (`id`,`title`,`content`,`time`) values (NULL,'".$_POST['title']."','".$_POST['content']."',now())";
	if(mysql_query($query)){
		echo "发布成功！";
	}else{
		echo '失败，请重试',mysql_error();
	}
	die;
}
?>
<?php
include_once './inc/meta.php';
?>
    <title>发布文章-田超的博客|原创独立个人博客</title>
<?php
include_once './inc/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-11 col-sm-offset-1">
            <form class="form-horizontal addart" action="" method="post" name="fbwz" onSubmit="return jc()" >
                <div class="form-group">
                    <label class="col-sm-1 control-label">标题:</label>
                    <div class="col-sm-5">
                        <input class="form-control arttitle" type="text" name="title" size="20" placeholder="请输入文章标题" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">内容:</label>
                    <div class="col-sm-9">
                        <textarea id="post_body" class="form-control textarea" name="content" rows="10" placeholder="文章内容"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-1">
                        <div class="col-sm-2">
                            <button type="submit" name="submit" class="btn btn-success">好了，发布吧</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="layui/layui.js"></script>
<script>
    layui.use('layedit', function(){
      var layedit = layui.layedit;
        layedit.set({
            uploadImage: {
                url: 'upload', //接口url
                type: 'post' //默认post
            }
        });
      layedit.build('post_body'); //建立编辑器
    });
</script>