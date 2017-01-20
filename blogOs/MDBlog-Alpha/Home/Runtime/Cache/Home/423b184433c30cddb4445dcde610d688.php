<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=0,maximum-scale=1,user-scalable=0">
	<!-- <meta name="apple-mobile-web-app-capable" content="yes" /> -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="apple-touch-fullscreen" content="yes"><!--"添加到主屏幕“后，全屏显示 -->
  	<meta name="apple-mobile-web-app-capable" content="yes" /><!--这meta的作用就是删除默认的苹果工具栏和菜单栏。-->
	<title><?php echo C("BLOG_CONFIG.blog_name");?>的博客—<?php echo C("SYSTEM.app_name");?>个人博客</title>
	<link rel="stylesheet" type="text/css" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Css/md-ui.css"/>
	<link rel="stylesheet" type="text/css" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Css/font-awesome.css"/>
	<script src="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Js/jquery-2.1.3.min.js"></script>
	
</head>
<body>
	<script>
	$(document).ready(function(){
		$(".navbar .navbar-header .nav-btn").click(function(){
			$(this).parent().parent().children(".nav-box").slideToggle(500);
			$(this).parent().parent().children(".menu").slideToggle(500);
		});
	});
</script>
<div class="navbar navbar-blue">
	<div class="navbar-header">
		<a href="<?php echo C('SYSTEM.app_link');?>" class="nav-title" target="_blank"><strong><?php echo C('SYSTEM.app_name');?>博客</strong></a>
		<a href="#" class="nav-btn"><i class="fa fa-list"></i></a>
	</div>
	<div class="nav-box">
		<ul class="nav-left-list">
			<li class="nav"><a href="<?php echo U('Index/index');?>"><i class="fa fa-home"></i>首页</a></li>
			<li class="nav"><a href="<?php echo U('Article/index');?>">编辑</a></li>
			<li class="nav"><a href="<?php echo U('Admin/index');?>">管理</a></li>
			<?php $sys_menu=C('SYSTEM.app_navs');$user_menu=C('BLOG_CONFIG');?>
			<?php if(is_array($sys_menu["menus"])): foreach($sys_menu["menus"] as $key=>$menu): ?><li class="nav"><a href="<?php echo ($menu); ?>" target="_blank"><?php echo ($key); ?></a></li><?php endforeach; endif; ?>
			<?php if(is_array($user_menu["blog_menus"])): foreach($user_menu["blog_menus"] as $key=>$menu): ?><li class="nav"><a href="<?php echo ($menu); ?>" target="_blank"><?php echo ($key); ?></a></li><?php endforeach; endif; ?>
			<li class="nav"><a href="#">关于</a></li>
		</ul>
	</div>
	
	<!-- <div class="menu">
		<ul class="nav-right-list">
			<li class="nav"><a href="#">登录</a></li>
			<li class="nav"><a href="#">关于</a></li>
		</ul>
	</div> -->
