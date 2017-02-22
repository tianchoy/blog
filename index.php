<?php
include_once 'db.php';
include_once './inc/meta.php';
?>
<title>首页—田超的博客-原创独立个人博客</title>
<?php
include_once './inc/header.php';
?>
<div class="container index">
    <div class="row">
        <div class="col-sm-12">
            <?php
            //设定每页显示的文章数
            $pagesize=15;
            //确定页数P的参数
            @$p=$_GET['p']?$_GET['p']:1;
            //数据指针
            $offset = ($p-1)*$pagesize;
            //查询本页显示的数据
            $query = "select * from `arts` order by id DESC limit $offset,$pagesize";  //查询数据
            $res=mysql_query($query);
            while ($row=mysql_fetch_array($res)){ //循环开始
                ?>
                <h2>
                    <a title="<?php echo $row['title']?>" href="view.php?id=<?php echo $row['id']?>" target="_blank">
                        <?php echo $row['title']?>
                    </a>
                </h2>
                <div class="post_body">
                    <p><?php echo iconv_substr($row['content'],0,300,'utf-8');echo '......';?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
        <div style="text-align:center">
            <ul class="pagination pull-right">
                <?php
                //计算留言总数
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
                            echo "&nbsp".'<li><a href="?p=',$i,'">',$i,'&nbsp</a></li>';
                        }
                    }
                }
                if($p>5){
                    echo '<a href="?p=',$pagenum,'">末页</a>';
                }
                //            echo "&nbsp".'共',$count_array['count'],'篇文章';
                ?>
            </ul>
        </div>
    </div>
    <p id="back-to-top"><a href="#top"><img src="images/backtop.png"></a></p>
</div>
<?php
include_once './inc/footer.php';
?>
