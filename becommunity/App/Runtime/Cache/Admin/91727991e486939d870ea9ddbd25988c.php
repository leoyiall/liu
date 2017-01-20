<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Be程序员——后台首页</title>
<link rel="icon" href="__PUBLIC__/images/ico.png">
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/MDtool.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
<link rel="stylesheet" href="__PUBLIC__/css/admin.css">
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">
<style type="text/css">
	.adminDing{width:100%;}
	.adminMain{overflow: hidden;*zoom:1;}
	.adminLeft{width:210px;float:left;}
	.adminRight{width:84%;float:right;}
</style>
</head>
<body  style="background:#fafafa;">
<header class="adminDing">
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Be程序员——后台首页</title>
<link rel="icon" href="__PUBLIC__/images/ico.png">
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
<link rel="stylesheet" href="__PUBLIC__/css/admin.css">
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">

</head>
<body>
<div class="admin-top">
	<div class="admin-xx">
		<a href="__ROOT__/index.php" target="__parent"><img src="__PUBLIC__/images/logo.png" alt="logo" class="fl"></a>
		<div class="admin-about">
			<a href="<?php echo U('Index/seeMe');?>?id=<?php echo ($data[0]['id']); ?>"><img src="<?php echo ($data[0]['headimg']); ?>" width="40" height="40" alt="" class="img-thumbnail" title="查看资料"></a>
			<a href="<?php echo U('Index/seeMe');?>?id=<?php echo ($data[0]['id']); ?>"  title="查看资料">
<span class="glyphicon glyphicon-user"></span>
			<?php echo ($data[0]['nicheng']); ?></a>
			<a href="<?php echo U('Index/modifyPass');?>?id=<?php echo ($data[0]['id']); ?>" class="admin-modify">修改密码</a>
			<a href="<?php echo U('Login/logout');?>" title="退出" class="admin-out">
				<span class="glyphicon glyphicon-off"></span>
			</a>
		</div>
	</div>
<div class="admin-nav">
	<div style="width:1000px;margin:0 auto;">
			<ul>
				<li class="link-active"><a href="<?php echo U('Index/index');?>" target="_self">后台首页</a></li>
				<li><a href="<?php echo U('Index/index');?>" target="_self">编程资讯</a></li>
				<li><a href="<?php echo U('Index/index');?>" target="_self">软件下载</a></li>
				<li><a href="<?php echo U('Community/index');?>">社区</a></li>
				<li><a href="<?php echo U('Blog/index');?>">博客</a></li>
				<li><a href="<?php echo U('Question/index');?>">问答</a></li>
				<li><a href="<?php echo U('Programme/index');?>">编程库</a></li>
				<li><a href="<?php echo U('Code/index');?>">源码分享</a></li>
				<li><a href="<?php echo U('Adminlist/index');?>">管理员中心</a></li>
				<li><a href="<?php echo U('Index/adminSet');?>" style="border-right:none;">系统设置</a></li>
			</ul>
	</div><!-- container-fluid结束 -->
</div>
</div>

</body>
</html>
</header>
<div class="adminMain">
	<aside class="adminLeft">
		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Be程序员——后台首页</title>
<link rel="icon" href="__PUBLIC__/images/ico.png">
<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/collapse.js"></script>
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css">
<link rel="stylesheet" href="__PUBLIC__/css/admin.css">
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-theme.min.css">

</head>
<!-- 左侧导航 -->
	<div class="admin-left">
		<ul class=''>
		<!-- 主要功能 -->
			<li class="left-title" style="margin:5px auto;">主要功能</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendnews');?>" target="_self">发布资讯</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendsoft');?>" target="_self">发布软件</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendcategory');?>" target="_self">添加分类</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendstate');?>" target="_self">添加状态</a></li>
				<!-- 功能管理 -->
			<li class="left-title" style="margin:5px auto;">功能管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminArticlelist');?>" target="_self">资讯管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSoftlist');?>" target="_self">软件管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendcategory');?>" target="_self">分类管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendstate');?>" target="_self">状态管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="http://mzl2016.duoshuo.com/admin/" target="_self">评论管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminLinkFriend');?>" target="_self">友情链接</a></li>
			<li class="left-title" style="margin:5px auto;">审核中心</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/examineArticle');?>" target="_self">文章审核</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/examineSoft');?>" target="_self">软件审核</a></li>
				<!-- 系统功能 -->
			<li class="left-title" style="margin:5px auto;">系统功能</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSet');?>" target="_self">系统管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSystem');?>" target="_self">系统信息</a></li>
		</ul>
	</div>	
	
