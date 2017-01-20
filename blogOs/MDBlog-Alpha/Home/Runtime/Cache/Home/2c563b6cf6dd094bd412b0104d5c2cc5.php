<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="renderer" content="webkit|ie-stand|ie-comp">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo C("BLOG_CONFIG.blog_name");?>的博客后台管理</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Css/md-ui.css">
	<link rel="stylesheet" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Css/login.module.css">
	<link rel="stylesheet" href="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Css/font-awesome.css">
	<script type="text/javascript" src="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Js/jquery-2.1.3.min.js"></script>
	<style type="text/css">
	 	body{
	 		background: #F9F9F9;
	 	}
	 	.nav_box .nav{
	 		padding:5px;
	 	}
	</style>
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
	<div class="container-full">
		<div class="row nav_box">
			<div class="navbar navbar-white">
				<div class="navbar-header">
					<a href="#" class="nav-btn"><i class="fa fa-list"></i></a>
				</div>
				<div class="nav-box">
					<ul class="nav-left-list">
						<li class="nav"><a href="<?php echo U('Admin/index');?>" class="now"><i class="fa fa-tachometer fa-1x"></i>仪表盘</a></li>
						<li class="nav"><a href="<?php echo U('Admin/user');?>"><i class="fa fa-users fa-1x"></i>用户管理</a></li>
						<li class="nav"><a href="<?php echo U('Admin/article');?>"><i class="fa fa-file-word-o fa-1x"></i>文章管理</a></li>
						<li class="nav"><a href="<?php echo U('Admin/config');?>" ><i class="fa fa-cogs fa-x"></i>博客配置</a></li>
					</ul>
				</div>
				<div class="menu">
					<ul class="nav-right-list">
						<li class="nav"><a href="<?php echo U('Admin/user',array('change'=>session('mdblog_user')));?>"><?php echo session('mdblog_user');?></a></li>
						<li class="nav"><a href="<?php echo U('Public/logout');?>">退出</a></li>
					</ul>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-12">
				<center>
					<img src="/lanyueOS/MDBlog-Alpha/Home/Common/Common/Images/mylogo.png" alt="" class="responsive-img">
				</center>
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