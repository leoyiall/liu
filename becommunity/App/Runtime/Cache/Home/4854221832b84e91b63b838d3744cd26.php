<?php if (!defined('THINK_PATH')) exit();?> 
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="title" content="Be程序员——一个置身于打造全民互联网资讯的资讯网。——<?php echo ($lists['category']); ?>" />
	<meta name="keywords" content="准程序员，编程知识，编程，Javascript,html,css,html5,css3,极客，互联网新闻，编程软件，辅助软件，下载" />
	<meta name="description" content="一个集合多方面发展的一个社区。不只是可以了解到最新的互联网新闻，还可以在这里学习到编程知识和探讨未知的知识。" />
	<title>Be程序员——软件下载</title>
	<link rel="icon" href="__PUBLIC__/images/ico.png">
	<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
	<link rel="stylesheet" href="__PUBLIC__/css/down.css">
	<link rel="stylesheet" href="__PUBLIC__/css/common.css">
  <link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="__PUBLIC__/css/head.css">
	<link rel="stylesheet" href="__PUBLIC__/css/news.css">
<!-- 返回顶部滚动效果 -->
	<script type="text/javascript" src="__PUBLIC__/js/returntop.js"></script>
<!-- 滚动效果相关文件 -->
  <script type="text/javascript" src="__PUBLIC__/js/sport.js"></script>
  <script>
      $(function(){
          $('#silder').imgSilder({
  			s_width:'100%', //容器宽度
  			s_height:300, //容器高度
  			is_showTit:true, // 是否显示图片标题 false :不显示，true :显示
  			s_times:3000, //设置滚动时间
  			css_link:'__PUBLIC__/css/changepit.css'
  		});
  	});
  </script>
</head>
<body>
	<!-- 头部图片和搜索 -->
<div class="container top-box">
  <!-- <div class="navbar-header"> -->
	<div class="row">
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
			<a href="" style="float:left;">
				<img src="__PUBLIC__/images/logo.png" alt="logo">
			</a>
<!-- 			<span class="logo-text" >程序员身边的资讯</span> -->
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
      <a class="navbar-brand" href="<?php echo U('index');?>">Be程序员</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo U('index');?>">资讯首页 <span class="sr-only">(current)</span></a></li>
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
			<ol class="breadcrumb" style="font-size:14px;">
			  <li>当前位置: 
			  <a href="<?php echo U('index');?>" style="color:#337AB7">首页</a></li>
			  <li class="active">软件下载</li>
			</ol>
		</div>
	</div>

	<!-- 左侧的滚动+热点新闻 -->
<div class="row" style="padding:5px;border:1px solid #ddd;padding-bottom:10px;">
	<div class="col-log-4 col-md-4 col-sm-4 col-xs-12">
		<!-- 切换条功能开始 -->
			<div class="silder" id="silder">
			  <ul class="silder_list" id="silder_list">
			   <?php if(is_array($playTech)): $i = 0; $__LIST__ = $playTech;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('article');?>?id=<?php echo ($vo["id"]); ?>"><img src="<?php echo ($vo["arcimg"]); ?>" border="0" alt="<?php echo ($vo["title"]); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			  </ul>
			</div>	
  		<!-- 切换卡结束地方 -->
  	</div>
  	<!-- 软件教程 -->
<div class="down_zx col-log-4 col-md-4 col-sm-4 col-xs-12">
	  	  <h3><a href="<?php echo U('lists');?>?id=10">软件教程</a></h3>
	  	  <ul>
	  	  <?php if(is_array($softTech)): $i = 0; $__LIST__ = $softTech;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="zx_a">☆</span> <a href="<?php echo U('article');?>?id=<?php echo ($vo["id"]); ?>" title="600"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	  	  </ul>
  	</div>
  	<!-- 安装教程 -->
<div class="down_zx col-log-4 col-md-4 col-sm-4 col-xs-12">
  	  <h3><a href="<?php echo U('lists');?>?id=11">软件安装</a></h3>
  	  <ul class="down_gk">
   	  	  <?php if(is_array($softInstall)): $i = 0; $__LIST__ = $softInstall;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="zx_a" style="float:left;">☆</span> <a href="<?php echo U('article');?>?id=<?php echo ($vo["id"]); ?>" title="600"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  	  </ul>
	</div>
</div>
<!-- 左侧的滚动+热点新闻结束 -->	
<div class="row" style="border:1px solid #ddd;margin-top:10px;padding-top:30px;">
		<div class="col-log-4 col-md-4 col-sm-4 col-xs-12 down_list">
		  <h3><a href="<?php echo U('downlist');?>?id=1"><span>开发工具</span></a></h3>
		  <ul>
		  <?php if(is_array($kfgj)): $i = 0; $__LIST__ = $kfgj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span>▷</span><a href="<?php echo U('downpage');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a><span class="fr"><a href="<?php echo ($vo["link"]); ?>">下载</a></span></li><?php endforeach; endif; else: echo "" ;endif; ?>  

		  </ul>
		</div>
		<!-- 编辑器 -->
		<div class="col-log-4 col-md-4 col-sm-4 col-xs-12 down_list">
		  <h3><a href="<?php echo U('downlist');?>?id=2"><span>编辑器</span></a></h3>
		  <ul>
		  <?php if(is_array($bjq)): $i = 0; $__LIST__ = $bjq;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span style="margin-rihgt:5px;">▷</span><a href="<?php echo U('downpage');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a><span class="fr"><a href="<?php echo ($vo["link"]); ?>">下载</a></span></li><?php endforeach; endif; else: echo "" ;endif; ?> 

		  </ul>
		</div>
		<!-- 辅助工具 -->
		<div class="col-log-4 col-md-4 col-sm-4 col-xs-12 down_list">
		  <h3><a href="<?php echo U('downlist');?>?id=3"><span>辅助工具</span></a></h3>
		  <ul>
   		  <?php if(is_array($fzgj)): $i = 0; $__LIST__ = $fzgj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span style="margin-rihgt:5px;">▷</span><a href="<?php echo U('downpage');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a><span class="fr"><a href="<?php echo ($vo["link"]); ?>">下载</a></span></li><?php endforeach; endif; else: echo "" ;endif; ?> 
		  </ul>
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