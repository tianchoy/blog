<?php
session_start();
include_once 'db.php';
include_once './inc/meta.php';
?>
<title>管理留言-田超的博客-原创独立个人博客</title>
<?php
include_once './inc/header.php';
?>
<?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $con = $_POST['hf_content'];
    $query = "update `liuyan` set `huifu_content`='$con',`huifu_time`= now() where `id`='$id'";
    if(mysql_query($query)){
        echo "恭喜你，回复留言成功啦！";
    }else{
        echo '抱歉啊，失败了，再试试吧？',mysql_error();
    }
    die;
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <ul class="list-group">
                <?php
                //设定每页显示的文章数
                $pagesize=15;
                //确定页数P的参数
                @$p=$_GET['p']?$_GET['p']:1;
                //数据指针
                $offset=($p-1)*$pagesize;
                //查询本页显示的数据
                $query = "select * from `liuyan` order by id DESC limit $offset,$pagesize";
                $result = mysql_query($query);
                while ($row = mysql_fetch_array($result)){
                    ?>
                    <li class="list-group-item lgi">
                        <h4><?php echo $row['name'] ?> 说：<small class="pull-right"><?php echo $row['time'] ?></span>
                            </small></h4>
                        <p class="text-muted"></p>
                        <p><?php echo iconv_substr($row['content'],0,200,'utf-8');?></p>
                        <div class="col-sm-12 ly_reply">
                            <div class="yiyue"><b><?php echo $row['huifu_content'] ?></b></div>
                            <form action="" method="post">
                                <div class="form-group">
                                    <div class="col-sm-10 send">
                                        <textarea class="form-control content hf_text" name="hf_content" rows="2" placeholder=""></textarea>
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-1">
                                        <button type="submit" name="submit" class="btn btn-primary submit">回复</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <nav style="text-align: center">
                <ul class="pagination pull-right">
                    <?php
                    //计算留言总数
                    $count_result=mysql_query("select count(*) as count from liuyan");
                    $count_array=mysql_fetch_array($count_result);
                    //计算总页数
                    $pagenum=ceil($count_array['count']/$pagesize);

                    //输出各个页数和链接
                    if($pagenum>1){
                        for($i=1;$i<=$pagenum;$i++){
                            if($i==$p){
                                echo '<li><a href="',$i,'">',$i,'</a></li>';
                            }else{
                                echo "&nbsp".'<li><a href="liuyan.php?p=',$i,'">',$i,'&nbsp</a></li>';
                            }
                        }
                    }
                    if($p>5){
                        echo '<a href="liuyan.php?p=',$pagenum,'">末页</a>';
                    }
                    echo "&nbsp".'共',$count_array['count'],'条留言';
                    ?>
                </ul>
            </nav>
        </div>
    </div>
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