</div>
	<div class="jumbotron-blue">
		<div class="logo">M</div>
		<h1><?php echo C('BLOG_CONFIG.blog_name');?>的博客</h1>
		<p><?php echo C('BLOG_CONFIG.blog_introduce');?></p>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-3 min-hide">
				<div class="panel">
					<div class="panel-title"><i class="fa fa-file-text-o"></i>&nbsp;<strong>文章分类</strong></div>
					<div class="panel-content">
						<!--目录-->
						<ul class="catalogue">
							
							<?php if(is_array($classify)): foreach($classify as $key=>$class): ?><li><a href="#"><strong><?php echo ($key); ?></strong></a>
								<ul class="catalogue">
									<?php if(is_array($class)): foreach($class as $key=>$arl): ?><li><a href="<?php echo U('Article/preview',array( 'aid'=>$arl["url"], ),'html');?>" target="_blank"><?php echo ($arl['title']); ?></a></li><?php endforeach; endif; ?>
								</ul>
							</li><?php endforeach; endif; ?>
						</ul>
					</div>
					<div class="panel-footer"></div>
				</div>
				<div class="panel">
					<div class="panel-title"><i class="fa fa-file-text-o"></i>&nbsp;<strong>记录</strong></div>
					<div class="panel-content">
						<!--目录-->
						<ul class="catalogue">
							<?php if(is_array($record)): foreach($record as $key=>$alists): ?><li><a href="#"><strong><?php echo ($key); ?></strong></a>
								<ul class="catalogue">
									<?php if(is_array($alists)): foreach($alists as $key=>$arl): ?><li><a href="<?php echo U('Article/preview',array( 'aid'=>$arl["url"], ),'html');?>" target="_blank"><?php echo ($arl['title']); ?></a></li><?php endforeach; endif; ?>
								</ul>
							</li><?php endforeach; endif; ?>
						</ul>
					</div>
					<div class="panel-footer"></div>
				</div>


				

			</div>
			<div class="col-6">
				<div class="lump">
					<?php if(is_array($articles)): foreach($articles as $key=>$article): ?><div class="lump-content">
							<div class="piece">
								<div class="piece-title"><a href="<?php echo U('Article/preview',array( 'aid'=>$article["url"], ),'html');?>"><strong><?php echo ($article["title"]); ?></strong></a></div>
								<div class="piece-about">
									<span>时间：<?php echo date('Y-m-d H:i:s',$article['time']);?></span>
									<span class="fa fa-eye">浏览:<?php echo ($article["visit"]); ?></span>
									<span >类型:<?php echo ($article["type"]); ?></span>
								</div>
								<div class="piece-content">
									<?php echo ($article["abstract"]); ?>
									<a href="<?php echo U('Article/preview',array( 'aid'=>$article["url"], ),'html');?>" class="piece-readall label-blue">阅读全文</a>
								</div>
							</div>
						</div><?php endforeach; endif; ?>
					<center><?php echo ($pages); ?></center>
					<!-- <center>
						<ul class="page-box page">
							<li><a href="#">«</a></li>
							<li><a href="#">1</a></li>
							<li class="page-active"><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li class="page-disabled"><a href="#">»</a></li>
						</ul>
					</center> -->
				</div>
			</div>
			<div class="col-3 min-hide">
				<div class="card">
					<div class="card-title">最新文章<a href="" class="more">更多</a></div>
					<div class="card-content">
						<ul class="article-top list-type-square">
							<?php if(is_array($top)): foreach($top as $key=>$atop): ?><li><a href="<?php echo U('Article/preview',array( 'aid'=>$atop["url"], ),'html');?>" target="_blank"><?php echo ($atop['title']); ?></a><span class="article-host"></span></li><?php endforeach; endif; ?>
							
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div style="margin-top:100px;clear:both"></div>
<style type="text/css">
.footer{
	background: #212326;
	color:#838383;
}
</style>
<div class="container-full">
	<div class="row">
		<div class="col-12 footer">
			<div class="col-2"></div>
			<div class="col-8">
				<p align="center"><strong>友情链接：</strong>
					<?php $sys_menu=C('SYSTEM.app_navs'); ?>
					<?php if(is_array($sys_menu["blogroll"])): foreach($sys_menu["blogroll"] as $key=>$nav): ?><a href="<?php echo ($nav); ?>" target="_blank"><?php echo ($key); ?></a>&nbsp;<?php endforeach; endif; ?>
				</p>
				
				<p align="center">
					<strong>联系：</strong>
					QQ:1752295326&nbsp;
					GitHub:<a href="https://github.com/mengdu/" target="_blank">mengdu</a>
				</p>
			</div>
			<div class="col-2"></div>
		</div>
		<div class="col-12 footer">
			<p align="center">Copyright © 2014-2015 mdblog All Rights Reserved. <a href="<?php echo U('Admin/index');?>">管理</a></p>
		</div>
	</div>
</div>
	</body>
</html>