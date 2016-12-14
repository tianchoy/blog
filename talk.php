<?php
//引入文件
  require_once 'db.php';
  include_once'./inc/meta.php';
?>
	<title>说说—田超的博客|原创独立个人博客</title>
<?php
include_once './inc/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
            <ul class="list-group">
                <?php
                //设定每页显示的文章数
                $pagesize=20;
                //确定页数P的参数
                @$p=$_GET['p']?$_GET['p']:1;
                //数据指针
                $offset = ($p-1)*$pagesize;
                //查询本页显示的数据
                  $query = "select * from `say` order by id DESC limit $offset,$pagesize";  //查询数据
                  $res=mysql_query($query);
                  while ($row=mysql_fetch_array($res)){ //循环开始
                ?>
				    <li class="list-group-item lgi">
                        <p><small><?php echo $row['time']?></small></p>
                        <p><?php echo iconv_substr($row['content'],0,200,'utf-8');?></p>
					</li>
                <?php
                  }
                ?>
            </ul>
        </div>
	</div>
    <ul class="pagination pull-right">
        <?php
        //计算留言总数
        $count_result=mysql_query("select count(*) as count from say");
        $count_array=mysql_fetch_array($count_result);
        //计算总页数
        $pagenum=ceil($count_array['count']/$pagesize);
        //输出各个页数和链接
        if($pagenum>1){
            for($i=1;$i<=$pagenum;$i++){
                if($i==$p){
                    echo '<li><a>',$i,'</a></li>';
                  }else{
                      echo "&nbsp".'<li><a href="talk.php?p=',$i,'">',$i,'&nbsp</a></li>';
                  }
            }
        }
        if($p>5){
            echo '<a href="talk.php?p=',$pagenum,'">末页</a>';
        }
        //echo "&nbsp".'共',$count_array['count'],'条说说';
        ?>
    </ul>
	<p id="back-to-top"><a href="#top"><img src="images/backtop.png"></a></p>
</div>
<?php include_once'./inc/footer.php'?>