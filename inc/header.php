<body>
<nav class="nav navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <!-- 设置响应式按钮 -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- 设置logo -->
            <a class="navbar-brand" href="index.php">田超</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php" class="<?php if(($_SERVER['REQUEST_URI'])=='/index.php'){echo 'active';}else{ echo '';} ?>">首页</a></li>
                <li><a href="talk.php" class="<?php if(($_SERVER['REQUEST_URI'])=='/talk.php'){echo 'active';}else{ echo '';} ?>">说说</a></li>
                <li><a href="liuyan.php" class="<?php if(($_SERVER['REQUEST_URI'])=='/liuyan.php'){echo 'active';}else{ echo '';} ?>">留言</a></li>
                <li><a href="about.php" class="<?php if(($_SERVER['REQUEST_URI'])=='/about.php'){echo 'active';}else{ echo '';} ?>">关于</a></li>
                <li><a href="archive.php" class="<?php if(($_SERVER['REQUEST_URI'])=='/archive.php'){echo 'active';}else{ echo '';} ?>">归档</a></li>
            </ul>
            <form action="so.php" method="GET" class="navbar-form navbar-right">
                <input type="text" name="search" class="form-control" placeholder="输入文章标题..." />
                <button type="submit" name="submit" class="btn btn-primary">搜索</button>
            </form>
        </div>
    </div>
</nav>
<div style="height:70px"></div>