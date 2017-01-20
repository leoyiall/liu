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
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/down.css">

<!-- 返回顶部滚动效果 -->
	<script type="text/javascript" src="__PUBLIC__/js/returntop.js"></script>
<!-- 滚动效果相关文件 -->
  <script type="text/javascript" src="__PUBLIC__/js/sport.js"></script>
  <style type="text/css">
    a{color:#333;text-decoration: none;}
    a:hover{color:#3DA3EF;text-decoration: none;}
    .top{width:100%;height:40px;line-height: 40px;overflow:hidden;*zoom:1;background-color: #fafafa;border-bottom: 1px solid #ccc;}
    .conWidth{width:1150px;margin:0 auto;}
    .left{width:500px;float:left;}
    .left a{font-size:16px;}
    .left img{float:left;}
    .left span{color:#ff4400;font-size:18px;margin-left:5px;}
    .right{float:right;}
    .right ul li{float:left;margin:0 5px;}
  </style>
  </head>
  <body>
  <!-- 头部 -->
  	<div class="top">
  		<div class="conWidth">
  		  <div class="left">
        <a href="__ROOT__/index.php"><span><img src="__PUBLIC__/images/ico.png" width="38" height="38"></span></a>
        <a href="<?php echo U('Blog/index');?>">博客</a>
        <a href="<?php echo U('Index/index');?>">资讯</a>
        <a href="<?php echo U('Community/index');?>">社区</a>
        <a href="<?php echo U('Question/index');?>">问答</a>
        <a href="<?php echo U('Programme/index');?>">编程库</a>
        <a href="<?php echo U('Index/down');?>">软件</a>
  			<a href="<?php echo U('Code/index');?>">源码</a>
  		  </div>
  		  <div class="right">
  			 <?php if($idnumber): ?><ul>
  			    <li>
  			    <?php if($list['nicheng']): ?><a href="<?php echo U('Person/index');?>?id=<?php echo ($list['idnumber']); ?>"><?php echo ($list['nicheng']); ?></a>
  			    <?php else: ?>
  			<a href="<?php echo U('Person/index');?>?id=<?php echo ($idnumber); ?>"><?php echo ($idnumber); ?></a><?php endif; ?>
  			    </li>
  			    <li><a href="<?php echo U('Common/logout');?>">退出</a></li>
  			    <li><a href="<?php echo U('Person/addarc');?>?id=<?php echo ($idnumber); ?>">发布博文</a></li>

  			  </ul>
  			  <?php else: ?>
  			    <ul>
  			      <li><a href="<?php echo U('Common/login');?>?l=yuanma">登录</a></li>
  			      <li><a href="<?php echo U('Common/reg');?>">注册</a></li>
  			    </ul><?php endif; ?>
  		  </div>
  		</div>
  	</div>
  	<!-- 头部图片和搜索 -->
  <div class="container top-box">
    <!-- <div class="navbar-header"> -->
  	<div class="row">
  		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
  			<a href="__ROOT__/index.php" style="float:left;">
  				<img src="__PUBLIC__/images/logo.png" alt="logo">
  			</a>
  			<span class="logo-text" style="line-height:60px;margin-left:10px;">程序员身边的源码站</span>
  		</div>
  		<div class="col-log-5 col-md-5 col-sm-5 col-xs-0 " id="search_box">
  		<form action="<?php echo U('search');?>" method="get">
  			<input type="text" name="soso" class="search_bar" placeholder="源码搜索">
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
          <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('index');?>?id=<?php echo ($vo["cid"]); ?>"><?php echo ($vo["sort"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  			
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
    <li><a href="<?php echo U('index');?>">源码分享</a></li>
    <li class="active"><?php echo ($clist[$id-1]['sort']); ?></li>
  </ol>
</div>
	</div>
	<!-- 文章列表 -->
	<div class="row">
		<div class="col-log-9 col-md-9 col-sm-9 col-xs-12" style="border:1px solid #ddd;">
	    <ul>
			<!-- 第一个块 -->
	<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> 
	        <div class="down_kuan">
	            <div class="down_intro">
	            <h3><a href="<?php echo U('downpage');?>?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></h3>
	              <p style="color:#888;">发布时间：<?php echo date("Y-m-d H:i",$vo['sendTime']); ?> / 分类：<?php echo ($vo["fl"]); ?> / 发布人:<?php echo ($vo["nicheng"]); ?></p>
	              <p>
  		<b style="color:#ff4400">软件关键词:</b><?php echo ($vo["keywords"]); ?>
	              </p>
	              <div class="down_div">
	                    <p><?php echo ($vo["introduce"]); ?></p>
                    <?php if($vo['look'] != ''): ?><span class="good_say fl"><a href="<?php echo ($vo["look"]); ?>" class="btn btn-info fr" title="源码演示" target="_blank">源码演示</a></span><?php endif; ?>
	                    <a href="<?php echo ($vo["link"]); ?>" class="btn btn-info fr" title="立即下载">立即下载</a>
	              </div>
	            </div>
	        </div>
	      </li><?php endforeach; endif; else: echo "" ;endif; ?>
			<!-- 块结束 -->

	    </ul>
	    <div class="list_page text-center">
			<nav class="index-page text-center">
			    <?php echo ($show); ?>	
			</nav>
	    </div>

		</div>
	<!-- 右侧推荐+广告 -->
		<div class="col-log-3 col-md-3 col-sm-3 col-xs-12 right-box" >
		  <!-- 切换卡 -->
<!-- 		<div id="news_tj" style="border:1px solid #ddd;padding:5px;">
		    <ul id="news_ul">
		      <li class="liactive">推荐软件</li>
		    </ul>
		    <div style="display:block">
		          <ul class="news_more">
		          
	          <?php if(is_array($tj)): $i = 0; $__LIST__ = $tj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="num_square num_color">★</span><a href="<?php echo U('downpage');?>?id=<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		          </ul>
		      </div>
		</div> -->
			<!-- 广告 -->
		<div class="adv-list" style="border:1px solid #ddd;padding:5px;">
			<a href=""><img src="__PUBLIC__/images/1.jpg" alt="adv" class="img-thumbnail"></a>
			<a href=""><img src="__PUBLIC__/images/1.jpg" alt="adv" class="img-thumbnail"></a>
		</div>
</div>
</div>
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