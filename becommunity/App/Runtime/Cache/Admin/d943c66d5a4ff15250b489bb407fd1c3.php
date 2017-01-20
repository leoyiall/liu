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
	.adminRight{width:82%;float:right;}
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
			<a href="<?php echo U('seeMe');?>/id=<?php echo ($data[0]['id']); ?>"><img src="<?php echo ($data[0]['headimg']); ?>" width="40" height="40" alt="" class="img-thumbnail" title="查看资料"></a>
			<a href="<?php echo U('seeMe');?>/id=<?php echo ($data[0]['id']); ?>"  title="查看资料">
<span class="glyphicon glyphicon-user"></span>
			<?php echo ($data[0]['nicheng']); ?></a>
			<a href="<?php echo U('modifyPass');?>/id=<?php echo ($data[0]['id']); ?>" class="admin-modify">修改密码</a>
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
				<li><a href="">社区</a></li>
				<li><a href="">博客</a></li>
				<li><a href="">问答</a></li>
				<li><a href="">编程库</a></li>
				<li><a href="">源码分享</a></li>
				<li><a href="">管理员中心</a></li>
				<li><a href="" style="border-right:none;">系统设置</a></li>
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
	<aside class="adminRight">
		<!-- 文本编辑器软件 -->
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>


<body  style="background:#fafafa;">
<div class="container-fluid">
<div class="row">
<!-- 导航条 -->
<ol class="breadcrumb">
  <li><a href="<?php echo U('Index/index');?>">首页</a></li>
  <li class="active">发布文章</li>
</ol>
<div class="alert alert-info" role="alert">
<span class="hot-color">提示：</span>文章缩略图会自动选取第一张图片，摘要可自动获取。<span class="hot-color">如果文章来自其他网站，请一定要填来源去处！</span><br>
这里也用于<span class="hot-color">发布软件教程文章</span>，<span class="hot-color">软件安装文章</span>。
<br>如果使用过程中遇到问题可以查阅帮助手册。
</div>
</div>
	<div class="row  admin-box">
	<div class="col-md-12">
		<h4 class="text-center">发布资讯</h4>
		<form class="form-horizontal" method="post" action="<?php echo U('Index/domodifyNews');?>">
		<input type="hidden" name="arc_id" value="<?php echo ($list[0][id]); ?>">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">文章标题：</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" id="inputEmail3" autofocus="autofocus" placeholder="文章标题" name="title" autofocus="autofocus" value="<?php echo ($list[0][title]); ?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">文章分类</label>
		    <div class="col-sm-6">
				<select class="form-control" name="category">
			<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["id"] == $list[0]['cid']): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["category"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["category"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
		  </div>
		  </div>
  		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">文章状态</label>
		    <div class="col-sm-6">
				<select class="form-control" name="state">
			<?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["id"] == $list[0]['sid']): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["state"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["state"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
		  </div>
		  </div>
  		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">来源、链接</label>
		        <div class="col-sm-3">
	    		<label for="inputPassword3" class="col-sm-4 control-label" id="original">
		<?php if($list[0]['original'] == 1): ?><input type="radio" class="radio" name="original" value="1" checked style="float:left;"> 原创
    		   <?php else: ?>
   		   <input type="radio" class="radio" name="original" value="1" style="float:left;"> 原创<?php endif; ?>
    		 </label>
		<label for="inputPassword3" class=" control-label" id="nonOriginal">
	   <?php if($list[0]['original'] == 2): ?><input type="radio" class="radio" name="original" value="2" checked style="float:left;"> 非原创
	   <?php else: ?>
		   <input type="radio" class="radio" name="original" value="2" style="float:left;"> 非原创<?php endif; ?>
		 </label>

		    	</div>
		  </div>
  		  <div class="form-group" id="choseOther" >
		    <label for="inputPassword3" class="col-sm-2 control-label" ></label>
        <div class="col-sm-6">
		    <div class="col-sm-5">
				<input type="text" class="form-control" id="inputEmail3" placeholder="文章来源地方"  name="from" value="<?php echo ($list[0]['from_title']); ?>">
			</div>
		    <div class="col-sm-5">
				<input type="text" class="form-control" id="inputEmail3" name="link" placeholder="文章链接" value="<?php echo ($list[0]['from']); ?>">
			</div>
		    	</div>
		  </div>

		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label" >摘要</label>
		    <div class="col-sm-6">
			<textarea class="form-control" rows="3" name="summary" placeholder="文章摘要（可自动获取）"><?php echo ($list[0][summary]); ?></textarea>
		  </div>
		</div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">内容</label>
		    <div class="col-sm-6">
  <script id="editor" type="text/plain" style="width:800px;height:200px;"  name="content"><?php echo ($list[0][content]); ?></script>
		  </div>
		</div>		 
		 <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">发布时间:</label>
		    <div class="col-sm-6">
				<p style="margin-top:7px;">
					<?php echo date('Y-m-d H:i:s');?>
				</p>
		  </div>
		</div>
		
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="button" id="submits" class="btn btn-default"style="margin-left:200px;">发布文章</button>
		      <button type="reset" class="btn btn-default" onclick="confirm('确定要重写该文章吗?')" style="margin-left:20px;">重写</button>
		    </div>
		  </div>
		</form>
	</div>
	</div><!-- col-md-12结束 -->
</div>
<script type="text/javascript">
	$("#submits").click(function(){
		if(confirm("是否要发布文章?")){
			$("form").submit();
		}
	});
</script>
<script type="text/javascript">
	// $('#original input[name="original"]').click(function(){
	// 	$("#choseOther").css("display","none");
	// })
	// $('#nonOriginal input[name="original"]:checked').click(function(){
	// 	$("#choseOther").css("display","block");
	// })
</script>

	</aside>
</div>	 
</body>
</html>