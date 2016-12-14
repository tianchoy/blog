<?php
include_once 'db.php';
include_once './inc/meta.php';
?>
<title>站内搜索—田超的博客|原创独立个人博客</title>
<?php
include_once './inc/header.php';
?>
<?php include_once './inc/header.php'; ?>
  <?php 
    include_once'db.php';
    if(isset($_GET['submit'])){
        //获取搜索关键字
        $search=trim($_GET["search"]);
        //检查是否为空
        if($search==""){
            echo "您要搜索的关键字不能为空".'<br/>';
            echo "点击<a href='javascript:history.back(-1);'>返回上一步</a>重搜";
            exit;//结束程序
        }
        if($search=="0"){
			echo "对不起，搜不到数据……".'<br/>';
			echo "点击<a href='javascript:history.back(-1);'>返回上一步</a>重搜";
            exit;//结束程序
			}
        //查询数据库内容
        $so="select * from `arts` where `title` like '%".$_GET['search']."%'";
        $rel=mysql_query($so);
    }
    //输出循环
        while (($row=@mysql_fetch_array($rel))!=false){
?>
<div class="container">
    <div class="col-sm-8 col-sm-offset-2">
      <ul class="list-group">
          <a href="view.php?id=<?php echo $row['id']?>" class="list-group-item">
              <h4 class="list-group-item-heading"><?php echo $row['title']?></h4>
              <p class="list-group-item-text"><?php echo iconv_substr($row['content'],0,100,'utf-8');echo '...(点击查看详情)';?></p>
          </a>
      </ul>
    </div>
	<p id="back-to-top"><a href="#top"><img src="images/backtop.png"></a></p>
</div>
<?php
 }
?>
<?php
include_once './inc/footer.php';
?>