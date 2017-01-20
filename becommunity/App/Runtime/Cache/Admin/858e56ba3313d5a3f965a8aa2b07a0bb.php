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
				<!-- 功能管理 -->
			<li class="left-title" style="margin:5px auto;">编程库管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/index');?>" target="_self">编程库管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/addProgramme');?>" target="_self">添加编程库</a></li>
			<!-- 课程管理部分 -->
			<li class="left-title" style="margin:5px auto;">课程管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/courseList');?>" target="_self">课程管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/addCourse');?>" target="_self">添加课程</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/addCate');?>" target="_self">添加章节</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/addCategory');?>" target="_self">添加章节名称</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/chapterList');?>" target="_self">章节名称管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/sendVedio');?>" target="_self">发布课程视频</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/vedioList');?>" target="_self">课程视频管理</a></li>
			<!-- <li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/vedioCommentList');?>" target="_self">课程评论管理</a></li> -->
			<!-- 精彩收录管理部分 -->
			<li class="left-title" style="margin:5px auto;">精彩收录管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/shoulu');?>" target="_self">收录审核</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/shouluList');?>" target="_self">收录管理</a></li>
			<!-- 知识导图管理部分 -->
			<li class="left-title" style="margin:5px auto;">知识导图管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/addpit');?>" target="_self">发布知识导图</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/pitList');?>" target="_self">知识导图管理</a></li>
		</ul>
	</div>	
	
</body>
</html>
	</aside>
	<aside class="adminRight" style="overflow:auto;height:660px;">
		

<!-- 文本编辑器源码 -->
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
<div class="container-fluid">
<div class="row">
<!-- 导航条 -->
<ol class="breadcrumb">
  <li><a href="<?php echo U('index');?>">首页</a></li>
  <li class="active">添加编程库</li>
</ol>

</div>
  <div class="row  admin-box">
  <div class="col-md-12">
    <h4 class="text-center">添加编程库</h4>
    <form action="<?php echo U('doAddProgramme');?>" method="post" class="form-horizontal" enctype="multipart/form-data" id="subForm" enctype="multipart/form-data">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">编程库名称：</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="inputEmail3" name="title" placeholder="编程库名称" autofocus="autofocus">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">编程库logo：</label>
        <div class="col-sm-6">
          <input type="file" name="photo1">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">编程库背景图：</label>
        <div class="col-sm-6">
          <input type="file" name="photo2">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">编程库分类</label>
        <div class="col-sm-6">
      <select class="form-control" name="sort">
     <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vv["tid"]); ?>'><?php echo ($vv["typename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
      </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">编程库介绍</label>
        <div class="col-sm-6">
      <textarea class="form-control" rows="3"  placeholder="编程库介绍" name="introduce"></textarea>
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
          <button type="button" class="btn btn-default"style="margin-left:200px;" id="sub">添加编程库</button>
          <button type="reset" class="btn btn-default" style="margin-left:20px;">重写</button>
        </div>
      </div>
    </form>
  </div>
  </div><!-- col-md-12结束 -->
</div>
<script type="text/javascript">
  $("#sub").click(function(){
      if(confirm("是否添加该编程库？")){
          $("#subForm").submit();
       }
  })
</script>

	</aside>
</div>	 
</body>
</html>