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
						<li class="nav"><a href="<?php echo U('Admin/index');?>"><i class="fa fa-tachometer fa-1x"></i>仪表盘</a></li>
						<li class="nav"><a href="<?php echo U('Admin/user');?>"><i class="fa fa-users fa-1x"></i>用户管理</a></li>
						<li class="nav"><a href="<?php echo U('Admin/article');?>" ><i class="fa fa-file-word-o fa-1x"></i>文章管理</a></li>
						<li class="nav"><a href="<?php echo U('Admin/config');?>" class="now"><i class="fa fa-cogs fa-x"></i>博客配置</a></li>
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
	</div>
	<style>
		.select{
			width: 40px;
		}
		.manage{
			width: 130px;
		}

	</style>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<form action="<?php echo U('Admin/setconfig');?>" method="POST">
					<div class="panel">
						<div class="panel-title"><i class="fa fa-cogs fa-x"></i>&nbsp;<strong>基本配置</strong></div>
						<div class="panel-content">
							<label data-before="博客名字:" data-after="*博客名字">
								<input type="hidden" name="basis" value="1">
			 					<input type="text" placeholder="输入博客名字" name="blog_name" class="input-lg" value='<?php echo C("BLOG_CONFIG.blog_name");?>'>
			 				</label>
						</div>
						<div class="panel-content">
							<label data-before="博客介绍:" data-after="*博客介绍">
			 					<textarea  placeholder="博客介绍" class="input-lg" name="blog_introduce" style="width:50%;height:100px;"><?php echo C("BLOG_CONFIG.blog_introduce");?></textarea>
			 				</label>
						</div>
						<div class="note-warning">配置文件在：<code>webroot/mdblog/Home/Common/conf/system/myconf.php</code>,手动修改配置文件请注意，严格遵循json语法。</div>
						<div class="panel-footer">
							<label><span class="btn-blue">保存修改</span><input  type="submit" name="sub" style="display:none"></label>
						</div>
					</div>
					</form>
					<style type="text/css">
						.r{
							height: 50px;
						}
						.item{
							text-align: right;
						}
					</style>

					<div class="panel">
						<div class="panel-title"><i class="fa fa-cogs fa-x"></i>&nbsp;<strong>导航链接</strong></div>
						<?php $blog_navs=C('BLOG_CONFIG.blog_menus'); ?>
							<div class="note-blue">目前有<?php echo count($blog_navs);?>个链接，建议不要创建太多，不然导航会溢出。</div>
						<div class="panel-content">
							<table class="table-data">
								<tbody>
									
									<tr class="thead">
										<td >链接名字</td>
										<td >链接地址</td>
										<td class="manage">操作</td>
									</tr>
									<?php if(is_array($blog_navs)): foreach($blog_navs as $key=>$nav): ?><tr>
											<td><a href="<?php echo ($nav); ?>" target="_blank"><?php echo ($key); ?></a></td>
											<td><?php echo ($nav); ?></td>
											<td>
												<a href="<?php echo U('Admin/setconfig',array('dellink'=>1,link=>$key));?>"><span class="btn-del">删除</span></a>
											</td>
										</tr><?php endforeach; endif; ?>
								</tbody>
							</table>
						</div>
						<div class="line"></div>
						<div class="panel-content">
						<form action="<?php echo U('Admin/setconfig');?>" method="POST">
							<table align="center">
								<tbody>
									<tr class="r">
										<td class="item"><strong>链接名字</strong>：</td>
										<td><input type="text" placeholder="链接名字" name="link_name" class="input-lg" value=""></td>
										<input type="hidden"  name="addlink"  value="1">
									</tr>
									<tr class="r">
										<td class="item"><strong>链接地址</strong>：</td>
										<td><input type="text" placeholder="链接地址" name="link" class="input-lg" value=""></td>
									</tr>
									<tr>
										<td></td>
										<td><button type="submit">添加链接</button></td>
									</tr>
								</tbody>
							</table>
						</form>
						</div>
						<div class="panel-footer"></div>
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