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
	 	a:hover{
	 		text-decoration: none;
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
						<li class="nav"><a href="<?php echo U('Admin/user');?>" class="now"><i class="fa fa-users fa-1x"></i>用户管理</a></li>
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
	</div>
	<br>
	<br>
	<style type="text/css">
		.r{
			height: 50px;
		}
		.item{
			text-align: right;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php if($change == ''): ?><!--用户列表-->
				<div class="panel">
					<div class="panel-title"><i class="fa fa-users fa-1x"></i>&nbsp;<strong>用户列表</strong></div>
					<div class="panel-content">
						<table class="table-data">
							<tbody>
								<tr class="thead">
									<td >uid</td>
									<td >类型</td>
									<td >注册时间</td>
									<td class="manage">操作</td>
								</tr>
								<?php if(is_array($users)): foreach($users as $key=>$user): ?><tr>
										<td><?php echo ($key); ?></td>
										<td>管理员</td>
										<td><?php echo date('Y-m-d H:i:s',$user['rtime']);?></td>
										<td>
											<a href="<?php echo U('Admin/user',array('change'=>$key));?>"><span class="btn-add">修改</span></a>
											<a href="<?php echo U('Admin/user',array('del'=>$key));?>"><span class="btn-del">删除</span></a>
										</td>
									</tr><?php endforeach; endif; ?>
								
							</tbody>
						</table>
					</div>
					<div class="panel-footer"></div>
				</div>
				<?php else: ?>
				<!--修改用户-->
				<div class="panel">
					<div class="panel-title"><i class="fa fa-cogs fa-x"></i>&nbsp;<strong>修改用户</strong></div>
					<div class="panel-content">
						<form action="<?php echo U('Admin/changeuser');?>" method="POST">
						<table align="center">
							<tr></tr>
							<tr class="r">
								<td class="item"><strong>用户名</strong>：</td>
								<td><input type="text" placeholder="用户名" name="name" disabled="disabled" class="input-lg" value="<?php echo ($change); ?>"><span class="prompt">*此项不可修改</span>
								<input type="hidden" name="user"   value="<?php echo ($change); ?>"></td>
							</tr>
							<tr class="r">
								<td class="item"><strong>密码</strong>：</td>
								<td><input type="password" placeholder="密码" name="pwd" class="input-lg" value=""></td>
							</tr>
							<tr class="r">
								<td class="item"><strong>确认密码</strong>：</td>
								<td><input type="password" placeholder="确认密码" name="pwd1" class="input-lg" value=""></td>
							</tr>
							<tr class="r">
								<td class="item"><strong>验证码</strong>：</td>
								<td>
									<input type="text" placeholder="验证码" class="input-lg" name="code" value="" style="width:100px;">
									<img src="<?php echo U('Public/Verify');?>" class="codeimg" alt="code" style="  width: 100px;height: 32px;border: solid 1px #DFDFDF;vertical-align: bottom;"onclick="this.src=this.src">
								</td>
							</tr>
							<tr>
								<td></td>
								<td><button type="submit">提交</button></td>
							</tr>
						</table>
						</form>
					</div>
					<div class="panel-footer"></div>
				</div><?php endif; ?>
				<!--添加用户-->
				<div class="panel">
					<div class="panel-title"><i class="fa fa-cogs fa-x"></i>&nbsp;<strong>添加用户</strong></div>
					<div class="panel-content">
						<form action="<?php echo U('Admin/adduser');?>" method="POST">
						<table align="center">
							<tr></tr>
							<tr class="r">
								<td class="item"><strong>用户名</strong>：</td>
								<td><input type="text" placeholder="用户名" name="user" class="input-lg" value=""></td>
							</tr>
							<tr class="r">
								<td class="item"><strong>密码</strong>：</td>
								<td><input type="password" placeholder="密码" name="pwd" class="input-lg" value=""></td>
							</tr>
							<tr class="r">
								<td class="item"><strong>确认密码</strong>：</td>
								<td><input type="password" placeholder="确认密码" name="pwd1" class="input-lg" value=""></td>
							</tr>
							<tr class="r">
								<td class="item"><strong>验证码</strong>：</td>
								<td>
									<input type="text" placeholder="验证码" class="input-lg" name="code" value="" style="width:100px;">
									<img src="<?php echo U('Public/Verify');?>" class="codeimg" alt="code" style="  width: 100px;height: 32px;border: solid 1px #DFDFDF;vertical-align: bottom;"onclick="this.src=this.src">
								</td>
							</tr>
							<tr>
								<td></td>
								<td><button >提交</button></td>
							</tr>
						</table>
						</form>
					</div>
					<div class="panel-footer"></div>
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