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
<?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $con = $_POST['repl_content'];
    $query = "update `reply` set `repl_content`='$con',`repl_time`= now() where `r_id`='$id'";
    if(mysql_query($query)){
        echo "<script>alert('评论成功啦！');window.location.href='comments.php'</script>";
    }else{
        echo '抱歉啊，失败了，再试试吧？',mysql_error();
    }
    die;
}
?>
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
            $query = "select * from `reply` left join `arts` on (arts.id = reply.art_id) order by pl_time DESC limit $offset,$pagesize";
            $result = mysql_query($query);
            while ($row = mysql_fetch_array($result)){
                ?>
                <div class="list-group-item lgi">
                    <h5>评论人：<span class="badge"><?php echo $row['name'] ?></span>| 文章：<span class="badge"><a href="view.php?id=<?php echo $row['art_id'] ?>" target="_blank"><?php echo $row['title']?></a></span>| <?php echo $row['pl_time']?></h5>
                    <p><?php echo $row['pl_content'] ;?></p>
                    <div class="col-sm-12 ly_reply">
                    <div class="yiyue"><b><?php echo $row['repl_content'] ?></b></div>
                        <form action="" method="post">
                            <div class="form-group">
                                <div class="col-sm-10 send">
                                    <textarea class="form-control content hf_text" name="repl_content" rows="2" placeholder=""></textarea>
                                    <input type="hidden" name="id" value="<?php echo $row['r_id'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-1">
                                    <button type="submit" name="submit" class="btn btn-primary submit">回复</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <ul class="pagination pull-right">
        <?php
        //计算评论总数
        $count_result=mysql_query("select count(*) as count from reply");
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
        echo "&nbsp".'共',$count_array['count'],'条文评论';
        ?>
    </ul>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
   $('.lgi').find('.yiyue b').each(function(){
        if($(this).text() == ''){
            $(this).prev('em').css('display','none');
            $(this).parent('.yiyue').next('form').css('display','block');
        }else{
            $(this).parent('.yiyue').next('form').css('display','none');
            $(this).html('<b>已回复</b>');
        }
    });
</script>