</body>
</html>
	</aside>
	<aside class="adminRight"  style="overflow:auto;height:660px;">
		<!DOCTYPE html>
<!-- saved from url=(0033)http://mzl2016.duoshuo.com/admin/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="Cache-Control" content="no-cache,no-transform,no-siteapp">
    <title>多说</title>
    <meta name="keywords" content="多说,社会化,社会化评论,评论框,插件,wordpress,php,建站,smo,微博,QQ帐号,人人,豆瓣,开心,网易,搜狐,百度,淘宝,msn帐号,google帐号">
<meta name="description" content="多说评论框是一款WordPress社会化评论插件，可以用新浪微博、腾讯QQ、人人、豆瓣多帐号登录，帮助网站进行社会化媒体优化。多说让评论更活跃、互动性更强的评论系统，永久免费且容易安装。它能智能识别垃圾评论、稳步提升网站流量。">
<!--[if lt IE 9]>
  <script type="text/javascript" src="//static.duoshuo.com/libs/html5.js"></script>
<![endif]-->
<!--[if IE 6]>
  <script type="text/javascript" src="//static.duoshuo.com/js/letskillie6.zh_CN.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="http://static.duoshuo.com/favicon.ico" type="image/x-icon">    <link rel="stylesheet" type="text/css" href="./多说_files/login.css">    <!--[if IE 6]>
      <style>
        #wrapper {background: none !important;}
        h1 { font-weight: bold !important;}
        .logo { top: 2px !important;}
        #nav { bottom: -12px !important; }
      </style>
    <![endif]-->
  </head>
  <body>
    <div id="light"></div>
    <div id="wrapper">
      <h1><span class="logo"></span>登录多说</h1>
<div id="login-box">
  <div class="login-top">
    <h2>请先登录</h2>
    <span class="login-arrow"></span>
  </div>
  <div class="login-bottom">
    <ul class="login-left">
      <li><a href="http://mzl2016.duoshuo.com/login/weibo/" rel="nofollow"><span class="ds-service-icon ds-weibo"></span>新浪微博</a></li>
      <li><a href="http://mzl2016.duoshuo.com/login/qq/" rel="nofollow"><span class="ds-service-icon ds-qq"></span>QQ</a></li>
      <li><a href="http://mzl2016.duoshuo.com/login/renren/" rel="nofollow"><span class="ds-service-icon ds-renren"></span>人人</a></li>
      <li><a href="http://mzl2016.duoshuo.com/login/kaixin/" rel="nofollow"><span class="ds-service-icon ds-kaixin"></span>开心</a></li>
    </ul>
    <ul class="login-right">
      <li><a href="http://mzl2016.duoshuo.com/login/douban/" rel="nofollow"><span class="ds-service-icon ds-douban"></span>豆瓣</a></li>
      <li><a href="http://mzl2016.duoshuo.com/login/google/" rel="nofollow"><span class="ds-service-icon ds-google"></span>谷歌</a></li>
      <li><a href="http://mzl2016.duoshuo.com/login/baidu/" rel="nofollow"><span class="ds-service-icon ds-baidu"></span>百度</a></li>
      <li><a href="http://mzl2016.duoshuo.com/login/weixin/" rel="nofollow"><span class="ds-service-icon ds-weixin"></span>微信</a></li><a href="http://mzl2016.duoshuo.com/login/weixin/" rel="nofollow">
    </a></ul><a href="http://mzl2016.duoshuo.com/login/weixin/" rel="nofollow">
  </a></div><a href="http://mzl2016.duoshuo.com/login/weixin/" rel="nofollow">
</a></div><a href="http://mzl2016.duoshuo.com/login/weixin/" rel="nofollow">

      </a><ul id="nav"><a href="http://mzl2016.duoshuo.com/login/weixin/" rel="nofollow">
        </a><li><a href="http://mzl2016.duoshuo.com/login/weixin/" rel="nofollow"></a><a href="http://duoshuo.com/">多说首页</a></li>
        <!--<li><a href="http://duoshuo.com/help">帮助</a></li>-->
      </ul>
    </div>
  

</body></html>
	</aside>
</div>	 
</body>
</html>