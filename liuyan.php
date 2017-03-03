<?php
session_start();
include_once 'db.php';
include_once './inc/meta.php';
?>
<title>留言板-田超的博客-原创独立个人博客</title>
<?php
include_once './inc/header.php';
?>
<?php
if(isset($_POST['submit'])){
  $lyname = $_POST['name'];
  $lycontent = $_POST['content'];
    $user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
    $user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];

    if($_REQUEST['vericode'] == $_SESSION['authcode']){
      	if($lyname != '' && $lycontent != ''){
          $query = "insert into `liuyan` (`id`,`name`,`content`,`time`,`ip`) values (NULL,'$lyname','$lycontent',now(),'$user_IP')";
        if(mysql_query($query)){
              echo '<script>alert("恭喜你，留言成功啦！");window.location.href="liuyan.php"</script>';
        }else{
          echo '<script>alert("失败了，再试试？");window.location.href="liuyan.php"</script>',mysql_error();
        }
      }else{
          echo "<script>alert('姓名和内容不可为空');window.location.href='liuyan.php'</script>",mysql_error();
      }
    }else{
      echo '<script>alert("验证码可能错了");window.location.href="liuyan.php"</script>';
    }
    die;
}
?>
  <div class="container">
      <div class="row">
          <div class="col-sm-10 col-sm-offset-1 gb-box">
              <form class="comment-form" action="" method="post" onsubmit="return liuyan()">
                  <input type="text" name="name" class="input-control" placeholder="姓名(*)">
                  <input type="text" name="vericode" class="input-control" placeholder="验证码">
                  <div><img id="vericode_img" border="0" src="veri_zh.php?r=<?php echo rand();?>" />
                      <a href="javascript:;" class="changecode" onclick="document.getElementById('vericode_img').src='veri_zh.php?r='+Math.random()">换一个？</a>
                  </div>
                  <textarea name="content" class="text-control"></textarea>
                  <a href="javascript:;" class='faces'></a>
                  <button type="submit" name="submit" class="btn btn-primary submit">提交</button>
              </form>
              <div class="face"></div>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
              <ul class="list-group list">
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
                      <div class="lgi">
                          <img src="images/user_photo.png" class="user_photo">
                          <div class="main">
                              <em></em>
                              <div class="head"><b><?php echo $row['name'] ?></b>评论于：<time><?php echo $row['time'] ?></time></div>
                              <div class="content">
                                  <p><?php echo iconv_substr($row['content'],0,200,'utf-8');?></p>
                                  <blockquote class="ly_reply">
                                      <p class="re_con"><?php echo $row['huifu_content'] ?></p>
                                      <span>田超回复于：<?php echo $row['huifu_time'] ?></span>
                                  </blockquote>
                              </div>
                          </div>
                      </div>
                      <?php
                  }
                  ?>
              </ul>
          </div>
      </div>
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
                          echo '<li><a>',$i,'</a></li>';
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
	  <p id="back-to-top"><a href="#top"><img src="images/backtop.png"></a></p>
</div>
<?php require_once'./inc/footer.php'; ?>
<script type="text/javascript" src="./js/liuyan.js"></script>
<script type="text/javascript" src="./js/face.js"></script>
<script>
    $(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
