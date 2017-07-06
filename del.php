<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit;
}
//引入文件
require_once 'db.php';
include_once'./inc/meta.php';
?>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="layui/layer/layer.js"></script>
<?php
$query = "delete from `arts` where `id`='".$_GET['del']."'";
if(mysql_query($query)){
	echo "<script>
			layer.open({  
				title: '删除文章',
                content: '确定要删除吗？',   
                yes: function(index, layero) {  
                    window.location.href='admin.php';  
                }
            });  
		</script>";
}else{
	echo "
		<script>
			layer.msg('删除失败'); 
		</script>
	";
}
?>