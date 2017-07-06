<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit;
}
   include_once 'db.php';
   include_once './inc/meta.php';
?>
	<title>编辑文章-田超的博客|原创独立个人博客</title>
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css" />
<?php
include_once './inc/header.php';
$id = $_GET['edit'];
$query = "select * from `arts` where `id`='$id' limit 1";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
if(isset($_POST['submit'])){
	$query = "update `arts` set `title`='".$_POST['title']."',`content`='".$_POST['content']."',`time`=now() where `id`='$id' limit 1";
	$result = mysql_query($query);
	if($result){
		echo '<script>alert("编辑成功！");window.location.href="index.php"</script>';
	}
}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-1 control-label">标题:</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" name="title" value="<?php echo $row['title'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-1 control-label">内容:</label>
					<div class="col-sm-9">
						<textarea name="content" id="post_body" class="form-control textarea" rows="10" ><?php echo $row['content'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-1 ">
						<div class="col-sm-2">
							<button type="submit" name="submit" class="btn btn-primary">好了，发布吧</button>
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
      layedit.build('post_body'); //建立编辑器
    });
</script>
<?php require_once'./inc/footer.php'?>