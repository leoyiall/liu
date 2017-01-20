<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Be程序员博客首页</title>
	<link rel="shortcut icon" href="__PUBLIC__/images/ico.png" type="image/x-icon" />
	<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/blogindex.css">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/bootstrap.min.css">
</head>
<body>
<!-- 头部 -->
	<div class="top">
		<div class="conWidth">
		  <div class="left">
			<a href="<?php echo U('Index/index');?>"><span>Be程序员博客</span></a>
		  </div>
		  <div class="right">
			 <?php if($idnumber): ?><ul>
			    <li>
			    <?php if($list['nicheng']): ?><a href="<?php echo U('index');?>/id/<?php echo ($list['idnumber']); ?>"><?php echo ($list['nicheng']); ?></a>
			    <?php else: ?>
			<a href="<?php echo U('index');?>/id/<?php echo ($idnumber); ?>"><?php echo ($idnumber); ?></a><?php endif; ?>
			    </li>
			    <li><a href="<?php echo U('Common/logout');?>">退出</a></li>
			    <li><a href="<?php echo U('addarc');?>/id/<?php echo ($idnumber); ?>">发布博文</a></li>
			    <li><a href="<?php echo U('xiaoxi');?>?id=<?php echo ($id); ?>">消息(<span class="color">0</span>)</a></li>
			  </ul>
			  <?php else: ?>
			    <ul>
			      <li><a href="<?php echo U('Common/login');?>?l=blog">登录</a></li>
			      <li><a href="<?php echo U('Common/reg');?>">注册</a></li>
			    </ul><?php endif; ?>
		  </div>
		</div>
	</div>
	<!-- 导航 -->
	<div class="navBox">
		<div class="navlist">
			<img src="__PUBLIC__/images/belogo.png" width="100" height="30" alt="">
			<ul>
				<li><a href="<?php echo U('Index/index');?>">程序员社区首页</a></li>
				<li><a href="<?php echo U('Blog/index');?>" style="color:#3DA3EF;">博客首页</a></li>
				<li><a href="<?php echo U('Index/index');?>">互联网资讯</a></li>
				<li><a href="">程序员社区</a></li>
				<li><a href="">编程问答</a></li>
				<li><a href="">源码分享</a></li>
				<li><a href="">软件下载</a></li>
			</ul>
		</div>
	</div>
	<!-- 博文列表 -->
	<div class="main">
		<div class="blogList">
		<ul class="nav nav-tabs" role="tablist" id="myTab">
		  <li role="presentation" class="active"><a href="#home" role="tab" data-toggle="tab">首页</a></li>
		  <li role="presentation"><a href="#profile" role="tab" data-toggle="tab">精华</a></li>
		  <li role="presentation"><a href="#messages" role="tab" data-toggle="tab">热门</a></li>
		  <li role="presentation"><a href="#settings" role="tab" data-toggle="tab">最新</a></li>
		</ul>

		<div class="tab-content">
		  <div role="tabpanel" class="tab-pane active" id="home">
		  	<ul class="blogLists">
		  	<?php if(is_array($slist)): $i = 0; $__LIST__ = $slist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li class="list">
		  			<div class="leftBox">
		  				<a href="<?php echo U('Person/index');?>?id=<?php echo ($vv["user_id"]); ?>" target="_blank"><img src="__PUBLIC__/Uploads/<?php echo ($vv["arcimg"]); ?>" width="100" height="100" alt="<?php echo ($vv["nicheng"]); ?>"><br><h4 align="center"><?php echo ($vv["nicheng"]); ?></h4 align="center"></a>

		  			</div>
		  			<div class="rightBox">
		  				<h2><a href="<?php echo U('Person/article');?>?id=<?php echo ($vv["user_id"]); ?>&lid=<?php echo ($vv["lid"]); ?>" target="_blank"><?php echo ($vv["title"]); ?></a></h2>
		  				<div class="rightSummary">
		  					<?php echo ($vv["content"]); ?>
		  				</div>
		  			</div>
		  			<div class="rightPerfect">
		  				<a href="<?php echo U('ajaxPerfect');?>?id=<?php echo ($vv["lid"]); ?>&p=<?php echo ($vv["perfect"]); ?>">赞(<span class="color"><?php echo ($vv["perfect"]); ?></span>)</a>
		  			</div>
  			<!-- 文章介绍列表 -->
		  			<div class="conList">
	  				<p><span>发表于:<?php echo date("Y-m-d H:i:s",$vv['sendTime']);?> </span>
	  				  <span>浏览人数:<?php echo ($vv["sight"]); ?></span>
