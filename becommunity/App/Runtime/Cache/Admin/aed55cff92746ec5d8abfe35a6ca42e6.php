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
		<body  style="background:#fafafa;">
<div class="container-fluid">
<div class="row">
<!-- 导航条 -->
<ol class="breadcrumb">
  <li><a href="#">首页</a></li>
  <li class="active">资讯管理</li>
</ol>
<div class="alert alert-info" role="alert">
 <span class="hot-color" style="font-size:16px;">文章审核开启功能：</span>用于文章的审核开启，开启后，文章需要审核才能够发表。<br>
  <span class="hot-color" style="font-size:16px;">软件审核开启功能：</span>用于软件的审核开启，开启后，软件需要审核才能够发表。<br>
  <span class="hot-color" style="font-size:16px;">博客审核开启功能：</span>用于博客的审核开启，开启后，博客需要审核才能够发表。<br>
 如果使用过程中遇到问题可以查阅帮助手册。
</div>
  <div class="col-md-10 text-center">
    <h3 class="">系统设置</h3>
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1" style="float:left;margin-left:300px;font-size:16px;">文章审核开启</label>
      <label>
      <?php if($list[0]['a_on'] == 0): ?><input class="mui-switch" type="checkbox" style="float:right;line-height:30px;" id="aon">
      <?php else: ?>
      <input class="mui-switch" type="checkbox" style="float:right;line-height:30px;" checked="checked" id="aon"><?php endif; ?>
      </label>
  </div>
  </form>
  <div class="form-group">
    <label for="exampleInputEmail1" style="float:left;margin-left:300px;font-size:16px;">软件审核开启</label>
      <label>
      <?php if($list[0]['s_on'] == 0): ?><input class="mui-switch" type="checkbox" style="float:right;line-height:30px;" id="son">
      <?php else: ?>
      <input class="mui-switch" type="checkbox" style="float:right;line-height:30px;" checked="checked" id="son"><?php endif; ?>
      </label>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" style="float:left;margin-left:300px;font-size:16px;">博客审核开启</label>
      <label>
      <?php if($list[0]['b_on'] == 0): ?><input class="mui-switch" type="checkbox" style="float:right;line-height:30px;" id="bon">
      <?php else: ?>
      <input class="mui-switch" type="checkbox" style="float:right;line-height:30px;" checked="checked" id="bon"><?php endif; ?>
      </label>
  </div>
  </form>

  </div>
</div>
</div>
<script type="text/javascript">
  var ms=mdtool.messager();
  $("#aon").click(function(){
    // is如果是true就是选中，如果是false就是没有选中
    if($("#aon").is(':checked')){
      // 是选中
      var aon = 1;
    }else{
      var aon = 0;
    }
    // var son = $("#son").is(':checked');
      $.ajax({
        url:'<?php echo U("Index/modifyAdminSet");?>',
        type:'post',
        datatype:'json',
        data:{
          id:<?php echo ($list[0]['id']); ?>,
          aon:aon
        },
        success:function(e) {
          console.log(e);
          ms.send(e);
        },
        error:function(e) {
          console.log(e);
          ms.send(e);
        }
      });
  });
  // 判断软件审核是否开启
  $("#son").click(function(){
    // is如果是true就是选中，如果是false就是没有选中
    if($("#son").is(':checked')){
      // 是选中
      var son = 1;
    }else{
      var son = 0;
    }
      $.ajax({
        url:'<?php echo U("Index/modifyAdminSet");?>',
        type:'post',
        datatype:'json',
        data:{
          id:<?php echo ($list[0]['id']); ?>,
          son:son
        },
        success:function(e) {
          console.log(e);
          ms.send(e);
        },
        error:function(e) {
          console.log(e);
          ms.send(e);
        }
      });

  });
  $("#bon").click(function(){
    // is如果是true就是选中，如果是false就是没有选中
    if($("#bon").is(':checked')){
      // 是选中
      var bon = 1;
    }else{
      var bon = 0;
    }
    // var son = $("#son").is(':checked');
      $.ajax({
        url:'<?php echo U("Index/modifyAdminSet");?>',
        type:'post',
        datatype:'json',
        data:{
          id:<?php echo ($list[0]['id']); ?>,
          bon:bon,
          b:1 //修改博客
        },
        success:function(e) {
          console.log(e);
          ms.send(e);
        },
        error:function(e) {
          console.log(e);
          ms.send(e);
        }
      });
  });
</script>
</body>
</html>
	</aside>
</div>	 
</body>
</html>