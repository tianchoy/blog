<?php
include_once './inc/meta.php';
?>
<title>归档—田超的博客-原创独立个人博客</title>
<?php
include_once './inc/header.php';
include_once 'db.php';
?>
   <div class="container">
       <table class="table table-responsive table-hover table-bordered">
           <thead>
           <tr>
               <th>文章标题</th>
               <th>发布日期</th>
           </tr>
           </thead>
           <tbody>
                <?php
                $query = "select * from `arts` order by id DESC";
                $result = mysql_query($query);
                while ($row = mysql_fetch_array($result)){
                    ?>
                    <tr>
                        <td><a href="view.php?id=<?php echo $row['id']?>" target="_blank"><?php echo $row['title']?></a></td>
                        <td class="data"><?php echo iconv_substr($row['time'],0,10,'utf-8');?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
          </table>
		  <p id="back-to-top"><a href="#top"><img src="images/backtop.png"></a></p>
        </div>
<?php include_once'./inc/footer.php'; ?>

<script></script>
