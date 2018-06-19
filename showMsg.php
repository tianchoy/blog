<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit;
}
include_once 'db.php';
include_once './inc/meta.php';
?>
<title>评论管理</title>
<?php include_once './inc/header.php'; ?>
<div class="container">
    <div class="col-sm-12">
        <div class="list-group">
            <?php
            //设定每页显示的文章数
            $pagesize=10;
            //确定页数P的参数
            @$p=$_GET['p']?$_GET['p']:1;
            //数据指针
            $offset=($p-1)*$pagesize;
            //查询本页显示的数据
            $query = "select * from `message` order by time DESC";
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)){
                ?>
                <div class="list-group-item lgi">
                    <h5><span class="badge"><?php echo $row['id'] ;?></span>私信人：<span><?php echo $row['name']; ?></span></h5>
                    <p><?php echo $row['content'] ;?></p>
                    <p><?php echo $row['time'] ;?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <ul class="pagination pull-right">
        <?php
        //计算评论总数
        $count_result=mysql_query("select count(*) as count from message");
        $count_array=mysql_fetch_array($count_result);
        //计算总页数
        $pagenum=ceil($count_array['count']/$pagesize);

        //输出各个页数和链接
        if($pagenum>1){
            for($i=1;$i<=$pagenum;$i++){
                if($i==$p){
                    echo '[',$i,']';
                }else{
                    echo "&nbsp".'<a href="comments.php?p=',$i,'">',$i,'&nbsp</a>';
                }
            }
        }
        if($p>5){
            echo '<a href="comments.php?p=',$pagenum,'">末页</a>';
        }
        echo "&nbsp".'共',$count_array['count'],'条私信';
        ?>
    </ul>
</div>