<span>分类:<a href="<?php echo U('Person/arclist');?>?id=<?php echo ($vv["user_id"]); ?>&cid=<?php echo ($vv["cate_id"]); ?>" target="_blank"><?php echo ($vv["category"]); ?></a></span>
<span>阅读全文:<a href="<?php echo U('Person/article');?>?id=<?php echo ($vv["user_id"]); ?>&lid=<?php echo ($vv["lid"]); ?>" target="_blank"><?php echo ($vv["title"]); ?></a></span>
	  				</p>
		  			</div>
		  	<!-- 文章介绍列表结束 -->
		  		</li><?php endforeach; endif; else: echo "" ;endif; ?>
		  	</ul>
		  	<!-- 页码 -->
		  	<div class="pages">
		  		<?php echo ($show); ?>
		  	</div>
		  </div>
	  <div role="tabpanel" class="tab-pane" id="profile">
	  		  	<ul class="blogLists">
	  		  	<?php if(is_array($jlist)): $i = 0; $__LIST__ = $jlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li class="list">
	  		  			<div class="leftBox">
	  		  				<a href="<?php echo U('Person/index');?>?id=<?php echo ($vv["user_id"]); ?>" target="_blank"><img src="__PUBLIC__/Uploads/<?php echo ($vv["arcimg"]); ?>" width="100" height="100" alt="<?php echo ($vv["nicheng"]); ?>"><br><h4 align="center"><?php echo ($vv["nicheng"]); ?></h4 align="center"></a>

	  		  			</div>
	  		  			<div class="rightBox">
	  		  				<h2><a href="<?php echo U('Person/article');?>?id=<?php echo ($vv["user_id"]); ?>&lid=<?php echo ($vv["lid"]); ?>" target="_blank"><?php echo ($vv["title"]); ?></a></h2>
	  		  				<div class="rightSummary">
	  		  					<?php echo ($vv["content"]); ?>
	  		  				</div>
	  		  			</div>
	  		  			<div class="rightPerfect">
	  		  				<a href="<?php echo U('ajaxPerfect');?>?id=<?php echo ($vv["lid"]); ?>&p=<?php echo ($vv["perfect"]); ?>">赞(<span class="color"><?php echo ($vv["perfect"]); ?></span>)</a>
	  		  			</div>
	<!-- 文章介绍列表 -->
			<div class="conList">
			<p><span>发表于:<?php echo date("Y-m-d H:i:s",$vv['sendTime']);?> </span>
			  <span>浏览人数:<?php echo ($vv["sight"]); ?></span>
