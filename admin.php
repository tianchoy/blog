<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
    exit;
}
?>
<?php
include_once 'db.php';
include_once './inc/meta.php';
?>
<title>个人中心-田超的博客|原创独立个人博客</title>
<?php
include_once './inc/header.php';
?>
<div class="container">
    <div class="col-sm-3 admin_zl">
        <ul class="list-group">
            <li class="list-group-item active">管理
                <span class="pull-right">
                  <?php
                  $id=$_SESSION['id'];
                  $user=$_SESSION['user'];
                  $user_query=mysql_query("select * from registe where id=$id limit 1");
                  @$row=mysql_fetch_array($user_query);
                  echo '您好，',$user ?>
                </span>
            </li>
            <li class="list-group-item"><?php echo '<a href="add_talk.php" target="_blank">发布说说</a>'; ?></li>
            <li class="list-group-item"><?php echo '<a href="add_artcle.php" target="_blank">发布文章</a>'; ?> </li>
            <li class="list-group-item"><?php echo '<a href="comments.php" target="_blank">管理评论</a>'; ?></li>
            <li class="list-group-item"><?php echo '<a href="guestbook.php" target="_blank">管理留言</a>'; ?></li>
            <li class="list-group-item"><?php echo '<a href="login.php?action=logout">注销登录</a>'; ?></li>
        </ul>
    </div>
    <div class="col-sm-9">
        <div class="list-group">
            <?php
            //设定每页显示的文章数
            $pagesize=10;
            //确定页数P的参数
            @$p=$_GET['p']?$_GET['p']:1;
            //数据指针
            $offset=($p-1)*$pagesize;
            //查询本页显示的数据
            $query = "select * from `arts` order by id DESC limit $offset,$pagesize";
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)){
                ?>
                <div class="list-group-item">
                    <h5>
                        <a href="view.php?id=<?php echo $row['id']?>" target="_blank"><?php echo $row['title']?></a> /
                            <a href="edit.php?edit=<?php echo $row['id']?>">编辑</a> /
                            <a href="del.php?del=<?php echo $row['id']?>">删除</a> /
                            点击量：<span class="badge"><?php echo $row['hits']?></span>
                            / 点赞：<?php echo $row['art_love'] ?> / <?php echo $row['time']?>
                    </h5>
                    <p><?php echo iconv_substr($row['content'],0,100,'utf-8');?>...</p>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
    <ul class="pagination pull-right">
        <?php
        //计算文章总数
        $count_result=mysql_query("select count(*) as count from arts");
        $count_array=mysql_fetch_array($count_result);
        //计算总页数
        $pagenum=ceil($count_array['count']/$pagesize);

        //输出各个页数和链接
        if($pagenum>1){
            for($i=1;$i<=$pagenum;$i++){
                if($i==$p){
                    echo '<li><a>',$i,'</a></li>';
                }else{
                    echo "&nbsp".'<li><a href="admin.php?p=',$i,'">',$i,'&nbsp</a></li>';
                }
            }
        }
        if($p>5){
            echo '<a href="admin.php?p=',$pagenum,'">末页</a>';
        }
        echo "&nbsp".'共',$count_array['count'],'篇文章';
        ?>
    </ul>
</div>
<?php include_once './inc/footer.php'; ?>