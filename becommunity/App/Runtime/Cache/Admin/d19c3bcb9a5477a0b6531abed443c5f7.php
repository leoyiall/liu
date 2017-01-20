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
			<?php if($data[0]['power'] != 0): ?><li><a href="<?php echo U('Community/index');?>">社区</a></li>
				<li><a href="<?php echo U('Blog/index');?>">博客</a></li>
				<li><a href="<?php echo U('Question/index');?>">问答</a></li><?php endif; ?>
				<li><a href="<?php echo U('Programme/index');?>">编程库</a></li>
				<li><a href="<?php echo U('Code/index');?>">源码分享</a></li>
			<?php if($data[0]['power'] == 2): ?><li><a href="<?php echo U('Adminlist/index');?>">管理员中心</a></li>
				<li><a href="<?php echo U('Index/adminSet');?>" style="border-right:none;">系统设置</a></li><?php endif; ?>
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
		<?php if($data[0]['power'] != 0): ?><li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendcategory');?>" target="_self">添加分类</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendstate');?>" target="_self">添加状态</a></li><?php endif; ?>
				<!-- 功能管理 -->
			<li class="left-title" style="margin:5px auto;">功能管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminArticlelist');?>" target="_self">资讯管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSoftlist');?>" target="_self">软件管理</a></li>
		<?php if($data[0]['power'] != 0): ?><li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendcategory');?>" target="_self">分类管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSendstate');?>" target="_self">状态管理</a></li><?php endif; ?>
			<li class="left-li"><span class="li-quote">▶</span><a href="http://leo2016.duoshuo.com/admin/" target="_blank">评论管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminLinkFriend');?>" target="_self">友情链接</a></li>
		<?php if($data[0]['power'] != 0): ?><!-- 审核中心 -->
			<li class="left-title" style="margin:5px auto;">审核中心</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/examineArticle');?>" target="_self">文章审核</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/examineSoft');?>" target="_self">软件审核</a></li><?php endif; ?>
				<!-- 系统功能 -->
			<li class="left-title" style="margin:5px auto;">系统功能</li>
		<?php if($data[0]['power'] != 0): ?><li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSet');?>" target="_self">系统管理</a></li><?php endif; ?>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Index/adminSystem');?>" target="_self">系统信息</a></li>
		</ul>
	</div>	
	
</body>
</html>
	</aside>
	<aside class="adminRight"  style="overflow:auto;height:660px;">
		<div class="container-fluid">
<div class="row">
	<div class="admin-welcome col-md-4  admin-box">
		<img src="<?php echo ($data[0][headimg]); ?>" class="thumbnail" width="100" height="100" alt="xxx">
		<p style="margin-top:10px;">欢迎您，<?php echo ($data[gly]); ?>：<b><?php echo ($data[0]['nicheng']); ?></b></p>
		<p><span class="glyphicon glyphicon-pencil"></span> <?php echo ($data[0]['introduce']); ?></p>
	</div>
	<div class="admin-welcome col-md-4 admin-send admin-box" style="margin-left:10px;">
		<a href="<?php echo U('adminArticlelist');?>">
			<span class='glyphicon glyphicon-list-alt'></span>
			我发布的文章
		</a>
		<a href="<?php echo U('adminSoftlist');?>">
			<span class='glyphicon glyphicon-open'></span>
			我发布的软件
		</a>
	</div>
	<div class="admin-welcome col-md-3 admin-send admin-box" style="margin-left:10px;height:110px;line-height:110px;">
		<b>今天是：</b><?php echo date('Y年m月d日',time());?>
		<span id="week"></span>		
	</div>
</div>
	<!-- 我发布的文章列表 -->
	<div class="row" >
		<div class="col-md-6 admin-box">
		<div class="panel text-center"><h4>文章列表</h4></div>
			<table class="table ">
				<tr>
					<th>条数</th>
					<th>标题</th>
				</tr>
			<?php if(is_array($alist)): $i = 0; $__LIST__ = $alist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><a href="__ROOT__/index.php/Index/article/id/<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</table>
		</div>
		<div class="col-md-6 admin-box">
		<div class="panel text-center"><h4>软件列表</h4></div>
			<table class="table ">
				<tr>
					<th>条数</th>
					<th>标题</th>
				</tr>
			<?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vv["id"]); ?></td>
					<td><a href="__ROOT__/index.php/Index/downpage/id/<?php echo ($vo["id"]); ?>" target="_blank"><?php echo ($vv["title"]); ?></a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</table>
		</div>
<!-- 		<div class="col-md-4 admin-box">
				<div class="text-center">
					<h4>公告</h4>
				</div>
				<ul class="admin-uls">
					<li><a href="">Be程序员上线了</a> <span class="fr">2016-3-10</span></li>
				</ul>
		</div> -->


<!-- 		<div class="col-md-4 admin-box">
	<div class="text-center">
		<h3>系统信息</h3>
	</div>
	<ul class="admin-uls" style="padding-bottom:5px;">
		<li><b>系统版本:</b>Be程序员社区1.0</li>
		<li><b>运行环境:</b>appache+php+mysql</li>
		<li><b>操作系统:</b>win7,win8,win xp</li>
		<li><b>上传限制:</b>20M</li>
		<li><b>版权所有:</b>Be程序员社区所有</li>
	</ul>	
</div> -->
</div>
<script type="text/javascript">
window.onload=function(){
	var weeks =new Array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
	var now = new Date();
	var wk=document.getElementById('week');
	wk.innerHTML=weeks[now.getDay()];
}
</script>
	</aside>
</div>	 
</body>
</html>