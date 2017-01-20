<?php if (!defined('THINK_PATH')) exit();?> 
 
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="title" content="Be程序员——一个置身于打造全民互联网资讯的资讯网。" />
	<meta name="keywords" content="准程序员，编程知识，编程，Javascript,html,css,html5,css3,极客，互联网新闻，编程软件，辅助软件，下载" />
	<meta name="description" content="一个集合多方面发展的一个社区。不只是可以了解到最新的互联网新闻，还可以在这里学习到编程知识和探讨未知的知识。" />
	<title>Be程序员——程序员身边的资讯</title>
	<link rel="icon" href="__PUBLIC__/images/ico.png">
	<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
	<link rel="stylesheet" href="__PUBLIC__/css/common.css">
  <link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="__PUBLIC__/css/head.css">
	<link rel="stylesheet" href="__PUBLIC__/css/news.css">
<!-- 返回顶部滚动效果 -->
	<script type="text/javascript" src="__PUBLIC__/js/returntop.js"></script>
<!-- 滚动效果相关文件 -->
  <script type="text/javascript" src="__PUBLIC__/js/sport.js"></script>
  </head>
  <body>
  	<!-- 头部图片和搜索 -->
  <div class="container top-box">
    <!-- <div class="navbar-header"> -->
  	<div class="row">
  		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
  			<a href="__ROOT__/index.php" style="float:left;">
  				<img src="__PUBLIC__/images/logo.png" alt="logo">
  			</a>
  			<span class="logo-text" style="line-height:60px;margin-left:10px;">程序员身边的资讯</span>
  		</div>
  		<div class="col-log-5 col-md-5 col-sm-5 col-xs-0 " id="search_box">
  		<form action="<?php echo U('search');?>" method="get">
  			<input type="text" name="soso" class="search_bar" placeholder="搜索">
  			<input type="submit" value="搜索" class="search_btn">
  		</form>
  		</div>
  	</div>
  	<!-- </div> -->
  </div>

  <!-- 导航条部分 -->
  <nav class="navbar-default navbar">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="__ROOT__/index.php">Be程序员</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo U('index');?>">资讯首页 <span class="sr-only">(current)</span></a></li>
          <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('lists');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["category"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  			<li><a href="<?php echo U('down');?>">软件下载</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

<!-- 流程布局内容 -->
<div class="container">
	<div class="row">	
	<!-- 面包屑导航 -->
		<div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
			<ol class="breadcrumb">
			  <li>当前位置: 
			  <a href="<?php echo U('index');?>">首页</a></li>
			  <li class="active">搜索结果</li>
			</ol>
		</div>
	</div>
	<!-- 文章列表 -->
	<div class="row">
		<div class="col-log-9 col-md-9 col-sm-9 col-xs-12">
		<div class="hot-news" style="margin:20px auto;">
			<h4><span style="padding-bottom:13px;">您搜索的关键词是:"<span style="color:red"><?php echo ($keywords); ?></span>",为您找到以下相关资讯</span></h4>
		</div>
		<!-- 一个新闻块 -->
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-log-12 col-md-12 col-sm-12 col-xs-12 news-col">
				<h3><a href="<?php echo U('article');?>?id=<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></h3>
			</div>
			<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 news-intro">
				<span class="">发布时间：<?php echo ($vo["date"]); ?> / 分类：<?php echo ($vo["category"]); ?> / <?php echo ($vo["sight"]); ?> 人浏览 /</span>
			</div>
		<div class="row news-box">
			<div class="col-log-3 col-md-4 col-sm-5 col-xs-5">
				<a href="" target="_blank"><img src="<?php echo ($vo["arcimg"]); ?>" alt="adv" class="img-thumbnail news-img" ></a>
			</div>
			<div class="col-log-9 col-md-8 col-sm-7 col-xs-7 news-summary">
				<?php echo ($vo["summary"]); ?>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<!-- 一个新闻块结束 -->
		
<!-- 页码 -->
<div class="row">
	<div class="col-log-12 col-md-12 col-sm-12 col-xs-12">
		<nav class="index-page text-center" style="margin-bottom:50px;margin-top:30px;">
			<?php echo ($show); ?>
		</nav>
	</div>
</div>
		</div>
	<!-- 右侧推荐+广告 -->
		<div class="col-log-3 col-md-3 col-sm-3 col-xs-12 right-box">
			<!-- 广告 -->
		<div class="adv-list">
			<a href=""><img src="__PUBLIC__/images/1.jpg" alt="adv" class="img-thumbnail"></a>
			<a href=""><img src="__PUBLIC__/images/1.jpg" alt="adv" class="img-thumbnail"></a>
			<a href=""><img src="__PUBLIC__/images/1.jpg" alt="adv" class="img-thumbnail"></a>
		</div>

		<!-- 关注我们 -->
		<div class="about-us">
			<h3>关注我们</h3>
			<div class="about-quote">
			<center>
			<img src="__PUBLIC__/images/ewm.png" alt="adv" class="img-responsive">
			</center>
			<h4>官方微信:<b>bechengxuyuan</b></h4>
				<ul>
					<li>
						<a href="">
							<img src="__PUBLIC__/images/wx.png" alt="微信订阅"><br>
							<span>微信订阅</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="__PUBLIC__/images/wb.png" alt="微博订阅"><br>
							<span>微博订阅</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="__PUBLIC__/images/yx.png" alt="邮箱订阅"><br>
							<span>邮箱订阅</span>
						</a>
					</li>
					<li>
						<a href="">
							<img src="__PUBLIC__/images/rss.png" alt="RSS订阅"><br>
							<span>RSS订阅</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		</div>
	</div>
	<!-- 引用底部 -->
	<!-- 友情链接 -->
	<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 friend_link down_box">
		<div class="friend_title"><h3>——友情链接——</h3></div>
		<ul>
		<?php if(is_array($flist)): $i = 0; $__LIST__ = $flist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["link"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div><!-- container结束 -->
<!-- 底部版权 -->
<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 footer">
	<div class="container">
		<div class="footer-intro text-center">
			<img src="__PUBLIC__/images/logo.png" alt=""><br>
			<a href="">关于我们</a> | 
			<a href="">广告合作</a> | 
			<a href="">免责声明</a> 
		</div>
		<hr />
		<div class="col-log-12 col-md-12 col-sm-12 col-xs-12 footer-copyright text-center">
			Copyright © 2015-2016 · All Rights Reserved · Be程序员 · 京ICP备18932151
		</div>
	</div>
</div>
<!-- 返回顶部 -->
<div class="returnTop" id="topbtn">
	Top
</div>