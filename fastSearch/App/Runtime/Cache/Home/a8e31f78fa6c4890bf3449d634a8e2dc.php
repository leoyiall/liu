<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>快搜栏目——快速搜索你想要的</title>
  <link rel="shortcut icon" href="__PUBLIC__/images/so.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/reset.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
  <!-- 引用bootstrap -->
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
  <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
  <script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
 </head>
 <body>
  <!-- 头部导航 -->
  <nav class="navbar navbar-default" style="position:fixed;width:100%;overflow:hidden;*zoom:1;z-index:10;">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
			<img src="__PUBLIC__/images/logo.png" alt="快搜" style="margin-top:-10px;">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?php echo U('index');?>">首页<span class="sr-only">(current)</span></a></li>
          <li><a href="<?php echo U('lists');?>">文章</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search" style="margin-left:50px;">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="快速搜索您需要的内容" style="width:300px;">
          </div>
          <button type="submit" class="btn btn-default">快搜</button>
        </form>
        <!-- 右侧 -->
        <ul class="nav navbar-nav navbar-right">

        <?php if($who): ?><a href="__ROOT__/index.php/admin" style="line-height:50px;"><img src="__PUBLIC__/images/333.jpg"  width="30" height="30" style="border-radius:50%;margin-right:5px;border:1px solid #ccc;"><b><?php echo ($who); ?></b></a>
          <?php else: ?>
           <li><a href="<?php echo U('Admin/Login/index');?>">登录</a></li>
           <li><a href="<?php echo U('Admin/Login/regsiter');?>">注册</a></li><?php endif; ?>

         </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
	
	<!-- 主体 -->
	<div class="container">
	<div class="inPosition div2_top">
		当前位置：<a href="">首页</a> >> 手机
	</div>
	<div class="bg-info">
		<p style="line-height:30px;text-align:center;font-size:20px;"><b>手机</b></p>
		<p style="text-indent:2em;padding-bottom:10px;">hello</p>
	</div>
	<!-- 左边文章栏目 -->
		<div class="list_left fl">
			<!-- 内容块 -->
			<div class="list_kuai">
				<h4><span class="color_red">[置顶]</span> <a href="" title="">你很好你很好啊</a></h4>
				<div class="list_summary">
					<a href="" title=""><img src="__PUBLIC__/images/333.jpg" alt="..." width="200" height="200" class="img-thumbnail fl"></a>
					<div class="list_say fr">
					<div class="list_about">
						发布时间：2016年1月8日 / 分类：青春语录 / 作者:菠萝的海 /
					</div>
						请允许我想象，你收到这封信时的情形。我更愿意那是在一个夕光散漫的黄昏，晚霞像垂落的红纱巾，欲露还掩地遮着天空的半张脸。寒水长天，飞鸟缓缓振翅，远山如墨染。也或者，是在一个诗意漫漶的清晨。你指尖微凉，信笺来时，像是长风卷扬昨夜新雪，落于你眼睫...
					</div>
				</div>
			</div>
			<!-- 内容块结束 -->
						<!-- 内容块 -->
			<div class="list_kuai">
				<h4><span class="color_red">[置顶]</span> <a href="" title="">你很好你很好啊</a></h4>
				<div class="list_summary">
					<a href="" title=""><img src="__PUBLIC__/images/333.jpg" alt="..." width="200" height="200" class="img-thumbnail fl"></a>
					<div class="list_say fr">
					<div class="list_about">
						发布时间：2016年1月8日 / 分类：青春语录 / 作者:菠萝的海 /
					</div>
						请允许我想象，你收到这封信时的情形。我更愿意那是在一个夕光散漫的黄昏，晚霞像垂落的红纱巾，欲露还掩地遮着天空的半张脸。寒水长天，飞鸟缓缓振翅，远山如墨染。也或者，是在一个诗意漫漶的清晨。你指尖微凉，信笺来时，像是长风卷扬昨夜新雪，落于你眼睫...
					</div>
				</div>
			</div>
			<!-- 内容块结束 -->
						<!-- 内容块 -->
			<div class="list_kuai">
				<h4><span class="color_red">[置顶]</span> <a href="" title="">你很好你很好啊</a></h4>
				<div class="list_summary">
					<a href="" title=""><img src="images/333.jpg" alt="..." width="200" height="200" class="img-thumbnail fl"></a>
					<div class="list_say fr">
					<div class="list_about">
						发布时间：2016年1月8日 / 分类：青春语录 / 作者:菠萝的海 /
					</div>
						请允许我想象，你收到这封信时的情形。我更愿意那是在一个夕光散漫的黄昏，晚霞像垂落的红纱巾，欲露还掩地遮着天空的半张脸。寒水长天，飞鸟缓缓振翅，远山如墨染。也或者，是在一个诗意漫漶的清晨。你指尖微凉，信笺来时，像是长风卷扬昨夜新雪，落于你眼睫...
					</div>
				</div>
			</div>
			<!-- 内容块结束 -->
			<div class="list_page">
				<nav>
				  <ul class="pagination">
				    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
				    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
				    <li><a href="#">1</a></li>
				       <li><a href="#">2</a></li>
				       <li><a href="#">3</a></li>
				       <li><a href="#">4</a></li>
				       <li><a href="#">5</a></li>
				       <li>
				         <a href="#" aria-label="Next">
				           <span aria-hidden="true">&raquo;</span>
				         </a>
				       </li>
				  </ul>
				</nav>
			</div>
		</div>
	<!-- 右边文章推荐 -->
		<div class="list_right  fr">
			<div class="nav_title"><h4>推荐文章</h4></div>
			<ul class="list_box">
				<li><span class="color_red">▷</span> <a href="" title="">能更好的对逻辑和视图分离</a></li>
				<li><span class="color_red">▷</span> <a href="" title="">能更好的对逻辑和视图分离</a></li>
				<li><span class="color_red">▷</span> <a href="" title="">能更好的对逻辑和视图分离</a></li>
				<li><span class="color_red">▷</span> <a href="" title="">能更好的对逻辑和视图分离</a></li>
				<li><span class="color_red">▷</span> <a href="" title="">能更好的对逻辑和视图分离</a></li>
				<li><span class="color_red">▷</span> <a href="" title="">能更好的对逻辑和视图分离</a></li>
				<li><span class="color_red">▷</span> <a href="" title="">能更好的对逻辑和视图分离</a></li>
				<li><span class="color_red">▷</span> <a href="" title="">能更好的对逻辑和视图分离</a></li>
				<li><span class="color_red">▷</span> <a href="" title="">能更好的对逻辑和视图分离</a></li>
			</ul>
		</div>
	</div><!-- container -->
	<div class="footer div2_top">
		版权所有 © by leo
	</div>
 </body>
</html>