<span>分类:<a href="<?php echo U('Person/arclist');?>?id=<?php echo ($vv["user_id"]); ?>&cid=<?php echo ($vv["cate_id"]); ?>" target="_blank"><?php echo ($vv["category"]); ?></a></span>
<span>阅读全文:<a href="<?php echo U('Person/article');?>?id=<?php echo ($vv["user_id"]); ?>&lid=<?php echo ($vv["lid"]); ?>" target="_blank"><?php echo ($vv["title"]); ?></a></span>
			</p>
			</div>
	<!-- 文章介绍列表结束 -->
	  		  		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	  		  	</ul>
	  		  	<!-- 页码 -->
	  		  	<div class="pages">
	  		  		<?php echo ($show); ?>
	  		  	</div>
	  </div>
		  <div role="tabpanel" class="tab-pane" id="messages">
		  		  	<ul class="blogLists">
		  		  	<?php if(is_array($rlist)): $i = 0; $__LIST__ = $rlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li class="list">
		  		  			<div class="leftBox">
		  		  				<a href="<?php echo U('Person/index');?>?id=<?php echo ($vv["user_id"]); ?>" target="_blank"><img src="__PUBLIC__/Uploads/<?php echo ($vv["arcimg"]); ?>" width="100" height="100" alt="<?php echo ($vv["nicheng"]); ?>"><br><h4 align="center"><?php echo ($vv["nicheng"]); ?></h4 align="center"></a>

		  		  			</div>
		  		  			<div class="rightBox">
		  		  				<h2><a href="<?php echo U('Person/article');?>?id=<?php echo ($vv["user_id"]); ?>&lid=<?php echo ($vv["lid"]); ?>" target="_blank"><?php echo ($vv["title"]); ?></a></h2>
		  		  				<div class="rightSummary">
		  		  					<?php echo ($vv["content"]); ?>
		  		  				</div>
		  		  			</div>
		  		  			<div class="rightPerfect">
		  		  				<a href="<?php echo U('ajaxPerfect');?>?id=<?php echo ($vv["lid"]); ?>&p=<?php echo ($vv["perfect"]); ?>">赞(<span class="color"><?php echo ($vv["perfect"]); ?></span>)</a>
		  		  			</div>
	<!-- 文章介绍列表 -->
	<div class="conList">
	<p><span>发表于:<?php echo date("Y-m-d H:i:s",$vv['sendTime']);?> </span>
	  <span>浏览人数:<?php echo ($vv["sight"]); ?></span>
	<span>分类:<a href="<?php echo U('Person/arclist');?>?id=<?php echo ($vv["user_id"]); ?>&cid=<?php echo ($vv["cate_id"]); ?>" target="_blank"><?php echo ($vv["category"]); ?></a></span>
	<span>阅读全文:<a href="<?php echo U('Person/article');?>?id=<?php echo ($vv["user_id"]); ?>&lid=<?php echo ($vv["lid"]); ?>" target="_blank"><?php echo ($vv["title"]); ?></a></span>
	</p>
	</div>
	<!-- 文章介绍列表结束 -->
		  		  		</li><?php endforeach; endif; else: echo "" ;endif; ?>
		  		  	</ul>
		  		  	<!-- 页码 -->
		  		  	<div class="pages">
		  		  		<?php echo ($show); ?>
		  		  	</div>
		  </div>
		  <div role="tabpanel" class="tab-pane" id="settings">
  		  	<ul class="blogLists">
  		  	<?php if(is_array($zlist)): $i = 0; $__LIST__ = $zlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li class="list">
  		  			<div class="leftBox">
  		  				<a href="<?php echo U('Person/index');?>?id=<?php echo ($vv["user_id"]); ?>" target="_blank"><img src="__PUBLIC__/Uploads/<?php echo ($vv["arcimg"]); ?>" width="100" height="100" alt="<?php echo ($vv["nicheng"]); ?>"><br><h4 align="center"><?php echo ($vv["nicheng"]); ?></h4 align="center"></a>

  		  			</div>
  		  			<div class="rightBox">
  		  				<h2><a href="<?php echo U('Person/article');?>?id=<?php echo ($vv["user_id"]); ?>&lid=<?php echo ($vv["lid"]); ?>" target="_blank"><?php echo ($vv["title"]); ?></a></h2>
  		  				<div class="rightSummary">
  		  					<?php echo ($vv["content"]); ?>
  		  				</div>
  		  			</div>
  		  			<div class="rightPerfect">
  		  				<a href="<?php echo U('ajaxPerfect');?>?id=<?php echo ($vv["lid"]); ?>&p=<?php echo ($vv["perfect"]); ?>">赞(<span class="color"><?php echo ($vv["perfect"]); ?></span>)</a>
  		  			</div>
<!-- 文章介绍列表 -->
<div class="conList">
<p><span>发表于:<?php echo date("Y-m-d H:i:s",$vv['sendTime']);?> </span>
  <span>浏览人数:<?php echo ($vv["sight"]); ?></span>
<span>分类:<a href="<?php echo U('Person/arclist');?>?id=<?php echo ($vv["user_id"]); ?>&cid=<?php echo ($vv["cate_id"]); ?>" target="_blank"><?php echo ($vv["category"]); ?></a></span>
<span>阅读全文:<a href="<?php echo U('Person/article');?>?id=<?php echo ($vv["user_id"]); ?>&lid=<?php echo ($vv["lid"]); ?>" target="_blank"><?php echo ($vv["title"]); ?></a></span>
</p>
</div>
<!-- 文章介绍列表结束 -->
  		  		</li><?php endforeach; endif; else: echo "" ;endif; ?>
  		  	</ul>
  		  	<!-- 页码 -->
  		  	<div class="pages">
  		  		<?php echo ($show); ?>
  		  	</div>
		  </div>
		</div>
		<script>
		  $(function () {
		    $('#myTab a:first').tab('show')
		  })
		</script>
		</div>
		<div class="blogRight">
			<h5><center>用户列表</center></h5>
			<ul>
			<?php if(is_array($ulist)): $i = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><span>▶</span>
				<a href="<?php echo U('Person/index');?>?id=<?php echo ($vv["user_id"]); ?>" style="text-decoration:none;" target="_blank"><img src="__PUBLIC__/Uploads/<?php echo ($vv["arcimg"]); ?>" width="30" height="30">
				<?php echo ($vv["nicheng"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
</body>
</html>