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
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/commentManage');?>" target="_self">发布课程视频</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/commentManage');?>" target="_self">课程视频管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Programme/index');?>" target="_self">课程评论管理</a></li>
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
		


<div class="container-fluid">
<div class="row">
<!-- 导航条 -->
<ol class="breadcrumb">
  <li><a href="<?php echo U('index');?>">首页</a></li>
  <li class="active">修改课程章节</li>
</ol>

</div>
  <div class="row  admin-box">
  <div class="col-md-12">
    <h4 class="text-center">修改课程章节</h4>
    <form action="<?php echo U('doModifyChapter');?>" method="post" class="form-horizontal" enctype="multipart/form-data" id="subForm" enctype="multipart/form-data">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">章节名称：</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="inputEmail3" name="title" placeholder="章节名称" autofocus="autofocus" value="<?php echo ($c['zname']); ?>">
          <input type="hidden" class="form-control" name="ids"  value="<?php echo ($c['id']); ?>">
        </div>
      </div>

       <div class="form-group">
         <label for="inputPassword3" class="col-sm-2 control-label">课程选择</label>
         <div class="col-sm-6">
       <select class="form-control" name="pid">
       <option value='<?php echo ($c["pid"]); ?>'><?php echo ($c["course"]); ?></option>
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vv["id"]); ?>'><?php echo ($vv["course"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
       </select>
       </div>
       </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">章节选择</label>
        <div class="col-sm-6">
      <select class="form-control" name="zid">
      <option value='<?php echo ($c["zid"]); ?>'><?php echo ($c["kname"]); ?></option>
     <?php if(is_array($lz)): $i = 0; $__LIST__ = $lz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vv["id"]); ?>'><?php echo ($vv["zname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
      </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-default"style="margin-left:200px;" id="sub">修改章节名称</button>
        </div>
      </div>
    </form>
  </div>
  </div><!-- col-md-12结束 -->
</div>
<script type="text/javascript">
  $("#sub").click(function(){
      if(confirm("是否修改该章节？")){
          $("#subForm").submit();
       }
  })
</script>

	</aside>
</div>	 
</body>
</html>