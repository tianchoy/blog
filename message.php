<?php
include_once 'db.php';
if(isset($_POST['submit'])){
    $msgUsername = $_POST['msg-username'];
    $msgContent = $_POST['msg-content'];
    if($msgUsername == '' || $msgContent == ''){
        echo '名字和内容不能为空';
    }else{
        $query = "insert into `message` (`id`,`name`,`content`,`time`) values (NULL,'$msgUsername','$msgContent',now())";
        if(mysql_query($query)){
            echo '恭喜你，留言成功啦！';
        }else{
            echo '私信发送失败！';
        }
    }
    die;
}

?>
<link href="./css/bootstrap.min.css" rel="stylesheet" />
<style>
    .msg-username{margin-top: 15px;}
</style>
<div class="container">
    <div class="row">
        <form  method="post" action="" class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="alert alert-info">需要我回复的，请留下<b>联系方式</b>！</div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-8">
                        <input type="text" class="form-control msg-username" name="msg-username" placeholder="都发私信了，还不写真名？">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="col-sm-8">
                        <textarea name="msg-content" class="form-control msg-content" cols="10" rows="3" placeholder="不留点干货吗？"></textarea>
                    </div>
                </div>
            </div>
            <div class="from-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <button type="submit" name="submit" class="btn btn-success">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
