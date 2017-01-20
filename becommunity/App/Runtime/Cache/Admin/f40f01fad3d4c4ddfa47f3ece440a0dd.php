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
<!-- 导航条 -->
<ol class="breadcrumb">
  <li><a href="<?php echo U('index');?>">首页</a></li>
  <li class="active">发布软件</li>
</ol>
<div class="alert alert-info" role="alert">
<span class="hot-color">提示：</span>软件标签需要填写，只有这样才能查询到对应的软件安装和软件教程。<span class="hot-color">注意区分软件来源。</span><br>如果使用过程中遇到问题可以查阅帮助手册。
</div>
</div>
	<div class="row  admin-box">
	<div class="col-md-12">
		<h4 class="text-center">发布软件</h4>
		<form action="<?php echo U('doAddSoft');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">软件名称：</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="inputEmail3" name="title" placeholder="软件名称" autofocus="autofocus">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">软件分类</label>
		    <div class="col-sm-6">
			<select class="form-control" name="sort">
		   <option value='开发工具'>开发工具</option>
			  <option value='编辑器'>编辑器</option>
			  <option value='辅助工具'>辅助工具</option>
			</select>
		  </div>
		  </div>
  		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">语言</label>
		    <div class="col-sm-6">
				<select class="form-control" name="language">
				  <option value='中文'>中文</option>
				  <option value='英文'>英文</option>
				  <option value='其他'>其他</option>
				</select>
		  </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">授权</label>
		    <div class="col-sm-6">
				<select class="form-control" name="give">
				  <option value='免费'>免费</option>
				  <option value='收费'>收费</option>
				</select>
		  </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">状态</label>
		    <div class="col-sm-6">
				<select class="form-control" name="sid">
				<?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["state"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
		  </div>
		  </div>

  		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">来源</label>
		        <div class="col-sm-10">
		    		<label >
		    		   <input type="radio" name="soft_id" value="0" checked="checked" style="width:20px;height:20px;" id="onit">该软件存于百度云，提供下载
		    		   <input type="radio" name="soft_id" value="1" style="width:20px;height:20px;" id="onit2"> 官方下载
		    		<div id="outit" style="position:relative;">
    		   		  <input type="text" class="form-control" id="inputEmail3" style="margin:5px auto;" placeholder="下载链接" name="link">
    		   		  <input type="text" class="form-control" id="inputEmail3" style="margin:5px auto;" placeholder="文件大小" name="softbig">
    		   		   <span style="float:right;position:absolute;right:-160px;top:45px;color:red;">*勿忘输入软件大小单位</span>
    		   		</div>
		    		   <!-- <input type="radio" style="margin:10px auto;width:20px;height:20px;" name="soft_id" value="2" id="onit3">Be程序员提供下载
					<input type="file" name="file" id="wenjian" style="display:none"/> -->
		    		 </label>
		    	</div>
		  </div>

		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">软件介绍</label>
		    <div class="col-sm-6">
			<textarea class="form-control" rows="3"  placeholder="软件介绍" name="introduce"></textarea>
		  </div>
		</div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">软件关键字</label>
		    <div class="col-sm-5">
		<input type="text" class="form-control" id="inputEmail3" placeholder="软件关键字" name="keywords">
		  </div>
		  	<div class="col-sm-2" style="color:red;line-height:40px;">
		  		*关键字逗号相隔
		  	</div>
		  </div>
  		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">软件公司</label>
		    <div class="col-sm-5">
		<input type="text" class="form-control" id="inputEmail3" placeholder="软件公司" name="from">
		  </div>
		  </div>

		 <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">发布时间:</label>
		    <div class="col-sm-6">
				<p style="margin-top:7px;">
				<?php echo date("Y-m-d H:i:s"); ?>
				</p>
		  </div>
		</div>
		
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default"style="margin-left:200px;">发布软件</button>
		      <button type="reset" class="btn btn-default" style="margin-left:20px;">重写</button>
		    </div>
		  </div>
		</form>
	</div>
	</div><!-- col-md-12结束 -->
</div>
<script type="text/javascript">
/*	$("#onit").on("click",function(){
		// alert('h1');
		$("#outit").show();
		$("#wenjian").hide();
	});
	$("#onit2").on("click",function(){
		// alert('h1');
		$("#outit").show();
		$("#wenjian").hide();
	});

	$("#onit3").on("click",function(){
		// alert('h1');
		$("#outit").hide();
		$("#wenjian").show();
	});*/

</script>
	</aside>
</div>	 
</body>
</html>