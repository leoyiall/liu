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
			<li class="left-title" style="margin:5px auto;">源码管理</li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Code/index');?>" target="_self">源码管理</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Code/commentManage');?>" target="_self">发布源码</a></li>
			<li class="left-li"><span class="li-quote">▶</span><a href="<?php echo U('Code/addSort');?>" target="_self">源码分类</a></li>
		</ul>
	</div>	
	
</body>
</html>
	</aside>
	<aside class="adminRight"  style="overflow:auto;height:660px;">
		

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
  <li class="active">发布源码</li>
</ol>
<div class="alert alert-info" role="alert">
<span class="hot-color">提示：</span>需要详细的写明源码的来源和下载地址，保证下载路径正确。<span class="hot-color">注意区分源码来源。</span><br>如果使用过程中遇到问题可以查阅帮助手册。
</div>
</div>
  <div class="row  admin-box">
  <div class="col-md-12">
    <h4 class="text-center">发布源码</h4>
    <form action="<?php echo U('doAddCode');?>" method="post" class="form-horizontal" enctype="multipart/form-data" id="subForm">
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">源码名称：</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" id="inputEmail3" name="title" placeholder="源码名称" autofocus="autofocus">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">源码分类</label>
        <div class="col-sm-6">
      <select class="form-control" name="sort">
     <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vv["cid"]); ?>'><?php echo ($vv["sort"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
      </div>
      </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">源码关键字</label>
          <div class="col-sm-5">
      <input type="text" class="form-control" id="inputEmail3" placeholder="源码关键字" name="keywords">
        </div>
          <div class="col-sm-2" style="color:red;line-height:40px;">
            *关键字逗号相隔
          </div>
        </div>
        <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">下载路径</label>
            <div class="col-sm-10">
            <label >
            <div id="outit" style="position:relative;">
                <input type="text" class="form-control" id="inputEmail3" style="margin:5px auto;" placeholder="下载链接" name="link">
                <input type="text" class="form-control" id="inputEmail3" style="margin:5px auto;" placeholder="文件大小" name="softbig">
                 <span style="float:right;position:absolute;right:-160px;top:45px;color:red;">*勿忘输入源码大小单位</span>
                <input type="text" class="form-control" id="inputEmail3" style="margin:5px auto;" placeholder="演示链接" name="look">
              </div>

             </label>
          </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">源码介绍</label>
        <div class="col-sm-6">
      <textarea class="form-control" rows="3"  placeholder="源码介绍" name="introduce"></textarea>
      </div>
    </div>
      <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">系统使用</label>
        <div class="col-sm-6">
          <script id="editor" type="text/plain" style="width:800px;height:200px;"  name="content"></script>
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
          <button type="button" class="btn btn-default"style="margin-left:200px;" id="sub">发布源码</button>
          <button type="reset" class="btn btn-default" style="margin-left:20px;">重写</button>
        </div>
      </div>
    </form>
  </div>
  </div><!-- col-md-12结束 -->
</div>
<script type="text/javascript">
  $("#sub").click(function(){
      if(confirm("是否发布该源码？")){
          $("#subForm").submit();
       }
  })
</script>

	</aside>
</div>	 
</body>
</html>