<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>快搜栏目——快速搜索你想要的</title>
  <link rel="shortcut icon" href="__PUBLIC__/images/so.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/reset.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
  <!-- 引用bootstrap -->
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
  <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
 </head>
 <body>
  <!-- 头部导航 -->
  <nav class="navbar navbar-default" style="position:fixed;width:100%;overflow:hidden;*zoom:1;z-index:10;">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
			<img src="__PUBLIC__/images/logo.png" alt="快搜" style="margin-top:-10px;">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?php echo U('index');?>">首页<span class="sr-only">(current)</span></a></li>
          <li><a href="<?php echo U('lists');?>">文章</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search" style="margin-left:50px;" action="<?php echo U('search');?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="快速搜索您需要的内容" name="so" style="width:300px;">
          </div>
          <button type="submit" class="btn btn-default">快搜</button>
        </form>
        <!-- 右侧 -->
        <ul class="nav navbar-nav navbar-right">

        <?php if($who): ?><a href="__ROOT__/index.php/admin" style="line-height:50px;"><img src="__PUBLIC__/images/333.jpg"  width="30" height="30" style="border-radius:50%;margin-right:5px;border:1px solid #ccc;"><b><?php echo ($who); ?></b></a>
          <?php else: ?>
           <li><a href="<?php echo U('Admin/Login/index');?>">登录</a></li><?php endif; ?>

         </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
	
	<!-- 主体 -->
	<div class="container">
	<div class="inPosition div2_top">
		当前位置：<a href="<?php echo U('index');?>">首页</a> >> 栏目列表
	</div>
	<div class="bg-info">
		<h3 class="text-center">栏目</h3>
		<ul class="list_box" style="text-align:center;">
		<?php if(is_array($cs)): foreach($cs as $key=>$v): ?><li class="fl"><a href="<?php echo U('column');?>/id/<?php echo ($v["id"]); ?>"><?php echo ($v["cName"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
	</div>
	<!-- 左边文章栏目 -->
		<div class="list_left fl">
			<!-- 内容块 -->
		<?php if(is_array($data)): foreach($data as $key=>$vv): ?><div class="list_kuai">
				<h4>
				<?php if(is_array($ss)): foreach($ss as $key=>$s): if($s['id'] == $vv['sid']): ?><span class="color_red">[<?php echo ($s["state"]); ?>]</span><?php endif; endforeach; endif; ?>
				<a href="<?php echo U('article');?>/id/<?php echo ($vv["id"]); ?>" title="<?php echo ($vv["title"]); ?>"><?php echo ($vv["title"]); ?></a></h4>
				<div class="list_summary">
				
					<div class="list_say">
					<div class="list_about">
						发布时间：<?php echo ($vv["date"]); ?> / 分类：
						<?php if(is_array($cs)): foreach($cs as $key=>$c): if($c['id'] == $vv['cid']): echo ($c["cName"]); endif; endforeach; endif; ?>
						 / 作者:<?php echo ($who); ?> /
					</div>
						<?php echo ($vv["summary"]); ?>
					</div>
				</div>
			</div><?php endforeach; endif; ?>
			<!-- 内容块结束 -->
		
			<!-- 内容块结束 -->
			<div class="list_page">
				<nav>
				   <?php echo ($page); ?>
				</nav>
			</div>
		</div>
	<!-- 右边文章推荐 -->
		<div class="list_right  fr">
			<div class="nav_title"><h4>置顶文章</h4></div>
			<ul class="list_box">
				<?php if(is_array($top)): foreach($top as $key=>$t): ?><li><span class="color_red">▷</span> <a href="<?php echo U('article');?>/id/<?php echo ($vv["id"]); ?>" title="<?php echo ($t["title"]); ?>"><?php echo ($t["title"]); ?></a></li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div><!-- container -->
	<div class="footer div2_top">
		版权所有 © by leo
	</div>
 </body>
</html>