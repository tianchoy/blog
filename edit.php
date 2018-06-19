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
	<link href="http://cdn.staticfile.org/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery.qeditor.css" type="text/css">
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
							<button type="submit" name="submit" class="btn btn-success">好了，发布吧</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
	<script src="http://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/jquery.qeditor.js" type="text/javascript"></script>
	<script type="text/javascript">
		$("#post_body").qeditor({});

		// Custom a toolbar icon
		var toolbar = $("#post_body").parent().find(".qeditor_toolbar");
		var link = $("<a href='#'><span class='icon-smile' title='smile'></span></a>");
		link.click(function(){
			alert("Put you custom toolbar event in here.");
			return false;
		});
		toolbar.append(link);

		// Custom Insert Image icon event
		function changeInsertImageIconWithCustomEvent() {
			var link = toolbar.find("a.qe-image");
			link.attr("onclick","");
			link.click(function(){
				alert("New insert image event");
				return false;
			});
			alert("Image icon event has changed, you can click it to test");
			return false;
		}

		$("#submit").click(function(){
			alert($("#post_body").val());
		});
	</script>
<?php require_once'./inc/footer.php'?>